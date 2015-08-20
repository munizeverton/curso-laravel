<?php

namespace CursoLaravel\Services;

use CursoLaravel\Repositories\ProjectMembersRepository;
use CursoLaravel\Validators\ProjectMembersValidator;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Prettus\Validator\Exceptions\ValidatorException;

class ProjectMembersService
{
    /** @var ProjectMembersRepository */
    protected $repository;
    
    public function __construct(ProjectMembersRepository $repository)
    {
        $this->repository = $repository;
    }

    public function show($id)
    {
        try {
            return $this->repository->with('project')->find($id);
        } catch (ModelNotFoundException $e) {
            return [
                'error' => true,
                'message' => "Project {$id} not found",
            ];
        }
    }

}