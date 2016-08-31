@extends('layouts.master')
@section('contents')

 <div class="container">
<div class="row">
            <div class="col-md-8">
                <h3>Update Owner</h3>
                    <div class="control-group form-group">
                    {!!Form::open(['url'=>'updateOwner'])!!}
                        <div class="controls">
                            {!! Form::label('owner_id', 'Owner ID:') !!}
                            {!!Form::text('id',$value=$owner->id,['class'=>'form-control','readonly'=>'true','placeholder'=>'This contains system generated input. You can not update this'])!!}
                    		
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                        {!! Form::label('owner_name', 'Owner Name:') !!}
                    	{!!Form::text('owner_name',$value=$owner->owner_name,['class'=>'form-control'])!!}

                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                        {!!Form::label('address', 'Address:') !!}
                    	{!!Form::text('address',$value=$owner->address,['class'=>'form-control'])!!}
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                        {!!Form::label('phone', 'Phone:') !!}
                    	{!!Form::text('phone',$value=$owner->phone,['class'=>'form-control'])!!}
                        </div>
                    </div>
                      <div class="control-group form-group">
                        <div class="controls">
                        {!!Form::label('email', 'Email:') !!}
                        {!!Form::text('email',$value=$owner->email,['class'=>'form-control'])!!}
                        </div>
                    </div>
               		{!! Form::submit('Update Owner', ['class' => 'btn btn-primary']) !!}
            	    {!!Form::close()!!}
            </div>
</div>
</div>
@stop