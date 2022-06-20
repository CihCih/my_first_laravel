@extends('template.template')

@section('pageTitle')
    Banner新增
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

        /*
            .shop-car h3{
                float: left;
            }

            .create-banner{
                float: right;
            }

            main .sorting_1 .banner-img{
                width: 250px ;
                height: 200px;
            } */
    </style>
@endsection

@section('main')
    <div class="banner .container-fluid">
        <div class="list-detail">
            <div id="section1" class="container-xxl">
                <!-- 留言板標題 -->
                <div class="shop-car">
                    <h3>BANNER修改</h3>
                </div>
            </div>
            <div id="section2">
                <div class="content">
                    <form class="d-flex flex-column" action="/banner/update{{$banner->id}}" method="post" enctype="multipart/form-data">
                        {{-- 需跟route對應 --}}
                        @csrf
                        <span>現在的圖片</span>
                        <img class="picture" src="{{ $banner->img_path }}" alt="">
                        <label for="banner_img">BANNER圖片上傳</label>
                        <input type="file" name="banner_img" id="banner_img">

                        <label for="img_opacity">透明度設定</label>
                        <input type="text" name="img_opacity" id="img_opacity" value="{{ $banner->img_opacity }}">

                        <label for="weight">權重設定</label>
                        <input type="numver" name="weight" id="weight" value="{{ $banner->weight }}">

                        <div class="button-box d-flex justify-content-center mt-2">
                            <button class="btn btn-secondary me-3" type="reset" onclick="location.href='/banner'">取消</button>
                            <button class="btn btn-primary" type="submit">修改banner</button>
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
