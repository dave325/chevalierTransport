<?php get_header(); ?><!-- created on page 103 -->




<section id="content" class="col-md-8 col-lg-8">



    <!-- START The Loop page 132 -->
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

            <article class="postcol-md-offset-2 col-lg-offset-2" id="post-<?php the_ID(); ?>"><!-- Post Class page 248 -->
                    <h1 class="text-shad-lt"><?php the_title(); ?></h1><!-- modified page 133 -->
                    <?php if (has_post_thumbnail()) {?>
						<?php the_post_thumbnail('blog-thumbnail');
					}?>
                    <p class="meta">Posted <time datetime="<?php the_time('Y-m-d'); ?>" pubdate="pubdate"><?php the_time('M n'); ?></time> <a href="#comments" title="<?php the_title(); ?>"><?php comments_number('0comments', 'only 1 comment', '% comments'); ?></a></p><!-- modified page 133 -->


                <div class="content"><!-- modified page 135 -->
                    <?php the_content(); ?>


                </div><!-- content -->

        <!-- END The Loop page 132 -->

 <?php endwhile; ?>
        <?php endif; ?>


    </section>


    <!-- Start get_sidebar() -->	
    <?php get_sidebar(); ?> <!-- created on page 126 -->
    <!-- End get_sidebar() -->	



    <?php get_footer(); ?><!-- created on page 113 -->