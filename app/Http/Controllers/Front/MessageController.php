<?php

namespace App\Http\Controllers\Front;

use App\Models\Message;
use App\Models\Student;
use App\Models\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class MessageController extends Controller
{
    public function newsletter(Request $request){

        $data = $request->validate([
            'email' => "required|email"
        ]);

        Newsletter::create($data);
        return back();
    }

    public function contact(Request $request){

        $data = $request->validate([
            'name' => "required|string",
            'email' => "required|email",
            'subject' => "nullable|string",
            'message' => "required|string"
        ]);

        Message::create($data);
        return back();
    }

    public function enroll(Request $request){

        $data = $request->validate([
            'name' => "required|string",
            'email' => "required|email",
            'spec' => "nullable|string",
            'course_id' => "required|exists:courses,id"
        ]);

        $old_student = Student::select('id')->where('email', $data['email'])->first();

        if($old_student == null){

            $student = Student::create($data);
            $student_id = $student->id;
        } else {
            $student_id = $old_student->id;

        }


        $course_id = $request->course_id;

        DB::table('course_student')->insert([

            'course_id' => $course_id,
            'student_id' => $student_id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return back();
    }
}
