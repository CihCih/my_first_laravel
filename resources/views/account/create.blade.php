@extends('layouts.app')

@section('pageTitle')
    新增管理者
@endsection

@section('css')
{{-- bootstrap --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/comment.css') }}">
    {{-- datatable --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <style>
        main .account{
            padding: 3% 15%;
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
    <div class="account .container-fluid">
        <div class="list-detail">
            <div id="section1" class="container-xxl">
                <!-- 留言板標題 -->
                <div class="shop-car">
                    <h3>帳號新增</h3>
                    <span class="error">{{ session('problem') }}</span>
                </div>
            </div>
            <div id="section2">
                <div class="content">
                    <form class="d-flex flex-column" action="/account/store" method="post" enctype="multipart/form-data"> {{-- 需跟route對應 --}}
                        @csrf
                        <label for="name">使用者名稱</label>
                        <input type="text" name="name" id="name">

                        <label for="email">使用者信箱</label>
                        <input type="email" name="email" id="email">

                        <label for="password">使用者密碼</label>
                        <input type="password" name="password" id="password">

                        <label for="password_confirmation">確認密碼</label>
                        <input type="password" name="password_confirmation" id="password_confirmation">

                        <div class="button-box d-flex justify-content-center mt-2">
                            <button class="btn btn-secondary me-3" type="reset" onclick="location.href='/account'">取消</button>
                            <button class="btn btn-primary" type="submit">新增管理者</button>
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
            $('#account_list').DataTable();
        });
    </script>

    @if (session('problem'))
        <script>
            alert("{{ session('problem') }}")
        </script>
    @endif
@endsection
