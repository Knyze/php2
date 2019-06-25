<?php if (empty($orders)):?>
<div class="emptyCart">
    Нет заказов
</div>
<?php else:?>

<table class="
    <?php if ($_SESSION['admin'] == 1):?>
        ordersAdmin
    <?php else: ?>
        orders
    <?php endif?>
     container">
     
    <caption>
        <h3>Заказы</h3>
    </caption>
    <tr>
        <?php if ($_SESSION['admin'] == 1): ?>
        <th>№</th>
        <?php endif?>
        <th>Контакты</th>
        
        <th>Описание заказа</th>
        <th>Сумма</th>
        <th>Статус</th>
    </tr>
    
    <?php foreach($orders as $item): ?>
    <tr>
        <?php if ($_SESSION['admin'] == 1): ?>
        <td><?=$item['id']?></td>
        <?php endif?>
        
        <td>
           <input type="text" value="<?=$item['contacts']?>"
                placeholder="Добавьте контакт"
                onchange="handleChangeContact(event, <?=$item['id']?>)">
        </td>
        
        <td><?=$item['description']?></td>
        <td><?=$item['sum']?></td>
        <td>
            <select name="status" id="status"
                <?php if ($_SESSION['admin'] == 1): ?>
                    onchange="handleChangeStatus(event, <?=$item['id']?>)"
                <?php else: ?>
                    disabled
                <?php endif?>>
                
                <option <?php echo $item['status']=='checkOut' ? 'selected' : '' ?> value="checkOut">Оформлен</option>
                <option <?php echo $item['status']=='inProcess' ? 'selected' : '' ?> value="inProcess">В работе</option>
                <option <?php echo $item['status']=='closed' ? 'selected' : '' ?> value="closed" >Закрыт</option>
                <option <?php echo $item['status']=='canselled' ? 'selected' : '' ?> value="canselled">Отменен</option>
            </select>
        </td>
    </tr>
    <?php endforeach?>

</table>
<?php  endif?>

<script src="/js/changeOrders.js"></script>
