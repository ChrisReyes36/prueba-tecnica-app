<?php

namespace App\Http\Controllers;

use App\Models\Business;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BusinessController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:business-list|business-create|business-edit|business-delete', ['only' => ['index']]);
        $this->middleware('permission:business-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:business-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:business-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $businesses = Business::paginate(5);
        return view('businesses.index', compact('businesses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('businesses.create');
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
            'description' => 'required',
            'user_id' => 'required',
        ]);
        DB::beginTransaction();
        try {
            Business::create($request->all());
            DB::commit();
            return redirect()->route('businesses.index')->with('success', 'Business created successfully');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('businesses.index')->with('error', 'Business created failed');
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
        $business = Business::find($id);
        return view('businesses.edit', compact('business'));
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
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'user_id' => 'required',
        ]);
        DB::beginTransaction();
        try {
            Business::find($id)->update($request->all());
            DB::commit();
            return redirect()->route('businesses.index')->with('success', 'Business updated successfully');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('businesses.index')->with('error', 'Business updated failed');
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
            Business::find($id)->delete();
            DB::commit();
            return redirect()->route('businesses.index')->with('success', 'Business deleted successfully');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('businesses.index')->with('error', 'Business deleted failed');
        }
    }
}
