<?php

namespace App\Http\Controllers\Front;

use App\Models\Course;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use function PHPUnit\Framework\returnValue;

class CourseController extends Controller
{
    public function category($id){

        $data['categories'] = Category::findOrFail($id);
        $data['courses'] = Course::where('category_id', $id)->paginate(3);
        return view('front.courses.cat')->with($data);
    }
    public function show($id, $c_id){
        $data['course']= Course::findOrFail($c_id);
        return view('front.courses.show')->with($data);
    }

}
