<?php

namespace App\Http\Controllers\Admin;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class StudentController extends Controller
{
    public function index(){
        $data['students'] = Student::All();


        return view('admin.students.index')->with($data);
    }


    public function create(){


        return view('admin.students.create');
    }

    public function store(Request  $request){
$data = $request->validate([
    'name' => 'required|string',
    'email' => 'required|email',
    'spec' => 'nullable|string',
]);



Student::create($data);

        return redirect(route('admin.students.index'));
    }


    public function edit($id){
        $data['student'] = Student::findOrFail($id);

        return view('admin.students.edit')->with($data);
    }

    public function update(Request  $request){
        $data = $request->validate([
            'name' => 'required|string',
    'email' => 'required|email',
    'spec' => 'nullable|string',
]);




        Student::findOrFail($request->student_id)->update($data);
        return back();
}

public function delete($id){

    Student::findOrFail($id)->delete();


    return back();
}

public function showCourse($id){

    $data['courses'] = Student::findOrFail($id)->courses;
    $data['student_id'] = $id;


// dd($data['courses'] );
    // return back()
    return view('admin.students.show-courses')->with($data);
}

public function approve($id, $c_id){

    DB::table('course_student')->where('student_id',$id)->where('course_id',$c_id)
    ->update([
        'status' => 'approved',
    ]);

    return back()
    ;
}

    public function reject($id, $c_id){

        DB::table('course_student')->where('student_id',$id)->where('course_id',$c_id)
        ->update([
            'status' => 'rejected',
        ]);

        return back()
        ;
    }
}
