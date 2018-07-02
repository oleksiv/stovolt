<?php

add_action('is_product_in_stock', 'show_is_product_in_stock');
    function show_is_product_in_stock() {
        global $product;
        if (!$product->is_in_stock()) {
            echo '<span class="outofstock_pr">Под заказ</span>';
        }
        else {
            echo '<span class="inofstock_pr">Есть в наличии</span>';
        }
    }

function woo_related_products_limit() {
    global $product;

    $args['posts_per_page'] = 6;
    return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'jk_related_products_args' );
function jk_related_products_args( $args ) {

    $args['posts_per_page'] = 4; // 4 related products
    $args['columns'] = 4; // arranged in 2 columns
    return $args;
}


remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10);
remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50);


add_action('custom_single_product_title', 'custom_single_show_product_title');
function custom_single_show_product_title() {
    wc_get_template( 'single-product/title.php' );
}

add_action('custom_product_images', 'custom_show_product_images');
function custom_show_product_images() {
    wc_get_template( 'single-product/product-image.php' );
}

add_action('custom_product_price', 'custom_show_product_price');
function custom_show_product_price() {
    wc_get_template( 'single-product/price.php' );
}

add_action('custom_product_short_desc', 'custom_show_product_short_desc');
function custom_show_product_short_desc() {
    wc_get_template( 'single-product/short-description.php' );
}

add_action('custom_product_addtocart', 'woocommerce_template_single_add_to_cart');
add_action('custom_product_rating', 'woocommerce_template_single_rating');



add_action('custom_product_service_description', 'custom_show_product_service_description');
function custom_show_product_service_description() {
    wc_get_template( 'service_description.php' );
}

add_action( 'custom_sku', 'show_custom_sku' );
function show_custom_sku(){
    global $product;
    echo '<span itemprop="productID" class="sku">Код товара: ' . $product->sku . '</span>';
}

remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10);

function register_my_widgets()
{
    register_sidebar(array(
        'name' => "Сайдбар слева",
        'id' => 'left_sidebar'
    ));

    register_sidebar(array(
        'name' => "Валюты",
        'id' => 'user_1'
    ));

    register_sidebar(array(
        'name' => "После контента",
        'id' => 'after_content'
    ));

    register_sidebar(array(
        'name' => "Подвал 1",
        'id' => 'footer_content_1'
    ));
    register_sidebar(array(
        'name' => "Подвал 2",
        'id' => 'footer_content_2'
    ));
    register_sidebar(array(
        'name' => "Подвал 3",
        'id' => 'footer_content_3'
    ));
    register_sidebar(array(
        'name' => "Подвал 4",
        'id' => 'footer_content_4'
    ));
    register_sidebar(array(
        'name' => "Шапка справа",
        'id' => 'header_right'
    ));

    register_sidebar(array(
        'name' => "Модальное окно",
        'id' => 'modal_window'
    ));

    register_sidebar(array(
        'name' => "Сервисные данные",
        'id' => 'service_description'
    ));
}
add_action( 'widgets_init', 'register_my_widgets' );
function register_main_menu() {
    register_nav_menu('menu_1',__( 'menu_1' ));
    register_nav_menu('menu_2',__( 'menu_2' ));

}
add_action( 'init', 'register_main_menu' );

// Добавляем стили
function enqueue_styles() {
    wp_enqueue_style( 'bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css');
    wp_enqueue_style( 'template', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'enqueue_styles');

// Добавляем скрипты
function enqueue_scripts () {
    wp_deregister_script('jquery');
    wp_register_script('jquery', get_template_directory_uri().'/js/jquery-1.11.2.min.js', array(), '1.11.2', true);
    wp_enqueue_script('bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js', array(), '3.3.2', true);
    wp_enqueue_script('application', get_template_directory_uri().'/js/application.js', array(), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'enqueue_scripts');


add_filter( 'woocommerce_product_subcategories_hide_empty', 'show_empty_categories', 10, 1 );
function show_empty_categories ( $show_empty ) {
    $show_empty  =  true;
    // You can add other logic here too
    return $show_empty;
}

/**
 * Customizing a BREADCRUMPS
 */

add_filter( 'woocommerce_breadcrumb_defaults', 'jk_change_breadcrumb_home_text' );
function jk_change_breadcrumb_home_text( $defaults ) {
    // Change the breadcrumb home text from 'Home' to 'Appartment'
    $defaults['home'] = 'Каталог';
    return $defaults;
}


// Ensure cart contents update when products are added to the cart via AJAX (place the following in functions.php)
add_filter( 'woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment' );

function woocommerce_header_add_to_cart_fragment( $fragments ) {
    ob_start();
    ?>
    <div class="cart_box">
        <?php global $woocommerce; ?>
        <?php if((int)$woocommerce->cart->cart_contents_count > 0) { ?>
            <a class="cart-contents" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e('View your shopping cart', 'woothemes'); ?>">
                В корзине <?php echo $woocommerce->cart->cart_contents_count; ?>
                <?php
                $count_products = $woocommerce->cart->cart_contents_count;
                $total_count = $woocommerce->cart->cart_contents_count;
                $count_products = substr($count_products, -1);
                if((int)$count_products == 1  && (int)$total_count <= 10) {
                    echo 'товар';
                }
                elseif(
                    (int)$count_products == 2  && (int)$total_count <= 10 ||
                    (int)$count_products == 3  && (int)$total_count <= 10 ||
                    (int)$count_products == 4 && (int)$total_count <= 10) {
                    echo 'товара';
                }
                elseif(
                    (int)$count_products == 5  && (int)$total_count <= 10 ||
                    (int)$count_products == 6  && (int)$total_count <= 10 ||
                    (int)$count_products == 7  && (int)$total_count <= 10 ||
                    (int)$count_products == 8  && (int)$total_count <= 10 ||
                    (int)$count_products == 9  && (int)$total_count <= 10 ||
                    (int)$count_products == 0  && (int)$total_count <= 10) {
                    echo 'товаров';
                }
                else {
                    echo 'товаров';
                }

                ?>
            </a>
        <?php } else { ?>
            в Вашей корзине <a href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e('View your shopping cart', 'woothemes'); ?>" >пусто</a>
        <?php } ?>
    </div>

    <?php

    $fragments['.cart_box'] = ob_get_clean();

    return $fragments;
}


// Display 24 products per page. Goes in functions.php
add_filter( 'loop_shop_per_page', create_function( '$cols', 'return 20;' ), 20 );


