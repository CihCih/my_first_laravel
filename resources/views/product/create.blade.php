@extends('layouts.app')

@section('pageTitle')
    商品管理-新增頁
@endsection

@section('css')
{{-- bootstrap --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/comment.css') }}">
    {{-- datatable --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <style>
        main .product{
            padding: 3% 15%;
        }
    </style>
@endsection

@section('main')
    <div class="product .container-fluid">
        <div class="list-detail">
            {{-- <div id="section1" class="container-xxl">
                <!-- 留言板標題 -->
                <div class="shop-car">
                    <h3>商品管理-新增頁</h3>
                </div>
            </div> --}}
            <div id="section2">
                <div class="content">
                    <form class="d-flex flex-column" action="/product/store" method="post" enctype="multipart/form-data"> {{-- 需跟route對應 --}}
                        @csrf
                        <label for="product_img">商品主要圖片上傳</label>
                        <input type="file" name="product_img" id="product_img" accept="image/*">

                        <label for="second_img">商品次要圖片上傳</label>
                        <input type="file" name="second_img[]" id="second_img" multiple accept="image/*">

                        <label for="product_name">商品名稱</label>
                        <input type="text" name="product_name" id="product_name">

                        <label for="price">商品價格</label>
                        <input type="number" name="price" id="price">

                        <label for="quantity">商品數量</label>
                        <input type="number" name="quantity" id="quantity">

                        <label for="introduce">商品介紹</label>
                        <input type="text" name="introduce" id="introduce">

                        <div class="button-box d-flex justify-content-center mt-2">
                            <button class="btn btn-secondary me-3" type="reset" onclick="location.href='/product'">取消</button>
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
            $('#product_list').DataTable();
        });
    </script>
@endsection
