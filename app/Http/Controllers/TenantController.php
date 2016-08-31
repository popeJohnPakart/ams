<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Tenant;
// use App\Owner;
use App\Apartment;
use Redirect;
use Request;
use Input;
use Validator;
use Session;

class TenantController extends Controller
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


     public function viewAllTenants()
    {
    $allTenants = Tenant::orderBy('tenant_name','ASC')->get();
    $apartments = Apartment::all();
    return view('url.addTenant',compact('allTenants','apartments'));
    }


    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return View('url.addTenant');
      // ->with('owner',$owner);
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
            'tenant_name'              => 'required',
            'phone'          =>     'required|numeric',
            'apartment_id'   =>       'required|numeric',
            'block_num'        =>    'required|numeric',
          'lease'        =>    'required|numeric',
        'due_date'        =>    'required'


        ];

        $messages = [
            'tenant_name.required'                 => 'Tenant Name is required.',
            'phone.required'        => 'Phone Number is required.',
            'apartment_id.numeric'         => 'Provide An Apartment the Tenant to stay',
            'block_num.required'         => 'Block Number is required.',
            'lease.numeric'         =>  'Rent Payment is required.',
            'due_date.required'         => 'Provide a Due Date .',



        ];

         $validation = Validator::make($data, $rules, $messages);

                if ($validation->passes()) {
            $tenant = new Tenant;
            $tenant->id = $data['id'];
            $tenant->tenant_name = $data['tenant_name'];
            $tenant->email = $data['email'];
            $tenant->phone = $data['phone'];
            $tenant->block_num= $data['block_num'];
            $tenant->lease = $data['lease'];
            $tenant->due_date = $data['due_date'];
            $tenant->apartment_id = $data['apartment_id'];
            $tenant->save();
            Session::flash('flash_message', 'Tenant successfully added!');
            return Redirect('admin/tenant');
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
        $tenant = Tenant::findOrFail($id);
      $apartments = Apartment::all();
        return View('url.editTenant',compact('tenant','apartments'));
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
         $tenant = Tenant::find($id);
         $tenant->tenant_name  = Request::input('tenant_name');
        $tenant->email  = Request::input('email');
         $tenant->phone  = Request::input('phone');
        $tenant->apartment_id  = Request::input('apartment_id');
        $tenant->block_num  = Request::input('block_num');
         $tenant->lease  = Request::input('lease');
         $tenant->due_date  = Request::input('due_date');
         $tenant->save();
         return Redirect('admin/tenant');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    public function deleteTenant($tenant_id){
            Tenant::find($tenant_id)->delete();

        return Redirect('admin/tenant');

    }
}
