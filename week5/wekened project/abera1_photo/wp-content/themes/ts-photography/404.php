<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package ts-photography
 */

get_header(); ?>

<div id="content-ts">
	<div class="container middle-align">
		<h1><?php printf( '<strong>%s</strong> %s', esc_html__( '404', 'ts-photography' ), esc_html__( 'Not Found', 'ts-photography' ) ) ?></h1>
		<p class="text-404"><?php esc_html_e( 'Looks like you have taken a wrong turn&hellip', 'ts-photography' ); ?></p>
		<p class="text-404"><?php esc_html_e( 'Dont worry&hellip it happens to the best of us.', 'ts-photography' ); ?></p>
		<div class="read-moresec">
    		<a href="<?php echo esc_url(home_url() );?>" class="button hvr-sweep-to-right"><?php esc_html_e( 'Back to Home Page', 'ts-photography' ); ?></a>
		</div>
		<div class="clearfix"></div>
	</div>
</div>

<?php get_footer(); ?>