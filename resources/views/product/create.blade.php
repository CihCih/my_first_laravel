@extends('template.template')

@section('pageTitle')
    商品管理-新增頁
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/comment.css') }}">
    {{-- datatable --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <style>
        main .banner{
            padding: 3% 15%;
        }
    </style>
@endsection

@section('main')
    <div class="banner .container-fluid">
        <div class="list-detail">
            <div id="section1" class="container-xxl">
                <!-- 留言板標題 -->
                <div class="shop-car">
                    <h3>商品管理-新增頁</h3>
                </div>
            </div>
            <div id="section2">
                <div class="content">
                    <form class="d-flex flex-column" action="" method="post" enctype="multipart/form-data"> {{-- 需跟route對應 --}}
                        @csrf
                        <label for="product_img">商品圖片上傳</label>
                        <input type="file" name="product_img" id="product_img">

                        <label for="product_name">商品名稱</label>
                        <input type="text" name="product_name" id="product_name">

                        <label for="price">商品價格</label>
                        <input type="number" name="price" id="price">

                        <label for="quantity">商品數量</label>
                        <input type="number" name="quantity" id="quantity">

                        <label for="introduce">商品介紹</label>
                        <input type="text" name="introduce" id="introduce">

                        <div class="button-box d-flex justify-content-center mt-2">
                            <button class="btn btn-secondary me-3" type="reset" onclick="location.href=''">取消</button>
                            <button class="btn btn-primary" type="submit">新增商品</button>
                        </div>
                    </form>
                </div>
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
    </script>
@endsection
