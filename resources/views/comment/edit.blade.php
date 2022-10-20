@extends('template.template')

@section('pageTitle')
    留言板
@endsection

@section('css')
{{-- bootstrap --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/comment.css') }}">
@endsection

@section('main')
    <div class="banner .container-fluid">
        <div class="list-detail">
            {{-- <div id="section1" class="container-xxl">
                <!-- 留言板標題 -->
                <div class="shop-car">
                    <h3>編輯留言板</h3>
                </div>
            </div> --}}

            <!-- 底部留言表單 -->
            {{-- {{$comment}} --}}
            <div class="section3">
                <form class="form" action="/comment/update/{{$comment->id}}" method="GET"><!--需跟route對應-->
                    <div class="content">
                        <div class="form-box">
                            <div class="form-top">
                                <div class="form-title">
                                    <span>留言者姓名</span>
                                    <input type="text" name="name" value="{{$comment->name}}">
                                </div>
                                <div class="form-name">
                                    <span>標題</span>
                                    <input type="text" name="title" value="{{$comment->title}}">
                                </div>
                            </div>
                            <div class="form-bot">
                                <div class="form-content">
                                    <span>內容</span>
                                    <input type="text" name="content" value="{{$comment->context}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit">提交表單</button>
                </form>
            </div>
        </div>
    </div>
@endsection
