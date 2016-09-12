<?php
/**
 * vtg CMB2 metaboxes
 *
 * @package vtg
 */

class vtg_cmb2_metaboxes {
	// Prefix for metabox field ids uses underscore so it won't show
	// up on the WP custom fields dropdown
	private static $prefix = '_vtg_';


	/**
	 * Initalize cmb2 fields
	 */
	public function __construct() {
		// Home custom page template
		add_action( 'cmb2_init', array( $this, 'vtg_cmb2_vehicle_meta' ) );
	}

	///////////////////////
	// Vehicles Custom Post Meta Fields
	///////////////////////

	/**
	 * Vehicles metaboxes
	 */
	public static function vtg_cmb2_vehicle_meta() {

		/////////////////////// Set Up Meta Box
		$vehicle_box = new_cmb2_box( array(
			'id'            => 'vtg_vehicle_metabox',
			'title'         => __( 'Vehicles Custom Content', 'vtg' ),
			'object_types'  => array( 'post', 'vehicles' ), // Post type
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
		) );

		/////////////////////// Meta Boxes

		$vehicle_box->add_field( array(
			'name'        => __( 'Images', 'vtg' ),
			'desc'        => __( 'Add Images of the Vehicle', 'vtg' ),
			'id'          => self::$prefix . 'vehicle_image_list',
			'type'        => 'file_list',
		) );


		$vehicle_box->add_field( array(
			'name'        => __( 'Price', 'vtg' ),
			'desc'        => __( 'Add the Price', 'vtg' ),
			'id'          => self::$prefix . 'vehicle_price',
			'type'        => 'text',
		) );

		$vehicle_box->add_field( array(
			'name'        => __( 'Year', 'vtg' ),
			'desc'        => __( 'Add the Year', 'vtg' ),
			'id'          => self::$prefix . 'vehicle_year',
			'type'        => 'text',
		) );

		$vehicle_box->add_field( array(
			'name'        => __( 'Make', 'vtg' ),
			'desc'        => __( 'Add the Make', 'vtg' ),
			'id'          => self::$prefix . 'vehicle_make',
			'type'        => 'text',
		) );

		$vehicle_box->add_field( array(
			'name'        => __( 'Model', 'vtg' ),
			'desc'        => __( 'Add the Model', 'vtg' ),
			'id'          => self::$prefix . 'vehicle_model',
			'type'        => 'text',
		) );

		$vehicle_box->add_field( array(
			'name'        => __( 'Stock No', 'vtg' ),
			'desc'        => __( 'Add the Stock No', 'vtg' ),
			'id'          => self::$prefix . 'vehicle_stock_no',
			'type'        => 'text',
		) );

		$vehicle_box->add_field( array(
			'name'        => __( 'Mileage', 'vtg' ),
			'desc'        => __( 'Add the Mileage', 'vtg' ),
			'id'          => self::$prefix . 'vehicle_mileage',
			'type'        => 'text',
		) );

		$vehicle_box->add_field( array(
			'name'        => __( 'Engine', 'vtg' ),
			'desc'        => __( 'Add the Engine', 'vtg' ),
			'id'          => self::$prefix . 'vehicle_engine',
			'type'        => 'text',
		) );

		$vehicle_box->add_field( array(
			'name'        => __( 'Transmission', 'vtg' ),
			'desc'        => __( 'Add the Transmission', 'vtg' ),
			'id'          => self::$prefix . 'vehicle_transmission',
			'type'        => 'text',
		) );

		$vehicle_box->add_field( array(
			'name'        => __( 'Color', 'vtg' ),
			'desc'        => __( 'Add the Color', 'vtg' ),
			'id'          => self::$prefix . 'vehicle_color',
			'type'        => 'text',
		) );

		$vehicle_box->add_field( array(
			'name'        => __( 'Interior', 'vtg' ),
			'desc'        => __( 'Add the Interior', 'vtg' ),
			'id'          => self::$prefix . 'vehicle_interior',
			'type'        => 'text',
		) );

		$vehicle_box->add_field( array(
			'name'        => __( 'Vehicle Options', 'vtg' ),
			'desc'        => __( 'Add the Vehicle Options', 'vtg' ),
			'id'          => self::$prefix . 'vehicle_options',
			'type'        => 'textarea',
		) );

		$vehicle_box->add_field( array(
			'name'        => __( 'Description', 'vtg' ),
			'desc'        => __( 'Add the Description', 'vtg' ),
			'id'          => self::$prefix . 'vehicle_description',
			'type'        => 'textarea',
		) );
	}
}


new vtg_cmb2_metaboxes;
