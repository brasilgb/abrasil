<?php

use App\Models\Empresa;

function showModelTables($model, $field)
{
    $models = App\Models\.$this->model::all();
    foreach($models as $m):
    return $m->$field;
    endforeach;
}