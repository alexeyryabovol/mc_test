<?php
/*добавление css и Bootstrap в тему*/
function add_css_and_scripts(){
    ?>
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/style.css" type="text/css">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/bootstrap/css/bootstrap.min.css" type="text/css">
    <?php
}
add_action('wp_head', 'add_css_and_scripts');




