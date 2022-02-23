<?php


namespace Modules\BaseCore\DataLists;


use Modules\BaseCore\Contracts\Repositories\RoleRepositoryContract;
use Modules\BaseCore\Interfaces\RepositoryFetchable;
use Modules\DataListCRM\Abstracts\DataListType;
use Spatie\Permission\Models\Role;

class RoleDataList extends DataListType
{

    public function getFields(): array
    {
        return [
            'name' => [
                'label' => 'Rôle',
                'class' => 'w-36'
            ],
        ];
    }

    public function getActions(): array
    {
        return [
            'edit' => [
                'permission' => ['update', Role::class],
                'route' => function($params){
                    return route('roles.edit', $params);
                },
                'label' => 'edit',
                'icon' => 'edit'
            ],
        ];
    }

    public function getCreate(): array
    {
        return [
            'permission' => ['create', Role::class],
            'route' => function(){
                return route('roles.create');
            },
            'label' => 'Ajouter un rôle',
            'icon' => 'addCircle'
        ];
    }

    public function getRepository(array $parents = []): RepositoryFetchable
    {
        return app(RoleRepositoryContract::class);
    }
}
