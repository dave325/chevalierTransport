<?php get_header()?>
<?php if (have_posts()) : while (have_posts()) : the_post()?>
	<?php if(is_page('our-story')){?>
	<section id="our-story" class="col-md-9 col-lg-9">
	<?php the_content();?>
	</section>
	<?php get_sidebar();?>
	<?php }?>
	<?php if(is_page('FAQ')){?>
	<section id="faq" class="col-md-9 col-lg-9">
	<?php the_content();?>
	</section>
	<?php get_sidebar();?>
	<?php }?>
	<?php if(is_page('contact-us')){?>
	<section class="col-md-9 col-lg-9">
	<?php the_content();?>
	</section>
	<?php get_sidebar();?>
	<?php }?>
	<?php if(is_page('services')){?>
	<section class="col-md-9 col-lg-9">
	<?php the_content();?>
	</section>
	<?php get_sidebar();?>
	<?php }?>
<?php endwhile;?>
<?php endif;?>
<?php get_footer();?>