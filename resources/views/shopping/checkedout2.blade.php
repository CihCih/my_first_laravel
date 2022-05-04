<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>訂單第二頁</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/checkedout2.css">
</head>

<body>
    <nav>
        <!-- logo -->
        <div class="container-xxl d-flex justify-content-lg-between ">
            <div class="logo"><img src="./img/logo--u5T7hu.svg" alt=""></div>
            <!-- 相關超連結 -->
            <ul class="nav justify-content-end align-content-center ">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Portfolio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
                <a class="nav-link" href="#">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa-solid fa-cart-shopping"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa-solid fa-circle-user"></i></a>
                </li>
            </ul>
        </div>
    </nav>
    <main>
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
    </main>
    <footer>
        <!-- 網頁其他資訊 -->
        <!-- 資訊1 -->
        <div class="other-info1 d-flex align-items-center">
            <div class="l-box">
                <div class="logo">
                    <img src="./img/homepage-img/little.logo.png" alt="little logo" />
                    <span>數位方塊</span>
                </div>
                <div class="info">
                    <p>Air plant banjo lyft occupy retro adaptogen indego</p>
                </div>
            </div>
            <div class="r-box d-flex justify-content-around">
                <ul>
                    <li>
                        <h6>CATEGORIES</h6>
                    </li>
                    <li><a>First Link</a></li>
                    <li><a>Second Link</a></li>
                    <li><a>Third Link</a></li>
                    <li><a>Fourth Link</a></li>
                </ul>
                <ul>
                    <li>
                        <h6>CATEGORIES</h6>
                    </li>
                    <li><a>First Link</a></li>
                    <li><a>Second Link</a></li>
                    <li><a>Third Link</a></li>
                    <li><a>Fourth Link</a></li>
                </ul>
                <ul>
                    <li>
                        <h6>CATEGORIES</h6>
                    </li>
                    <li><a>First Link</a></li>
                    <li><a>Second Link</a></li>
                    <li><a>Third Link</a></li>
                    <li><a>Fourth Link</a></li>
                </ul>
                <ul>
                    <li>
                        <h6>CATEGORIES</h6>
                    </li>
                    <li><a>First Link</a></li>
                    <li><a>Second Link</a></li>
                    <li><a>Third Link</a></li>
                    <li><a>Fourth Link</a></li>
                </ul>
            </div>
        </div>
        <!-- 資訊2 -->
        <div class="other-info2">
            <div class="container d-flex align-items-center justify-content-between">
                <p>© 2020 Tailblocks — @善良的人</p>
                <div class="svg">
                    
                    <img src="./img/some-svg/facebook.svg" alt="">
                    <img src="./img/some-svg/twitter.svg" alt="">
                    <img src="./img/some-svg/instagram.svg" alt="">
                    <img src="./img/some-svg/linkedin.svg" alt="">
                </div>
            </div>
        </div>
    </footer>
    <script src="https://kit.fontawesome.com/1b22cb82e7.js" crossorigin="anonymous"></script>
</body>

</html>