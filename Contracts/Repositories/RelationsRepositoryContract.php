<?php

namespace Modules\BaseCore\Contracts\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;
use Modules\BaseCore\Exceptions\BadRelationException;

interface RelationsRepositoryContract
{
    /**
     * @param Relation $relation
     * @param Model $Target
     * @return Model|array
     * @throws BadRelationException
     */
    public function makeRelation(Relation $relation, Model $Target, array $pivotData = []): Model|null;

    /**
     * @param Relation $relation
     * @param Model $Target
     * @return Model|array
     * @throws BadRelationException
     */
    public function deleteRelation(Relation $relation, Model $target): Model|null|int;
}
