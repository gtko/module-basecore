<?php


namespace Modules\BaseCore\DataLists;


use Modules\BaseCore\Interfaces\RepositoryFetchable;
use Modules\DataListCRM\Abstracts\DataListType;
use Spatie\Permission\Models\Permission;

class PermissionDataList extends DataListType
{

    public function getFields(): array
    {
        return [
            'name' => [
                'label' => 'Permission',
                'class' => 'w-36'
            ],
        ];
    }

    public function getActions(): array
    {
        return [
            'show' => [
                'permission' => ['show', Permission::class],
                'route' => function($params){
                    return route('permissions.show', $params);
                },
                'label' => 'voir',
                'icon' => 'show'
            ],
            'edit' => [
                'permission' => ['update', Permission::class],
                'route' => function($params){
                    return route('permissions.edit', $params);
                },
                'label' => 'edit',
                'icon' => 'edit'
            ],
        ];
    }

    public function getCreate(): array
    {
        return [
            'permission' => ['create', Permission::class],
            'route' => function(){
                return route('permissions.create');
            },
            'label' => 'Ajouter une permission',
            'icon' => 'addCircle'
        ];
    }

    public function getRepository(array $parents = []): RepositoryFetchable
    {
        // TODO: Implement getRepository() method.
    }
}
