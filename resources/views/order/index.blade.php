@extends('layouts.app')

@section('pageTitle')
    訂單管理
@endsection

@section('css')
    {{-- bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/comment.css') }}">
    {{-- datatable --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <style>
        main .order {
            padding: 3% 15%;
        }

        .shop-car h3 {
            float: left;
        }

        .create-order {
            float: right;
        }

        main .sorting_1 .order-img {
            width: 250px;
            height: 200px;
        }

        table.dataTable tbody td {
            width: 300px;
        }
    </style>
@endsection

@section('main')
    <div class="order .container-fluid">
        <div class="list-detail">
            <div id="section1" class="container-xxl">
                <!-- 留言板標題 -->
                <div class="shop-car">
                    {{-- <h3>order管理</h3> --}}
                </div>

                <table id="order_list" class="display">
                    <thead>
                        <tr>
                            <th>姓名</th>
                            <th>訂單編號</th>
                            <th>總計金額</th>
                            <th>訂單狀態</th>
                            <th>電話</th>
                            <th>功能</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->name }}</td>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->total }}</td>
                                <?php
                                switch ($order->status) {
                                    case '1':
                                        $data = '未付款';
                                        break;
                                    case '2':
                                        $data = '已付款';
                                        break;
                                    case '3':
                                        $data = '已出貨';
                                        break;
                                    case '4':
                                        $data = '已結單';
                                        break;

                                        echo $data;
                                }
                                ?>
                                <td>{{ $data }}</td>
                                <td>{{ $order->phone }}</td>
                                <td>
                                    <button class="btn btn-success"
                                        onclick="location.href='/order/edit{{ $order->id }}'">查看</button>
                                    {{-- <button class="btn btn-danger" onclick="document.querySelector('#deleteForm{{$order->id}}').submit()">刪除</button> --}}
                                    {{-- <form action="/order/delete{{$order->id}}" method="post" hidden id="deleteForm{{$order->id}}">
                                    @csrf
                                </form> --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('js')
    {{-- jquery cdn --}}
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"
        integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
    {{-- datatable cdn --}}
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#order_list').DataTable();
        });

        // function delete_order($id) {
        //     document.querySelector('#deleteForm'+$id).submit();
        // }
    </script>
@endsection
