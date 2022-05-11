@extends('template.template')

@section('pageTitle')
        訂單第二頁
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('css/checkedout2.css')}}">
@endsection

    @section('main')
        <div class="banner .container-fluid">
            <div class="list-detail">
                <!-- 上方進度條 -->
                <div id="section1" class="container-xxl">
                    <!-- 購物車標題 -->
                    <div class="shop-car">
                        <h3>購物車</h3>
                    </div>
                    <!-- 進度表 -->
                    <div class="progress-container">
                        <div class="progress">
                            <div class="box1">
                                <div class="box1-t d-flex">
                                    <div class="l-line"></div>
                                    <div class="step1 d-flex ">1</div>
                                    <div class="r-line"></div>
                                </div>
                                <div class="box1-b">
                                    <li>確認購物車</li>
                                </div>
                            </div>
                            <div class="box2">
                                <div class="box2-t d-flex">
                                    <div class="l-line"></div>
                                    <div class="step2 d-flex ">2</div>
                                    <div class="r-line"></div>
                                </div>
                                <div class="box2-b">
                                    <li>付款與運送方式</li>
                                </div>
                            </div>
                            <div class="box3">
                                <div class="box3-t d-flex">
                                    <div class="l-line"></div>
                                    <div class="step3 d-flex ">3</div>
                                    <div class="r-line"></div>
                                </div>
                                <div class="box3-b">
                                    <li>填寫資料</li>
                                </div>
                            </div>
                            <div class="box4">
                                <div class="box4-t d-flex">
                                    <div class="l-line"></div>
                                    <div class="step4 d-flex ">4</div>
                                    <div class="r-line"></div>
                                </div>
                                <div class="box4-b">
                                    <li>完成訂購</li>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- 中間付款方式與運送方式 -->
                <div id="section2">
                    <!-- 付款方式 -->
                    <div class="howToPay">
                        <div class="tittle">
                            <h3>付款方式</h3>
                        </div>
                        <div class="content">
                            <div class="first-choice d-flex align-items-center">
                                <input type="radio" name="pay" id="">
                                <p>信用卡付款</p>
                            </div>
                            <div class="second-choice d-flex align-items-center">
                                <input type="radio" name="pay" id="">
                                <p>網路 ATM</p>
                            </div>
                            <div class="third-choice d-flex align-items-center">
                                <input type="radio" name="pay" id="">
                                <p>超商代碼</p>
                            </div>
                        </div>
                    </div>
                    <!-- 運送方式 -->
                    <div class="howToDeliver">
                        <div class="tittle">
                            <h3>運送方式</h3>
                        </div>
                        <div class="content">
                            <div class="first-choice d-flex align-items-center">
                                <input type="radio" name="deliver" id="">
                                <p>黑貓宅配</p>
                            </div>
                            <div class="second-choice d-flex align-items-center">
                                <input type="radio" name="deliver" id="">
                                <p>超商店到店</p>
                            </div>
                        </div>
                    </div>

                </div>
                 <!-- 下方價格 -->
                 <div id="section3">
                    <div class="name-no-idea">
                        <!-- 價格明細 -->
                        <div class="price-box d-flex">
                            <div class="quantity d-flex justify-content-between">
                                <h5>數量:</h5>
                                <span>3</span>
                            </div>
                            <div class="subtotal d-flex justify-content-between">
                                <h5>小計:</h5>
                                <span>520.22</span>
                            </div>
                            <div class="shipping-fee d-flex justify-content-between">
                                <h5>運費:</h5>
                                <span>520.22</span>
                            </div>
                            <div class="total d-flex justify-content-between">
                                <h5>總計:</h5>
                                <span>520.22</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- 底部按鈕 -->
                <div id="section4">
                    <!-- 功能按鈕 -->
                    <div class="button-box d-flex justify-content-between">
                        <div class="l-button"><a class="btn btn-primary" href="#" role="button">上一步</a>

                        </div>
                        <div class="r-button"><a class="btn btn-primary" href="#" role="button">下一步</a></div>
                    </div>
                </div>
            </div>
        </div>
    @endsection


