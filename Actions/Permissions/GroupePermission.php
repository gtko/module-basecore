<?php

namespace Modules\BaseCore\Actions\Permissions;

class GroupePermission
{

    public function group($permissions){
        $groupPermission = [];
        foreach($permissions as $perm){
            preg_match("#[^ ]+(.*)#", $perm->name, $matches);

            if(!($groupPermission[trim($matches[1])] ?? false)){
                $groupPermission[trim($matches[1])] = [
                    'name' => trim($matches[1]),
                    'perms' => []
                ];
            }

            $groupPermission[trim($matches[1])]['perms'][] = [
                'name' => trim(str_replace($matches[1], '', $perm->name)),
                'model' => $perm
            ];
        }

        return $groupPermission;
    }

}
