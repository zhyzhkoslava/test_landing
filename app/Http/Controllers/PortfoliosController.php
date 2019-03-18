<?php

namespace App\Http\Controllers;

use App\Portfolio;
use Illuminate\Http\Request;

class PortfoliosController extends Controller
{
    //
    public function execute() {

        if (view()->exists('admin.portfolios')) {

            $portfolios = Portfolio::all();

            $data = [
                'title' => 'Страницы',
                'portfolios' => $portfolios,
            ];
            //dd($data);
            return view('admin.portfolios', $data);

        }
        abort(404);

    }
}
