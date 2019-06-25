<div class="attend">
    <h2>НАШИ ТОВАРЫ</h2>
    <div class="wrapAttend">

        <?php foreach($products as $item): ?>
           
        <div class="wrapProduct" data-id="<?=$item['id']?>">
            <button class="addProduct">
                Add to Cart
            </button>
            <div class="imgProduct">
                <img src="<?=$imgDir.$item['img']?>" alt="<?=$item['name']?>">
            </div>
            <div class="textProduct">
                <h6><?=$item['name']?></h6>
                <p>$<?=$item['price']?></p>
            </div>
        </div>
            
        <?php endforeach?>

    </div>
</div>

<script>
    $(document).ready(function() {
        $(".wrapProduct").on('click', function(event) {
            let id = $(this).attr('data-id');
            if (event.target.className === 'addProduct') {
                $.ajax({
                    url: "/cart/addCart/",
                    type: "POST",
                    dataType : "json",
                    data:{
                        id: id
                    },
                    error: function() {alert('error');},
                    success: function(answer){
                        $("#count").html(answer.count);
                    }
                });
            } else {
                location = `/product/card/?id=${id}`;
            }
        })
    });
</script>
