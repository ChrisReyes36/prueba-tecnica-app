<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\MenuItem;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $search = request()->get('search');
        $whereMenu = [];
        $orWhereMenu = [];
        $whereBusiness = [];
        $user = User::find(auth()->user()->id);

        if ($search) {
            if ($user->hasRole('Administrador')) {
                array_push($whereBusiness, ['businesses.name', 'LIKE', "%$search%"]);
            } else if ($user->hasRole('Cliente')) {
                array_push($whereMenu, ['users.id', auth()->user()->id]);
                array_push($whereMenu, ['menu_items.name', 'LIKE', "%$search%"]);
                array_push($orWhereMenu, ['category_items.name', 'LIKE', "%$search%"]);
            }
        }

        $cant_businesses = Business::join('users', 'businesses.user_id', '=', 'users.id')
            ->join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
            ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
            ->where('roles.name', 'Cliente')
            ->count();
        $cant_menu_items = MenuItem::whereIn('business_id', Business::where('user_id', auth()->user()->id)->pluck('id'))->count();

        $businesses = Business::where($whereBusiness)->latest()->take(20)->paginate(5);
        $menuItems = MenuItem::join('businesses', 'menu_items.business_id', '=', 'businesses.id')
            ->join('users', 'businesses.user_id', '=', 'users.id')
            ->join('category_items', 'menu_items.category_item_id', '=', 'category_items.id')
            ->select('menu_items.*')
            ->where($whereMenu)
            ->orWhere($orWhereMenu)
            ->latest()
            ->take(20)
            ->paginate(5);
        return view('home', compact('cant_businesses', 'cant_menu_items', 'businesses', 'menuItems'));
    }
}
