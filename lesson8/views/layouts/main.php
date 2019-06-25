<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
     <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</head>

<body>

<header class="container header">
    <ul class="menu">
        <li><a href="/">Главная</a></li>
        <li><a href="/product/catalog">Каталог</a></li>
        
        <li>
            <a href="/cart">Корзина</a>
            <span id="count"><?=$count?></span>
        </li>
        <li>
            <a href="/orders">Заказы</a>
            <span id="ordersCount"><?=$ordersCount?></span>
        </li>
    </ul>
    <?php if(!$auth):?>
        <div class="auth">
            <a href="/user">Войти</a>
        </div>
    <?php else:?>
        <h5 class="m-3 alert-success"><?=$username?>, добро пожаловать!</h5>
        <div class="auth">
            <a href="/user/logout">Выйти</a>
        </div>
    <?php endif;?>
</header>

<div class="container">
    <?=$content?>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>