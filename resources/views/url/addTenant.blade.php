@extends('layouts.master')
@section('contents')
{!!HTML::style('assets/css_2/admin.css')!!}

<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <div class="container">
    <script>
  $(function() {
    $( "#datepicker" ).datepicker();
  });
  </script>

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Apartments > 
                    <small>Tenants</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="home">Admin</a>
                    </li>
                    <li class="active">Manage Tenants</li>
                </ol>
            </div>
        </div>

		<div class="row">
            <!-- Map Column -->
            <div class="col-md-8">
                <!-- Embedded Google Map -->
                <img src="../../assets/images/tenants.png" alt="Tenants" width="600" height="450">
        
            </div>
            <!-- Contact Details Column -->
            <div class="col-md-4">
                <h3>We Believe</h3>
                <p>
                    <h3>That keeping track of your tenants could mean great things to you</h3>
                </p>
                <p><i class="fa fa-phone"></i> 
                    <abbr title="Phone">Hotline</abbr>: (123) 456-7890</p>
                <p><i class="fa fa-envelope-o"></i> 
                    <abbr title="Email">Email</abbr>: <a href="mailto:name@example.com">name@example.com</a>
                </p>
                <p><i class="fa fa-clock-o"></i> 
                <abbr title="Hours">Office Hours</abbr>: Monday - Friday: 9:00 AM to 5:00 PM</p>
                <ul class="list-unstyled list-inline list-social-icons">
                    <li>
                        <a href="http://www.facebook.com"><i class="fa fa-facebook-square fa-2x"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-linkedin-square fa-2x"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-twitter-square fa-2x"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-google-plus-square fa-2x"></i></a>
                    </li>
                </ul>
            </div>
          </div>
          <br/>
    <h3>Manage your Tenants Here</h3>
    <table class="tg">
  <tr>
    <th class="tg-031e">Tenant ID</th>
    <th class="tg-031e">Tenant Name</th>
    <th class="tg-031e">Email</th>
    <th class="tg-6xid">Phone</th>
    <th class="tg-6xid">Property ID</th>
    <th class="tg-6xid">Unit</th>
    <th class="tg-6xid">Lease</th>
    <th class="tg-6xid">Due Date</th>
    <th class="tg-6xid"></th>
  </tr>
  <tr>
  @foreach($allTenants as $tenant)
    <td class="tg-z2zr">{!! $tenant->id !!}</td>
    <td class="tg-z2zr">{!! $tenant->tenant_name !!}</td>
    <td class="tg-j2zy">{!! $tenant->email !!}</td>
    <td class="tg-j2zy">{!! $tenant->phone !!}</td>
    <td class="tg-j2zy">{!! $tenant->apartment_id!!}</td>
    <td class="tg-j2zy">{!! $tenant->block_num !!}</td>
    <td class="tg-j2zy">{!! $tenant->lease !!}</td>
    <td class="tg-j2zy">{!! $tenant->due_date !!}</td>
    <td class="tg-j2zy">
         <div class="pad">
    <a href="{{ URL::to('/deleteTenant/'.$tenant->id) }}"><button class="btn btn-danger ">Delete</button></a> 
    <a href="{{ URL::to('/editTenant/'.$tenant->id) }}"><button class="btn btn-primary ">Edit</button></a>
    <a href="{{ URL::to('/issueBill/'.$tenant->id) }}"><button class="btn btn-success ">Generate Bill</button></a>
    </div>
    </td>
</tr>
  @endforeach
</table>

  <div class="row">
            <div class="col-md-8">
                <h3>Add some Tenants here</h3>
                 <div class="control-group form-group">
                    {!!Form::open(['url'=>'addTenant'])!!}
                        <div class="controls">
                            {!! Form::label('id', 'Tenant ID:') !!}
                    		{!!Form::text('id',null,['class'=>'form-control','readonly'=>'true','placeholder'=>'Do Not Touch'])!!}
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                        {!! Form::label('tenant_name', 'Tenant Name:') !!}
                    	{!!Form::text('tenant_name',null,['class'=>'form-control','required'])!!}
                         <div class="error-input">
                    @foreach($errors->get('tenant_name') as $message)
                        <font color="red">{{ $message }}</font>
                    @endforeach         
                </div>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                        {!! Form::label('email', 'Tenants Email:') !!}
                        {!!Form::text('email',null,['class'=>'form-control'])!!}
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                        {!! Form::label('phone', 'Tenants Phone:') !!}
                        {!!Form::text('phone',null,['class'=>'form-control'])!!}
                          <div class="error-input">
                    @foreach($errors->get('phone') as $message)
                        <font color="red">{{ $message }}</font>
                    @endforeach         
                </div>
                        </div>
                    </div>

                    <div class="control-group form-group">
                        <div class="controls">
                         @foreach($apartments as $apt)
                        {{--*/ $a[$apt->id] = $apt->apt_name /*--}}
                        @endforeach
                        {!!Form::label('apartment_id', 'Apartment:') !!}
                    {!! Form::select('apartment_id', $a, ['class'=>'form-control'])!!}
                          <div class="error-input">
                    @foreach($errors->get('apartment_id') as $message)
                        <font color="red">{{ $message }}</font>
                    @endforeach         
                </div>
                        </div>
                    </div>
                    
                     <div class="control-group form-group">
                        <div class="controls">
                    @for($i=1; $i<=$tenant->getUnits(); $i++) 
                     {{--*/$a[$i]=$i/*--}}
                    @endfor
                    {!!Form::label('block_num', 'Block/Unit to Stay:') !!}
                    {!!Form::select('block_num', $a)!!}

                          <div class="error-input">
                    @foreach($errors->get('block_num') as $message)
                        <font color="red">{{ $message }}</font>
                    @endforeach         
                </div>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                        {!!Form::label('lease', 'Payment/Lease:') !!}
                    	{!!Form::text('lease',null,['class'=>'form-control'])!!}
                          <div class="error-input">
                    @foreach($errors->get('lease') as $message)
                        <font color="red">{{ $message }}</font>
                    @endforeach         
                </div>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                        {!!Form::label('due_date', 'Due Date for Lease:') !!}
                    	{!!Form::text('due_date',null,['class'=>'form-control','id'=>'datepicker','placeholder'=>'input end date after 1 month'])!!}
                          <div class="error-input">
                    @foreach($errors->get('due_date') as $message)
                        <font color="red">{{ $message }}</font>
                    @endforeach         
                </div>
                        </div>
                    </div>
               		{!! Form::submit('Add Tenant', ['class' => 'btn btn-primary']) !!}
            	    {!!Form::close()!!}
            </div>

        </div>


<br/>
<br/>
<br/>
</div>
@stop
