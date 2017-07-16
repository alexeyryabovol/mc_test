<?php
/*Класс настроек*/
class MC_Settings{
    public function init_plugin(){
        add_action('init', array($this, 'init_orders_post_type'));
        add_action('init', array($this, 'init_products_post_type'));
        add_action('init', array($this, 'init_taxonomy_delivery'));
        add_action('init', array($this, 'init_taxonomy_status'));
        add_action('init', array($this, 'create_buy_page'));
        add_action('admin_post_nopriv_buy_form', array($this, 'save_buy_form'));
        add_action('admin_post_buy_form', array($this, 'save_buy_form'));
    }
    /*Создание типа записей "Заказы" (orders) */
    public function init_orders_post_type(){
        register_post_type('orders', array(
            'label'  => null,
            'labels' => array(
                    'name'               => 'Заказы', 
                    'singular_name'      => 'Заказ', 
                    'add_new'            => 'Добавить заказ', 
                    'add_new_item'       => 'Добавление заказа', 
                    'edit_item'          => 'Редактирование заказа', 
                    'new_item'           => 'Новый заказ', 
                    'view_item'          => 'Смотреть заказ', 
                    'search_items'       => 'Искать заказ', 
                    'not_found'          => 'Не найдено', 
                    'not_found_in_trash' => 'Не найдено в корзине',			
                    'menu_name'          => 'Заказы', 
            ),
            'description'         => '',
            'public'              => true,
            'publicly_queryable'  => true,            
            'show_in_menu'        => true,            
            'menu_icon'           => 'dashicons-megaphone',             
            'hierarchical'        => false,
            'supports'            => array('title','editor'),             
            'has_archive'         => false,            
            'query_var'           => true
	) );
    }
    /*Создание типа записей "Товары" (products) */
    public function init_products_post_type(){
        register_post_type('products', array(
            'label'  => null,
            'labels' => array(
                    'name'               => 'Товары', 
                    'singular_name'      => 'Товар', 
                    'add_new'            => 'Добавить товар', 
                    'add_new_item'       => 'Добавление товара', 
                    'edit_item'          => 'Редактирование товара', 
                    'new_item'           => 'Новый товар', 
                    'view_item'          => 'Смотреть товар', 
                    'search_items'       => 'Искать товар', 
                    'not_found'          => 'Не найдено', 
                    'not_found_in_trash' => 'Не найдено в корзине',			
                    'menu_name'          => 'Товары', 
            ),
            'description'         => '',
            'public'              => true,
            'publicly_queryable'  => true,            
            'show_in_menu'        => true,            
            'menu_icon'           => 'dashicons-carrot',             
            'hierarchical'        => false,
            'supports'            => array('title','editor'),             
            'has_archive'         => true,            
            'query_var'           => true,
            'taxonomies'          => array('category', 'post_tag')
	) );
    }
    /*Создание таксономии "Способ доставки" (delivery) */
    public function init_taxonomy_delivery(){
        register_taxonomy('delivery', array('orders'), array(
		'label'                 => '', 
		'labels'                => array(
			'name'              => 'Способы доставки',
			'singular_name'     => 'Способ доставки',			
			'menu_name'         => 'Способы доставки'
		),
		'description'           => '', 
		'public'                => true,
                'hierarchical'          => true,
		'meta_box_cb'           => 'post_categories_meta_box', 
		'show_admin_column'     => true		
	) );
        wp_insert_term('Самовывоз', 'delivery', array('slug' => 'self'));
        wp_insert_term('Доставка почтой', 'delivery', array('slug' => 'post_service'));
        wp_insert_term('Курьерская доставка', 'delivery', array('slug' => 'courier'));
    }
    /*Создание таксономии "Статус" (status) */
    public function init_taxonomy_status(){
        register_taxonomy('status', array('orders'), array(
		'label'                 => '', 
		'labels'                => array(
			'name'              => 'Статусы заказов',
			'singular_name'     => 'Статус заказа',			
			'menu_name'         => 'Статусы заказов'
		),
		'description'           => '', 
		'public'                => true,
                'hierarchical'          => true,
		'meta_box_cb'           => 'post_categories_meta_box', 
		'show_admin_column'     => true		
	) );
        wp_insert_term('Обрабатывается', 'status', array('slug' => 'in_process'));
        wp_insert_term('Отправлен', 'status', array('slug' => 'sent'));
        wp_insert_term('Отклонен', 'status', array('slug' => 'rejected'));
    }
    /*Создание страницы заказа*/
    public function create_buy_page(){
        if(empty(get_page_by_path('mc_buy_form'))){            
            $page_data = array(
                'post_title'   => 'Заказать',
                'post_content' => '',
                'post_name'    => 'mc_buy_form',
                'post_status'  => 'publish',
                'post_type'    => 'page'
            );
            wp_insert_post(wp_slash($page_data));
        }
    }
    /*Сохранение формы*/
    public function save_buy_form(){          
        if (empty($_POST) || !wp_verify_nonce($_POST['buy_form_field'],'buy_form_action')){          
           wp_die();
        } else {
           $product_title = sanitize_text_field($_POST['product']); 
           $user_name = sanitize_text_field($_POST['name_surname']);
           $user_email = sanitize_email($_POST['email']);
           $delivery_type = sanitize_text_field($_POST['delivery']);
           $term_status = get_term_by('slug', 'in_process', 'status');
           $form_data = array(
                'post_title'   => 'Заказ товара '.$product_title ,
                'post_content' => ' Товар: '.$product_title."\n  Пользователь: ".$user_name."\n Email: ".$user_email,                
                'post_status'  => 'publish',
                'post_type'    => 'orders',
                'tax_input'    => array('delivery' => array($delivery_type), 'status' => array($term_status->term_id))
            );
            $post_id = wp_insert_post(wp_slash($form_data));
            if(!empty($post_id)){
                echo 'Успешно оформленный заказ';
            }else{
                echo 'Ошибка при оформлении заказа';
            }
        }
        
    }
}

