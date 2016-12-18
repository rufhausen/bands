<?php

namespace App\Services;

trait TableSortingTrait
{
    public function getSortParams($request)
    {
        $params['order']         = '';
        $params['current_order'] = $request->input('order');
        $params['order']         = ($params['current_order'] == 'asc' ? 'desc' : 'asc');

        return $params;
    }
}
