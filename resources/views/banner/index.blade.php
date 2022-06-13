@extends('template.template')

@section('pageTitle')
    Banner管理
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

        main .sorting_1 .banner-img{
            width: 250px ;
            height: 200px;
        }
    </style>
@endsection

@section('main')
    <div class="banner .container-fluid">
        <div class="list-detail">
            <div id="section1" class="container-xxl">
                <!-- 留言板標題 -->
                <div class="shop-car">
                    <h3>BANNER管理</h3>
                    <a href="/banner/create" class="btn btn-success create-banner">新增banner</a>
                </div>
                <table id="banner_list" class="display">
                    <thead>
                        <tr>
                            <th>圖片預覽</th>
                            <th>圖片權重</th>
                            <th>功能</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $banners as $banner )
                        <tr>
                            <td class="img-column">
                                <img src="{{$banner->img_path}}" alt="" class="banner-img" style="opacity: {{$banner->img_opacity}}">
                            </td>
                            <td>{{$banner->weight}}</td>
                            <td>
                                <button class="btn btn-success" onclick="location.href='/banner/edit{{$banner->id}}'">編輯</button>
                                <button class="btn btn-danger">刪除</button>
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
    </script>
@endsection
