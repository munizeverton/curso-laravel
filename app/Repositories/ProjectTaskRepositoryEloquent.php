<?php

namespace CursoLaravel\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use CursoLaravel\Entities\ProjectTask;

/**
 * Class ProjectTaskRepositoryEloquent
 * @package namespace CursoLaravel\Repositories;
 */
class ProjectTaskRepositoryEloquent extends BaseRepository implements ProjectTaskRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ProjectTask::class;
    }

}