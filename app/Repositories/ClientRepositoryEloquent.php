<?php
/**
 * Created by PhpStorm.
 * User: emuniz
 * Date: 22/07/2015
 * Time: 20:55
 */

namespace CursoLaravel\Repositories;

use CursoLaravel\Entities\Client;
use Prettus\Repository\Eloquent\BaseRepository;

class ClientRepositoryEloquent extends BaseRepository implements ClientRepository
{
    public function model()
    {
        return Client::class;
    }
}