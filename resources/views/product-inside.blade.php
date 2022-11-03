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
                <!-- <div class="contain"> -->
                <div class="title">{{ $product->product_name }}</div>
                <div class="info">{{ $product->introduce }}</div>
                <div class="bottom">
                    <div class="quantity">
                        <!-- <span>數量</span> -->
                        <i class="bi bi-dash" id="dash"></i>
                        <input type="number" value="1" id="qty">
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
                <!-- </div> -->
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
            qty.value = parseInt(qty.value) - 1
        }

        plus.onclick = function() {
            qty.value = parseInt(qty.value) + 1
        }

        add_product.onclick = function() {
            var formData = new FormData();
            formData.append('add_qty', parseInt(qty.value));
            formData.append('product_id', {!! $product->id !!});
            formData.append('_token', '{!! csrf_token() !!}');

            fetch('/add_to_cart', {
                    method: 'POST', //因為post，所以要寫token
                    body: formData
                })
                .then(response => response.json())
                .catch(error => {
                    alert('新增失敗，請在嘗試一次')
                })
                .then(response => {
                    alert('新增成功')
                });
        }
    </script>
@endsection
