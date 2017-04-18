<?php
// filter title
function ddata_filter_wp_title( $currenttitle, $sep, $seplocal ) {
	//Grab the site name
	$site_name = get_bloginfo( 'name' );
	// Add the site name after the current page title
	$full_title = $site_name . $currenttitle;
	// If we are on the front_page or homepage append the description
	if ( is_front_page() || is_home() ) {
		//Grab the Site Description
		$site_desc = get_bloginfo( 'description' );
		//Append Site Description to title
		$full_title .= ' ' . $sep . ' ' . $site_desc;
	}
	return $full_title;
}
// Hook into 'wp_title'
add_filter( 'wp_title', 'ddata_filter_wp_title', 10, 3 );

// add support for thumbnail     
add_theme_support('post-thumbnails');
add_image_size('banner-image' , 1000, 150, true);
add_image_size('home-portfolio-image',150, 150, true );
add_image_size('portfolio-page', 250, 250, true);
add_image_size('blog-thumbnail' , 200, 200, true);


//Register Navigation Menus 
register_nav_menus(
		array(
			'upper-header-nav-menu' => 'Main Nav, Top of Header',
			'footer-nav-menu' => 'Footer Nav, Footer'
		));

//Register Sidebars
if (function_exists('register_sidebar')){
$ddata_home_sidebar = array(
		'name' =>'Home',
		'id' => 'home',
		'description' => 'The sidebar that will show next to the main content body home page',
		'before_widget' => '<article class="widget col-md-3 col-lg-3 col-md-offset-1 col-lg-offset-1">',
		'after_widget' => '</article>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>'
		);
	$ddata_content_sidebar = array(
			'name' =>'Content Sidebar',
			'id' => 'content-sidebar',
			'description' => 'The sidebar that will show next to the main content body',
			'before_widget' => '<article class="widget col-md-3 col-lg-3">',
			'after_widget' => '</article>',
			'before_title' => '<h4 class="widgettitle">',
			'after_title' => '</h4>'
	);

	register_sidebar($ddata_content_sidebar);
	register_sidebar($ddata_home_sidebar);
}
function ddataStyleIntegration(){
	wp_enqueue_style('bootstrap-stylesheet', get_template_directory_uri() . '/css/bootstrap.min.css', '' , '' , 'all');
	wp_enqueue_style('main-stylesheet', get_stylesheet_uri(), '' , '' , 'all');
	wp_enqueue_style('custom-font-2' ,'http://fonts.googleapis.com/css?family=Roboto+Condensed:400,300', '' , '' , 'all');
	wp_enqueue_style('custom-font-4', 'http://fonts.googleapis.com/css?family=Open+Sans:400,600', '' , '' , 'all' );
	wp_enqueue_style('custom-new-5', 'http://fonts.googleapis.com/css?family=Raleway', '' , '' , 'all');
};
add_action('wp_enqueue_scripts', 'ddataStyleIntegration');
function ddataScriptsIntegration (){
wp_register_script('home-page',  get_template_directory_uri() .'/scripts/home_page.js', array('jquery'));
wp_enqueue_script('jquery');
wp_enqueue_script('bootstrap-javascript', get_template_directory_uri() . '/scripts/bootstrap.min.js', array('jquery'));
wp_enqueue_script('home-page', get_template_directory_uri() .'/scripts/home_page.js', array('jquery'));
};
add_action('wp_enqueue_scripts', 'ddataScriptsIntegration');
/*
 * Custom walker to put correct classes on <a>'s for footer nav
 */
class footer_nav_walker extends Walker_Nav_Menu {
	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		global $wp_query;
		$indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent
		
		// depth dependent classes
		$depth_classes = array(
				( $depth == 0 ? 'main-menu-item' : 'sub-menu-item' ),
				( $depth >=2 ? 'sub-sub-menu-item' : '' ),
				( $depth % 2 ? 'menu-item-odd' : 'menu-item-even' ),
				'menu-item-depth-' . $depth
		);
		$depth_class_names = esc_attr( implode( ' ', $depth_classes ) );
		
		// passed classes
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );
		
		// build html
		$output .= $indent . '<li id="nav-menu-item-'. $item->ID . '" class="col-md-2 col-lg-2 ' . $depth_class_names . ' ' . $class_names . '">';
		
		// link attributes
		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
		$attributes .= ' class="menu-link ' . ( $depth > 0 ? 'sub-menu-link' : 'main-menu-link' ) . '"';
		
		$item_output = $args->before;
		$item_output .= '<a ' .  $attributes . '> ';
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output .= '</a>';
		$item_output .= $args->after;

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}

}