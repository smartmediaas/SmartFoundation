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
		'main-menu' => 'Hovedmeny', // registers the menu in the WordPress admin menu editor
    	'top-bar' => 'Toppmeny'
	) );

	// custom background and default background color.
	add_theme_support( 'custom-background', array(
		'default-color' => 'e6e6e6',
	) );

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

// #primary classes. Checking if sidebar is active and adding new classes
function primary_class($add_classes=''){
	if(is_page_template( 'template-fullwidth.php' ) || is_attachment() || ! is_active_sidebar('sidebar-1')){
		$smart_return = 'large-12 columns';
	}else{
		$smart_return = 'large-8 columns';
	}
	if($add_classes) $smart_return .= ' '.$add_classes;
	
	echo 'class="'.$smart_return.'"';
}

// #secondary classes. Checking if sidebar is active and adding new classes
function secondary_class($add_classes=''){
	if(is_page_template( 'template-fullwidth.php' ) || is_attachment() || ! is_active_sidebar('sidebar-1')){
		$smart_return = 'style="display: none;"';
	}else{
		$smart_return = 'large-4 columns';
		if($add_classes) $smart_return .= ' '.$add_classes;
		$smart_return = 'class="'.$smart_return.'"';
	}
	
	echo $smart_return;
}

// list-post classes. Checking if post has thumbnail
function list_class($arg='', $add_classes=''){
    global $post;
    if(has_post_thumbnail($post->ID) && ($arg==='image')){
        $smart_return = 'class="large-4 small-4 columns"';
        echo $smart_return;
    }elseif(has_post_thumbnail($post->ID) && ($arg==='content')){
        $smart_return = 'class="large-8 small-8 columns"';
        echo $smart_return;
    }elseif(has_post_thumbnail($post->ID) && ($arg=='')){
        $smart_return = 'row';
        return $smart_return;
    }else{
        return false;
    }
    return;
}

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
        'name' => __( 'Sidemarg', 'smart_foundation' ),
        'id' => 'sidebar-1',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '<hr /></aside>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ) );
   
    register_sidebar( array(
        'name' => __( 'Venstre panel', 'smart_foundation' ),
        'id' => 'panel-left',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ) );


    register_sidebar( array(
        'name' => __( 'Høyre panel', 'smart_foundation' ),
        'id' => 'panel-right',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ) );

//    register_sidebar( array(
//        'name' => __( 'Hovedside', 'smart_foundation' ),
//        'id' => 'sidebar-2',
//        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
//        'after_widget' => '</aside>',
//        'before_title' => '<h4 class="widget-title">',
//        'after_title' => '</h4>',
//    ) );
    
    register_sidebar( array(
        'name' => __( 'Bunnområde 1', 'smart_foundation' ),
        'id' => 'footer-1',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ) );
	
	register_sidebar( array(
        'name' => __( 'Bunnområde 2', 'smart_foundation' ),
        'id' => 'footer-2',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ) );
	
	register_sidebar( array(
        'name' => __( 'Bunnområde 3', 'smart_foundation' ),
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
	//wp_enqueue_style( 'jmobilecss', 'http://code.jquery.com/mobile/1.3.0/jquery.mobile.structure-1.3.0.min.css' );
	wp_enqueue_style( 'jmobilecss', get_template_directory_uri() . '/css/jquery.mobile.custom.structure.min.css' );
	wp_enqueue_style( 'normalize', get_template_directory_uri() . '/css/normalize.css' );
	wp_enqueue_style( 'foundationstyle', get_template_directory_uri() . '/css/foundation.css' );
	wp_enqueue_style( 'stylesheet', get_bloginfo( 'stylesheet_url' ), array( 'normalize', 'foundationstyle') );
	
	wp_deregister_script('jquery');
	wp_enqueue_script('jquery', 'http://code.jquery.com/jquery-latest.min.js');
	wp_enqueue_script('jmobile', get_template_directory_uri() . '/js/jmobile/jquery.mobile-1.3.0.js', array('jquery'));
	//wp_enqueue_script('jmobile', 'http://code.jquery.com/mobile/1.3.0/jquery.mobile-1.3.0.min.js', array('jquery'));
	wp_enqueue_script('modernizr', get_template_directory_uri() . '/js/vendor/custom.modernizr.js');
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