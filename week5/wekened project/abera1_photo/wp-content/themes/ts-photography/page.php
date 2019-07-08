<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package ts-photography
 */

get_header(); ?>

<?php do_action( 'ts_photography_page_header' ); ?>

<?php while ( have_posts() ) : the_post(); ?>
    <div id="content-ts" class="container">
        <div class="middle-align">
            <img src="<?php the_post_thumbnail_url('full'); ?>" >
            <h3><?php the_title(); ?></h3>
            <?php the_content();?>
            <?php
                //If comments are open or we have at least one comment, load up the comment template
                if ( comments_open() || '0' != get_comments_number() )
                    comments_template();
            ?>
            <div class="clear"></div>    
        </div>
    </div>
<?php endwhile; // end of the loop. ?>  

<?php do_action( 'ts_photography_page_footer' ); ?>

<?php get_footer(); ?>