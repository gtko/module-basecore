<?php

namespace Modules\BaseCore\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Modules\BaseCore\Contracts\Entities\UserEntity;
use Modules\BaseCore\Contracts\Personnes\CreatePersonneContract;
use Modules\BaseCore\Contracts\Personnes\UpdatePersonneContract;
use Modules\BaseCore\Contracts\Repositories\UserRepositoryContract;
use Modules\BaseCore\Http\Requests\UserStoreRequest;
use Modules\BaseCore\Http\Requests\UserUpdateRequest;
use Modules\BaseCore\Models\Personne;
use Modules\BaseCore\Models\User;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('views-any', app(UserEntity::class)::class);

        return view('basecore::app.users.index');
    }

    public function impersonate(Request $request, User $user)
    {
        if(!Auth::user()->isSuperAdmin()) {
            return redirect()->back()->with('error', 'Impossible de se connecter en tant que cet utilisateur');
        }

        Session::put('impersonate', Auth::user()->id);
        Auth::login($user);

        return redirect()->route('statistiques');
    }

    public function depersonate(Request $request)
    {
        if(!Session::has('impersonate')) {
            return redirect()->back()->with('error', 'Impossible de se deconnecter en tant que cet utilisateur');
        }

        Auth::loginUsingId(Session::get('impersonate'));
        Session::forget('impersonate');

        return redirect()->route('users.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $this->authorize('create', app(UserEntity::class)::class);

        $personnes = Personne::pluck('firstname', 'id');

        $roles = Role::get();

        return view('basecore::app.users.create', compact('personnes', 'roles'));
    }

    /**
     * @param \Modules\BaseCore\Http\Requests\UserStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request, CreatePersonneContract $create_personne, UserRepositoryContract $repUser)
    {
        $this->authorize('create', app(UserEntity::class)::class);
        $personne = $create_personne->create($request);
        $user = $repUser->create($personne, $request->roles,$request->password, [
            'company' => $request->company ?? '',
            'siret' => $request->siret ?? '',
            'enabled' => $request->enabled === '1',
        ]);

        return redirect()
            ->route('users.edit', $user)
            ->withSuccess(__('basecore::crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \Modules\BaseCore\Models\UserEntity $user
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, UserEntity $user)
    {
        $this->authorize('views', $user);

        return view('basecore::app.users.show', compact('user'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \Modules\BaseCore\Models\UserEntity $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Request $request, UserEntity $user)
    {
        $this->authorize('update', $user);

        $personnes = Personne::pluck('firstname', 'id');

        $roles = Role::get();

        return view('basecore::app.users.edit', compact('user', 'personnes', 'roles'));
    }

    /**
     * @param \Modules\BaseCore\Http\Requests\UserUpdateRequest $request
     * @param \Modules\BaseCore\Models\UserEntity $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request,UpdatePersonneContract $updatePersonne,UserRepositoryContract $repUser,  UserEntity $user)
    {
        $this->authorize('update', $user);

        $updatePersonne->update($request, $user->personne);

        $user = $repUser->update($user, $request->roles, $request->password,[
            'company' => $request->company ?? '',
            'siret' => $request->siret ?? '',
            'enabled' => $request->enabled === '1',
        ]);


        return redirect()
            ->route('users.edit', $user)
            ->withSuccess(__('basecore::crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \Modules\BaseCore\Models\UserEntity $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, UserEntity $user)
    {
        $this->authorize('delete', $user);


        $user->delete();

        return redirect()
            ->route('users.index')
            ->withSuccess(__('basecore::crud.common.removed'));
    }
}
