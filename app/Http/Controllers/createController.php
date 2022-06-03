<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\createController;
use App\Http\Controllers\UserController;
use App\Models\Category;
class createController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorytable = category::latest()->paginate(10);
        return view('viewdata',compact('categorytable'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
        $category = new Category();
        $category->save();
        return redirect ()->back()->with('successMsg','Category name created successfully');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required','regex:/^[a-zA-Z\s]*$/','unique:categories','max:15']]);
            $category = new Category();
            $category->name = $request->name;
            $category->save();
            return redirect()->back()->with('successMsg','Category name successfully saved');
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
        $editcategory = Category::find($id);
        return view('edit', compact('editcategory'));
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
        $validated = $request->validate([
            'name' => ['required','regex:/^[a-zA-Z\s]*$/','unique:categories','max:15']]);
            $category = Category::find($id);
            $category->name = $request->name;
            $category->save();
            return redirect()->back()->with('successMsg','Category name successfully updated');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deletecategory = Category::find($id);
        $deletecategory->delete();
        return redirect()->back()->with('successMsg', 'Category name successfully deleted');
    }
}
