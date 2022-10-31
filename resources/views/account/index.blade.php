@extends('layouts.app')

@section('pageTitle')
    account管理
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

        .shop-car h3{
            float: left;
        }

        .create-account{
            float: right;
        }

        main .sorting_1 .account-img{
            width: 250px ;
            height: 200px;
        }
        table.dataTable tbody td{
            width: 300px;
        }
    </style>
@endsection

@section('main')
    <div class="account .container-fluid">
        <div class="list-detail">
            <div id="section1" class="container-xxl">
                <!-- 留言板標題 -->
                <div class="shop-car">
                    {{-- <h3>account管理</h3> --}}
                    <a href="/account/create" class="btn btn-success create-account">新增管理者</a>
                </div>

                <table id="account_list" class="display">
                    <thead>
                        <tr>
                            <th>使用者名稱</th>
                            <th>信箱</th>
                            <th>權限</th>
                            <th>功能</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $users as $user )
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->power}}</td>
                            <td>
                                <button class="btn btn-success" onclick="location.href='/account/edit{{$user->id}}'">編輯</button>
                                <button class="btn btn-danger" onclick="document.querySelector('#deleteForm{{$user->id}}').submit()">刪除</button>
                                <form action="/account/delete{{$user->id}}" method="post" hidden id="deleteForm{{$user->id}}">
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
            $('#account_list').DataTable();
        });

        // function delete_account($id) {
        //     document.querySelector('#deleteForm'+$id).submit();
        // }
    </script>
@endsection
