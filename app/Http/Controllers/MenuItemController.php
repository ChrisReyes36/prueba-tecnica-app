<?php

namespace App\Http\Controllers;

use App\Models\CategoryItem;
use App\Models\MenuItem;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class MenuItemController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:menu-item-list|menu-item-create|menu-item-edit|menu-item-delete', ['only' => ['index']]);
        $this->middleware('permission:menu-item-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:menu-item-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:menu-item-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menuItems = MenuItem::paginate(5);
        return view('menuItems.index', compact('menuItems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = CategoryItem::pluck('name', 'id')->all();
        return view('menuItems.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'category_item_id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
        ]);
        DB::beginTransaction();
        try {
            MenuItem::create($request->all());
            DB::commit();
            return redirect()->route('menuItems.index')->with('success', 'Menu Item created successfully');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('menuItems.index')->with('error', 'Menu Item created failed');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menuItem = MenuItem::find($id);
        $categories = CategoryItem::pluck('name', 'id')->all();
        return view('menuItems.edit', compact('menuItem', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $menuItem = MenuItem::find($id);
        $this->validate($request, [
            'category_item_id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
        ]);
        DB::beginTransaction();
        try {
            $menuItem->update($request->all());
            DB::commit();
            return redirect()->route('menuItems.index')->with('success', 'Menu Item updated successfully');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('menuItems.index')->with('error', 'Menu Item updated failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            MenuItem::find($id)->delete();
            DB::commit();
            return redirect()->route('menuItems.index')->with('success', 'Menu Item deleted successfully');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('menuItems.index')->with('error', 'Menu Item deleted failed');
        }
    }
}
