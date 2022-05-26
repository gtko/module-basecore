<?php

namespace Modules\BaseCore\Http\Livewire;

use Filament\Tables\Actions\IconButtonAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ViewColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Filters\MultiSelectFilter;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Modules\BaseCore\Contracts\Repositories\UserRepositoryContract;
use Modules\BaseCore\Models\User;
use Modules\BaseCore\Tables\Columns\RolesUsersTable;
use Modules\CoreCRM\Contracts\Repositories\FournisseurRepositoryContract;
use Modules\CoreCRM\Models\Source;
use Modules\CoreCRM\Models\Tagfournisseur;
use Modules\CrmAutoCar\Models\Dossier;
use Modules\CrmAutoCar\Models\Fournisseur;
use Modules\CrmAutoCar\Tables\Columns\TagsTable;
use Spatie\Permission\Models\Role;

class ListUsers extends Component implements HasTable
{
    use InteractsWithTable;

    protected $queryString = [
        'tableFilters',
        'tableSortColumn',
        'tableSortDirection',
        'tableSearchQuery' => ['except' => ''],
    ];

    /**
     * @var \Modules\BaseCore\Contracts\Repositories\UserRepositoryContract
     */
    protected $repository = null;

    public function __construct($id = null)
    {
        parent::__construct($id);
        $this->repository =  app(UserRepositoryContract::class);
    }

    protected function getTableQuery(): Builder
    {
        $query = $this->repository->newQuery();

        return $query;
    }

    protected function getTableColumns(): array
    {
        return [
            ImageColumn::make('avatar_url')
                ->label('')
                ->rounded(true),
            TextColumn::make('format_name')
                ->label('Nom')
                ->sortable()
                ->searchable()
                ->toggleable(true),
            RolesUsersTable::make('roles')
                ->label('Rôles')
                ->toggleable(true),
            TextColumn::make('email')
                ->label('Email')
                ->sortable()
                ->searchable()
                ->toggleable(true),
            TextColumn::make('phone')
                ->label('Téléphone')
                ->sortable()
                ->searchable()
                ->toggleable(true),
            TextColumn::make('created_at')
                ->label('Créer le')
                ->sortable()
                ->searchable()
                ->toggleable(true),
            ViewColumn::make('id')
                ->label('Activé')
                ->view('basecore::user-switch')
        ];
    }

    protected function getTableActions(): array
    {
        return [
            IconButtonAction::make('impersonate')
                ->label('Controle')
                ->icon('heroicon-o-user-circle')
                ->tooltip("Prendre le controle de l'utilisateur")
                ->url(fn(User $record): string => route('users.impersonate', [$record]))
                ->visible(fn (User $record): bool => Auth::user()->can('impersonate', $record)),
            IconButtonAction::make('edit')
                ->label('Editer')
                ->tooltip("Editer l'utilisateur")
                ->url(fn(User $record): string => route('users.edit', [$record]))
                ->icon('heroicon-o-pencil'),
            IconButtonAction::make('delete')
                ->label('Supprimer')
                ->tooltip("Supprimer l'utilisateur")
                ->url(fn(User $record): string => route('users.destroy', [$record]))
                ->icon('heroicon-o-trash'),
        ];
    }

    protected function applySortingToTableQuery(Builder $query): Builder
    {
        if (filled($sortCol = $this->getTableSortColumn()) && filled($sortDir = $this->getTableSortDirection())) {

            $ordersBy = [
                'format_name' => function ($query, $direction) {
                    $query->orderBy(function ($query) {
                        $query
                            ->select(DB::raw('CONCAT(personnes.firstname,personnes.lastname) as format_name'))
                            ->from('personnes')
                            ->whereColumn('users.personne_id', 'personnes.id')
                            ->limit(1);
                    }, $direction);
                },
                'avatar_url' => function ($query, $direction) {
                    $query->orderBy(function ($query) {
                        $query
                            ->select(DB::raw('CONCAT(personnes.firstname,personnes.lastname) as format_name'))
                            ->from('personnes')
                            ->whereColumn('users.personne_id', 'personnes.id')
                            ->limit(1);
                    }, $direction);
                },
                'email' => function($query, $direction) {
                    $query->orderBy(function($query){
                        $query->select('emails.email')
                            ->from('personnes')
                            ->join('email_personne', 'email_personne.personne_id', '=', 'personnes.id')
                            ->join('emails', 'email_personne.email_id', '=', 'emails.id')
                            ->whereColumn('users.personne_id','personnes.id')
                            ->limit(1);
                    }, $direction);
                },
                'phone' => function($query, $direction) {
                    $query->orderBy(function($query){
                        $query->select('phones.phone')
                            ->from('personnes')
                            ->join('personne_phone', 'personne_phone.personne_id', '=', 'personnes.id')
                            ->join('phones', 'personne_phone.phone_id', '=', 'phones.id')
                            ->whereColumn('users.personne_id','personnes.id')
                            ->limit(1);
                    }, $direction);
                },
            ];

            if (($ordersBy[$sortCol] ?? false) && is_callable($ordersBy[$sortCol])) {
                $direction = $sortDir;
                $ordersBy[$sortCol]($query, $direction);
            } else {
                $columnName = $this->tableSortColumn;

                if (!$columnName) {
                    return $query;
                }

                $direction = $this->tableSortDirection ?? 'asc';

                $column = $this->getCachedTableColumn($columnName);

                if (!$column) {
                    return $query->orderBy($columnName, $direction);
                }

                $column->applySort($query, $direction);

                return $query;
            }

        }

        return $query;
    }


    protected function applySearchToTableQuery(Builder $query): Builder
    {
        if (filled($searchQuery = $this->getTableSearchQuery())) {
            $query->where(function (Builder $query) use ($searchQuery) {
                $query->setQuery(
                    $this->repository->searchQuery($query, $searchQuery)
                        ->getQuery()
                );
            });
        }

        return $query;
    }

    protected function getTableFilters(): array
    {
        $filters = [
            MultiSelectFilter::make('roles')
                ->label('Roles')
                ->options(fn() => Role::all()->pluck('name', 'id'))
            ->relationship('roles'),
            SelectFilter::make('enabled')
                ->label('Actif')
                ->options(fn() => [
                    '1' => 'Actif',
                    '0' => 'Inactif',
                ])
                ->column('enabled'),
        ];

        return $filters;
    }

    public function render()
    {
        return view('basecore::livewire.list-users');
    }

}
