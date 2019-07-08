<?php
/**
 * Template Name: Page with Right Sidebar
**/

get_header(); ?>

<?php do_action( 'ts_photography_pageright_header' ); ?>

<div class="container">
    <div class="middle-align row">        
        <div id="content-ts" class="col-md-8">
            <?php while ( have_posts() ) : the_post(); ?> 
            <img src="<?php the_post_thumbnail_url('full'); ?>" >
            <h3><?php the_title(); ?></h3>
            <?php the_content();?>
            <?php
                //If comments are open or we have at least one comment, load up the comment template
                if ( comments_open() || '0' != get_comments_number() )
                    comments_template();
            ?> 
            <?php endwhile; // end of the loop. ?>
        </div>
        <div id="sidebar" class="col-md-4">
            <?php dynamic_sidebar('sidebar-2'); ?>
        </div>
    </div>
</div>

<?php do_action( 'ts_photography_pageright_header' ); ?>

<?php get_footer(); ?>