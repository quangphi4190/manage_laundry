@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('qlyuser::qlyusers.title.qlyusers') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li class="active">{{ trans('qlyuser::qlyusers.title.qlyusers') }}</li>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="row">
                <div class="btn-group pull-right" style="margin: 0 15px 15px 0;">
                    <a href="{{ route('admin.qlyuser.qlyuser.create') }}" class="btn btn-primary btn-flat" style="padding: 4px 10px;">
                        <i class="fa fa-pencil"></i> {{ trans('qlyuser::qlyusers.button.create qlyuser') }}
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
                                <th>Họ tên</th>
                                <th>Giới tính</th>                              
                                <th>Số điện thoại</th>
                                <th>Email</th>                                
                                <th>Địa chỉ</th>                               
                                <th>Chức năng</th>                                
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (isset($qlyusers)): $stt =1;?>
                            <?php foreach ($qlyusers as $qlyuser): ?>
                            <tr>
                            <td>
                                    <a href="{{ route('admin.qlyuser.qlyuser.edit', [$qlyuser->id]) }}">
                                        {{ $stt ++}}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('admin.qlyuser.qlyuser.edit', [$qlyuser->id]) }}">
                                        {{ $qlyuser->firstname.' '.$qlyuser->lastname }}
                                    </a>
                                </td>                               
                                <td>
                                    <a href="{{ route('admin.qlyuser.qlyuser.edit', [$qlyuser->id]) }}">
                                       <?php if( $qlyuser->gender == 1) {
                                           echo 'Nam';
                                        } elseif ($qlyuser->gender == 2) {
                                               echo 'Nữ';
                                         } else {
                                               echo 'N/A';
                                         }
                                           ?>
                                    </a>
                                </td>
                               
                                <td>
                                    <a href="{{ route('admin.qlyuser.qlyuser.edit', [$qlyuser->id]) }}">
                                        {{ $qlyuser->phone }}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('admin.qlyuser.qlyuser.edit', [$qlyuser->id]) }}">
                                        {{ $qlyuser->mail }}
                                    </a>
                                </td>                               
                                <td>
                                    <a href="{{ route('admin.qlyuser.qlyuser.edit', [$qlyuser->id]) }}">
                                        {{ $qlyuser->address }}
                                    </a>
                                </td> 
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('admin.qlyuser.qlyuser.edit', [$qlyuser->id]) }}" class="btn btn-default btn-flat"><i class="fa fa-pencil"></i></a>
                                        <button class="btn btn-danger btn-flat" data-toggle="modal" data-target="#modal-delete-confirmation" data-action-target="{{ route('admin.qlyuser.qlyuser.destroy', [$qlyuser->id]) }}"><i class="fa fa-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <?php endif; ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>{{ trans('core::core.table.created at') }}</th>
                                <th>{{ trans('core::core.table.actions') }}</th>
                            </tr>
                            </tfoot>
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
        <dd>{{ trans('qlyuser::qlyusers.title.create qlyuser') }}</dd>
    </dl>
@stop

@push('js-stack')
    <script type="text/javascript">
        $( document ).ready(function() {
            $(document).keypressAction({
                actions: [
                    { key: 'c', route: "<?= route('admin.qlyuser.qlyuser.create') ?>" }
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
                "order": [[ 0, "desc" ]],
                "language": {
                    "url": '<?php echo Module::asset("core:js/vendor/datatables/{$locale}.json") ?>'
                }
            });
        });
    </script>
@endpush
