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
            ],
            'enabled' => [
                'label' => 'Actif',
                'component' => [
                    'name' => 'basecore::components.user-enabled',
                    'attribute' => function($item){
                        return ['user' => $item];
                    }
                ]
            ],

        ];
    }

    public function getActions(): array
    {
       return [
           'controle' => [
               'label' => '',
               'permission' => ['impersonate', app(UserEntity::class)::class],
               'route' => function($params){
                   return route('users.impersonate', $params);
               },
               'icon' => 'portalin'
           ],
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
       $repository = app(UserRepositoryContract::class);

//       if(count(config('basecore.datalist.roles_unvisible', [])) > 0){
//           $query = $repository->newQuery();
//
//           $repository->setQuery($query->whereHas('roles', function($query) {
//               $query->whereNotIn('id', config('basecore.datalist.roles_unvisible', []));
//           }));
//       }

       return $repository;
    }
}
