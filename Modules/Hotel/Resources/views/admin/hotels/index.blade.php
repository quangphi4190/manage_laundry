@extends('layouts.master')

@section('content-header')
    <h1>
        Danh Sách Khách Sạn
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li class="active">Danh Sách Khách Sạn</li>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="row">
                <div class="btn-group pull-right" style="margin: 0 15px 15px 0;">
                    <a href="{{ route('admin.hotel.hotel.create') }}" class="btn btn-primary btn-flat" style="padding: 4px 10px;">
                        <i class="fa fa-pencil"></i> Tạo Mới Khách Sạn
                    </a>
                </div>
            </div>
            <div class="box box-primary">
                <div class="box-header">
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="data-table table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên Khách Sạn</th>
                                <th>Số Điện Thoại</th>
                                <th>E-Mail</th>
                                <th>Địa Chỉ</th>
                                <!-- <th>Trạng Thái</th> -->
                                <th data-sortable="false">Chức Năng</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (isset($hotels)): $stt=1?>
                            
                            <?php foreach ($hotels as $hotel): ?>
                            <tr>   
                                <td>
                                    <a href="{{ route('admin.hotel.hotel.edit', [$hotel->id]) }}">                                
                                        {{ $stt++ }}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('admin.hotel.hotel.edit', [$hotel->id]) }}">
                                        {{ $hotel->name }}
                                    </a>                                    
                                </td>
                                <td>
                                    <a href="{{ route('admin.hotel.hotel.edit', [$hotel->id]) }}">
                                        {{ $hotel->phone }}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('admin.hotel.hotel.edit', [$hotel->id]) }}">
                                        {{ $hotel->email }}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('admin.hotel.hotel.edit', [$hotel->id]) }}">
                                        {{ $hotel->address }}
                                    </a>
                                </td>
                                <!-- <td>
                                    <a href="{{ route('admin.hotel.hotel.edit', [$hotel->id]) }}">
                                        {{ $hotel->status == 1 ? 'Đang hoạt động' : 'Chưa kích hoạt'}}
                                    </a>
                                </td> -->
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('admin.hotel.hotel.edit', [$hotel->id]) }}" class="btn btn-default btn-flat"><i class="fa fa-pencil"></i></a>
                                        <button class="btn btn-danger btn-flat" data-toggle="modal" data-target="#modal-delete-confirmation" data-action-target="{{ route('admin.hotel.hotel.destroy', [$hotel->id]) }}"><i class="fa fa-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                                <?php else:?>
                                <tr>
                                    <td colspan="8">{{ trans('customers::customers.title.no data') }}</td>
                                </tr>
                            <?php endif; ?>
                            
                            </tbody>
                        </table>
                        <!-- /.box-body -->
                    </div>
                </div>
                <!-- /.box -->
            </div>
        </div>
    </div>
    @include('core::partials.delete-modal')
@stop

@section('footer')
    <a data-toggle="modal" data-target="#keyboardShortcutsModal"><i class="fa fa-keyboard-o"></i></a> &nbsp;
@stop
@section('shortcuts')
    <dl class="dl-horizontal">
        <dt><code>c</code></dt>
        <dd>{{ trans('hotel::hotels.title.create hotel') }}</dd>
    </dl>
@stop

@push('js-stack')
    <script type="text/javascript">
        $( document ).ready(function() {
            $(document).keypressAction({
                actions: [
                    { key: 'c', route: "<?= route('admin.hotel.hotel.create') ?>" }
                ]
            });
        });
    </script>
    <?php $locale = locale(); ?>
    <script type="text/javascript">
        $(function () {
            $('.data-table').dataTable({
                "paginate": true,
                "lengthChange": true,
                "filter": true,
                "sort": true,
                "info": true,
                "autoWidth": true,
                "order": [[ 0, "asc" ]],
                "language": {
                    "url": '<?php echo Module::asset("core:js/vendor/datatables/{$locale}.json") ?>'
                }
            });
        });
    </script>
@endpush
