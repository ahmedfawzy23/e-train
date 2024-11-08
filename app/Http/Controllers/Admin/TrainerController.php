<?php

namespace App\Http\Controllers\Admin;

use App\Models\Trainer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image as Image;

class TrainerController extends Controller
{
    public function index(){
        $data['trainers'] = Trainer::All();


        return view('admin.trainers.index')->with($data);
    }


    public function create(){


        return view('admin.trainers.create');
    }

    public function store(Request  $request){
$data = $request->validate([
    'name' => 'required|string',
    'phone' => 'nullable|string',
    'spec' => 'required|string',
    'image' => 'required|image|mimes:png,jpg,jpeg',
]);

$new_name = $data['image']->hashName();

// dd($new_name);

Image::make($data['image'])->resize(50, 50)->save(public_path("front/trainers/$new_name"));

$data['image'] = $new_name;

Trainer::create($data);

        return redirect(route('admin.trainers.index'));
    }


    public function edit($id){
        $data['trainer'] = Trainer::findOrFail($id);


        return view('admin.trainers.edit')->with($data);
    }

    public function update(Request  $request){
        $data = $request->validate([
            'name' => 'required|string',
    'phone' => 'nullable|string',
    'spec' => 'required|string',
    'image' => 'nullable|image|mimes:png,jpg,jpeg',
    'trainer_id' => 'required|exists:trainers,id',
]);

$old_img = Trainer::findOrFail($request->trainer_id)->image;

if($request->hasFile('image')){

Storage::disk('front')->delete("trainers/$old_img");

$new_name = $data['image']->hashName();

// dd($new_name);

Image::make($data['image'])->resize(50, 50)->save(public_path("front/trainers/$new_name"));

$data['image'] = $new_name;

} else{
    $data['image'] = $old_img;
}


        Trainer::findOrFail($request->trainer_id)->update($data);
        return back();
}

public function delete($id){
$old_img = Trainer::findOrFail($id)->image;
Storage::disk('front')->delete("trainers/$old_img");
    Trainer::findOrFail($id)->delete();


    return back();
}

}
