<?php 

namespace App\Services;

use Illuminate\Support\Facades\Auth;

class RestaurantService
{

    public function userRestaurantsAndTables(){
        return Auth::user()
        ->restaurants()
        ->get();
    }
    
}