@extends('layouts.master')
@section('contents')

 <div class="container">
<div class="row">
            <div class="col-md-8">
                <h3>Update Apartment</h3>
                    <div class="control-group form-group">
                    {!!Form::open(['url'=>'updateTenant'])!!}
                        <div class="controls">
                            {!! Form::label('id', 'Tenant ID:')!!}
                            {!!Form::text('id',$value=$tenant->id,['class'=>'form-control','readonly'=>'true','placeholder'=>'This contains system generated input. You can not update this'])!!}	
                        </div>
                    </div>
                      <div class="control-group form-group">
                        <div class="controls">
                        {!! Form::label('tenant_name', 'Tenant Name:') !!}
                        {!!Form::text('tenant_name',$value=$tenant->tenant_name,['class'=>'form-control'])!!}

                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                        {!! Form::label('tenant_name', 'Tenant Email:') !!}
                    	{!!Form::text('email',$value=$tenant->email,['class'=>'form-control'])!!}
                        </div>
                    </div>
                      <div class="control-group form-group">
                        <div class="controls">
                        {!! Form::label('tenant_name', 'Phone:') !!}
                        {!!Form::text('phone',$value=$tenant->phone,['class'=>'form-control'])!!}
                        </div>
                    </div>
                      <div class="control-group form-group">
                        <div class="controls">
                         @foreach($apartments as $apt)
                        {{--*/ $a[$apt->id] = $apt->apt_name /*--}}
                        @endforeach
                        {!!Form::label('apartment_id', 'Apartment:') !!}
                    {!! Form::select('apartment_id', $a, ['class'=>'form-control'])!!}
                        </div>
                    </div>
                      <div class="control-group form-group">
                        <div class="controls">
                        {!! Form::label('tenant_name', 'Block Number:') !!}
                        {!!Form::text('block_num',$value=$tenant->block_num,['class'=>'form-control'])!!}
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                        {!!Form::label('lease', 'Payment/Lease:') !!}
                    	{!!Form::text('lease',$value=$tenant->lease,['class'=>'form-control'])!!}
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                        {!!Form::label('due_date', 'Due Date:') !!}
                    	{!!Form::text('due_date',$value=$tenant->due_date,['class'=>'form-control'])!!}
                        </div>
                    </div>
               		{!! Form::submit('Update Tenant', ['class' => 'btn btn-primary']) !!}
            	    {!!Form::close()!!}
            </div>
</div>
</div>
@stop