<div class="shopping" id="cart">
    <?php if (empty($result)):?>
    <div class="emptyCart">
        Корзина пуста
    </div>
    <?php else:?>
   
    <header>
        <div>Product Details</div>
        <div>unite Price</div>
        <div>Quantity</div>
        <div>shipping</div>
        <div>subtotal</div>
        <div>ACTION</div>
    </header>

    <?php foreach($result as $item): ?>
    <section>
        <div class="productDetails">
            <img class="image" src="<?=$imgDir.$item['img']?>" alt="<?=$item['name']?>">
            <div class="textProduct">
                <h3><?=$item['name']?></h3>
            </div>
        </div>
        <div>$<?=$item['price']?></div>
        <div><input type="number" name="quantity" value="<?=$item['quantity']?>" onchange="hundleNumberChange(this)"></div>
        <div>FREE</div>
        <div>$<output name="result"><?=$item['quantity']*$item['price']?></output></div>
        <div><a href="#" class="deleteCart" data-id="<?=$item['id']?>"><img src="/img/cansel.png" alt="cansel"></a></div>
    </section>
    <?php endforeach?>

    <footer>
        <form action="public/clear_cart.php">
            <button id="clearButton" type="submit">CLEAR SHOPPING CART</button>
        </form>
<!--        <span>В корзине n товаров на сумму $</span>-->
        <form action="orders/addorder/">
            <button id="proceed" type="submit">PROCEED TO CHECKOUT</button>
        </form>
    </footer>
    
    <?php  endif?>
</div>

<script> //почти аякс
    $(document).ready(function() {
        $(".deleteCart").on('click', function(){
            let id = $(this).attr('data-id');
            $.ajax({
                url: "/cart/deleteCart/",
                type: "POST",
                dataType : "json",
                data:{
                    id: id
                },
                error: function() {alert('error');},
                success: function(answer){
                    $("#count").html(answer.count);
                    location.reload();
                }
            })
        });

    });
</script>
