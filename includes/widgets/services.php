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
class Medica_Services extends \Elementor\Widget_Base {

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
		return 'service-addon';
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
		return esc_html__( 'Services', 'medica-addon' );
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

	// Load CSS
	// public function get_style_depends() {
		
	// 	wp_register_style( 'common-css', plugins_url( '../assets/css/common.css', __FILE__ ) );

	// 	return [
	// 		'common-css',
	// 	];

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

		$this->add_control(
			'post_count',
			[
				'label' => esc_html__( 'Post Per Page', 'medica-addon' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => 12,
			]
		);

		$this->add_control(
			'post_orderby',
			[
				'label' => esc_html__( 'Post Order By', 'medica-addon' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'date',
				'options' => [
					'ID'  => esc_html__( 'ID', 'medica-addon' ),
					'date' => esc_html__( 'Date', 'medica-addon' ),
					'comment_count' => esc_html__( 'Comment Count', 'medica-addon' ),
					'author' => esc_html__( 'Author', 'medica-addon' ),
					'title' => esc_html__( 'Title', 'medica-addon' ),
					'rand' => esc_html__( 'Rand', 'medica-addon' ),
				],
			]
		);

		$this->add_control(
			'post_order',
			[
				'label' => esc_html__( 'Post Order', 'medica-addon' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'ASC'  => esc_html__( 'Ascending', 'medica-addon' ),
					'DESC' => esc_html__( 'Descending', 'medica-addon' ),
				],
			]
		);

		// $this->add_control(
		// 	'title_word_limit',
		// 	[
		// 		'label' => esc_html__( 'Title Word Limit', 'medica-addon' ),
		// 		'type' => \Elementor\Controls_Manager::NUMBER,
		// 		'default' => 6,
		// 	]
		// );

		// $this->add_control(
		// 	'content_limit',
		// 	[
		// 		'label' => esc_html__( 'Content Limit', 'medica-addon' ),
		// 		'type' => \Elementor\Controls_Manager::NUMBER,
		// 		'default' => 10,
		// 	]
		// );


		$this->end_controls_section();

		// section_style
		$this->start_controls_section(
			'section_style',
			[
				'label' => esc_html__( 'Style', 'medica-addon' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		

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
	<div class="services-wrapper">
	<?php

		// The Query
		$args = array(
			'post_type' => 'service',
			'posts_per_page'      => $settings['post_count'],
			'post_status' => 'publish',
			'ignore_sticky_posts' => 1,
			'orderby' => $settings['post_orderby'],
			'order'   =>  $settings['post_order'],
			// 'paged' => get_query_var('paged') ? get_query_var('paged') : 1,
		);

		$the_query = new \WP_Query( $args );
		// The Loop
		if ( $the_query->have_posts() ) {
			while ( $the_query->have_posts() ) {
				$the_query->the_post();
				
				?>
				<article id="post-<?php the_ID();?>" <?php post_class( 'single-service-item' );?>>
					<a class="d-block" href="<?php the_permalink(  ); ?>">
						<?php if( has_post_thumbnail(  ) ): ?>
							<?php the_post_thumbnail( 'full' ); ?>
						<?php endif; ?>
						<h2><?php echo wp_trim_words( get_the_title() ); ?></h2>
						<span class="readmore">
							<?php echo esc_html__( 'Read More', 'medica-addon' ) ?> 
                            <svg aria-hidden="true" class="e-font-icon-svg e-fas-plus-circle" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm144 276c0 6.6-5.4 12-12 12h-92v92c0 6.6-5.4 12-12 12h-56c-6.6 0-12-5.4-12-12v-92h-92c-6.6 0-12-5.4-12-12v-56c0-6.6 5.4-12 12-12h92v-92c0-6.6 5.4-12 12-12h56c6.6 0 12 5.4 12 12v92h92c6.6 0 12 5.4 12 12v56z"></path></svg>
						</span>
					</a>
				</article>
				<?php
			}
		}
		wp_reset_postdata();
	?>
	</div>

	<!-- Pagination -->
	<?php
		//echo "<div class='page-nav-container'>" . paginate_links(array(
			//'total' => $the_query->max_num_pages,
			//'prev_text' => __('Prev'),
			//'next_text' => __('Next')
		//)) . "</div>";
	?>

	<?php

	}

}