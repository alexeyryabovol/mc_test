<?php
/*Класс для создания формы заказа*/
class MC_Form{    
    public function product_helper(){
        ?>
        <select name="product">
        <?php
        $products = get_posts(array(
            'numberposts' => -1,
            'post_type'   => 'products'            
        ));
        foreach($products as $product){            
            ?>
            <option value="<?php echo $product->post_title; ?>"><?php echo $product->post_title; ?></option>
            <?php
        }        
        ?>
        </select>
        <?php
    }
    public function name_helper(){
        $current_user = wp_get_current_user();
        ?>
        <input type="text" name="name_surname" value="<?php echo $current_user->user_firstname.' '.$current_user->user_lastname; ?>">
        <?php
    }
    public function email_helper(){
        $current_user = wp_get_current_user();
        ?>
        <input type="email" name="email" value="<?php echo $current_user->user_email; ?>">
        <?php
    }
    public function delivery_helper(){
       ?>
        <select name="delivery">
        <?php
        $d_terms = get_terms(array(
            'taxonomy'   => 'delivery',
            'hide_empty' => false
        ));
        foreach($d_terms as $d_term){            
            ?>
            <option value="<?php echo $d_term->term_id; ?>"><?php echo $d_term->name; ?></option>
            <?php        }        
        ?>
        </select>
        <?php 
    }
}

