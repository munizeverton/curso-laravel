<?php

namespace CursoLaravel\Http\Controllers;

use CursoLaravel\Repositories\ProjectNoteRepository;
use CursoLaravel\Services\ProjectNoteService;
use Illuminate\Http\Request;
use League\Flysystem\Exception;

class ProjectNoteController extends Controller
{

    /**
     * @var ProjectNoteRepository
     */
    private $repository;

    /**
     * @var ProjectNoteService
     */
    private $service;

    public function __construct(ProjectNoteRepository $repository, ProjectNoteService $service)
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
     * @param $noteId
     * @return Response
     * @internal param int $id
     */
    public function show($projectId, $noteId)
    {
        return $this->repository->findWhere(['project_id' => $projectId, 'id' => $noteId]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request $request
     * @param  int     $id
     * @return Response
     */
    public function update(Request $request, $projectId, $noteId)
    {
        return $this->service->update($request->all(), $noteId);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($projectId, $noteId)
    {
        $this->service->delete($noteId);
    }
}
