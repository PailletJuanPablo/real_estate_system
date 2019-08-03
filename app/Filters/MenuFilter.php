<?php

namespace App\Filters;

use JeroenNoten\LaravelAdminLte\Menu\Builder;
use JeroenNoten\LaravelAdminLte\Menu\Filters\FilterInterface;
use Illuminate\Support\Facades\Auth;

class MenuFilter implements FilterInterface
{
    public function transform($item, Builder $builder)
    {
/*
        if(isset($item['role']) && $item['role'] == 'admin') {
            return false;
        }
*/
        if(Auth::user()->role_id == 1) {
            return $item;
        }

        return false;
    }
}