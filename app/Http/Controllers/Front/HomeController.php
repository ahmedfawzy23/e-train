<?php

namespace App\Http\Controllers\Front;

use App\Models\SiteContent;
use App\Models\Test;
use App\Models\Course;
use App\Models\Student;
use App\Models\Trainer;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(){
        $data['banner'] = SiteContent::select('content')->where('name', 'banner')->first();
        $data['content_courses'] = SiteContent::select('content')->where('name', 'courses')->first();

        $data['courses'] = Course::select('id', 'name', 'small_desc', 'category_id', 'trainer_id', 'image')
            ->orderBy('id', 'desc')
            ->take(3)
            ->get();

        $data['courses_count'] = Course::count();
        $data['trainers_count'] = Trainer::count();
        $data['Students_count'] = Student::count();
//        dd($data['courses'] );

        $data['tests'] = Test::All();
        return view('front.home')->with($data);
    }
}
