<?php


namespace Modules\BaseCore\DataLists;


use Modules\BaseCore\Contracts\Entities\UserEntity;
use Modules\BaseCore\Contracts\Repositories\UserRepositoryContract;
use Modules\BaseCore\Interfaces\RepositoryFetchable;
use Modules\BaseCore\Models\User;
use Modules\DataListCRM\Abstracts\DataListType;

class UserDataList extends DataListType
{
    public function getFields():array
    {
        return [
            'avatar_url' => [
                'label' => '',
                'component' => [
                    'name' => 'basecore::components.avatar',
                    'attribute' => 'url'
                ]
            ],
            'format_name' => [
                'label' => 'Nom',
                'action' => [
                    'permission' => ['show', app(UserEntity::class)::class],
                    'route' => function($params){
                        return route('users.show', $params);
                    },
                ]
            ],
            'roles' => [
              'label' => 'Rôles',
              'component' => [
                 'name' => 'basecore::components.role.badges',
                 'attribute' => 'roles'
              ]
            ],
            'email' => [
                'label' => 'Email'
            ],
            'phone' => [
                'label' => 'Téléphone'
            ],
            'created_at' => [
                'label' => 'Créer le',
                'format' => function($item){
                    return $item->created_at->format('d/m/Y');
                }
            ]
        ];
    }

    public function getActions(): array
    {
       return [
           'edit' => [
               'permission' => ['update', app(UserEntity::class)::class],
               'route' => function($params){
                   return route('users.edit', $params);
               },
               'label' => 'edit',
               'icon' => 'edit'
           ],
       ];
    }

    public function getCreate(): array
    {
        return [
            'permission' => ['create', app(UserEntity::class)::class],
            'route' => function(){
                return route('users.create');
            },
            'label' => 'Ajouter un user',
            'icon' => 'addCircle'
        ];
    }

    public function getRepository(array $parents = []): RepositoryFetchable
    {
       return app(UserRepositoryContract::class);
    }
}
