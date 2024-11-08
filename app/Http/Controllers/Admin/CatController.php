<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CatController extends Controller
{
    public function index(){
        $data['cats'] = Category::All();


        return view('admin.cats.index')->with($data);
    }


    public function create(){


        return view('admin.cats.create');
    }

    public function store(Request  $request){
$data = $request->validate([
    'name' => 'required|string',
]);

Category::create($data);

        return redirect(route('admin.cats.index'));
    }


    public function edit($id){
        $data['cat'] = Category::findOrFail($id);


        return view('admin.cats.edit')->with($data);
    }

    public function update(Request  $request){
        $data = $request->validate([
            'name' => 'required|string',
        ]);

        Category::findOrFail($request->cat_id)->update($data);
        return back();
}

public function delete($id){
    Category::findOrFail($id)->delete();


    return back();
}

}
