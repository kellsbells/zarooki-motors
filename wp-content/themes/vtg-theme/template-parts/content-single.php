

<?php
/**
 * Template part for displaying single posts.
 *
 * @package __package
 */

$custom_meta = get_post_meta( get_the_ID() );
//print_r( $custom_meta );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="container">

		<div class="single-vehicle">

			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			<div class="the-content"><?php the_content(); ?></div>
			
			<?php
				$make = $custom_meta['_vtg_vehicle_make'][0];
				$model = $custom_meta['_vtg_vehicle_model'][0];
				$year = $custom_meta['_vtg_vehicle_year'][0];
				$price = $custom_meta['_vtg_vehicle_price'][0];
				$stock_no = $custom_meta['_vtg_vehicle_stock_no'][0];
				$mileage = $custom_meta['_vtg_vehicle_mileage'][0];
				$engine = $custom_meta['_vtg_vehicle_engine'][0];
				$transmission = $custom_meta['_vtg_vehicle_transmission'][0];
				$color = $custom_meta['_vtg_vehicle_color'][0];
				$interior = $custom_meta['_vtg_vehicle_interior'][0];
				$options = $custom_meta['_vtg_vehicle_options'][0];
				$description = $custom_meta['_vtg_vehicle_description'][0];
			?>

			<div class="vehicle-details">
				<div class="vehicle-images">
					<div class="image-gallery js-image-gallery">
						<?php $galleryArray = get_post_gallery_ids($post->ID); ?>

						<?php foreach ($galleryArray as $id) { ?>

						    <img src="<?php echo wp_get_attachment_url( $id ); ?>">

						<?php } ?>
					</div>
				</div>	
						
				<div class="vehicle-text">
					<p>Make: <?php echo $make ?></p>
					<p>Model: <?php echo $model ?></p>
					<p>Year: <?php echo $year ?></p>
					<p>Price: <?php echo $price ?></p>
					<p>Stock No: <?php echo $stock_no ?></p>
					<p>Mileage <?php echo $mileage ?></p>
					<p>Engine: <?php echo $engine ?></p>
					<p>Transmission: <?php echo $transmission ?></p>
					<p>Color: <?php echo $color ?></p>
					<p>Interior: <?php echo $interior ?></p>
					<p>Options: <?php echo $options ?></p>
					<p>Description: <?php echo $description ?></p>
				</div>	
			</div>

				
		</div>
	</div>	

</article><!-- #post-## -->

