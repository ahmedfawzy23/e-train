<?php

namespace App\Http\Controllers\Admin;

use App\Models\Course;
use App\Models\Trainer;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image as Image;

class CourseController extends Controller
{
    public function index(){
        $data['courses'] = Course::All();

        return view('admin.Courses.index')->with($data);
    }


    public function create(){

        $data['categories'] = Category::All();
        $data['trainers'] = Trainer::All();

        return view('admin.courses.create')->with($data);
    }

    public function store(Request  $request){
$data = $request->validate([
    'name' => 'required|string',
    'price' => 'required|integer',
    'small_desc' => 'required|string',
    'desc' => 'required|string',
    'category_id' => 'required|integer',
    'trainer_id' => 'required|integer',
    'image' => 'required|image|mimes:png,jpg,jpeg',
]);

$new_name = $data['image']->hashName();

// dd($new_name);

Image::make($data['image'])->resize(50, 50)->save(public_path("front/Courses/$new_name"));

$data['image'] = $new_name;

Course::create($data);

        return redirect(route('admin.courses.index'));
    }


    public function edit($id){
        $data['course'] = Course::findOrFail($id);
        $data['categories'] = Category::All();
        $data['trainers'] = Trainer::All();

        return view('admin.Courses.edit')->with($data);
    }

    public function update(Request  $request){
        $data = $request->validate([
            'name' => 'required|string',
            'price' => 'required|integer',
            'small_desc' => 'required|string',
            'desc' => 'required|string',
            'category_id' => 'required|integer',
            'trainer_id' => 'required|integer',
            'image' => 'nullable|image|mimes:png,jpg,jpeg',
]);

$old_img = Course::findOrFail($request->course_id)->image;

if($request->hasFile('image')){

Storage::disk('front')->delete("courses/$old_img");

$new_name = $data['image']->hashName();

// dd($new_name);

Image::make($data['image'])->resize(570, 591)->save(public_path("front/courses/$new_name"));

$data['image'] = $new_name;

} else{
    $data['image'] = $old_img;
}


        Course::findOrFail($request->course_id)->update($data);
        return back();
}

public function delete($id){
$old_img = Course::findOrFail($id)->image;
Storage::disk('front')->delete("courses/$old_img");
    Course::findOrFail($id)->delete();


    return back();
}

}
