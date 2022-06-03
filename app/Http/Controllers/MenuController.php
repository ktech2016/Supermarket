<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Http\Controllers\MenuController;
use App\Models\Category;
class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorytable = Category::all();
        $menutable = Menu::latest()->paginate(10);
        return view('view_menu',compact('menutable','categorytable'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    return view('create_menu');
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
            'name' => ['required','regex:/^[a-zA-Z\s]*$/','unique:menus','max:15'],
            'category' => ['required'],
            'description' => ['required', 'min:5'],
            'price' => ['required'],
            'image' => ['required','mimes:jpg,jpeg,png'],   
        ]);
            if($request->file('image')){
                $file =$request->file('image');
                $filename = date('YmdHi').uniqid().$file->getClientOriginalName();
                $file->move(public_path('uploads/menu_images'),$filename);
            }
            else{
                $filename = 'default.png';
            }
            $menu = new Menu();
            $menu->name = $request->name;
            $menu->categoryid = $request->category;
            $menu->description = $request->description;
            $menu->price = $request->price;
            $menu->image = $filename;

            $menu->save();
            return redirect()->route('menu.create')->with('successMsg','Menu saved successfully');
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
        $editmenu = Menu::find($id);
        return view('edit_menu', compact('editmenu'));
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
            'name' => ['max:15'],
            'description' => ['min:5'],
            'image' => ['required','mimes:jpg,jpeg,png'],
              
        ]);
            $menu = Menu::find($id);
            if($request->file('image')){
                $file =$request->file('image');
                unlink(public_path('uploads/menu_images/').$menu->image);
                $filename = date('YmdHi').uniqid().$file->getClientOriginalName();
                $file->move(public_path('uploads/menu_images'),$filename);
            }
            else{
                $filename = $menu->image;
            }
            $menu->name = $request->name;
            $menu->description = $request->description;
            $menu->price = $request->price;
            $menu->image = $filename;

            $menu->save();
            return redirect()->route('menu.index')->with('successMsg','Menu saved successfully');
    }    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deletemenu = Menu::find($id);
        unlink(public_path('uploads/menu_images/').$deletemenu->image);
        $deletemenu->delete();
        return redirect()->route('menu.index')->with('successMsg','Menu deleted successfully');
    }
}
