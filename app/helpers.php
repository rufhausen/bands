<?php

function standardFormValue($field, $model = null)
{
    return old($field, isset($model->{$field}) ? $model->{$field} : null);
}
