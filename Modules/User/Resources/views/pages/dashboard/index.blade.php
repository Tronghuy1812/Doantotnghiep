@extends('user::layouts.app_master_user')
@section('style')
    <link rel="stylesheet" href="{{ asset('css/user.css') }}">
@stop
@section('content')
    @include('user::components._inc_menu_user')
    <div class="container" id="pjax-pages-page">
        <div class="pages_user">
            <div class="box">
                <div class="box-30">
                    <div class="box-dashboard-item">
                        @include('user::components._inc_avatar')
                    </div>
                </div>
                <div class="box-70" style="margin-left: 1rem">
                    <div class="box-dashboard-item">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">Mã đơn</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Time</th>
                                    <th scope="col">Status</th>
                                    <th scope="col" style="text-align: center">Export</th>
                                    <th scope="col" style="text-align: center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($transactions as $item)
                                    <tr>
                                        <td scope="row" style="text-align: center;position:relative;" data-tooltip="Click để xem chi tiết" class="css-tooltip">
                                            <a href="{{ route('get_user.transaction.view', $item->id) }}">DH{{ $item->id }}</a>
                                        </td>
                                        <td style="text-align: center">{{ number_format($item->t_total_money,0,',','.') }} đ</td>
                                        <td style="text-align: center">{{ $item->created_at }}</td>
                                        <td style="text-align: center"> <span class="label {{ $item->getStatus($item->t_status)['class'] }}"> {{ $item->getStatus($item->t_status)['name'] }} </span> </td>
                                        <td style="text-align: center"> <a href="" target="_blank" class="btn-xs label-success js-show-invoice_transaction" style="color: white"><i class="fa fa-save"></i> Export</a> </td>
                                        <td style="text-align: center"> <a href="" class="btn-xs label-danger" style="color: white"><i class="fa fa-save"></i> Huỷ đơn</a> </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
