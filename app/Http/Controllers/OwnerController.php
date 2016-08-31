<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Owner;
use Redirect;
use Request;
use Input;
use Validator;

class OwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

     public function viewAllOwners()
    {
        $allOwners = Owner::orderBy('id','ASC')->get();
        return view('url.addOwner',compact('allOwners'));
    }

    // public function showOwnerInformation()
    // {
    //     $owner = Category::lists('owner_name', 'owner_id');
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('url.addOwner');
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
            'owner_name'              => 'required',
            'address'          =>     'required',
            'phone'   =>              'required|numeric',
        ];

        $messages = [
            'owner_name.required'          => 'fields with * is a required Field',
            'address.required'        => 'fields with * is a required Field',
            'phone.numeric'         => 'Provide Numeric Input ',
        ];

         $validation = Validator::make($data, $rules, $messages);

         if ($validation->passes()) {
            $owner = new Owner;
            $owner->id = $data['id'];
            $owner->owner_name = $data['owner_name'];
            $owner->address = $data['address'];
            $owner->phone = $data['phone'];
            $owner->email = $data['email'];
           $owner->save();
           return Redirect('admin/owner');
     }
     else
     {
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
        $owner = Owner::findOrFail($id);
        return View('url.editOwner',compact('owner'))   ;
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
         $owner = Owner::find($id);
         $owner->owner_name  = Request::input('owner_name');
         $owner->address  = Request::input('address');
         $owner->phone  = Request::input('phone');
         $owner->email  = Request::input('email');
         $owner->save();
         return Redirect('admin/owner');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         Owner::find($id)->delete();

        return Redirect('admin/owner');
    }
    public function deleteOwner($id)
    {
       
    }
}
