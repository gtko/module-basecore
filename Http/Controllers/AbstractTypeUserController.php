<?php

namespace Modules\BaseCore\Http\Controllers;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Modules\BaseCore\Actions\Personne\CreatePersonne;
use Modules\BaseCore\Contracts\Personnes\UpdatePersonneContract;
use Modules\BaseCore\Http\Requests\PersonneStoreRequest;
use Modules\BaseCore\Http\Requests\PersonneUpdateRequest;


abstract class AbstractTypeUserController extends Controller
{

    abstract function getTitle():string;
    abstract function getDataList():string;
    abstract function getName():string;
    abstract function getRouteName():string;

    abstract function getModelClass():string;
    abstract function getRepository();

    public function disableFields():array{
        return [];
    }

    /**
     * @param Model $model
     * @param string $type
     * @return Redirector|RedirectResponse
     */
    public function redirectSuccess(Model $model, string $type = 'created'):Redirector|RedirectResponse
    {
         $redirect = redirect()
            ->route($this->getRouteName().'.edit', $model)
             ->withSuccess(__('basecore::crud.common.'.$type));

         return $redirect;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index(): View|Factory|Application
    {
        $this->authorize('viewAny', $this->getModelClass());

        return view('basecore::type-users.index', [
            'title' => $this->getTitle(),
            'datalist' => $this->getDataList()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $this->authorize('create', $this->getModelClass());

        return view('basecore::type-users.create', [
            'route' => $this->getRouteName(),
            'name' => $this->getName(),
            'disabledFields' => $this->disableFields()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PersonneStoreRequest $request
     * @return Redirector|RedirectResponse
     * @throws AuthorizationException
     */
    public function store(PersonneStoreRequest $request): Redirector|RedirectResponse
    {
        $this->authorize('create', $this->getModelClass());

        $personne = (new CreatePersonne())->create($request);
        $typeUser = $this->getRepository()->create($personne);

        return $this->redirectSuccess($typeUser);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return Application|Factory|View
     * @throws AuthorizationException
     */
    public function edit($id)
    {
        $this->authorize('edit', $this->getModelClass());

        $model = $this->getModelClass()::find($id);

        return view('basecore::type-users.edit', [
            'route' => $this->getRouteName(),
            'name' => $this->getName(),
            'model' => $model,
            'disabledFields' => $this->disableFields()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PersonneUpdateRequest $request
     * @param UpdatePersonneContract $updatePersonne
     * @param $id
     * @return Redirector|RedirectResponse
     */
    public function update(PersonneUpdateRequest $request, UpdatePersonneContract $updatePersonne,$id): Redirector|RedirectResponse
    {
        $model = $this->getModelClass()::find($id);
        $updatePersonne->update($request, $model->personne);

        return $this->redirectSuccess($model, "saved");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return Redirector|RedirectResponse
     */
    public function destroy($id)
    {
        $model = $this->getModelClass()::find($id);
        $model->delete();

        return $this->redirectSuccess($model, 'removed');
    }


}
