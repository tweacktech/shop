<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vendor;
use App\Events\VendorEvent;
use Illuminate\Database\Eloquent\MassAssignmentException;
class VendorController extends Controller
{
   
  
    public function index()
    {
       return $data= Vendor::all();
        
    }
 
    public function show($id)
    {
        return Vendor::find($id);
    }
 


    public function store(Request $request)
    {
        
        return $data=Vendor::create($request->all());
          // event
        event(new VendorEvent($data));
        VendorEvent::dispatch($data);
    }


    public function update(Request $request, $id)
    {
        $data = Vendor::findOrFail($id);
         
         $data->update($request->all());
         
 return "Updated successfully".','.$data;
    }

    public function delete(Request $request, $id)
    {
        $data = Vendor::findOrFail($id);
        $data->delete();

        return 'item deleted';
    }
}
