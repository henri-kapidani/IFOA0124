<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function transcript()
    {
        if (Auth::user()->role !== "student") abort(401);

        // lista esami superati dallo studente loggato
        // $student_id = Auth::user()->id;
        $student_id = 2;

        $passed_exams = User::with('exams', 'exams.course', 'exams.course.subject')->find($student_id); //->where('mark', '>=', 18)->orderBy('date')->get();
        $passed_exams = User::find($student_id);
        $passed_exams = User::with('exams', 'exams.course', 'exams.course.subject')->find($student_id);
        // TODO: esempio per il wherePivot

        return [
            'success' => true,
            'data' => $passed_exams,
        ];
    }
}
