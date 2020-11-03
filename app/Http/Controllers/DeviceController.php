<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Devices;
use App\Models\Accounting;
use Illuminate\Support\Facades\Redirect;

class DeviceController extends Controller
{
    public function showForm()
    {
        $categories = Category::select('id','category_name')
                                ->orderBy('category_name', 'asc')
                                ->get();
        $status = config('define.status');
        return view('create-device', [
            'categories'=> $categories,
            'status'=> $status,
        ]);
    }
    public function create(Request $request){
        if($request->isMethod('post')) {
            $this->validate($request, [
                'name' => 'min:3|max:191',
                'room' => 'max:191',
            ]);
        }

        if($request->hasFile('image_device'))
        {
            $file = $request->file('image_device');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time().'.'.$extension;
            $file->move('uploads/image_device/', $filename);
        }

        $device = new Devices();

            $device->name= $request->name;
            $device->category_id = $request->category;
            $device->model_number = $request->model;
            $device->brand_name = $request->brand;
            $device->code = $request->code;
            $device->serial_number = $request->seri;
            $device->number_device = $request->number;
            $device->manufacturer_address = $request->manu;
            $device->status = $request->status;
            $device->type_ts = $request->type_ts;
            $device->year_use_start = $request->year_use;
            $device->use_percent = $request->per;
            $device->original_price = $request->price_ac;
            $device->present_price = $request->price_now;
            $device->notes = $request->note;
            $device->locate_id = '1';
            $device->image = $request->hasFile('image_device')?'uploads/logos/'. $filename:'';

            $saved = $device->save();

            if($saved){
                $acc = new Accounting();

                $acc->id_device = $device->id;
                $acc->number_device = $device->number_device;
                $acc->original_price = $device->original_price;
                $acc->present_price = $device->present_price;

                $saved_1 = $acc->save();

                if($saved_1){
                    return redirect('/home');
                } else {
                    return Redirect::back()->withErrors(['msg', 'Thêm mới không thành công! Thử lại']);
                }
            } else {
                return Redirect::back()->withErrors(['msg', 'Thêm mới không thành công! Thử lại']);
            }

    }
}
