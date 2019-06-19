<div class="imgProduct">
    <img src="<?=$imgDir.$product->img?>" alt="<?=$product->name?>">
</div>
<h2><?=$product->name?></h2>
<p><?=$product->description?></p>
<p>Стоимость:<?=$product->price?></p>
<a href="/cart/addProduct/?id=<?=$product->id?>">Купить</a>
