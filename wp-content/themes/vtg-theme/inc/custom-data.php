<?php
/**
 * __package Theme Options
 * @version 0.1.0
 */
class __package_Custom_Data {
	/**
	 * Hidden meta prefix
	 * @var string
	 */
	private static $prefix = '___package_';

	/**
	 * Option key, and option page slug
	 * @var string
	 */
	private $key = '__package_options';

	/**
	 * Options page metabox id
	 * @var string
	 */
	private $metabox_id = '__package_option_metabox';

	/**
	 * Options Page title
	 * @var string
	 */
	protected $title = '';

	/**
	 * Options Page hook
	 * @var string
	 */
	protected $options_page = '';

	/**
	 * Constructor
	 * @since 0.1.0
	 */
	public function __construct() {
		// Set our title
		$this->title = __( 'Site Options', '__package' );
	}

	/**
	 * Initiate our hooks
	 * @since 0.1.0
	 */
	public function hooks() {
		add_action( 'admin_init', array( $this, 'init' ) );
		add_action( 'admin_menu', array( $this, 'add_options_page' ) );

		add_action( 'init', array( $this, 'create_post_types' ) );

		add_filter( 'upload_mimes', array( $this, 'addAddtlMimeType' ) );
	}

	/**
	 * Register our setting to WP
	 * @since 0.1.0
	 */
	public function init() {
		register_setting( $this->key, $this->key );
	}

	/**
	 * Public getter method for retrieving protected/private variables
	 * @since 0.1.0
	 * @param string	$field Field to retrieve
	 * @return mixed	Field value or exception is thrown
	 */
	public function __get( $field ) {
		// Allowed fields to retrieve
		if ( in_array( $field, array( 'key', 'metabox_id', 'title', 'options_page' ), true ) ) {
			return $this->{$field};
		}
		throw new Exception( 'Invalid property: ' . $field );
	}

	/**
	 * Add menu options page
	 * @since 0.1.0
	 */
	public function add_options_page() {
		$this->options_page = add_menu_page( $this->title, $this->title, 'manage_options', $this->key, array( $this, 'admin_page_display' ) );
		// Include CMB CSS in the head to avoid FOUT
	}

	/**
	 * Create custom post types
	 */
	public function create_post_types() {

		// Playlists post type
		$vehicles_labels = array(
			'add_new'            => _x( 'Add New', 'vehicle', 'ps' ),
			'add_new_item'       => __( 'Add New Vehicle', 'ps' ),
			'all_items'          => __( 'All Vehicles', 'ps' ),
			'edit_item'          => __( 'Edit Vehicle', 'ps' ),
			'menu_name'          => _x( 'Vehicles', 'admin menu', 'ps' ),
			'name_admin_bar'     => _x( 'Vehicle', 'add new on admin bar', 'ps' ),
			'name'               => _x( 'Vehicles', 'post type general name', 'ps' ),
			'new_item'           => __( 'New Vehicle', 'ps' ),
			'not_found'          => __( 'No Vehicles found.', 'ps' ),
			'not_found_in_trash' => __( 'No Vehicles found in Trash.', 'ps' ),
			'parent_item_colon'  => __( 'Parent Vehicle:', 'ps' ),
			'search_items'       => __( 'Search Vehicles', 'ps' ),
			'singular_name'      => _x( 'Vehicle', 'post type singular name', 'ps' ),
			'view_item'          => __( 'View Vehicle', 'ps' ),
		);

		$vehicles_args = array(
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'labels'             => $vehicles_labels,
			'menu_icon'          => 'dashicons-admin-users',
			'menu_position'      => null,
			'public'             => true,
			'publicly_queryable' => true,
			'query_var'          => true,
			'rewrite'            => array(
				'slug' => 'vehicles',
			),
			'show_ui'            => true,
			'show_in_menu'       => true,
			'supports'           => array(
				'editor',
				'thumbnail',
				'title',
			),
		);

		register_post_type( 'vehicles', $vehicles_args );
	}
	
	function addAddtlMimeType( $mimes ) {
		$new_mimes = array(
			'eps'	=> 'application/eps',
			'ai'	=> 'application/ai'
		);

		return array_merge( $mimes, $new_mimes );
	}
}

/**
 * Helper function to get/return the BStar_Custom_Data object
 * @since 0.1.0
 * @return BStar_Custom_Data object
 */
function __package_custom_data() {
	static $object = null;
	if ( is_null( $object ) ) {
		$object = new __package_Custom_Data();
		$object->hooks();
	}
	return $object;
}
/**
 * Wrapper function around cmb2_get_option
 * @since 0.1.0
 * @param string	$key Options array key
 * @return mixed	Option value
 */
function __package_get_option( $key = '' ) {
	return cmb2_get_option( bstar_custom_data()->key, $key );
}
// Get it started
__package_custom_data();