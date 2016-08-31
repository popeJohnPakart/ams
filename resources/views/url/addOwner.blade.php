@extends('layouts.master')
@section('contents')
@section('title', 'Owners')

{!!HTML::style('assets/css_2/admin.css')!!}

<!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Owners > 
                    <small>All Owners</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="home">Admin</a>
                    </li>
                    <li class="active">Manage Owners</li>
                </ol>
            </div>
        </div>
        
        <h3>Manage your Apartment Owners</h3>
    <table class="tg">
 <tr>
    <th class="tg-9vto">Owner ID</th>
    <th class="tg-031e">Owner Name</th>
    <th class="tg-ejgj">Address</th>
    <th class="tg-ejgj">Phone</th>
    <th class="tg-ejgj">Email</th>
    <th class="tg-ejgj">Choose An Action</th>
  </tr>
  <tr>
  @foreach($allOwners as $owner)
    <td class="tg-z2zr">{!! $owner->id !!}</td>
    <td class="tg-z2zr">{!! $owner->owner_name !!}</td>
    <td class="tg-j2zy">{!! $owner->address !!}</td>
    <td class="tg-j2zy">{!! $owner->phone !!}</td>
    <td class="tg-j2zy">{!! $owner->email !!}</td>
    <td class="tg-j2zy">
    <div class="pad">
    <a href="{{ URL::to('/deleteOwner/'.$owner->id) }}"><button class="btn btn-danger ">Delete</button></a>  
    <a href="{{ URL::to('/editOwner/'.$owner->id) }}"><button class="btn btn-primary ">Edit</button></a>
    </div>
    </td>
  </tr> 
  @endforeach
</table>
          <div class="row">
            <div class="col-md-8">
                <h3>Add Apartment Owners</h3>
                    <div class="control-group form-group">
                    {!!Form::open(['url'=>'addOwner'])!!}
                        <div class="controls">
                            {!! Form::label('id', 'Owner ID:') !!}
                            {!!Form::text('id',null,['class'=>'form-control','readonly'=>'true','placeholder'=>'This contains system generated input'])!!}</div> 
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                        {!! Form::label('owner_name', '*Owner Name:') !!}
                    	{!!Form::text('owner_name',null,['class'=>'form-control'])!!}
                       <div class="error-input">
                        @foreach($errors->get('owner_name') as $message)
                        <font color="red">{{ $message }}</font>
                        @endforeach      
                        </div>
                    </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                        {!!Form::label('address', 'Address:') !!}
                    	{!!Form::text('address',null,['class'=>'form-control'])!!}
                        <div class="error-input">
                         @foreach($errors->get('address') as $message)
                        <font color="red">{{ $message }}</font>
                        @endforeach
                        </div>      
                        </div>
                        </div>
                    <div class="control-group form-group">
                        <div class="controls">
                        {!!Form::label('phone', 'Phone:') !!}
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
                        {!!Form::label('email', 'Email Address:') !!}
                    	{!!Form::text('email',null,['class'=>'form-control'])!!}
                    </div>
                    </div>
               		{!! Form::submit('Add Owner', ['class' => 'btn btn-primary']) !!}
            	    {!!Form::close()!!}
            </div>

        </div>

        
        </div>