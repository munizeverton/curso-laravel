<?php

namespace CursoLaravel\Http\Controllers;

use CursoLaravel\Repositories\ProjectMembersRepository;
use CursoLaravel\Services\ProjectMembersService;
use Illuminate\Http\Request;
use League\Flysystem\Exception;

class ProjectMembersController extends Controller
{

    /**
     * @var ProjectMembersRepository
     */
    private $repository;

    /**
     * @var ProjectMembersService
     */
    private $service;

    public function __construct(ProjectMembersRepository $repository, ProjectMembersService $service)
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

}
