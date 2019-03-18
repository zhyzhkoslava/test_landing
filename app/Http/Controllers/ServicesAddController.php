<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServicesAddController extends Controller
{
    //
    public function execute(Request $request) {

        if (view()->exists('admin.services_add')) {

            $data = [

                'title' => 'Новая страница',

            ];

            return view('admin.services_add', $data);

        }
        abort(404);

    }
}
