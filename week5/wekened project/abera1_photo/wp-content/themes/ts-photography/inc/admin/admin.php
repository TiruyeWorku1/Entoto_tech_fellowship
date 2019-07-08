<?php
//about theme info
add_action( 'admin_menu', 'ts_photography_abouttheme' );
function ts_photography_abouttheme() {    	
	add_theme_page( esc_html__('About Photography Theme', 'ts-photography'), esc_html__('About Photography Theme', 'ts-photography'), 'edit_theme_options', 'ts_photography_guide', 'ts_photography_mostrar_guide');   
}

// Add a Custom CSS file to WP Admin Area
function ts_photography_admin_theme_style() {
   wp_enqueue_style('custom-admin-style', get_template_directory_uri() .'/inc/admin/admin.css');
}
add_action('admin_enqueue_scripts', 'ts_photography_admin_theme_style');

//guidline for about theme
function ts_photography_mostrar_guide() {
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
?>
 <div class="wrapper-info">
	 <div class="header">
	 	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/admin/images/logo.png" alt="" />
 		<p><?php esc_html_e('Most of our outstanding theme is elegant, responsive, multifunctional, SEO friendly has amazing features and functionalities that make them highly demanding for designers and bloggers, who ought to excel in web development domain. Our Themeshopy has got everything that an individual and group need to be successful in their venture.', 'ts-photography'); ?></p>
		<div class="main-button">
			<a href="<?php echo esc_url( TS_PHOTOGRAPHY_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Buy Now', 'ts-photography'); ?></a>
			<a href="<?php echo esc_url( TS_PHOTOGRAPHY_LIVE_DEMO ); ?>"><?php esc_html_e('Live Demo', 'ts-photography'); ?></a>
			<a href="<?php echo esc_url( TS_PHOTOGRAPHY_PRO_DOC ); ?>" target="_blank"><?php esc_html_e('Pro Documentation', 'ts-photography'); ?></a>
		</div>
	</div>
	<div class="button-bg">
	<button class="tablink" onclick="openPage('Home', this, '')"><?php esc_html_e('Lite Theme Setup', 'ts-photography'); ?></button>
	<button class="tablink" onclick="openPage('Contact', this, '')"><?php esc_html_e('Premium Theme info', 'ts-photography'); ?></button>
	</div>
	<div id="Home" class="tabcontent tab1">
	  	<h3><?php esc_html_e('How to set up homepage', 'ts-photography'); ?></h3>
	  	<div class="sec-button">
			<a href="<?php echo esc_url( TS_PHOTOGRAPHY_FREE_DOC ); ?>" target="_blank"><?php esc_html_e('Documentation', 'ts-photography'); ?></a>
			<a href="<?php echo esc_url( TS_PHOTOGRAPHY_CONTACT ); ?>"><?php esc_html_e('Support', 'ts-photography'); ?></a>
			<a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e('Start Customizing', 'ts-photography'); ?></a>
		</div>
	  	<div class="documentation">
		  	<div class="image-docs">
				<ul>
					<li> <b><?php esc_html_e('Step 1.', 'ts-photography'); ?></b> <?php esc_html_e('Follow these instructions to setup Home page.', 'ts-photography'); ?></li>
					<li> <b><?php esc_html_e('Step 2.', 'ts-photography'); ?></b> <?php esc_html_e(' Create Page to set template: Go to Dashboard >> Pages >> Add New Page.Label it "home" or anything as you wish. Then select template "home-page" from template dropdown.', 'ts-photography'); ?></li>
				</ul>
		  	</div>
		  	<div class="doc-image">
		  		<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/admin/images/home-page-template.png" alt="" />	
		  	</div>
		  	<div class="clearfixed">
				<div class="doc-image1">
					<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/admin/images/set-front-page.png" alt="" />	
			    </div>
			    <div class="image-docs1">
				    <ul>
						<li> <b><?php esc_html_e('Step 3.', 'ts-photography'); ?></b> <?php esc_html_e('Set the front page: Go to Setting >> Reading >> Set the front page display static page to home page', 'ts-photography'); ?></li>
					</ul>
			  	</div>
			</div>
		</div>
	</div>

	<div id="Contact" class="tabcontent">
	 	<h3><?php esc_html_e('Premium Theme Info', 'ts-photography'); ?></h3>
	  	<div class="sec-button">
			<a href="<?php echo esc_url( TS_PHOTOGRAPHY_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Buy Now', 'ts-photography'); ?></a>
			<a href="<?php echo esc_url( TS_PHOTOGRAPHY_LIVE_DEMO ); ?>"><?php esc_html_e('Live Demo', 'ts-photography'); ?></a>
			<a href="<?php echo esc_url( TS_PHOTOGRAPHY_PRO_DOC ); ?>" target="_blank"><?php esc_html_e('Pro Documentation', 'ts-photography'); ?></a>
		</div>
	  	<div class="features-section">
	  		<div class="col-4">
	  			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/admin/images/screenshot.jpg" alt="" />
	  			<p><?php esc_html_e( 'Bring out the best in you with our Premium photography WordPress theme. The class apart designs and easy to edit WordPress templates for photographers helps you focus majorly to build up your portfolio. You can invest more time on gathering the best clicks than making a website with our ready to use Photography WordPress templates. How your photographs are displayed defines a lot about you and your work. Theme Shopy understands it and therefore we bring you a fully Customizable WordPress Photography Template to portray your work in an elegant and attractive manner. This easy to use Premium Photography WordPress theme is built in such a way that it automatically fits the view of any device in which the website is opened with a right resolution focusing the best the website has to offer.', 'ts-photography' ); ?></p>
	  		</div>
	  		<div class="col-4">
	  			<h4><?php esc_html_e( 'Theme Features', 'ts-photography' ); ?></h4>
				<ul>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Theme options using customizer API', 'ts-photography' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Responsive Design', 'ts-photography' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Favicon, Logo, Title and Tagline Customization', 'ts-photography' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Advanced Color Options and Color Pallets', 'ts-photography' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( '100+ Font Family Options', 'ts-photography' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Advance Slider with a Number of Slider Images Upload Option Available.', 'ts-photography' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Support to Add Custom CSS/JS', 'ts-photography' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'SEO Friendly', 'ts-photography' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Pagination Option', 'ts-photography' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Compatible With Different WordPress Famous Plugins Like Contact Form 7 and Woocommerce', 'ts-photography' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Enable-Disable Options on All Sections', 'ts-photography' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Footer Customization Options', 'ts-photography' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Fully Integrated with Font Awesome Icon', 'ts-photography' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Short Codes', 'ts-photography' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Background Image Option', 'ts-photography' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Custom Page Templates', 'ts-photography' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Featured Product Images, HD Images and Video display', 'ts-photography' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Allow To Set Site Title, Tagline, Logo', 'ts-photography' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Make Post About Firms News, Events, Achievements and So On.', 'ts-photography' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Left and Right Sidebar', 'ts-photography' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Sticky Post & Comment Threads', 'ts-photography' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Parallax Image-Background Section', 'ts-photography' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Custom Backgrounds, Colors, Headers, Logo & Menu', 'ts-photography' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Customizable Home Page', 'ts-photography' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Full-Width Template', 'ts-photography' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Gallery, Banner & Post Type Plugin Functionality', 'ts-photography' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Advance Social Media Feature', 'ts-photography' ); ?></li>
				</ul>
			</div>
		</div>
	</div>

<script type="text/javascript">
	function openPage(pageName,elmnt,color) {
	    var i, tabcontent, tablinks;
		    tabcontent = document.getElementsByClassName("tabcontent");
		    for (i = 0; i < tabcontent.length; i++) {
		        tabcontent[i].style.display = "none";
	    }
	    tablinks = document.getElementsByClassName("tablink");
		    for (i = 0; i < tablinks.length; i++) {
		        tablinks[i].style.backgroundColor = "";
	    }
	    document.getElementById(pageName).style.display = "block";
	    elmnt.style.backgroundColor = color;

	}
</script>
<?php } ?>