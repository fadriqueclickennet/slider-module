@extends('layouts.master')

@section('content-header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>
                {{ trans('slider::sliders.titles.edit slider') }}
            </h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}"><i
                            class="fas fa-tachometer-alt"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
                <li class="breadcrumb-item"><a
                        href="{{ route('admin.slider.slider.index') }}">{{ trans('slider::sliders.title') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('slider::sliders.breadcrumb.edit slider') }}</li>
            </ol>
        </div>
    </div>
</div>
@stop

@section('content')
{!! Form::open(['route' => ['admin.slider.slider.update', $slider->id], 'method' => 'put']) !!}
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="card card-primary card-outline">
                <div class="card-body">
                    <div class="row">
                        {!! $slides !!}
                        <div class="col-lg-3 col-md-4 col-6 thumb">
                            <a class="addImg" data-toggle="modal" data-target="#modal-add-slide">
                                <i class="fas fa-plus fa-3x"> </i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">{{ trans('core::core.title.non translatable fields') }}</h3>
                </div>
                <div class="card-body">
                    @include('slider::admin.sliders.partials.edit-fields')
                </div>
            </div>
            <div class="card">
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">{{ trans('core::core.button.update') }}</button>
                    <a class="btn btn-danger float-right " href="{{ route('admin.slider.slider.index')}}"><i
                            class="fa fa-times"></i> {{ trans('core::core.button.cancel') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}

<div class="modal fade" id="modal-add-slide" tabindex="-1" role="dialog" aria-labelledby="delete-confirmation-title" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="delete-confirmation-title">{{ trans('core::core.modal.add_slide') }}</h4>
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button> 
                </div>
                {!! Form::open(['route' => ['admin.slider.slide.store', $slider->id], 'method' => 'post']) !!}
                <div class="modal-body text-center">
                    @mediaSingle('slideImage')
                    <div class="form-group">
                        <label for="position">Posición</label>
                        <input type="number" name="position" class="form-control" id="position" placeholder="">
                      </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary "> {{ trans('core::core.button.add') }}</button>
                    <button type="button" class="btn btn-danger float-right" data-dismiss="modal"><i class="fas fa-times"></i> {{ trans('core::core.button.cancel') }}</button> 
                    
                </div>
                {!! Form::close() !!}
            </div>
        </div>
</div>

@stop

@section('footer')
<a data-toggle="modal" data-target="#keyboardShortcutsModal"><i class="fa fa-keyboard-o"></i></a> &nbsp;
@stop
@section('shortcuts')
<dl class="dl-horizontal">
    <dt><code>c</code></dt>
    <dd>{{ trans('slider::sliders.titles.create slide') }}</dd>
    <dt><code>b</code></dt>
    <dd>{{ trans('slider::sliders.navigation.back to index') }}</dd>
</dl>
@stop

@section('scripts')
<script>
    $( document ).ready(function() {

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

        //Boton eliminar imagen
        $('.jsDeleteSlide').on('click', function(e) {
                var self = $(this),
                    slideId = self.data('item-id');
                $.ajax({
                    type: 'POST',
                    url: '{{ route('api.slide.delete') }}',
                    data: {
                        _token: '{{ csrf_token() }}',
                        slide: slideId
                    },
                    success: function(data) {
                        if (! data.errors) {
                            var elem = self.closest('.thumb');
                            elem.fadeOut();
                            setTimeout(function(){
                                elem.remove()
                            }, 300);
                        }
                    }
                });
        });

        //Boton ver imagen ampliada
        $("a.single_image").fancybox({
            'transitionIn'	:	'elastic',
            'transitionOut'	:	'elastic',
            'speedIn'		:	600, 
            'speedOut'		:	200, 
            'overlayShow'	:	false
        });

    });
</script>
@stop