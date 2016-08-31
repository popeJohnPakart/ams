<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function (){
    return view('auth/login');
});

	
// Route::get('/addApartment','ApartmentController@create');
Route::post('/addApartment','ApartmentController@store');
Route::get('/admin/apartment','ApartmentController@viewAllApartments');
// Route::get('/admin/apartment','ApartmentController@create');
// Route::get('admin/apartment','OwnerController@showOwnerInformation');
Route::get('/editApartment/{apt_id}','ApartmentController@edit');
Route::post('/updateApartment','ApartmentController@update');
Route::get('/deleteApartment/{apt_id}','ApartmentController@deleteApartment');


Route::get('/addTenant','TenantController@create');
Route::post('/addTenant','TenantController@store');
Route::get('/admin/tenant','TenantController@viewAllTenants');
Route::get('/editTenant/{id}','TenantController@edit');
Route::post('/updateTenant','TenantController@update');
Route::get('/deleteTenant/{id}','TenantController@deleteTenant');

Route::get('/issueBill','BillController@create');
Route::post('/issueBill','BillController@store');

//crud
Route::get('/addOwner','OwnerController@create');
Route::post('/addOwner','OwnerController@store');
Route::get('/admin/owner','OwnerController@viewAllOwners');
Route::get('/editOwner/{id}','OwnerController@edit');
Route::post('/updateOwner','OwnerController@update');
Route::get('/deleteOwner/{id}','OwnerController@destroy');
 	
// Route::get('/admin/reports', function () {
// 	return view('url.viewReports');
// });
Route::get('tenant/writeReports','ReportController@create');
Route::get('/addReport','ReportController@create');
Route::post('/addReport','ReportController@store');
Route::get('/admin/report','ReportController@viewAllReports');
Route::get('/deleteReport/{id}','ReportController@deleteReport');

Route::get('/issueBill','BillController@create');
Route::post('/issueBill','BillController@store');
Route::get('/issueBill/{id}','BillController@edit');
Route::post('/issueBill','BillController@update');


// Route::get('/admin/payment','');
// Route::get('/admin/','OwnerController@viewAllOwners');

// Route::get('/admin/tenant', function () {
// 	return view('url.addTenant');
// });

// Route::get('/admin/owners', function () {
// 	return view('url.addOwner');
// });

Route::get('tenant/home', ['middleware' => 'tenant', function()
{
	return view('tenant.home');
}]);




Route::get('tenant/viewReceipts', ['middleware' => 'tenant', function()
{
	return view('tenant.viewReceipts');
}]);

Route::get('tenant/viewExpenses', ['middleware' => 'tenant', function()
{
	return view('tenant.viewExpenses');
}]);



// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::controllers([
   'password' => 'Auth\PasswordController',
]);




Route::get('/admin/home', function () {  	
	if (Auth::guest()){
	return Redirect::to('auth/login');
	}
	else
	{	
	echo '<div class="container"><h1>Welcome Builder,</h1><h5>'. Auth::user()->name .'</h5></div>.';
   	return view('url.index');

	}
});

//generate invoices
Route::get('/generateBill',function(){
  return view ('url.bill');
});


// Route::get('pdf/po/{id}',function($currentBidId){
//     /*
//      * pass data through to invoice view
//      */
//     $invoiceData = \AcceptedAuctionBid::where('transaction_code','=',$currentBidId)
//         ->with('withBid','belongsToSeller','belongsToBidder','belongsToBidWithAnimal')
//         ->first();
//        $invoiceInfo = [
//            'invoice_number'=>$invoiceData->transaction_code,
//            'bid_amount'=>$invoiceData->withBid->bid_amount,
//            'timestamp'=>$invoiceData->withBid->created_at,
//            //sellers details
//            'sellers_company'=>$invoiceData->belongsToSeller->businessInformation->company_name,
//            'sellers_email'=>$invoiceData->belongsToSeller->businessInformation->email,
//            'sellers_tel'=>$invoiceData->belongsToSeller->businessInformation->tel,
//            'sellers_vat_nr'=>$invoiceData->belongsToSeller->businessInformation->vat_nr,
//            'sellers_address'=>explode(',',$invoiceData->belongsToSeller->businessInformation->address),
//                ];


//     //end data
//     $invoice = PDF::loadView('pdf.purchaseorder',$invoiceInfo);
//     return $invoice->stream();
// });