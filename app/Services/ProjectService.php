<?php

namespace CursoLaravel\Services;

use CursoLaravel\Repositories\ProjectRepository;

use CursoLaravel\Validators\ProjectValidator;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Prettus\Validator\Exceptions\ValidatorException;

class ProjectService
{
    /** @var ProjectRepository */
    protected $repository;

    /** @var  ProjectValidator */
    protected $validator;

    public function __construct(ProjectRepository $repository, ProjectValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }

    public function show($id)
    {
        try {
            return $this->repository->with('client')->with('user')->find($id);
        } catch (ModelNotFoundException $e) {
            return [
                'error' => true,
                'message' => "Project {$id} not found",
            ];
        }
    }

    public function getList()
    {
        try {
            return $this->repository->with('client')->with('user')->all();
        } catch (\Exception $e) {
            return [
                'error'   => true,
                'message' => $e->getMessage(),
            ];
        }
    }

    public function create(array $data)
    {
        try {
            $this->validator->with($data)->passesOrFail();
            return $this->repository->create($data);
        } catch (ValidatorException $e) {
            return [
                'error' => true,
                'message' => $e->getMessageBag()
            ];
        } catch (QueryException $e) {
            return [
                'error' => true,
                'message' => $e->getMessage()
            ];
        }
    }

    public function update(array $data, $id)
    {
        try {
            $this->validator->with($data)->passesOrFail();
            return $this->repository->update($data, $id);
        } catch (ValidatorException $e) {
            return [
                'error' => true,
                'message' => $e->getMessageBag()
            ];
        } catch (ModelNotFoundException $e) {
            return [
                'error' => true,
                'message' => "Project {$id} not found",
            ];
        } catch (QueryException $e) {
            return [
                'error' => true,
                'message' => $e->getMessage()
            ];
        }
    }

    public function delete($id)
    {
        try {
            return $this->repository->delete($id);
        } catch (ModelNotFoundException $e) {
            return [
                'error' => true,
                'message' => "Project {$id} not found",
            ];
        }
    }

}