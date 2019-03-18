<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;

class ServicesEditController extends Controller
{
    //
    public function execute(Service $service, Request $request) {

        // POST METHOD
        if($request->isMethod('post')) {

            $input = $request->except('_token');

            //dd($input);

            $validator = Validator::make($input, [
                'name' => 'required|max:255',
                'text' => 'required',
            ]);

            if ($validator->fails()) {
                return redirect()
                    ->route('servicesEdit', ['service' => $input['id']])
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

            $service->fill($input);

            if ($service->update()) {
                return redirect('admin')->with('status', 'Страница обновлена');
            }

        }


        //GET METHOOD
        $old = $service->toArray();

        if (view()->exists('admin.services_edit')) {

            $data = [

                'title' => 'Редактирование страницы - '.$old['name'],
                'data' => $old

            ];

            return view('admin.services_edit', $data);
        }


    }

    public function delete(Service $service, Request $request)
    {

        $service->delete();
        return redirect('admin')->with('status', 'Страница удалена');
    }
}
