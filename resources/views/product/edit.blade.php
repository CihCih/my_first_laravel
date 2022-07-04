@extends('template.template')

@section('pageTitle')
    商品管理-編輯頁
@endsection

@section('css')
    <meta name="_token" content="{{csrf_token()}}">
    <link rel="stylesheet" href="{{ asset('css/comment.css') }}">

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
                    <form class="d-flex flex-column" action="/product/update{{ $product->id }}" method="post"
                        enctype="multipart/form-data">
                        {{-- 需跟route對應 --}}
                        @csrf
                        <span>目前的主要圖片</span>
                        <img class="picture" src="{{ $product->img_path}}" alt="">
                        <label for="product_img">商品主要圖片上傳</label>
                        <input type="file" name="product_img" id="product_img">

                        <span>目前的次要圖片</span>
                        <div class="d-flex flex-wrap">
                            @foreach ($product->imgs as $item)
                                <div class="d-flex flex-column me-3" style="width:150px;" id="sup_img{{$item->id}}">
                                    <img src="{{ $item->img_path}}" alt="" class="w-100">
                                    <button class="btn btn-danger w-100" type="button" onclick="delete_img({{$item->id}})">刪除圖片</button>
                                </div>
                            @endforeach
                        </div>
                        <label for="second_img">商品次要圖片上傳</label>
                        <input type="file" name="second_img[]" id="second_img" multiple accept="image/*">

                        <label for="product_name">商品名稱</label>
                        <input type="text" name="product_name" id="product_name" value="{{ $product->product_name }}">

                        <label for="price">商品價格</label>
                        <input type="number" name="price" id="price" value="{{ $product->price }}">

                        <label for="quantity">商品數量</label>
                        <input type="number" name="quantity" id="quantity" value="{{ $product->quantity }}">

                        <label for="introduce">商品介紹</label>
                        <input type="text" name="introduce" id="introduce" value="{{ $product->introduce }}">

                        <div class="button-box d-flex justify-content-center mt-2">
                            <button class="btn btn-secondary me-3" type="reset"
                                onclick="location.href='/product'">取消</button>
                            <button class="btn btn-primary" type="submit">編輯商品</button>
                        </div>
                    </form>
                    {{-- @foreach ($product->imgs as $item)
                        <form action="/product/delete_img{{ $item->id }}" method="post" hidden
                            id="deleteForm{{ $item->id }}">
                            @method('DELETE')
                            @csrf
                        </form>
                    @endforeach --}}

                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
 <script>
    function delete_img(id){
        //準備表單以及內部資料
        let formData = new FormData();
        formData.append('_method', 'DELETE');
        formData.append('_token', '{{csrf_token()}}');
        //將準備好的表單送回後台
        fetch("/product/delete_img"+id, {
            method: "POST",
            body: formData
        });.then(function(response){
            document.querySelector('#sup_img'+id).style.display = 'none';
        //     //成功從資料庫刪除資料後，將自己的HTML刪除
        })
    }
 </script>
@endsection
