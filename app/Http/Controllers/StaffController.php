<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function index() {
    return view('welcome');
    }

    public function show() {
        $staff = 
            [
                [
                    "name" => "Inesh",
                    "salary" => 150000,
                    "experience" => 2
                ],
                [
                    "name" => "Kavinda",
                    "salary" => 500000,
                    "experience" => 5
                ],
                [
                    "name" => "Denish",
                    "salary" => 780000,
                    "experience" => 8
                ],
                [
                    "name" => "Kanila",
                    "salary" => 250000,
                    "experience" => 3
                ],
                [
                    "name" => "Rohan",
                    "salary" => 100000,
                    "experience" => 1
                ],


            ];
            return view('staff', ["staffMembers" => $staff]);
    }

     
    
}
