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
        <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/ie8-grid.css" />
    <![endif]-->
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    
    <div class="top-bar-container fixed contain-to-grid">
        <nav class="top-bar">
            <ul class="title-area">
                <li class="name">
                    <span><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></span>
                    <a href="#" class="toggle-nav open"></a>
                </li>          
                <li class="toggle-topbar menu-icon"><a href="#"><span><?php _e('Menu', 'smart_foundation'); ?></span></a></li>
            </ul>
            <section class="top-bar-section">
                <?php foundation_top_bar_l(); ?>

                <?php foundation_top_bar_r(); ?>
            </section>
        </nav>
    </div>

<!-- start megadrop -->
<div class="container" id="megaDrop" style="display: block;">
  <div class="mobile-main-nav-padding">
    <div class="row top">
      <div class="eight columns">
        <a href="http://zurb.com"><h4><img src="http://zurb.com/assets/logo/zurb-logo-drop-down.png"> Design Great Products Faster</h4></a>
      </div>
      <div class="four columns">
        <div class="right links">
          <a href="http://zurb.com/about">About</a> | <a href="http://zurb.com/blog">ZURBlog </a> | <a href="http://www.zurb.com/sitemap">Sitemap</a>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="tablet-padding">
        <div class="three columns property" id="services">
          <a href="http://zurb.com/services">
            <h4>Services</h4>
            <p>We'll help you get online products designed better and faster than ever before and set you up for future iterations.</p>
            <span>Let's Work Together →</span>
          </a>
        </div>
        
        <div class="show-on-phones"><br><br></div>
        <div class="three columns property" id="foundation">
          <a href="http://foundation.zurb.com">
            <h4>Foundation</h4>
            <p>We developed the most advanced responsive front-end framework in the world and made it free-for-all.</p>
            <span>Discover Foundation →</span>
          </a>
        </div>
        <div class="show-on-phones"><br><br></div>
        <div class="three columns property" id="apps">
          <a href="http://zurb.com/apps">
            <h4>ZURB<span class="apps">apps</span></h4>
            <p>A powerful design suite that will help you prototype, iterate and collect feedback on your product design.</p>
            <span>Get Started →</span>
          </a>
        </div>
        
        <div class="show-on-phones"><br><br></div>
        <div class="three columns property" id="expo">
          <a href="http://zurb.com/expo">
            <h4>Expo</h4>
            <p>We think anyone can design great products. We'll share our ideas, thoughts and design resources to show you how to do it.</p>
            <span>Learn More →</span>
          </a>
        </div>
      </div>
    </div>    
  </div>
</div>
<!-- end megadrop -->


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
            
            <div id="site-banner" class="row">
                <img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="<?php _e('Banner', 'smart_foundation'); ?>" />  
            </div>          
            
            <nav class="main-navigation row hide-for-small" role="navigation">
                <?php wp_nav_menu( 
                        array(
                            'theme_location'    => 'main-menu', 
                            'menu'              => 'Main Menu', 
                            'menu_class'        => 'menu large-12 columns' )); ?>
            </nav>
            
            <div id="main" class="row">