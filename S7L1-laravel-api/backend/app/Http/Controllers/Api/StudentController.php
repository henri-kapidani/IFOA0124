<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentController extends Controller
{
    public function transcript()
    {
        // lista esami superati dallo studente loggato
        $student_id = 2; // $studen_id = Auth::user()->id;

        $passed_exams = User::with('exams')->find($student_id);

        return $passed_exams;
    }
}
