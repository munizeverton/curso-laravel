<?php

namespace CursoLaravel\Validators;

use Prettus\Validator\LaravelValidator;

class ProjectValidator extends LaravelValidator
{
    protected $rules = [
        'name'      => 'required|max:255',
        'owner_id'  => 'required',
        'client_id' => 'required',
    ];

}