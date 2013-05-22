<?php
// setup function
function smart_foundation_setup(){
	
	//load_theme_textdomain( 'smart_foundation', get_template_directory() . '/languages' );

	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

	// add RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	// post formats.
	//add_theme_support( 'post-formats', array( 'aside', 'image', 'link', 'quote', 'status' ) );
	
	// add custom menus
	add_theme_support('menus');
	register_nav_menus( array(
		'main-menu' => __('Main Menu', 'smart_foundation'), // registers the menu in the WordPress admin menu editor
		'mobile-menu' => __('Mobile Menu', 'smart_foundation')
	) );

	// custom background and default background color.
	$defaults = array(
        'default-color'          => 'cccccc',
        'wp-head-callback'       => '_custom_background_cb',
    );
    add_theme_support( 'custom-background', $defaults );
    
    // custom header image.
    $args = array(
        'flex-width'    => true,
        'width'         => 1000,
        'flex-height'    => true,
        'height'        => 350,
        'default-image' => get_template_directory_uri() . '/images/standard-banner.jpg',
        );
    add_theme_support( 'custom-header', $args );
    
	// custom image size for featured images, displayed on "standard" posts.
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 596, 9999 ); // Unlimited height, soft crop
	//add_image_size( 'home-thumb', 290, 163 );
	//add_image_size( 'thumb', 350, 9999 ); //300 pixels wide (and unlimited height)
	
	 // Enable threaded comments
     if ( (!is_admin()) && is_singular() && comments_open() && get_option('thread_comments') ) wp_enqueue_script('comment-reply');
	 
	 	// Add language supports. Please note that Reverie Framework does not include language files.
	load_theme_textdomain('smart_foundation', get_template_directory() . '/language');

}

add_action( 'after_setup_theme', 'smart_foundation_setup' );

// clear function
function smart_clear(){
    echo '<div class="smart-clear" style="clear:both;"></div>';
}

// pagination function
function smart_pagination($pages = '', $range = 2)
{  
	$showitems = ($range * 2)+1;  
	
	global $paged;
	if(empty($paged)) $paged = 1;
	
	if($pages == ''){
		global $wp_query;
		$pages = $wp_query->max_num_pages;
		if(!$pages){
			$pages = 1;
		}
	}   
	
	if(1 != $pages){
	echo '<ul class="pagination">';
	if($paged > 2 && $paged > $range+1){
		echo '<li class="arrow"><a href="'.get_pagenum_link(1).'">&laquo;</a></li>';	
	}elseif($showitems < $pages){
		echo '<li class="arrow unavailable"><a href="">&laquo;</a></li>';
	}
	if($paged > 1){
		echo '<li class="arrow"><a href="'.get_pagenum_link($paged - 1).'">&lsaquo;</a></li>';
	}elseif($showitems < $pages){
		echo '<li class="arrow unavailable"><a href="">&lsaquo;</a></li>';	
	}
	
	for ($i=1; $i <= $pages; $i++){
		if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )){
			echo ($paged == $i)? '<li class="current"><a href="">'.$i.'</a></li>':'<li><a href="'.get_pagenum_link($i).'">'.$i.'</a></li>';
		}
	}
	
	if ($paged < $pages){
		echo '<li class="arrow"><a href="'.get_pagenum_link($paged + 1).'">&rsaquo;</a>';
	}elseif($showitems < $pages){
		echo '<li class="arrow unavailable"><a href="">&rsaquo;</a>';
	}
	if ($paged < $pages-1 &&  $paged+$range-1 < $pages){
		echo '<li class="arrow"><a href="'.get_pagenum_link($pages).'">&raquo;</a></li>';
	}elseif($showitems < $pages){
		echo '<li class="arrow unavailable"><a href="">&raquo;</a></li>';
	}
	 echo "</ul>\n";
	}
}

// image function 
function smart_img($imgName, $imgParam=''){
    
    if($imgParam == 'url'){
        $imgReturn = get_bloginfo('stylesheet_directory').'/images/'.$imgName;
    }elseif($imgParam){
        $imgReturn = '<img id="'.$imgParam.'" src="'.get_bloginfo('stylesheet_directory').'/images/'.$imgName.'" alt="'.$imgName.'" />';
    }else{
        $imgReturn = '<img src="'.get_bloginfo('stylesheet_directory').'/images/'.$imgName.'" alt="'.$imgName.'" />';
    }
    echo $imgReturn;

}

// register sidebars function
function smart_widgets_init(){
    	
    register_sidebar( array(
        'name' => __( 'Sidebar', 'smart_foundation' ),
        'id' => 'sidebar-1',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '<hr /></aside>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ) );
   
    register_sidebar( array(
        'name' => __( 'Left Panel', 'smart_foundation' ),
        'id' => 'panel-left',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ) );
/*
    register_sidebar( array(
        'name' => __( 'Front Page', 'smart_foundation' ),
        'id' => 'sidebar-2',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ) );
*/
    
    register_sidebar( array(
        'name' => __( 'Footer 1', 'smart_foundation' ),
        'id' => 'footer-1',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ) );
	
	register_sidebar( array(
        'name' => __( 'Footer 2', 'smart_foundation' ),
        'id' => 'footer-2',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ) );
	
	register_sidebar( array(
        'name' => __( 'Footer 3', 'smart_foundation' ),
        'id' => 'footer-3',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ) );

}
add_filter('widgets_init', 'smart_widgets_init');


// enqueue scripts and styles
function smart_enqueue_method() {
	// styles
	wp_enqueue_style( 'normalize', get_template_directory_uri() . '/css/normalize.css' );
	wp_enqueue_style( 'foundationstyle', get_template_directory_uri() . '/css/foundation.css' );
	wp_enqueue_style( 'foundicons', get_template_directory_uri() . '/css/general_foundicons.css' );
	wp_enqueue_style( 'foundiconsie', get_template_directory_uri() . '/css/general_foundicons_ie7.css' );
	wp_enqueue_style( 'responsive-nav', get_template_directory_uri() . '/css/responsive-nav.css' );
	wp_enqueue_style( 'stylesheet', get_bloginfo( 'stylesheet_url' ), array( 'normalize', 'foundationstyle') );
	
	// scripts
	wp_enqueue_script('jquery');
	wp_enqueue_script('modernizr', get_template_directory_uri() . '/js/custom.modernizr.js');
	wp_enqueue_script('responsive-nav-js', get_template_directory_uri() . '/js/responsive-nav.min.js', array('jquery'));
	wp_enqueue_script('foundation', get_template_directory_uri() . '/js/foundation.min.js', array('jquery'), false, true);
}
add_action('wp_enqueue_scripts', 'smart_enqueue_method');


// register post-types

// advanced custom fields options pages
//if(function_exists("register_options_page")){
//    register_options_page('Header');
//    register_options_page('Footer');
//}

?>