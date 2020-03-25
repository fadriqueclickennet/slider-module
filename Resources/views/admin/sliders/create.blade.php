@extends('layouts.master')

@section('content-header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>
                {{ trans('slider::sliders.titles.create slider') }}
            </h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}"><i class="fas fa-tachometer-alt"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.slider.slider.index') }}">{{ trans('slider::sliders.title') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('slider::sliders.breadcrumb.create slider') }}</li>
            </ol>
        </div>
    </div>
</div>
@stop

@section('styles')
@stop

@section('content')
{!! Form::open(['route' => ['admin.slider.slider.store'], 'method' => 'post']) !!}
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">{{ trans('core::core.title.non translatable fields') }}</h3>
                </div>
                <div class="card-body">
                    @include('slider::admin.sliders.partials.create-fields')
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">{{ trans('core::core.button.create') }}</button>
                <button class="btn btn-default" name="button" type="reset">{{ trans('core::core.button.reset') }}</button>
                <a class="btn btn-danger float-right" href="{{ route('admin.slider.slider.index')}}"><i class="fas fa-times"></i> {{ trans('core::core.button.cancel') }}</a>
            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}
@stop

@section('footer')
@stop
@section('shortcuts')
@stop

@section('scripts')
<script>
$( document ).ready(function() {
    $('input[type="checkbox"].flat-blue, input[type="radio"].flat-blue').iCheck({
        checkboxClass: 'icheckbox_flat-blue',
        radioClass: 'iradio_flat-blue'
    });
});
</script>
@stop
