@extends('layouts.app')

@section('pageTitle')
    商品管理
@endsection

@section('css')
    {{-- bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/comment.css') }}">
    {{-- datatable --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <style>
        main .product {
            background-color: #d1d5db;
            padding: 3% 15%;
        }

        .shop-car h3 {
            float: left;
        }

        .create-product {
            float: right;
        }

        table.dataTable tbody td {
            width: 300px;
        }

        main .product .list-detail {
            background-color: #f3f4f6;
            padding: 4% 4%;
            border-radius: 10px;
        }
    </style>
@endsection

@section('main')
    <div class="product .container-fluid">
        <div class="list-detail">
            <div id="section1" class="container-xxl">
                <!-- 留言板標題 -->
                <div class="shop-car">
                    {{-- <h3>商品管理</h3> --}}
                    <a href="/product/create" class="btn btn-success create-product">新增商品</a>
                </div>
                <table id="product_list" class="display">
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
                        @foreach ($products as $product)
                            <tr>
                                <td class="img-column">
                                    <img src="{{ $product->img_path }}" alt="" class="w-100">
                                </td>
                                <td>{{ $product->product_name }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->quantity }}</td>
                                <td>{{ $product->introduce }}</td>
                                <td>
                                    <button class="btn btn-success"
                                        onclick="location.href='/product/edit{{ $product->id }}'">編輯</button>
                                    <button class="btn btn-danger"
                                        onclick="document.querySelector('#deleteForm{{ $product->id }}').submit()">刪除</button>
                                    <form action="/product/delete{{ $product->id }}" method="post" hidden
                                        id="deleteForm{{ $product->id }}">
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
            $('#product_list').DataTable();
        });

        // function delete_product($id) {
        //     document.querySelector('#deleteForm'+$id).submit();
        // }
    </script>
@endsection
