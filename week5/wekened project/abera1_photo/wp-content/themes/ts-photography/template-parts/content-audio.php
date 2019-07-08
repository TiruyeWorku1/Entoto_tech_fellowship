<?php
/**
 * The template part for displaying services
 *
 * @package ts-photography
 * @subpackage ts-photography
 * @since ts-photography 1.0
 */
?>  
<?php
	$content = apply_filters( 'the_content', get_the_content() );
	$audio   = false;

	// Only get audio from the content if a playlist isn't present.
	if ( false === strpos( $content, 'wp-playlist-script' ) ) {
		$audio = get_media_embedded_in_content( $content, array( 'audio' ) );
	}
?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
  <div class="page-box">
    <h4><?php the_title();?></h4>
    <hr>
    <span class="entry-date"><?php the_date(); ?></span>
    <div class="box-image">
      <?php
        if ( ! is_single() ) {

          // If not a single post, highlight the audio file.
          if ( ! empty( $audio ) ) {
            foreach ( $audio as $audio_html ) {
              echo '<div class="entry-audio">';
                echo $audio_html;
              echo '</div><!-- .entry-audio -->';
            }
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