@extends('layouts.master')
@section('contents')
@section('title', 'Apartments')

{!!HTML::style('assets/css_2/admin.css')!!}

<!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-l g-12">
                <h1 class="page-header">Apartments > 
                    <small>All Apartments</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="home">Admin</a>
                    </li>
                    <li class="active">Manage Apartment</li>
                </ol>
            </div>
        </div>
       @if(Session::has('flash_message'))
    <div class="alert alert-success">
        {{ Session::get('flash_message') }}
    </div>
    @endif
         <!-- Content Row -->
        <div class="row">
            <!-- Map Column -->
            <div class="col-md-8">
                <!-- Embedded Google Map -->
                <iframe width="100%" height="400px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3925.646830380117!2d123.86107371397439!3d10.290013589893682!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sph!4v1445253616988" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
           
            </div>
            <!-- Contact Details Column -->
            <div class="col-md-4">
                <h3>We are Located</h3>
                <p>
                    AJ Construction Corp.<br>Basak Pardo, Cebu City<br>
                </p>
                <p><i class="fa fa-phone"></i> 
                    <abbr title="Phone">Phone</abbr>: (123) 456-7890</p>
                <p><i class="fa fa-envelope-o"></i> 
                    <abbr title="Email">Email</abbr>: <a href="mailto:name@example.com">name@example.com</a>
                </p>
                <p><i class="fa fa-clock-o"></i> 
                <abbr title="Hours">Hours</abbr>: Monday - Friday: 9:00 AM to 5:00 PM</p>
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
          <br/>
          <br/>
    <h3>Manage your Apartments Here</h3>
    <table class="tg">
 <tr>
    <th class="tg-9vto">Apartment ID</th>
    <th class="tg-031e">Apartment Name</th>
    <th class="tg-ejgj">Description</th>
    <th class="tg-ejgj">No Of Units</th>
    <th class="tg-ejgj">Monthly Maintenance Expense(PHP)</th>
    <th class="tg-ejgj">Owner ID</th>
    <th class="tg-ejgj">Choose An Action</th>
  </tr>
  <tr>
  @foreach($allApt as $apt)
    <td class="tg-z2zr">{!! $apt->id !!}</td>
    <td class="tg-z2zr">{!! $apt->apt_name !!}</td>
    <td class="tg-j2zy">{!! $apt->description !!}</td>
    <td class="tg-j2zy">{!! $apt->noOfUnits !!}</td>
    <td class="tg-j2zy">{!! $apt->expense !!}</td>
    <td class="tg-j2zy">{!! $apt->owner_id !!}</td>
    <td class="tg-j2zy">
    <div class="pad">
    <a href="{{ URL::to('/deleteApartment/'.$apt->id) }}"><button class="btn btn-danger ">Delete</button></a> 
    <a href="{{ URL::to('/editApartment/'.$apt->id) }}"><button class="btn btn-primary ">Edit</button></a>
    </div>
    </td>
  </tr> 
  @endforeach
</table>
    
           <div class="row">
            <div class="col-md-8">
                <h3>Add Apartment</h3>
                    <div class="control-group form-group">
                    {!!Form::open(['url'=>'addApartment'])!!}
                        <div class="controls">
                            {!! Form::label('id', 'Apartment ID:') !!}
                    		{!!Form::text('id',null,['class'=>'form-control','readonly'=>'true','placeholder'=>'This contains system generated input'])!!}
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                        {!! Form::label('apt_name', 'Apartment Name:') !!}
                    	{!!Form::text('apt_name',null,['class'=>'form-control'])!!}
                        <div class="error-input">
                    @foreach($errors->get('apt_name') as $message)
                        <font color="red">{{ $message }}</font>
                    @endforeach         
                </div>

                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                        {!!Form::label('description', 'Apartment Description:') !!}
                    	{!!Form::textarea('description',null,['class'=>'form-control'])!!}
                        </div>

                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                        {!!Form::label('noOfUnits', 'No Of Units:') !!}
                    	{!!Form::text('noOfUnits',null,['class'=>'form-control'])!!}
                        <div class="error-input">
                    @foreach($errors->get('noOfUnits') as $message)
                        <font color="red">{{ $message }}</font>
                    @endforeach         
                </div>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                        {!!Form::label('expense', 'Monthly Maintenance Expense') !!}
                        {!! Form::text('expense', null, ['class'=>'form-control'])!!}
                        <div class="error-input">
                    @foreach($errors->get('expense') as $message)
                        <font color="red">{{ $message }}</font>
                    @endforeach         
                </div>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                        @foreach($owners as $owner)
                        {{--*/ $a[$owner->id] = $owner->owner_name /*--}}
                        @endforeach
                        {!!Form::label('owner_id', 'Owner Name') !!}
                    {!! Form::select('owner_id', $a, ['class'=>'form-control'])!!}
                    </div>
                       <div class="error-input">
                    @foreach($errors->get('owner_id') as $message)
                        <font color="red">{{ $message }}</font>
                    @endforeach         
                </div>

                    {!! Form::submit('Add Apartment', ['class' => 'btn btn-primary']) !!}
                    {!!Form::close()!!}
                            </div>
                    </div>
               		
            </div>

        </div>
        </div>
        <!-- /.row -->
        
@stop