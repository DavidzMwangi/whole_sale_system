<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\MessageBag;

class UnitController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','admin']);
    }
    public function index()
    {
        //get all the units in the database
        $units=Unit::all();

        return View::make('units.units')->with('units',$units);
    }

    public function newUnit(Request $request)
    {
        //validate the input
        $validator=Validator::make($request->all(),[
            'unit_name'=>'required',
        ]);
        if ($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // TODO check whether it exist
//        $units=Unit::all();
//        foreach ($units as $unit){
//            if (in_array($request->input('unit_name'),$unit))
//        }

        //save the new Unit
        $unit=new Unit();
        $unit->unit_full_name=$request->input('unit_full_name');
        $unit->unit_name=$request->input('unit_name');
        $unit->save();

        return redirect()->back()->withErrors(new MessageBag(['saved','The Unit has been saved']));
    }

    public function getIdEdit(Request $request)
    {
        $unit=Unit::find($request->input('unit_for_editting_id'));
        return Response::json([
            'status'=>true,
            'result23'=>$request->all(),
            'unit_details'=>$unit
        ]);
    }

    public function saveEdittedUnit(Request $request)
    {
        //save the editted record
        $unit=Unit::find($request->input('edit_unit_id'));
        $unit->unit_name=$request->input('edit_unit_name');
        $unit->save();

        return redirect()->back()->withErrors(new MessageBag(['unit_update','The Unit has been updated']));

    }

    public function deleteUnit(Request $request)
    {

        //get the unit from the DB and then delete it
        Unit::find($request->input('id_to_delete'))->delete();

        return redirect()->back();
    }
}
