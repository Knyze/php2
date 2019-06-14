<div class="attend">
    <h2>НАШИ ТОВАРЫ</h2>
    <div class="wrapAttend">

        <?php foreach($products as $item): ?>
           
        <div class="wrapProduct">
            <button data-id="<?=$item['id']?>" class="addProduct">
                Add to Cart
            </button>
            <div class="imgProduct">
                <img src="<?=$imgDir.$item['img']?>" alt="<?=$item['name']?>">
            </div>
            <a href="\product\card\?id=<?=$item['id']?>">
                <div class="textProduct">
                    <h6><?=$item['name']?></h6>
                    <p>$<?=$item['price']?></p>
                </div>
            </a>
        </div>
            
        <?php endforeach?>

    </div>
</div>

<script>
    $(document).ready(function() {
        $(".addProduct").on('click', function(){
            let id = $(this).attr('data-id');
            $.ajax({
                url: "/cart/addCart/",
                type: "POST",
                dataType : "json",
                data:{
                    id: id
                },
                error: function() {alert('error');},
                success: function(answer){
                    {
                        $("#count").html(answer.count);
                    }
                }

            })
        });

    });
</script>
