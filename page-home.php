<?php
/*
 * Template Name: Chevalier Home Page
 */
get_header ();
?>

<?php while (have_posts()) : the_post()?>
		<?php the_content();?>
<?php endwhile;?>
<?php get_sidebar('home');?>
<section class="col-md-7 col-lg-7">
<?php
$the_slug = 'home-content';
$args = array (
		'name' => $the_slug 
);
$my_posts = get_posts ( $args );
if ($my_posts) :
	echo $my_posts [0]->post_content;


endif;
?>

</section>
<?php get_footer();?>


.