<?php

namespace CursoLaravel\Http\Controllers;

use CursoLaravel\Repositories\ProjectTaskRepository;
use CursoLaravel\Services\ProjectTaskService;
use Illuminate\Http\Request;

class ProjectTaskController extends Controller
{

    /**
     * @var ProjectTaskRepository
     */
    private $repository;

    /**
     * @var ProjectTaskService
     */
    private $service;

    public function __construct(ProjectTaskRepository $repository, ProjectTaskService $service)
    {
        $this->repository = $repository;
        $this->service    = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @param $id
     * @return Response
     * @internal param ClientRepository $repository
     */
    public function index($id)
    {
        return $this->repository->findWhere(['project_id' => $id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        return $this->service->create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param $projectId
     * @param $taskId
     * @return Response
     * @internal param int $id
     */
    public function show($projectId, $taskId)
    {
        return $this->repository->findWhere(['project_id' => $projectId, 'id' => $taskId]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request $request
     * @param  int     $id
     * @return Response
     */
    public function update(Request $request, $projectId, $taskId)
    {
        return $this->service->update($request->all(), $taskId);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($projectId, $taskId)
    {
        $this->service->delete($taskId);
    }
}
