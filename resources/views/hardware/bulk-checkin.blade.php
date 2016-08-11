@extends('layouts/default')

{{-- Page title --}}
@section('title')
     {{ trans('admin/hardware/general.bulk_checkin') }}
@parent
@stop


{{-- Page content --}}
@section('content')

<style>
.input-group {
    padding-left: 0px !important;
}
</style>


<div class="row">

    <!-- left column -->
    <div class="col-md-7">

          <div class="box box-default">
              <div class="box-header with-border">
                  <h3 class="box-title"></h3>
              </div>
              <div class="box-body">
                <form class="form-horizontal" method="post" action="" autocomplete="off">
                <!-- CSRF Token -->
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />


         <!-- Asset -->
        <div class="form-group{{ $errors->has('selected_asset') ? ' has-error' : '' }}">

                {{ Form::label('selected_asset', trans('general.assets'), array('class' => 'col-md-3 control-label')) }}

            <div class="col-md-8 required">
                {{ Form::select('selected_assets[]', $assets_list , Input::old('selected_asset'), array('class'=>'select2', 'id'=>'selected_asset', 'style'=>'width:100%', 'multiple'=>'multiple')) }}

                {!! $errors->first('selected_asset', '<span class="alert-msg"><i class="fa fa-times"></i> :message</span>') !!}
            </div>
        </div>

        <!-- Status -->
        <div class="form-group {{ $errors->has('status_id') ? 'error' : '' }}">

            {{ Form::label('name', trans('admin/hardware/form.status'), array('class' => 'col-md-3 control-label')) }}

          <div class="col-md-7 required">
            {{ Form::select('status_id', $statusLabel_list, '', array('class'=>'select2', 'style'=>'width:100%','id' =>'modal-statuslabel_types')) }}
            {!! $errors->first('status_id', '<span class="alert-msg"><i class="fa fa-times"></i> :message</span>') !!}
          </div>
        </div>

        <!-- Checkout/Checkin Date -->

        <div class="form-group {{ $errors->has('checkin_at') ? 'error' : '' }}">

            {{ Form::label('name', trans('admin/hardware/form.checkin_date'), array('class' => 'col-md-3 control-label')) }}

          <div class="col-md-8">
            <div class="col-md-4 input-group required">
            <input type="date" class="datepicker form-control" data-date-format="yyyy-mm-dd" placeholder="Checkin Date" name="checkin_at" id="checkin_at" value="{{ Input::old('checkin_at', date('Y-m-d')) }}">
            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
          </div>
            {!! $errors->first('checkin_at', '<span class="alert-msg"><i class="fa fa-times"></i> :message</span>') !!}
          </div>
        </div>


        <!-- Note -->
        <div class="form-group {{ $errors->has('note') ? 'error' : '' }}">

            {{ Form::label('note', trans('admin/hardware/form.notes'), array('class' => 'col-md-3 control-label')) }}

          <div class="col-md-8">
            <textarea class="col-md-6 form-control" id="note" name="note">{{ Input::old('note') }}</textarea>
            {!! $errors->first('note', '<span class="alert-msg"><i class="fa fa-times"></i> :message</span>') !!}
          </div>
        </div>


        </div>
      </div>
      <div class="box-footer">
        <a class="btn btn-link" href="{{ URL::previous() }}"> {{ trans('button.cancel') }}</a>
        <button type="submit" class="btn btn-success pull-right"><i class="fa fa-check icon-white"></i> {{ trans('general.checkin') }}</button>
      </div>
  </div>

</div>
</div>

@stop
