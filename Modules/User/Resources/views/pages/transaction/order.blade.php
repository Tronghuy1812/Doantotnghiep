@extends('user::layouts.app_master_user')
@section('style')
    <link rel="stylesheet" href="{{ asset('css/user.css') }}">
@stop
@section('content')
    @include('user::components._inc_menu_user')
    <div class="container" id="pjax-pages-page">
        <div class="pages_user mt20">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">View</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col" style="text-align: center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $item)
                        <tr>
                            <td scope="row" style="text-align: center;position:relative;" data-tooltip="Click để xem chi tiết khoá học" class="css-tooltip">
                                <a data-pjax
                                   href="{{ route('get_user.transaction.view_course', ['idTransaction' => $idTransaction,'idCourse' => $item->o_action_id]) }}">Thông tin khoá học</a>
                            </td>
                            <td class="text-center">{{ $item->course->c_name ?? "[N\A]" }}</td>
                            <td style="text-align: center">{{ number_format($item->o_price,0,',','.') }} đ</td>
                            <td style="text-align: center">Huỷ bỏ</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop
