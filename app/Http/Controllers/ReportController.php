<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Apartment;
use App\Report;
use Redirect;
use Request;
use Input;
use Validator;
use Session;
class ReportController extends Controller
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
        $apartments = Apartment::all();
       return View('tenant.writeReports',compact('apartments'));
// return View('tenant.writeReports');
    }

   public function viewAllReports()
    {
        $allReports = Report::orderBy('report_type','ASC')->get();
        $apartments = Apartment::all();
        return view('url.viewReports',compact('allReports','apartments'));
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
            'report_type'     =>  'required',
            'report'          =>  'required',
            'apartment_id'    =>  'required|numeric',
            'apt_block'       =>  'required|numeric'
        ];

           $messages = [
            'report_type.required'   => 'Report Type is required.',
            'report.required'        => 'Report is required.',
            'apartment_id.numeric'   => 'Apartment ID does not exist',
            'apt_block.required'     => 'Block Number is required.'
        ];

       $validation = Validator::make($data, $rules, $messages);

            if ($validation->passes()) {
            $report = new Report;
            $report->id = $data['id'];
            $report->report_type = $data['report_type'];
            $report->report = $data['report'];
            $report->apartment_id = $data['apartment_id'];
          // $report->apt_name = $data['apt_name'];
            $report->apt_block= $data['apt_block'];
            $report->save();
            Session::flash('flash_message', 'Report Submitted!');
            return Redirect('/tenant/home');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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

    public function deleteReport($id){
          Report::find($id)->delete();

        return Redirect('admin/report');
    }
}
