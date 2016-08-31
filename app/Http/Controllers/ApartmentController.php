<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Apartment;
use App\Owner;
use Redirect;
use Request;
use Input;
use Validator;
use Session;
class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewAllApartments()
    {
    $allApt = Apartment::orderBy('apt_name','ASC')->get();
    $owners = Owner::all();
    return view('url.addApartment',compact('allApt','owners'));
    }

 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $owners = [''=>''] + Owner::lists('owner_name', 'id')->all();
        // $owner_list  = Owner::all();
        // foreach($owner_list as $data) {
        // $owner[$data['id']] = $data['owner_name'];
        // }
        // $data =  array('owner' => $owner);


        // $owners = DB::table('owners')->lists('owner_name','id');
        // return view('url.addApartment')->with('owners',$owners);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = Request::all();

        $rules = [
            'apt_name'              => 'required',
            'noOfUnits'          =>     'required|numeric',
            'expense'   =>              'required|numeric',
            'owner_id'        =>    'required|numeric'
        ];

        $messages = [
            'apt_name.required'                 => 'Name Should not be empty.',
            'noOfUnits.required'        => 'Should not be empty.',
            'expense.numeric'         => 'Provide Numbers, Should not be empty.',
            'owner_id.required'         => 'Should not be empty.',
        ];

         $validation = Validator::make($data, $rules, $messages);

                if ($validation->passes()) {
            $apartment = new Apartment;
            $apartment->id= $data['id'];
            $apartment->apt_name = $data['apt_name'];
            $apartment->description = $data['description'];
            $apartment->noOfUnits = $data['noOfUnits'];
            $apartment->owner_id = $data['owner_id'];
            $apartment->expense = $data['expense'];
            $apartment->save();
            Session::flash('flash_message', 'Apartment successfully added!');
            return Redirect('admin/apartment');
        }
        else {
            return Redirect::back()->withInput()->withErrors($validation);
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $apartment = Apartment::findOrFail($id);
        $owners = Owner::all();
        return View('url.editApartment',compact('apartment','owners'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
         $id = Request::input('id');
         $apartment = Apartment::find($id);
         $apartment->apt_name  = Request::input('apt_name');
         $apartment->description  = Request::input('description');
         $apartment->noOfUnits  = Request::input('noOfUnits');
         $apartment->expense=   Request::input('expense');
         $apartment->owner_id=   Request::input('owner_id');
         $apartment->save();
        return Redirect('admin/apartment');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Apartment::find($apt_id)->delete();

        return Redirect('admin/apartment');
    }

    public function deleteApartment($apt_id)
    {
        Apartment::find($apt_id)->delete();

        return Redirect('admin/apartment');
    }
}
