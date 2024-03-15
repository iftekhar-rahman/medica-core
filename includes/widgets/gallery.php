<?php
namespace Medica_Addon;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Elementor oEmbed Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Medica_Gallery extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve oEmbed widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'Gallery';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve oEmbed widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Gallery', 'medica-addon' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve oEmbed widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-code';
	}


	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the oEmbed widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'basic', 'medica' ];
	}

	// Load CSS
	// public function get_style_depends() {

	// 	wp_register_style( 'guide-posts', plugins_url( '../assets/css/guide-posts.css', __FILE__ ));

	// 	return [
	// 		'guide-posts',
	// 	];

	// }

	/**
	 * Get widget keywords.
	 *
	 * Retrieve the list of keywords the oEmbed widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return array Widget keywords.
	 */
	// public function get_keywords() {
	// 	return [ 'oembed', 'url', 'link' ];
	// }

	/**
	 * Register oEmbed widget controls.
	 *
	 * Add input fields to allow the user to customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'medica-addon' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		// $this->add_control(
		// 	'title_word_limit',
		// 	[
		// 		'label' => esc_html__( 'Title Word Limit', 'medica-addon' ),
		// 		'type' => \Elementor\Controls_Manager::NUMBER,
		// 		'default' => 10,
		// 	]
		// );
		// $this->add_control(
		// 	'content_limit',
		// 	[
		// 		'label' => esc_html__( 'Content Limit', 'medica-addon' ),
		// 		'type' => \Elementor\Controls_Manager::NUMBER,
		// 		'default' => 60,
		// 	]
		// );
		$this->add_control(
			'post_count',
			[
				'label' => esc_html__( 'Post Per Page', 'medica-addon' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => 10,
			]
		);
		// $this->add_control(
		// 	'arrow_left',
		// 	[
		// 		'label' => esc_html__( 'Arrow Left', 'medica-addon' ),
		// 		'type' => \Elementor\Controls_Manager::MEDIA,
		// 		'default' => [
		// 			'url' => \Elementor\Utils::get_placeholder_image_src(),
		// 		],
		// 	]
		// );
		// $this->add_control(
		// 	'arrow_right',
		// 	[
		// 		'label' => esc_html__( 'Arrow Right', 'medica-addon' ),
		// 		'type' => \Elementor\Controls_Manager::MEDIA,
		// 		'default' => [
		// 			'url' => \Elementor\Utils::get_placeholder_image_src(),
		// 		],
		// 	]
		// );

		$this->end_controls_section();

	}

	/**
	 * Render oEmbed widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();
		// $content_limit = $settings['content_limit'];
		// $title_word_limit = $settings['title_word_limit'];
	?>

	<div class="gallery-wrapper">
		<div class="swiper gallery">
			<div class="swiper-wrapper">
				<?php

				// The Query
				$args = array(
					'post_type' => 'gallery',
					'posts_per_page'      => $settings['post_count'],
					'post_status' => 'publish',
					'ignore_sticky_posts' => 1,
					'orderby' => 'date',
					'order'   =>  'DESC',
				);

				$the_query = new \WP_Query( $args );
				// The Loop
				if ( $the_query->have_posts() ) {
					while ( $the_query->have_posts() ) {
						$the_query->the_post();
						
						?>
						<div id="post-<?php the_ID();?>" <?php post_class( 'swiper-slide single-testimonial' );?>>
                            <div class="swiper-slide">
								<?php
									if ( has_post_thumbnail() ) {
										the_post_thumbnail();
									}
                                ?>
							</div>
						</div>
						<?php
					}
				}
				wp_reset_postdata();
				?>
			</div>
		</div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
	</div>

	<?php

	}

}