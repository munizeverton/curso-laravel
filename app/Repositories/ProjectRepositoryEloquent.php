<?php

namespace CursoLaravel\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use CursoLaravel\Entities\Project;

/**
 * Class ProjectRepositoryEloquent
 * @package namespace CursoLaravel\Repositories;
 */
class ProjectRepositoryEloquent extends BaseRepository implements ProjectRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Project::class;
    }

}