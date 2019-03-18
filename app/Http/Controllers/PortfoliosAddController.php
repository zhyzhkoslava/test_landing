<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PortfoliosAddController extends Controller
{
    //
    public function execute(Request $request) {

        if (view()->exists('admin.portfolios_add')) {

            $data = [

                'title' => 'Новая страница',

            ];

            return view('admin.portfolios_add', $data);

        }
        abort(404);

    }
}
