<?php
/**
 * Class definition for the main Post Content Shortcodes "Content" Block
 */

namespace {
	if ( ! defined( 'ABSPATH' ) ) {
		die( 'You do not have permission to access this file directly.' );
	}
}

namespace Ten321\Post_Content_Shortcodes\Blocks {

	use Ten321\Post_Content_Shortcodes\Plugin;

	if ( ! class_exists( 'Content' ) ) {
		class Content extends PCS_Block {
			/**
			 * @var Content $instance holds the single instance of this class
			 * @access private
			 */
			private static $instance;

			/**
			 * Creates the Content object
			 *
			 * @access private
			 * @since  2020.8
			 */
			private function __construct() {
				$this->block_namespace = 'ten321/post-content-shortcodes/content';
				$this->block_path      = Plugin::plugin_dir_url( '/dist/content/' );
				$this->block_title     = __( 'PCS Content Block', 'post-content-shortcodes' );

				parent::__construct();
				add_filter( 'ten321/post-content-shortcodes/blocks/attributes', array(
					$this,
					'add_attributes'
				), 10, 2 );
			}

			/**
			 * Returns the instance of this class.
			 *
			 * @access  public
			 * @return  Content
			 * @since   2020.8
			 */
			public static function instance() {
				if ( ! isset( self::$instance ) ) {
					$className      = __CLASS__;
					self::$instance = new $className;
				}

				return self::$instance;
			}

			/**
			 * Add any additional attributes that are unique to this block
			 *
			 * @param array $atts the existing list of attributes
			 * @param array $defaults the array of default values
			 *
			 * @access public
			 * @return array the updated list of attributes
			 * @since  0.1
			 */
			public function add_attributes( array $atts, array $defaults ) {
				$instance = array();

				$instance['type']            = array(
					'type'    => 'string',
					'default' => 'content',
				);
				$instance['id']              = array(
					'type'    => 'integer',
					'default' => $defaults['id'],
				);
				$instance['post_name']       = array(
					'type'    => 'string',
					'default' => $defaults['post_name'],
				);
				$instance['blog_id']         = array(
					'type'    => 'integer',
					'default' => $defaults['blog_id'],
				);
				$instance['exclude_current'] = array(
					'type'    => 'boolean',
					'default' => $defaults['exclude_current'],
				);
				$instance['title']           = array(
					'type'    => 'string',
					'default' => $defaults['title'],
				);

				return array_merge( $atts, $instance );
			}

			/**
			 * Render the block itself
			 *
			 * @param array $atts the block attributes
			 * @param string $content the content of the block
			 *
			 * @access public
			 * @return string the rendered HTML for the block
			 * @since  0.1
			 */
			public function render( array $atts, string $content = '' ) {
				// TODO: Implement render() method.
			}
		}
	}
}
