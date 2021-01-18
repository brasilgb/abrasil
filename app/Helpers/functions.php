<?php

use App\Models\Empresa;

function showModelTables($model, $field)
{
    $models = $model::all();
    foreach($models as $m):
    return $m->$field;
    endforeach;
}

function formatDateTime($value, $format = 'd/m/Y')
{
    return Carbon\Carbon::parse($value)->format($format);
}