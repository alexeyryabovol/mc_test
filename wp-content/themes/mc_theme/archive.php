<?php
$product_posts = get_posts(array(
    'numberposts' => -1,
    'post_type'   => 'products'
));
foreach($product_posts as $post){
    setup_postdata($post);
    ?>
    <div class="col-md-3">
        <a href="<?php the_permalink(); ?>">
            <div class="product">
                <p class="title-product"><?php the_title(); ?></p>  
                <a class="a-buy" href="<?php echo get_permalink(get_page_by_path('mc_buy_form'));?>">Заказать</a>
            </div>
        </a>
    </div>
    <?php
}
wp_reset_postdata();






