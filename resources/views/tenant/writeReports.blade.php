@extends('layouts.master2')
@section('contents')
<div class="container">
 <div class="row">
            <div class="col-md-8">
                <h3>Write Reports</h3>
               
                    <div class="control-group form-group">
                    {!!Form::open(['url'=>'addReport'])!!}
                        <div class="controls">
                            {!! Form::label('report_id', 'Report ID:') !!}
                    		{!!Form::text('id',null,['class'=>'form-control','readonly'=>'true','placeholder'=>'This contains system generated input'])!!}
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
                        {!! Form::label('report_type', 'Type of Report:') !!}
                    	{!! Form::select('report_type', ['Complain', 'Inquiry']) !!}
                               <div class="error-input">
                    @foreach($errors->get('report_type') as $message)
                        <font color="red">{{ $message }}</font>
                    @endforeach         
                </div>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                        {!!Form::label('report', 'Full Report:') !!}
                    	{!!Form::textarea('report',null,['class'=>'form-control'])!!}
                    <div class="error-input">
                    @foreach($errors->get('report') as $message)
                        <font color="red">{{ $message }}</font>
                    @endforeach         
                </div>
                        </div>
                    </div>
        

                     <div class="control-group form-group">
                        <div class="controls">
                        {!!Form::label('apt_block', 'Block Number') !!}
                    	{!!Form::text('apt_block',null,['class'=>'form-control'])!!}
                         <div class="error-input">
                    @foreach($errors->get('apt_block') as $message)
                        <font color="red">{{ $message }}</font>
                    @endforeach         
                </div>
                        </div>
                    </div>
                    
               		{!! Form::submit('Submit Report', ['class' => 'btn btn-primary']) !!}
            	    {!!Form::close()!!}
            </div>

        </div>
</div>
        @stop