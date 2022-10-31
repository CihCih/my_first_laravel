<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./sass/product-inside.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>

<body>
    <main>
        <section>
            <div class="container">
                <div class="left">
                    <!-- <div class="contain"> -->
                    <div class="main-img">
                        <img src="" alt="">
                    </div>
                    <div class="imgs">
                        <div class="img">
                            <img src="" alt="">
                        </div>
                        <div class="img">
                            <img src="" alt="">
                        </div>
                        <div class="img">
                            <img src="" alt="">
                        </div>
                    </div>
                    <!-- </div> -->
                </div>
                <div class="right">
                    <!-- <div class="contain"> -->
                    <div class="title">薩摩耶</div>
                    <div class="info">可愛的狗狗狗狗狗狗狗狗狗狗狗狗狗狗狗狗狗狗狗狗狗狗狗狗狗狗狗狗狗狗狗狗狗狗狗狗狗狗狗狗狗狗狗狗狗狗狗狗狗狗狗狗狗狗狗狗狗狗狗狗...</div>
                    <div class="bottom">
                        <div class="quantity">
                            <!-- <span>數量</span> -->
                            <i class="bi bi-dash" id="dash"></i>
                            <input type="number" value="1" id="qty">
                            <i class="bi bi-plus" id="plus"></i>
                        </div>
                        <div class="price">
                            <span>888$</span>
                        </div>
                    </div>
                    <div class="over">
                        剩餘數量:14
                    </div>
                    <div class="btn">
                        <div class="back">
                            <button type="button">返回</button>
                        </div>
                        <div class="add">
                            <button type="button" id="add_product">加入購物車</button>
                        </div>
                    </div>
                    <!-- </div> -->
                </div>
            </div>
        </section>
    </main>


    <script>
        const dash = document.querySelector('#dash');
        const plus = document.querySelector('#plus');
        const qty = document.querySelector('#qty');
        const add_product = document.querySelector('#add_product')

        dash.onclick = function() {
            qty.value = parseInt(qty.value) - 1
        }

        plus.onclick = function() {
            qty.value = parseInt(qty.value) + 1
        }

        add_product.onclick = function() {
            var formData = new formData();
            formData.append('add_qty', 'parseInt(qty.value)');
            formData.append('product', '{!! product_id !!})';

            fetch('/add_to_cart', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .catch(error => console.error('Error:', error))
                .then(response => console.log('Success:', response));
        }
    </script>
</body>

</html>
