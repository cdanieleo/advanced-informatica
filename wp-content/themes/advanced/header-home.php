<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width">
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
        <!--[if lt IE 9]>
        <script src="<?php echo esc_url(get_template_directory_uri()); ?>/js/html5.js"></script>
        <![endif]-->
        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>
        <header id="header">

        <a href="<?php bloginfo('siteurl'); ?>" class="logo os-animation" data-os-animation-delay="0s" data-os-animation="fadeIn"><img src="<?php bloginfo('template_url'); ?>/images/logo-karmani.png" /></a>

        <nav id="main-nav" class="os-animation" data-os-animation-delay="0s" data-os-animation="fadeIn">
            <a id="menu-mobile-ico-close"></a>
        <?php
        wp_nav_menu(array(
            'menu' => 'Principal',
            'theme_location' => 'principal',
            'container' => 'ul',
            'container_class' => '',
            'container_id' => '',
            'menu_class' => 'nav navbar-nav',
            'echo' => true,
            'menu_id' => '',
            'before' => '',
            'after' => '',
            'link_before' => '',
            'link_after' => '',
            'depth' => 0,
            'walker' => '',
        ));
        ?>
        </nav>
        
        <a href="#" class="btn-buy os-animation" data-os-animation-delay="0s" data-os-animation="fadeIn"><div id="menu-mobile-ico"></div><span>COMPRAR</span></a>
    </header>
        <div id="header-point"></div>