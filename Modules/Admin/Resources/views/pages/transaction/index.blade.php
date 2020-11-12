@extends('admin::layouts.master')
@section('content')
    <div class="container-fluid">
        <!-- breadcrumb -->
        <div class="breadcrumb-header justify-content-between">
            <div class="my-auto">
                <div class="d-flex">
                    <h4 class="content-title mb-0 my-auto">Transaction</h4>
                    <span class="text-muted mt-1 tx-13 ml-2 mb-0">/ index</span>
                </div>
            </div>
        </div>
        <!-- breadcrumb -->
        <!-- row -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table mg-b-0 text-md-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Info</th>
                                        <th>Money</th>
{{--                                        <th>Type</th>--}}
                                        <th>Status</th>
                                        <th>Time</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @forelse($transactions as $item)
                                    <tr>
                                        <th scope="row">{{ $item->id }}</th>
                                        <td>
                                            <p><span>Name</span> <span>{{ $item->user->name ?? "[N\A]" }}</span></p>
                                            <p><span>Email</span> <span>{{ $item->user->email ?? "[N\A]" }}</span></p>
                                        </td>
                                        <td>
                                            <b>{{ number_format($item->t_total_money,0,',','.') }} đ</b>
                                        </td>
{{--                                        <td>--}}
{{--                                            <span class="badge {{ $item->getStatus($item->t_status)['class']  }}">{{ $item->getStatus($item->t_status)['name']  }}</span>--}}
{{--                                        </td>--}}
                                        <td>
                                            <span class="badge {{ $item->getStatus($item->t_status)['class']  }}">{{ $item->getStatus($item->t_status)['name']  }}</span>
                                        </td>
                                        <td>
                                            {{ $item->created_at }}
                                        </td>
                                        <td>
                                            <a href="{{ route('get_admin.transaction.edit', $item->id) }}" class="btn btn-xs btn-info"><i class="la la-edit"></i></a>
                                            <a href="" class="btn btn-xs btn-danger"><i class="la la-trash"></i></a>
                                        </td>
                                    </tr>
                                @empty
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- row closed -->
    </div>
@stop
