<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MenuService;
use App\Services\RestaurantService;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(MenuService $service, RestaurantService $restaurantService)
    {
        $restoId = 1;

        $menus = $service->getMenuWithCategory($restoId);

        $restaurants = $restaurantService->userRestaurantsAndTables();

        return view('home', compact('menus', 'restoId', 'restaurants'));
    }

}
