@extends('layouts.master')
@section('contents')

 <div class="container">
<div class="row">
            <div class="col-md-8">
                <h3>Issue Bill</h3>
                    <div class="control-group form-group">
                    {!!Form::open(['url'=>'issueBill'])!!}
                        <div class="controls">
                            {!! Form::label('bill_id', 'Bill ID:')!!}
                            {!!Form::text('bill_id',['class'=>'form-control','readonly'=>'true','placeholder'=>'This contains system generated input. You can not update this'])!!}
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                        {!! Form::label('tenant_id', 'Tenant ID:') !!}
                        {!!Form::text('tenant_id',$value=$tenant->tenant_id,['class'=>'form-control'])!!}

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
                        {!!Form::label('apt_name', 'Apartment Name') !!}
                        {!!Form::text('apt_name',$value=$tenant->apt_name,['class'=>'form-control'])!!}
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                        {!!Form::label('block_num', 'Block Number:') !!}
                        {!!Form::text('block_num',$value=$tenant->block_num,['class'=>'form-control'])!!}
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                        {!!Form::label('lease', 'Lease:') !!}
                        {!!Form::text('lease',$value=$tenant->lease,['class'=>'form-control'])!!}
                        </div>
                    </div>
                    {!! Form::submit('Issue Bill', ['class' => 'btn btn-primary']) !!}
                    {!!Form::close()!!}
            </div>
</div>
</div>
@stop