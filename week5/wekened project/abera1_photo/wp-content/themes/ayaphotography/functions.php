<?php
/**
 * ayaphotography functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 */

if ( ! function_exists( 'ayaphotography_setup' ) ) :
	/**
	 * ayaphotography setup.
	 *
	 * Set up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support post thumbnails.
	 *
	 */
	function ayaphotography_setup() {

		/*
		 * Make theme available for translation.
		 *
		 * Translations can be filed in the /languages/ directory
		 *
		 * If you're building a theme based on ayaphotography, use a find and replace
		 * to change 'ayaphotography' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'ayaphotography', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

	

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		/*
		 * This theme styles the visual editor to resemble the theme style,
		 * specifically font, colors, and column width.
	 	 */
		add_editor_style( array( 'css/editor-style.css', 
								 get_template_directory_uri() . '/css/font-awesome.css',
								 ayaphotography_fonts_url()
						  ) );

		/*
		 * Set Custom Background
		 */				 
		add_theme_support( 'custom-background', array ('default-color'  => '#ffffff') );

		// Set the default content width.
		$GLOBALS['content_width'] = 900;

		// This theme uses wp_nav_menu() in header menu
		register_nav_menus( array(
			'primary'   => __( 'Primary Menu', 'ayaphotography' ),
		) );

		$defaults = array(
	        'flex-height' => false,
	        'flex-width'  => false,
	        'header-text' => array( 'site-title', 'site-description' ),
	    );
	    add_theme_support( 'custom-logo', $defaults );
	}
endif; // ayaphotography_setup
add_action( 'after_setup_theme', 'ayaphotography_setup' );

if ( ! function_exists( 'ayaphotography_load_scripts' ) ) :
	/**
	 * the main function to load scripts in the ayaphotography theme
	 * if you add a new load of script, style, etc. you can use that function
	 * instead of adding a new wp_enqueue_scripts action for it.
	 */
	function ayaphotography_load_scripts() {

		// load main stylesheet.
		wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.css', array( ) );
		wp_enqueue_style( 'animate-css', get_template_directory_uri() . '/css/animate.css', array( ) );
		wp_enqueue_style( 'ayaphotography-style', get_stylesheet_uri(), array() );
		
		wp_enqueue_style( 'ayaphotography-fonts', ayaphotography_fonts_url(), array(), null );
		
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
		
		// Load Utilities JS Script
		wp_enqueue_script( 'viewportchecker', get_template_directory_uri() . '/js/viewportchecker.js', array( 'jquery' ) );

		wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/js/modernizr.min.js', array( 'jquery' ) );

		wp_enqueue_script( 'classie', get_template_directory_uri() . '/js/classie.js', array( 'jquery', 'modernizr', ) );

		wp_enqueue_script( 'photostack', get_template_directory_uri() . '/js/photostack.js', array( 'jquery', 'classie', 'modernizr', ) );

		wp_enqueue_script( 'ayaphotography-utilities',
			get_template_directory_uri() . '/js/utilities.js',
			array( 'jquery', 'viewportchecker', 'photostack' ) );

		$data = array(
    		'loading_effect' => ( get_theme_mod('ayaphotography_animations_display', 1) == 1 ),
    	);
    	wp_localize_script('ayaphotography-utilities', 'ayaphotography_options', $data);

    	
	}
endif; // ayaphotography_load_scripts
add_action( 'wp_enqueue_scripts', 'ayaphotography_load_scripts' );

if ( ! function_exists( 'ayaphotography_widgets_init' ) ) :
	/**
	 *	widgets-init action handler. Used to register widgets and register widget areas
	 */
	function ayaphotography_widgets_init() {
		
		// Register Sidebar Widget.
		register_sidebar( array (
							'name'	 		 =>	 __( 'Sidebar Widget Area', 'ayaphotography'),
							'id'		 	 =>	 'sidebar-widget-area',
							'description'	 =>  __( 'The sidebar widget area', 'ayaphotography'),
							'before_widget'	 =>  '',
							'after_widget'	 =>  '',
							'before_title'	 =>  '<div class="sidebar-before-title"></div><h3 class="sidebar-title">',
							'after_title'	 =>  '</h3><div class="sidebar-after-title"></div>',
						) );

		/**
		 * Add Homepage Columns Widget areas
		 */
		register_sidebar( array (
								'name'			 =>  __( 'Homepage Column #1', 'ayaphotography' ),
								'id' 			 =>  'homepage-column-1-widget-area',
								'description'	 =>  __( 'The Homepage Column #1 widget area', 'ayaphotography' ),
								'before_widget'  =>  '',
								'after_widget'	 =>  '',
								'before_title'	 =>  '<h2 class="sidebar-title">',
								'after_title'	 =>  '</h2><div class="sidebar-after-title"></div>',
							) );
							
		register_sidebar( array (
								'name'			 =>  __( 'Homepage Column #2', 'ayaphotography' ),
								'id' 			 =>  'homepage-column-2-widget-area',
								'description'	 =>  __( 'The Homepage Column #2 widget area', 'ayaphotography' ),
								'before_widget'  =>  '',
								'after_widget'	 =>  '',
								'before_title'	 =>  '<h2 class="sidebar-title">',
								'after_title'	 =>  '</h2><div class="sidebar-after-title"></div>',
							) );

		register_sidebar( array (
								'name'			 =>  __( 'Homepage Column #3', 'ayaphotography' ),
								'id' 			 =>  'homepage-column-3-widget-area',
								'description'	 =>  __( 'The Homepage Column #3 widget area', 'ayaphotography' ),
								'before_widget'  =>  '',
								'after_widget'	 =>  '',
								'before_title'	 =>  '<h2 class="sidebar-title">',
								'after_title'	 =>  '</h2><div class="sidebar-after-title"></div>',
							) );

		// Register Footer Column #1
		register_sidebar( array (
								'name'			 =>  __( 'Footer Column #1', 'ayaphotography' ),
								'id' 			 =>  'footer-column-1-widget-area',
								'description'	 =>  __( 'The Footer Column #1 widget area', 'ayaphotography' ),
								'before_widget'  =>  '',
								'after_widget'	 =>  '',
								'before_title'	 =>  '<h2 class="footer-title">',
								'after_title'	 =>  '</h2><div class="footer-after-title"></div>',
							) );
		
		// Register Footer Column #2
		register_sidebar( array (
								'name'			 =>  __( 'Footer Column #2', 'ayaphotography' ),
								'id' 			 =>  'footer-column-2-widget-area',
								'description'	 =>  __( 'The Footer Column #2 widget area', 'ayaphotography' ),
								'before_widget'  =>  '',
								'after_widget'	 =>  '',
								'before_title'	 =>  '<h2 class="footer-title">',
								'after_title'	 =>  '</h2><div class="footer-after-title"></div>',
							) );
		
		// Register Footer Column #3
		register_sidebar( array (
								'name'			 =>  __( 'Footer Column #3', 'ayaphotography' ),
								'id' 			 =>  'footer-column-3-widget-area',
								'description'	 =>  __( 'The Footer Column #3 widget area', 'ayaphotography' ),
								'before_widget'  =>  '',
								'after_widget'	 =>  '',
								'before_title'	 =>  '<h2 class="footer-title">',
								'after_title'	 =>  '</h2><div class="footer-after-title"></div>',
							) );
	}
endif; // ayaphotography_widgets_init
add_action( 'widgets_init', 'ayaphotography_widgets_init' );

if ( ! function_exists( 'ayaphotography_fonts_url' ) ) :
	/**
	 *	Load google font url used in the ayaphotography theme
	 */
	function ayaphotography_fonts_url() {

	    $fonts_url = '';
	 
	    /* Translators: If there are characters in your language that are not
	    * supported by Alegreya, translate this to 'off'. Do not translate
	    * into your own language.
	    */
	    $questrial = _x( 'on', 'Alegreya font: on or off', 'ayaphotography' );

	    if ( 'off' !== $questrial ) {
	        $font_families = array();
	 
	        $font_families[] = 'Alegreya';
	 
	        $query_args = array(
	            'family' => urlencode( implode( '|', $font_families ) ),
	            'subset' => urlencode( 'latin,latin-ext' ),
	        );
	 
	        $fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );
	    }
	 
	    return $fonts_url;
	}
endif; // ayaphotography_fonts_url

if ( ! function_exists( 'ayaphotography_show_copyright_text' ) ) :
	/**
	 *	Displays the copyright text.
	 */
	function ayaphotography_show_copyright_text() {

		$footerText = get_theme_mod('ayaphotography_footer_copyright', null);

		if ( !empty( $footerText ) ) {

			echo esc_html( $footerText ) . ' | ';		
		}
	}
endif; // ayaphotography_show_copyright_text


if ( ! function_exists( 'ayaphotography_display_slider' ) ) :
	/**
	 * Displays the slider
	 */
	function ayaphotography_display_slider() { ?>

		<div class="slider-container" id="slider-container">
			<section id="photostack" class="photostack">
				<div>
					<?php
						// display slides
						for ( $i = 1; $i <= 5; ++$i ) {
						
							$defaultSlideImage = get_template_directory_uri().'/images/slider/' . $i .'.jpg';
							$slideImage = get_theme_mod( 'ayaphotography_slide'.$i.'_image', $defaultSlideImage );

							if ( !empty($slideImage) ) :

								$slideContent = get_theme_mod( 'ayaphotography_slide'.$i.'_content' );	
								$imageAlt = sprintf( esc_html__( 'Image %s', 'ayaphotography' ), $i );
					?>
								<figure>
									<img src="<?php echo esc_url( $slideImage ); ?>" alt="<?php echo esc_attr( $imageAlt ); ?>" />
									<figcaption>
										<div class="photostack-back">
											<?php echo $slideContent; ?>
										</div>
									</figcaption>
								</figure>
					<?php 	endif;

						} ?>
				</div>
			</section>
		</div><!-- #slider-container -->

	<?php  
	}
endif; // ayaphotography_display_slider

if ( ! function_exists( 'ayaphotography_custom_header_setup' ) ) :
  /**
   * Set up the WordPress core custom header feature.
   *
   * @uses ayaphotography_header_style()
   */
  function ayaphotography_custom_header_setup() {

  	add_theme_support( 'custom-header', array (
                         'default-image'          => '',
                         'flex-height'            => true,
                         'flex-width'             => true,
                         'uploads'                => true,
                         'width'                  => 900,
                         'height'                 => 100,
                         'default-text-color'     => '#434343',
                         'wp-head-callback'       => 'ayaphotography_header_style',
                      ) );
  }
endif; // ayaphotography_custom_header_setup
add_action( 'after_setup_theme', 'ayaphotography_custom_header_setup' );

if ( ! function_exists( 'ayaphotography_header_style' ) ) :

  /**
   * Styles the header image and text displayed on the blog.
   *
   * @see ayaphotography_custom_header_setup().
   */
  function ayaphotography_header_style() {

  	$header_text_color = get_header_textcolor();

      if ( ! has_header_image()
          && ( get_theme_support( 'custom-header', 'default-text-color' ) === $header_text_color
               || 'blank' === $header_text_color ) ) {

          return;
      }

      $headerImage = get_header_image();
  ?>
      <style id="ayaphotography-custom-header-styles" type="text/css">

          <?php if ( has_header_image() ) : ?>

                  #header-main-fixed {background-image: url("<?php echo esc_url( $headerImage ); ?>");}

          <?php endif; ?>

          <?php if ( get_theme_support( 'custom-header', 'default-text-color' ) !== $header_text_color
                      && 'blank' !== $header_text_color ) : ?>

                  #header-main-fixed, #header-main-fixed h1.entry-title {color: #<?php echo sanitize_hex_color_no_hash( $header_text_color ); ?>;}

          <?php endif; ?>
      </style>
  <?php
  }
endif; // End of ayaphotography_header_style.

if ( class_exists('WP_Customize_Section') ) {
	class ayaphotography_Customize_Section_Pro extends WP_Customize_Section {

		// The type of customize section being rendered.
		public $type = 'ayaphotography';

		// Custom button text to output.
		public $pro_text = '';

		// Custom pro button URL.
		public $pro_url = '';

		// Add custom parameters to pass to the JS via JSON.
		public function json() {
			$json = parent::json();

			$json['pro_text'] = $this->pro_text;
			$json['pro_url']  = esc_url( $this->pro_url );

			return $json;
		}

		// Outputs the template
		protected function render_template() { ?>

			<li id="accordion-section-{{ data.id }}" class="accordion-section control-section control-section-{{ data.type }} cannot-expand">

				<h3 class="accordion-section-title">
					{{ data.title }}

					<# if ( data.pro_text && data.pro_url ) { #>
						<a href="{{ data.pro_url }}" class="button button-primary alignright" target="_blank">{{ data.pro_text }}</a>
					<# } #>
				</h3>
			</li>
		<?php }
	}
}

/**
 * Singleton class for handling the theme's customizer integration.
 */
final class ayaphotography_Customize {

	// Returns the instance.
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	// Constructor method.
	private function __construct() {}

	// Sets up initial actions.
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	// Sets up the customizer sections.
	public function sections( $manager ) {

		// Load custom sections.

		// Register custom section types.
		$manager->register_section_type( 'ayaphotography_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new ayaphotography_Customize_Section_Pro(
				$manager,
				'ayaphotography',
				array(
					'title'    => esc_html__( 'AyaPhotographyPro', 'ayaphotography' ),
					'pro_text' => esc_html__( 'Upgrade to Pro', 'ayaphotography' ),
					'pro_url'  => esc_url( 'https://ayatemplates.com/product/ayaphotographypro' )
				)
			)
		);
	}

	// Loads theme customizer CSS.
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'ayaphotography-customize-controls', trailingslashit( get_template_directory_uri() ) . 'js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'ayaphotography-customize-controls', trailingslashit( get_template_directory_uri() ) . 'css/customize-controls.css' );
	}
}

// Doing this customizer thang!
ayaphotography_Customize::get_instance();

if ( ! function_exists( 'ayaphotography_customize_register' ) ) :
	/**
	 * Add postMessage support for site title and description for the Theme Customizer.
	 *
	 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
	 */
	function ayaphotography_customize_register( $wp_customize ) {

		/**
		 * Add Slider Section
		 */
		$wp_customize->add_section(
			'ayaphotography_slider_section',
			array(
				'title'       => __( 'Slider', 'ayaphotography' ),
				'capability'  => 'edit_theme_options',
			)
		);

		// Add display slider option
		$wp_customize->add_setting(
				'ayaphotography_slider_display',
				array(
						'default'           => 0,
						'sanitize_callback' => 'ayaphotography_sanitize_checkbox',
				)
		);

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ayaphotography_slider_display',
								array(
									'label'          => __( 'Display Slider on a Static Front Page', 'ayaphotography' ),
									'section'        => 'ayaphotography_slider_section',
									'settings'       => 'ayaphotography_slider_display',
									'type'           => 'checkbox',
								)
							)
		);
		
		// Add slide 1 content
		$wp_customize->add_setting(
			'ayaphotography_slide1_content',
			array(
			    'sanitize_callback' => 'ayaphotography_sanitize_html',
			)
		);

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ayaphotography_slide1_content',
	        array(
	            'label'          => __( 'Slide #1 Content', 'ayaphotography' ),
	            'section'        => 'ayaphotography_slider_section',
	            'settings'       => 'ayaphotography_slide1_content',
	            'type'           => 'textarea',
	            )
	        )
		);
		
		// Add slide 1 background image
		$wp_customize->add_setting( 'ayaphotography_slide1_image',
			array(
				'default' => get_template_directory_uri().'/images/slider/' . '1.jpg',
	    		'sanitize_callback' => 'ayaphotography_sanitize_url',
			)
		);

	    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'ayaphotography_slide1_image',
				array(
					'label'   	 => __( 'Slide 1 Image (Recommended Size: 240px x 240px)', 'ayaphotography' ),
					'section' 	 => 'ayaphotography_slider_section',
					'settings'   => 'ayaphotography_slide1_image',
				) 
			)
		);
		
		// Add slide 2 content
		$wp_customize->add_setting(
			'ayaphotography_slide2_content',
			array(
			    'sanitize_callback' => 'ayaphotography_sanitize_html',
			)
		);

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ayaphotography_slide2_content',
	        array(
	            'label'          => __( 'Slide #2 Content', 'ayaphotography' ),
	            'section'        => 'ayaphotography_slider_section',
	            'settings'       => 'ayaphotography_slide2_content',
	            'type'           => 'textarea',
	            )
	        )
		);
		
		// Add slide 2 background image
		$wp_customize->add_setting( 'ayaphotography_slide2_image',
			array(
				'default' => get_template_directory_uri().'/images/slider/' . '2.jpg',
	    		'sanitize_callback' => 'ayaphotography_sanitize_url',
			)
		);

	    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'ayaphotography_slide2_image',
				array(
					'label'   	 => __( 'Slide 2 Image (Recommended Size: 240px x 240px)', 'ayaphotography' ),
					'section' 	 => 'ayaphotography_slider_section',
					'settings'   => 'ayaphotography_slide2_image',
				) 
			)
		);
		
		// Add slide 3 content
		$wp_customize->add_setting(
			'ayaphotography_slide3_content',
			array(
			    'sanitize_callback' => 'ayaphotography_sanitize_html',
			)
		);

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ayaphotography_slide3_content',
	        array(
	            'label'          => __( 'Slide #3 Content', 'ayaphotography' ),
	            'section'        => 'ayaphotography_slider_section',
	            'settings'       => 'ayaphotography_slide3_content',
	            'type'           => 'textarea',
	            )
	        )
		);
		
		// Add slide 3 background image
		$wp_customize->add_setting( 'ayaphotography_slide3_image',
			array(
				'default' => get_template_directory_uri().'/images/slider/' . '3.jpg',
	    		'sanitize_callback' => 'ayaphotography_sanitize_url',
			)
		);

	    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'ayaphotography_slide3_image',
				array(
					'label'   	 => __( 'Slide 3 Image (Recommended Size: 240px x 240px)', 'ayaphotography' ),
					'section' 	 => 'ayaphotography_slider_section',
					'settings'   => 'ayaphotography_slide3_image',
				) 
			)
		);

		// Add slide 4 content
		$wp_customize->add_setting(
			'ayaphotography_slide4_content',
			array(
			    'sanitize_callback' => 'ayaphotography_sanitize_html',
			)
		);

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ayaphotography_slide4_content',
	        array(
	            'label'          => __( 'Slide #4 Content', 'ayaphotography' ),
	            'section'        => 'ayaphotography_slider_section',
	            'settings'       => 'ayaphotography_slide4_content',
	            'type'           => 'textarea',
	            )
	        )
		);
		
		// Add slide 4 background image
		$wp_customize->add_setting( 'ayaphotography_slide4_image',
			array(
				'default' => get_template_directory_uri().'/images/slider/' . '4.jpg',
	    		'sanitize_callback' => 'ayaphotography_sanitize_url',
			)
		);

	    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'ayaphotography_slide4_image',
				array(
					'label'   	 => __( 'Slide 4 Image (Recommended Size: 240px x 240px)', 'ayaphotography' ),
					'section' 	 => 'ayaphotography_slider_section',
					'settings'   => 'ayaphotography_slide4_image',
				) 
			)
		);

		// Add slide 5 content
		$wp_customize->add_setting(
			'ayaphotography_slide5_content',
			array(
			    'sanitize_callback' => 'ayaphotography_sanitize_html',
			)
		);

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ayaphotography_slide5_content',
	        array(
	            'label'          => __( 'Slide #5 Content', 'ayaphotography' ),
	            'section'        => 'ayaphotography_slider_section',
	            'settings'       => 'ayaphotography_slide5_content',
	            'type'           => 'textarea',
	            )
	        )
		);
		
		// Add slide 5 background image
		$wp_customize->add_setting( 'ayaphotography_slide5_image',
			array(
				'default' => get_template_directory_uri().'/images/slider/' . '5.jpg',
	    		'sanitize_callback' => 'ayaphotography_sanitize_url',
			)
		);

	    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'ayaphotography_slide5_image',
				array(
					'label'   	 => __( 'Slide 5 Image (Recommended Size: 240px x 240px)', 'ayaphotography' ),
					'section' 	 => 'ayaphotography_slider_section',
					'settings'   => 'ayaphotography_slide5_image',
				) 
			)
		);

		/**
		 * Add Footer Section
		 */
		$wp_customize->add_section(
			'ayaphotography_footer_section',
			array(
				'title'       => __( 'Footer', 'ayaphotography' ),
				'capability'  => 'edit_theme_options',
			)
		);
		
		// Add Footer Copyright Text
		$wp_customize->add_setting(
			'ayaphotography_footer_copyright',
			array(
			    'default'           => '',
			    'sanitize_callback' => 'sanitize_text_field',
			)
		);

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ayaphotography_footer_copyright',
	        array(
	            'label'          => __( 'Copyright Text', 'ayaphotography' ),
	            'section'        => 'ayaphotography_footer_section',
	            'settings'       => 'ayaphotography_footer_copyright',
	            'type'           => 'text',
	            )
	        )
		);

		/**
		 * Add Animations Section
		 */
		$wp_customize->add_section(
			'ayaphotography_animations_display',
			array(
				'title'       => __( 'Animations', 'ayaphotography' ),
				'capability'  => 'edit_theme_options',
			)
		);

		// Add display Animations option
		$wp_customize->add_setting(
				'ayaphotography_animations_display',
				array(
						'default'           => 1,
						'sanitize_callback' => 'ayaphotography_sanitize_checkbox',
				)
		);

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize,
							'ayaphotography_animations_display',
								array(
									'label'          => __( 'Enable Animations', 'ayaphotography' ),
									'section'        => 'ayaphotography_animations_display',
									'settings'       => 'ayaphotography_animations_display',
									'type'           => 'checkbox',
								)
							)
		);
	}
endif; // ayaphotography_customize_register
add_action( 'customize_register', 'ayaphotography_customize_register' );


if ( ! function_exists( 'ayaphotography_sanitize_checkbox' ) ) :

	function ayaphotography_sanitize_checkbox( $checked ) {
		// Boolean check.
		return ( ( isset( $checked ) && true == $checked ) ? true : false );
	}

endif; // ayaphotography_sanitize_checkbox

if ( ! function_exists( 'ayaphotography_sanitize_html' ) ) :

	function ayaphotography_sanitize_html( $html ) {
		return wp_filter_post_kses( $html );
	}

endif; // ayaphotography_sanitize_html

if ( ! function_exists( 'ayaphotography_sanitize_url' ) ) :

	function ayaphotography_sanitize_url( $url ) {
		return esc_url_raw( $url );
	}

endif; // ayaphotography_sanitize_url