@extends('layouts.master')
@section('contents')

 <div class="container">
<div class="row">
            <div class="col-md-8">
                <h3>Update Apartment</h3>
                    <div class="control-group form-group">
                    {!!Form::open(['url'=>'updateApartment'])!!}
                        <div class="controls">
                            {!! Form::label('id', 'Apartment ID:') !!}
                            {!!Form::text('id',$value=$apartment->id,['class'=>'form-control','readonly'=>'true','placeholder'=>'This contains system generated input. You can not update this'])!!}
                    		
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                        {!! Form::label('apt_name', 'Apartment Name:') !!}
                    	{!!Form::text('apt_name',$value=$apartment->apt_name,['class'=>'form-control'])!!}

                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                        {!!Form::label('description', 'Apartment Description:') !!}
                    	{!!Form::textarea('description',$value=$apartment->description,['class'=>'form-control'])!!}
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                        {!!Form::label('noOfUnits', 'No Of Units:') !!}
                    	{!!Form::text('noOfUnits',$value=$apartment->noOfUnits,['class'=>'form-control'])!!}
                        </div>
                    </div>
                     <div class="control-group form-group">
                        <div class="controls">
                        {!!Form::label('expense', 'Monthly Expense') !!}
                        {!!Form::text('expense',$value=$apartment->expense,['class'=>'form-control'])!!}
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                        @foreach($owners as $owner)
                        {{--*/ $a[$owner->id] = $owner->owner_name /*--}}
                        @endforeach
                        {!!Form::label('owner_id', 'Owner Id') !!}
                    {!! Form::select('owner_id', $a, ['class'=>'form-control'])!!}
                        </div>
                    </div>
               		{!! Form::submit('Update Apartment', ['class' => 'btn btn-primary']) !!}
            	    {!!Form::close()!!}
            </div>
</div>
</div>
@stop