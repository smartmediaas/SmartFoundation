<!DOCTYPE html>

<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><html class="no-js" <?php language_attributes(); ?>> <![endif]-->

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    
    <!-- Set the viewport width to device width for mobile -->
    <meta name="viewport" content="width=device-width" />
    
    <title><?php
/*
 * Print the <title> tag based on what is being viewed.
 */
global $page, $paged;

wp_title( '|', true, 'right' );

// Add the blog name.
bloginfo( 'name' );

// Add the blog description for the home/front page.
$site_description = get_bloginfo( 'description', 'display' );
if ( $site_description && ( is_home() || is_front_page() ) )
    echo " | $site_description";

// Add a page number if necessary:
if ( $paged >= 2 || $page >= 2 )
    echo ' | ' . sprintf( __( 'Page %s', 'toolbox' ), max( $paged, $page ) ); ?>
    </title>
    
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <!-- IE Fix for HTML5 Tags -->
    <!--[if lt IE 9]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/ie8-grid.css">
    <![endif]-->
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <div id="jmwrapper" data-role="page">
        
        <div id="wrapper" data-role="content">
            
            <!-- Starting the Top-Bar -->
            <nav class="nav-bar show-for-small">
                <div class="row inner-nav-bar">
                    <ul>
                         <?php if(is_active_sidebar('panel-left')): ?>
                            <li class="panelbtn panel-leftbtn"><a href="#panel-left" class="leftbtn"><span></span></a></li>
                        <?php endif; ?>
                        <li class="name">
                            <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                        </li>
                        <?php if(is_active_sidebar('panel-left')): ?>
                        <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
                            <li class="panelbtn panel-rightbtn"><a href="#panel-right" class="rightbtn"><span><?php _e('Menu', 'smart_foundation' ); ?></span></a></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </nav>
    
            <!-- End of Top-Bar -->
            
            
            <div id="page" class="row">
                <div id="inner-page" class="large-12 columns">
                    <header id="site-header" class="row">
                        <div class="large-12 columns hide-for-small">
                            <div id="logos" class="row">
                                <div id="site-title" class="large-12 columns">
                                    <h1>
                                        <a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
                                            <?php  echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>
                                        </a>
                                    </h1>
                                    <?php echo esc_attr( get_bloginfo( 'description', 'display' ) ); ?>
                                </div>
                            </div>
                        </div>                
                    </header>
                    
                    <nav class="main-navigation large-12 hide-for-small" role="navigation">
                        <?php wp_nav_menu( array('theme_location' => 'main-menu', 'menu' => 'Main Menu')); ?>
                        <hr />
                    </nav>
                    
                    <section id="main" class="row">
