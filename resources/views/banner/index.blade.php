@extends('layouts.app')

@section('pageTitle')
    Banner管理
@endsection

@section('css')
{{-- bootstrap --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
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
                    {{-- <h3>BANNER管理</h3> --}}
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
                                <button class="btn btn-danger" onclick="document.querySelector('#deleteForm{{$banner->id}}').submit()">刪除</button>
                                <form action="/banner/delete{{$banner->id}}" method="post" hidden id="deleteForm{{$banner->id}}">
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
