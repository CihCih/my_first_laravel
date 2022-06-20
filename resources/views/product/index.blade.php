@extends('template.template')

@section('pageTitle')
    商品管理
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/comment.css') }}">
    {{-- datatable --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <style>
        main .banner{
            padding: 3% 15%;
        }

        .shop-car h3{
            float: left;
        }

        .create-banner{
            float: right;
        }

        table.dataTable tbody td{
            width: 300px;
        }
    </style>
@endsection

@section('main')
    <div class="banner .container-fluid">
        <div class="list-detail">
            <div id="section1" class="container-xxl">
                <!-- 留言板標題 -->
                <div class="shop-car">
                    <h3>商品管理</h3>
                    <a href="/banner/create" class="btn btn-success create-banner">新增商品</a>
                </div>
                <table id="banner_list" class="display">
                    <thead>
                        <tr>
                            <th>商品圖片</th>
                            <th>商品名稱</th>
                            <th>商品價格</th>
                            <th>商品數量</th>
                            <th>商品描述</th>
                            <th>功能</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $banners as $banner )
                        <tr>
                            <td class="img-column">
                                <img src="" alt="" class="w-100">
                            </td>
                            <td>NIKE AIR FORCE</td>
                            <td>6399</td>
                            <td>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</td>
                            <td>
                                <button class="btn btn-success" onclick="location.href=''">編輯</button>
                                <button class="btn btn-danger" onclick="document.querySelector('#deleteForm').submit()">刪除</button>
                                <form action="" method="post" hidden id="deleteForm'">
                                    @csrf
                                </form>
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
            $('#banner_list').DataTable();
        });

        // function delete_banner($id) {
        //     document.querySelector('#deleteForm'+$id).submit();
        // }
    </script>
@endsection
