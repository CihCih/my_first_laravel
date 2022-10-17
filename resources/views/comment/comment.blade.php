@extends('layouts.app')

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
                    <h3>留言板</h3>
                </div>
            </div> --}}
            <!-- 中間留言文章 -->
            {{-- {{$comments}} --}}
            @foreach ($comments as $comment)
                <div id="section2">
                    <div class="content">
                        <div class="article-box">
                            <div class="article-top">
                                <div class="article-top-left">
                                    {{-- <div class="article-title"></div> --}}
                                    <h2 class="title-box">{{$comment->title}}</h2>
                                    {{-- <div class="article-author"></div> --}}
                                    <div class="name-box">{{$comment->name}}</div>
                                </div>
                                <div class="article-top-right">
                                    {{-- <div class="article-time">發文時間：</div> --}}
                                    <div class="time-box">{{substr($comment->created_at,5,2).'月'.substr($comment->created_at,8,2).'日' }}</div>
                                </div>
                            </div>
                            <div class="article-bot">
                                <div class="article-content">
                                    {{$comment->context}}
                                </div>
                            </div>
                        </div>
                        <div>
                            <a href="/comment/delete/{{$comment->id}}">刪除</a>
                            <a href="/comment/edit/{{$comment->id}}">編輯</a>
                        </div>
                    </div>
                </div>
            @endforeach
            <!-- 底部留言表單 -->
            <div class="section3">
                <form class="form" action="/comment/save" method="GET">
                    <!--需跟route對應-->
                    <div class="content">
                        <div class="form-box">
                            <div class="form-top">
                                <div class="form-title">
                                    <span>留言者姓名</span>
                                    <input type="text" name="name">
                                </div>
                                <div class="form-name">
                                    <span>標題</span>
                                    <input type="text" name="title">
                                </div>
                            </div>
                            <div class="form-bot">
                                <div class="form-content">
                                    <span>內容</span>
                                    <input type="text" name="content">
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
