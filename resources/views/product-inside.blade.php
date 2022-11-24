@extends('template.template')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/boostrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/product-inside.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
@endsection
</head>

@section('main')
    <section>
        <div class="contain">
            <div class="left">
                <!-- <div class="contain"> -->
                <div class="main-img">
                    <img src="{{ $product->img_path }}" alt="">
                </div>
                <div class="imgs">
                    @foreach ($product->imgs as $item)
                        <div class="img">
                            <img src="{{ $item->img_path }}" alt="">
                        </div>
                    @endforeach
                </div>
                <!-- </div> -->
            </div>
            <div class="right">
                <div class="title">{{ $product->product_name }}</div>
                <div class="info">{{ $product->introduce }}</div>
                <div class="bottom">
                    <div class="quantity">
                        <!-- <span>數量</span> -->
                        <i class="bi bi-dash" id="dash"></i>
                        <input type="number" value="1" id="qty" max="{{ $product->quantity }}">
                        <i class="bi bi-plus" id="plus"></i>
                    </div>
                    <div class="price">
                        <span>{{ $product->price }}</span>
                    </div>
                </div>
                <div class="over">
                    剩餘數量:{{ $product->quantity }}
                </div>
                <div class="btn">
                    <div class="back">
                        <button type="reset" onclick="location.href='/'">返回</button>
                    </div>
                    <div class="add">
                        <input type="number" id="product_id" value="{{ $product->id }}" hidden> {{-- 方法一 --}}
                        <button type="button" id="add_product">加入購物車</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script>
        const dash = document.querySelector('#dash');
        const plus = document.querySelector('#plus');
        const qty = document.querySelector('#qty');
        const add_product = document.querySelector('#add_product');
        // const product_id = {!! $product->id !!} //方法二

        dash.onclick = function() {
            // 用parseInt將字串轉換為數字
            if (parseInt(qty.value) >= 2) {
                qty.value = parseInt(qty.value) - 1
            }
        }

        plus.onclick = function() {
            if (parseInt(qty.value) < {!! $product->quantity !!}) {
                qty.value = parseInt(qty.value) + 1
            }
        }

        add_product.onclick = function() {
            // 在JS建立一個虛擬的form表單
            var formData = new FormData(); //form表單

            formData.append('add_qty', parseInt(qty.value)); //input
            formData.append('product_id', {!! $product->id !!}); //input
            formData.append('_token', '{!! csrf_token() !!}'); //input

            // 利用fetch將form
            fetch('/add_to_cart', { //fetch後面寫網址
                    method: 'POST', //方法   //因為post，所以要寫token
                    body: formData  //表單
                })
                .then(response => response.json())
                .catch(error => {  //這邊只會發現四百或五百系列報錯
                    alert('新增失敗，請在嘗試一次')
                    return 'error';
                })
                .then(response => {
                    console.log(response.result);
                    if(response !== 'error'){
                        if (response.result == 'success') {
                            alert('新增成功')
                        }else{
                            alert('新增失敗:'+ response.message)
                        }
                    }
                });
        }
    </script>
@endsection
