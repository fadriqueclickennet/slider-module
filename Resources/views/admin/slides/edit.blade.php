@extends('layouts.master')

@section('content-header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>
                {{ trans('slider::sliders.titles.edit slide') }}
            </h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}"><i class="fas fa-tachometer-alt"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.slider.slider.index') }}">{{ trans('slider::sliders.title') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.slider.slider.edit', $slider->id) }}">{{ trans('slider::sliders.breadcrumb.slider') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('slider::sliders.breadcrumb.edit slide') }}</li>
            </ol>
        </div>
    </div>
</div>
@stop

@section('styles')
@stop

@section('content')
{!! Form::open(['route' => ['admin.slider.slide.update', $slider->id, $slide->id], 'method' => 'put']) !!}
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">{{ trans('core::core.title.translatable fields') }}</h3>
                </div>
                <div class="card-body">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <?php $i = 0; ?>
                            <?php foreach (LaravelLocalization::getSupportedLocales() as $locale => $language): ?>
                                <?php $i++; ?>
                                <li class="nav-item">
                                    <a class="nav-link {{ App::getLocale() == $locale ? 'active' : '' }}" href="#tab_{{ $i }}" data-toggle="tab">{{ trans('core::core.tab.'. strtolower($language['name'])) }}</a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                        <div class="tab-content">
                            <?php $i = 0; ?>
                            <?php foreach (LaravelLocalization::getSupportedLocales() as $locale => $language): ?>
                                <?php $i++; ?>
                                <div class="tab-pane {{ App::getLocale() == $locale ? 'active' : '' }}" id="tab_{{ $i }}">
                                    @include('slider::admin.slides.partials.edit-trans-fields', ['lang' => $locale])
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">{{ trans('core::core.title.non translatable fields') }}</h3>
                </div>
                <div class="card-body">
                    @include('slider::admin.slides.partials.edit-fields')
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">{{ trans('core::core.button.update') }}</button>
                    <a class="btn btn-danger float-right" href="{{ route('admin.slider.slider.edit', [$slider->id])}}"><i class="fas fa-times"></i> {{ trans('core::core.button.cancel') }}</a>
                </div>
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
    var lang = '{{App::getLocale()}}';

    $('input[type="checkbox"].flat-blue, input[type="radio"].flat-blue').iCheck({
        checkboxClass: 'icheckbox_flat-blue',
        radioClass: 'iradio_flat-blue'
    });
    $('input[type="checkbox"]').on('ifChecked', function(){
        $(this).parent().find('input[type=hidden]').remove();
    });

    $('input[type="checkbox"]').on('ifUnchecked', function(){
        var name = $(this).attr('name'),
            input = '<input type="hidden" name="' + name + '" value="0" />';
        $(this).parent().append(input);
    });
    

});
</script>
@stop
