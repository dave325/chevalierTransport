<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

<title><?php wp_title(' | '); ?></title>

<?php wp_head(); ?>
</head>
<body <?php body_class()?>>
	<div class="container-fluid col-sm-12 col-md-12 col-lg-12">
		<header class=" col-sm-12 col-md-12 col-lg-12">

			<div id="header-title" class=" col-sm-12 col-md-12 col=lg=12">


				<div id="logo" class="pull-left col-sm-2 col-md-2 col-lg-2">
					<img
						src="<?php echo get_template_directory_uri();?>/images/logo.jpg"
						alt="Chevalier Transport Logo" />
				</div>
				<div id="title-container"
					class="col-sm-8 col-md-8 col-lg-8 text-center">
			<?php
			$the_slug = 'chevalier-title';
			$args = array (
					'name' => $the_slug 
			);
			$my_posts = get_posts ( $args );
			if ($my_posts) :
				echo $my_posts [0]->post_content;
			

endif;
			?>
</div>
				<div id="telephone-image"
					class="pull-right col-sm-2 col-md-2 col-lg-2">
					<div class="pull-right">
						<p>Need Help?</p>
						<img
							src="<?php echo get_template_directory_uri(); ?>/images/phone_logo.gif">
					</div>
				</div>
			</div>

<?php
$ddata_upper_nav_menu = array (
		'theme-location' => 'upper-header-nav-menu',
		'container' => 'nav',
		'container_class' => 'col-sm-12 col-md-12 col-lg-12',
		'container_id' => 'upper-header-nav',
		'menu_class' => 'text-center'
		
);
?>
	<?php wp_nav_menu($ddata_upper_nav_menu);?>
	</header>