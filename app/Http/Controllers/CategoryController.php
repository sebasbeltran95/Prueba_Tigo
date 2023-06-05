<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;


class CategoryController extends Controller
{
    public function index(Request $request){
        $busqueda = $request->busqueda;
        $categoria = Category::paginate(3);
        return view('category', compact('categoria','busqueda'));
    }
    public function filtro_name(Request $request){
        $busqueda = $request->busqueda;
        if($request->name == ''){
            $categoria = Category::paginate(3);
        }else{
            $categoria = Category::where('name', $request->name)->paginate(3);
        }
        return view('category', compact('categoria', 'busqueda'));
    }
    public function store(Request $request)
    {
        $cat = new  Category();
        $cat->name = $request->name;
        $cat->save();
        return redirect()->route('category.ver');
    }
    public function update(Request $request){
        $cat = Category::find($request->id); 
        $cat->name = $request->name;
        $cat->save();
        return redirect()->route('category.ver');
    }
    public function destroy($id){
        Category::where('id',$id)->first()->delete();
        return redirect()->route('category.ver');
    }
}
