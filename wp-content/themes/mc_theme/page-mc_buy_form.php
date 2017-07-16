<?php
$buy_form = new MC_Form();
wp_head();
?>
</head>
<body>
    <div class="buy-form">
        <p class="title-form">Форма для заказа</p>
        <form action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" id="buy_form" method="post">
            <p class="text-form">Выберите товар:</p>
            <?php $buy_form->product_helper(); ?>
            <p class="text-form">Введите имя и фамилию:</p>
            <?php $buy_form->name_helper(); ?>
            <p class="text-form">Введите email:</p>
            <?php $buy_form->email_helper(); ?>
            <p class="text-form">Выберите способ доставки:</p>
            <?php $buy_form->delivery_helper(); 
            wp_nonce_field('buy_form_action','buy_form_field');
            ?>  
            <input type="hidden" name="action" value="buy_form">
            <button type="submit">Заказать</button>
        </form>
    </div>
</body>

