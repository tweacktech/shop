<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asset;
use Validator;
use App\Events\AssetEvent;
class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  
    public function index()
    {
       return $data= Asset::all();
        
    }
 
    public function show($id)
    {
        return Asset::find($id);
    }
 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
          $ff=Validator::make($request->all(), [
           
            'Type' => ['required', 'string'],
            'Serial_Number' => ['required', 'string'],
              'Description' => ['required', 'string'],
            'Picture_path' => ['required', 'string'],
              'Purchase_date' => ['required', 'string'],
            'Start_use_date' => ['required', 'string'],
              'Purchase_price' => ['required', 'string'],
            'Warranty' => ['required', 'string'],
              'Degradation' => ['required', 'string'],
            'CurrentV' => ['required', 'string'],
              'Location' => ['required', 'string']
        ]);

        if ($ff->fails()) {
            
            return 'field required';
        } 
        return $data= Asset::create($request->all());

        // event
        event(new AssetEvent($data));
    }

  


    public function update(Request $request, $id)
    {
        $data = Asset::findOrFail($id);
        $data->update($request->all());

        return "Updated successfully".','.$data;
    }

    public function delete(Request $request, $id)
    {
        $data = Asset::findOrFail($id);
        $data->delete();

        return 'item deleted';
    }
}
