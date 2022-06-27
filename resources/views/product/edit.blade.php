@extends('template.template')

@section('pageTitle')
    商品管理-編輯頁
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/comment.css') }}">
    {{-- datatable --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <style>
        main .banner {
            padding: 3% 15%;
        }

        .picture {
            height: 200px;
            width: 250px;
        }
    </style>
@endsection

@section('main')
    <div class="banner .container-fluid">
        <div class="list-detail">
            <div id="section1" class="container-xxl">
                <!-- 留言板標題 -->
                <div class="shop-car">
                    <h3>商品管理-編輯頁</h3>
                </div>
            </div>
            <div id="section2">
                <div class="content">
                    <form class="d-flex flex-column" action="/product/update{{$product->id}}" method="post" enctype="multipart/form-data">
                        {{-- 需跟route對應 --}}
                        @csrf
                        <span>目前的主要圖片</span>
                        <img class="picture" src="{{$product->img_path}}" alt="">
                        <label for="product_img">商品主要圖片上傳</label>
                        <input type="file" name="product_img" id="product_img">

                        <span>目前的次要圖片</span>
                        <div class="d-flex flex-wrap">
                            @foreach ( $product->imgs as $item)
                                <img src="{{$item->img_path}}" alt="" style="width:250px;" class="me-3">
                            @endforeach
                        </div>
                        <label for="second_img">商品次要圖片上傳</label>
                        <input type="file" name="second_img[]" id="second_img" multiple accept="image/*">

                        <label for="product_name">商品名稱</label>
                        <input type="text" name="product_name" id="product_name" value="{{$product->product_name}}">

                        <label for="price">商品價格</label>
                        <input type="number" name="price" id="price" value="{{$product->price}}">

                        <label for="quantity">商品數量</label>
                        <input type="number" name="quantity" id="quantity" value="{{$product->quantity}}">

                        <label for="introduce">商品介紹</label>
                        <input type="text" name="introduce" id="introduce" value="{{$product->introduce}}">

                        <div class="button-box d-flex justify-content-center mt-2">
                            <button class="btn btn-secondary me-3" type="reset" onclick="location.href='/product'">取消</button>
                            <button class="btn btn-primary" type="submit">編輯商品</button>
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
