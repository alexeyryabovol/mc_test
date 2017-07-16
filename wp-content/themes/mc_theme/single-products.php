<?php
wp_head();
?>
</head>
<body>
    <div class="single-product">
        <p class="title-product"><?php the_title(); ?></p>  
        <a class="a-buy" href="<?php echo get_permalink(get_page_by_path('mc_buy_form'));?>">Заказать</a>
    </div>
</body>

