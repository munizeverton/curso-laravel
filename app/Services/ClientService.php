<?php
/**
 * Created by PhpStorm.
 * User: emuniz
 * Date: 23/07/2015
 * Time: 19:39
 */

namespace CursoLaravel\Services;

use CursoLaravel\Repositories\ClientRepository;
use CursoLaravel\Validators\ClientValidator;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Prettus\Validator\Exceptions\ValidatorException;

class ClientService
{
    /** @var ClientRepository  */
    protected $repository;

    /** @var  ClientValidator */
    protected $validator;

    public function __construct(ClientRepository $repository, ClientValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
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
                'message' => "Client {$id} not found",
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
                'message' => "Client {$id} not found",
            ];
        }
    }

    public function show($id)
    {
        try {
            return $this->repository->find($id);
        } catch (ModelNotFoundException $e) {
            return [
                'error' => true,
                'message' => "Client {$id} not found",
            ];
        }
    }

    public function getList()
    {
        try {
            return $this->repository->all();
        } catch (\Exception $e) {
            return [
                'error'   => true,
                'message' => $e->getMessage(),
            ];
        }
    }


}