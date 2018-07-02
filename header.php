<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-type" content="text/html; charset=<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <title><?php wp_title('«', true, 'right'); ?> <?php bloginfo('name'); ?></title>
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>"/>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php dynamic_sidebar('modal_window'); ?>
<div class="header">
    <div class="header_center">
        <div class="col_custom_001">
            <a href="/" class="logo">
                интернет магазин<br>
                систем безопасности<br>

            </a>
        </div>
        <div class="col_custom_002">
            <div class="row_custom_001">Мы работаем Пн - Вс с 9.00 до 21.00 по всей Украине</div>
            <div class="row_custom_002"><span><span>096</span> 13-02-733</span><span><!--<span>097</span> 65-45-551</span>-->
            </div>
            <div class="row_custom_003"><span class="email_text"><span>info</span>@stovolt.com</span>
                <span class="order_call" data-toggle="modal" data-target=".bs-example-modal-sm">заказать звонок</span>
            </div>
        </div>
        <div class="col_custom_003">
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
            <?php dynamic_sidebar('header_right'); ?>
        </div>
    </div>
</div>
<div class="header_menu">
    <div class="header_menu_center">
        <?php wp_nav_menu(array('theme_location' => 'menu_1')); ?>
    </div>
</div>
<div class="wrapper_center">

    <?php dynamic_sidebar('user_1'); ?>
