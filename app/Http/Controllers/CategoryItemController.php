<?php

namespace App\Http\Controllers;

use App\Models\CategoryItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryItemController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:category-item-list|category-item-create|category-item-edit|category-item-delete', ['only' => ['index']]);
        $this->middleware('permission:category-item-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:category-item-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:category-item-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoryItems = CategoryItem::paginate(5);
        return view('categoryItems.index', compact('categoryItems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categoryItems.create');
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
            'name' => 'required',
        ]);
        DB::beginTransaction();
        try {
            CategoryItem::create($request->all());
            DB::commit();
            return redirect()->route('category-items.index')->with('success', 'Category Item created successfully');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('category-items.index')->with('error', 'Category Item created failed');
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
        $categoryItem = CategoryItem::find($id);
        return view('categoryItems.edit', compact('categoryItem'));
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
        $categoryItem = CategoryItem::find($id);
        $this->validate($request, [
            'name' => 'required|unique:category_items,name,' . $categoryItem->id,
        ]);
        DB::beginTransaction();
        try {
            $categoryItem->update($request->all());
            DB::commit();
            return redirect()->route('category-items.index')->with('success', 'Category Item updated successfully');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('category-items.index')->with('error', 'Category Item updated failed');
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
            CategoryItem::find($id)->delete();
            DB::commit();
            return redirect()->route('category-items.index')->with('success', 'Category Item deleted successfully');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('category-items.index')->with('error', 'Category Item deleted failed');
        }
    }
}
