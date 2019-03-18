<?php

namespace App\Http\Controllers;

use App\Portfolio;
use Illuminate\Http\Request;

class PortfoliosEditController extends Controller
{
    //
    public function execute(Portfolio $portfolio, Request $request) {

        // POST METHOD
        if($request->isMethod('post')) {

            $input = $request->except('_token');

            //dd($input);

            $validator = Validator::make($input, [
                'name' => 'required|max:255',
                'filter' => 'required',
            ]);

            if ($validator->fails()) {
                return redirect()
                    ->route('portfoliosEdit', ['portfolio' => $input['id']])
                    ->withErrors($validator);

            }

            if ($request->hasFile('images')) {

                $file = $request->file('images');
                $file->move(public_path().'/assets/img/', $file->getClientOriginalName());
                $input['images'] = $file->getClientOriginalName();

            }
            else {
                $input['images'] = $input['old_images'];
            }

            unset($input['old_images']);

            $portfolio->fill($input);

            if ($portfolio->update()) {
                return redirect('admin')->with('status', 'Страница обновлена');
            }

        }


        //GET METHOOD
        $old = $portfolio->toArray();

        if (view()->exists('admin.portfolios_edit')) {

            $data = [

                'title' => 'Редактирование страницы - '.$old['name'],
                'data' => $old

            ];

            return view('admin.portfolios_edit', $data);
        }


    }

    public function delete(Portfolio $portfolio, Request $request)
    {

        $portfolio->delete();
        return redirect('admin')->with('status', 'Страница удалена');
    }
}
