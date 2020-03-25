@extends('layouts.master')

@section('content-header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>
                {{ trans('slider::sliders.titles.slider') }}
            </h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}"><i
                            class="fas fa-tachometer-alt"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('slider::sliders.breadcrumb.slider') }}</li>
            </ol>
        </div>
    </div>
</div>
@stop

@section('styles')
<style>
.carousel-indicators{
    display:none !important; 
}
</style>
@stop

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="row justify-content-end">
                <div class="btn-group float-right" style="margin: 0 15px 15px 0;">
                    <a href="{{ route('admin.slider.slider.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus mr-1"></i> {{ trans('slider::sliders.button.create slider') }}
                    </a>
                </div>
            </div>
            <div class="card card-primary card-outline">
                <!-- /.box-header -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="index-table" class="data-table table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>{{ trans('slider::sliders.table.name') }}</th>
                                    <th>{{ trans('slider::sliders.table.system name') }}</th>
                                    <th>{{ trans('slider::sliders.table.prev') }}</th>
                                    <th data-sortable="false">{{ trans('core::core.table.actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (isset($sliders)): ?>
                                <?php foreach ($sliders as $slider): ?>
                                <tr>
                                    <td>
                                        {{ $slider->name }}
                                    </td>
                                    <td>
                                        {{ $slider->system_name }}
                                    </td>
                                    <td style="width: 320px;">
                                        <?php print(Slider::render($slider->system_name)); ?>
                                    </td>
                                    <td >
                                        <div class="btn-group">
                                            <a href="{{ route('admin.slider.slider.edit', [$slider->id]) }}"
                                                class="btn btn-default"><i
                                                    class="fas fa-edit"></i></a>
                                            <button class="btn btn-danger" data-toggle='modal' data-target='#modal-delete-confirmation' data-action-target='{{locale().'/backend/slider/sliders/'.$slider->id}}'><i
                                                    class="fas fa-trash-alt"></i></button>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>{{ trans('slider::sliders.table.name') }}</th>
                                    <th>{{ trans('slider::sliders.table.system name') }}</th>
                                    <th>{{ trans('slider::sliders.table.prev') }}</th>
                                    <th>{{ trans('core::core.table.actions') }}</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </div>
</div>
@include('core::partials.delete-modal')
@stop

@section('footer')

@stop
@section('shortcuts')

@stop

@section('scripts')
<?php $locale = App::getLocale(); ?>
<script type="text/javascript">
    $(function () {
        $('.data-table').dataTable({
            "paginate": true,
            "lengthChange": true,
            "filter": true,
            "sort": true,
            "info": true,
            "autoWidth": false,
            "order": [[ 0, "asc" ]],
            "language": {
                "url": '<?php echo Module::asset("core:js/vendor/datatables/{$locale}.json") ?>'
            }
        });
    });
</script>
@stop