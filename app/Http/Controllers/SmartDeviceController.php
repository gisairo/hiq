<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\SmartdeviceCollection;
use App\Http\Resources\ManufacturerCollection;
use App\Smartdevice;
use App\Manufacturer;

class SmartDeviceController extends Controller
{
    public function store(Request $request)
    {
        $manufacturer = (Object)$request->manufacturer;
        $smartdeviceData = (Object)$request->smartdevice;
        $smartdevice = new Smartdevice([
            'serial' => $smartdeviceData->serial,
            'description' => $smartdeviceData->description,
            'manufacturer_id' =>$manufacturer->id,
        ]);

        $smartdevice->save();

        return response()->json('success');
    }
    public function index()
    {
        return new SmartdeviceCollection(Smartdevice::with('manufacturer')->get());
    }

    public function edit($id)
    {
        $smartdevice = Smartdevice::find($id);
        // dd($smartdevice);
        return response()->json($smartdevice);
    }

    public function manufacturers()
    {
        return new ManufacturerCollection(Manufacturer::all());
    }

    public function update($id, Request $request)
    {
        $smartdevice = Smartdevice::find($id);
        $manufacturer = (Object)$request->manufacturer;
        $smartdeviceData = (Object)$request->smartdevice;
        $smartdevice->serial=$smartdeviceData->serial;
        $smartdevice->description=$smartdeviceData->description;
        // dd($manufacturer);
        if (isset($manufacturer->id)) {
            $smartdevice->manufacturer_id=$manufacturer->id;
        }
        
        $result=$smartdevice->save();
        return response()->json('successfully updated');
    }

    public function delete($id)
    {
        $smartdevice = Smartdevice::find($id);

        $smartdevice->delete();

        return response()->json('successfully deleted');
    }
}
