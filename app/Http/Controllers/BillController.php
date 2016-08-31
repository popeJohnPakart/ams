<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Bill;
use App\Tenant;
use Redirect;
use Request;
use Input;

class BillController extends Controller
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
        if(Tenant::find($data['bill_id']))
                return Redirect::back()->withInput();
        else{

            $tenant = new Tenant;
            $tenant->tenant_id = $data['tenant_id'];
            $tenant->tenant_name = $data['tenant_name'];
            $tenant->email = $data['email'];
            $tenant->phone = $data['phone'];
            $tenant->apt_name = $data['apt_name'];
            $tenant->block_num= $data['block_num'];
            $tenant->lease = $data['lease'];
            $tenant->due_date = $data['due_date'];
            $tenant->save();
         // return Redirect::back()->withInput();
         // return View('doctor');
           return Redirect('/admin/tenant');
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
    public function edit($tenant_id)
    {
        $tenant = Tenant::findOrFail($tenant_id);
        return View('url.bill',compact('tenant'));
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
         // $tenant_id = Request::input('tenant_id');
         // $tenant = Tenant::find($tenant_id);
         // $tenant->tenant_name  = Request::input('tenant_name');
         // $tenant->lease  = Request::input('lease');
         // $tenant->due_date  = Request::input('due_date');
         // $tenant->save();
         // return Redirect('admin/tenant');
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
    
    // public function deleteTenant($tenant_id){
    //         Tenant::find($tenant_id)->delete();

    //     return Redirect('admin/tenant');

    // }

    public function generateBill()
    {

        
    }

}
