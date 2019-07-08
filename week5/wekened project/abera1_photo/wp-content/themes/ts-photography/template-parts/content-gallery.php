<?php
/**
 * The template part for displaying services
 *
 * @package ts-photography
 * @subpackage ts-photography
 * @since ts-photography 1.0
 */
?> 
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
    <div class="page-box">
        <h4><?php the_title();?></h4>
        <hr>
        <span class="entry-date"><?php the_date(); ?></span>
        <div class="box-image">
            <?php
                if ( ! is_single() ) {

                    // If not a single post, highlight the gallery.
                    if ( get_post_gallery() ) {
                      echo '<div class="entry-gallery">';
                        echo get_post_gallery();
                      echo '</div>';
                    };
                };
            ?>
        </div>
        <p><?php the_excerpt();?></p>
        <hr class="con-hr">
        <div class="content-bttn">     
            <a href="<?php the_permalink();?>" class="blogbutton-small hvr-sweep-to-right" title="<?php esc_attr_e( 'Read More', 'ts-photography' ); ?>"><?php esc_html_e('Read More','ts-photography'); ?></a>
        </div>
    </div>
</div>
