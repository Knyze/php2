<div class="attend">
    <h2>НАШИ ТОВАРЫ</h2>
    <div class="wrapAttend">

        <?php foreach($products as $item): ?>
        <form action='<?="?c=product&a=card&id={$item['id']}"?>' method="post" class="wrapProduct">
            <button type="submit" class="addProduct">
                Add to Cart
            </button>
            <div class="imgProduct">
                <img src="<?=$imgDir.$item['img']?>" alt="<?=$item['name']?>">
            </div>
            <div class="textProduct">
                <h6><?=$item['name']?></h6>
                <p>$<?=$item['price']?></p>
            </div>
        </form>
        <?php endforeach?>

    </div>
</div>