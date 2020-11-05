<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;

class MenuController extends Controller
{
    public function saveMenuItem(Request $request)
    {
        $postData = $this->validate($request, [
            'resto_id' => 'required|numeric',
            'price' => 'required|numeric',
            'item' => 'required',
            'description' => 'required|min:3',
            'category' => ['required', new RestoCategoryValidate(request('resto_id'))]
        ]);

        $category = Category::where('resto_id', $postData['resto_id'])
            ->where('name', $postData['category'])
            ->first();

        $menu = Menu::create([
            'name' => $postData['item'],
            'price' => $postData['price'],
            'description' => $postData['description'],
            'resto_id' => $postData['resto_id'],
            'category_id' => $category->id
        ]);

        return response()->json($menu, 201);
    }
}
