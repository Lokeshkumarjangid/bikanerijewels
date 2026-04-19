<?php
namespace App\Services;
use App\Models\Navigation;

class NavigationService
{
    public function getMenuWithCategories()
    {
        return Navigation::select('id','name')
            ->with(['categories:id,name,navigation_id'])
            ->get();
    }

}