<?php
/**
 * Template Name: Home Page
 *
 * @package __package
 */

get_header();

?>

<div class="home">
	<section class="hero js-hero-slider">
		<div>
			<div class="hero-image">
				<img src="wp-content/themes/vtg-theme/assets/img/hero-background.jpg">
			</div>
			<div class="container">
				<div class="hero-text">
					<h1>Zarooki Motors</h1>	
				</div>
			</div>	
		</div>	
		<!-- <div>
			<div class="hero-image">
				<img src="wp-content/themes/vtg-theme/assets/img/hero-background.jpg">
			</div>
			<div class="container">
				<div class="hero-text">
					<h1>Zarooki Motors</h1>	
				</div>
			</div>	
		</div>
		<div>
			<div class="hero-image">
				<img src="wp-content/themes/vtg-theme/assets/img/hero-background.jpg">
			</div>
			<div class="container">
				<div class="hero-text">
					<h1>Zarooki Motors</h1>	
				</div>
			</div>	
		</div> -->
	</section>
	<section id="available-vehicles" class="available-cars">
		<div class="container">
			<h2>Available Cars</h2>
			<!-- <div class="row">
				<button class="button secondary car-filters">View Cars</button>
				<button class="button secondary car-filters">View Trucks</button>
				<button class="button secondary car-filters">View SUVs</button>
			</div>	 -->


			<div class="cars">

				<?php
				  	/* Retrieve all posts of type vehicle */
				  	$vehicle_args = array(
				  	    'posts_per_page'   => -1,
				  	    'orderby'          => 'title',
				  	    'order'            => 'ASC',
				  	    'post_type'        => 'vehicles'
				  	);
				  	
				  	$vehicles_query = new WP_Query( $vehicle_args );
				  	if ( $vehicles_query->have_posts() ):
				?>
		    
			    <?php
			      	while( $vehicles_query->have_posts() ):
			      	  	$vehicles_query->the_post();
			      	  	
			      	  	$custom_meta = get_post_meta( get_the_ID() );
						$imagedir = get_stylesheet_directory_uri() . "/assets/img";

						$vehicleyear = ( isset( $custom_meta['_vtg_vehicle_year'] ) && isset( $custom_meta['_vtg_vehicle_year'][0] ))
						    ? $custom_meta['_vtg_vehicle_year'][0]
						    : '';

						$vehicleprice = ( isset( $custom_meta['_vtg_vehicle_price'] ) && isset( $custom_meta['_vtg_vehicle_price'][0] ))
						    ? $custom_meta['_vtg_vehicle_price'][0]
						    : '';

						$vehicledescription = ( isset( $custom_meta['_vtg_vehicle_description'] ) && isset( $custom_meta['_vtg_vehicle_description'][0] ))
						    ? $custom_meta['_vtg_vehicle_description'][0]
						    : '';        

						get_the_ID(); /* or */ $post->ID;  

			    ?>
		          	<div class="car">
						<img class="car-image" src="wp-content/themes/vtg-theme/assets/img/car.png">
						<!-- <?php //echo the_post_thumbnail( 'vehicle_thumb' ); ?> -->
						<h3 class="car-title"><?php the_title(); ?></h3>
						<h3 class="car-price"><?php echo $vehicleprice; ?></h3>
						<p class="car-description"><?php echo $vehicledescription; ?></p>
						<a href="<?php echo the_permalink(); ?>" class="button primary">View More</a>
					</div>
		      	<?php
		        	endwhile;
		        	wp_reset_postdata();
		     	?>

		    </div>	

			<?php endif; ?>

		</div>
	</section>
	<section class="about">
		<div class="container">
			<h3>We believe in our customers...</h3>
			<p>Here at Zarooki Motors we belive that the customer comes first. That's why we are constantly striving to give you the best car buying experience possible. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur.</p>
			<div class="row">
				<div class="col-3-text">
					<span class="fa fa-car"></span>
					<h4>Trusted Dealer</h4>
					<p class="tiny-p">Here at Zarooki Motors we pride ourselves on being Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>
				</div>
				<div class="col-3-text">
					<span class="fa fa-wrench"></span>
					<h4>Expert Mechanic</h4>
					<p class="tiny-p">Here at Zarooki Motors we pride ourselves on being Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>
				</div>
				<div class="col-3-text">
					<span class="fa fa-users"></span>
					<h4>Your all-in-one Resource</h4>
					<p class="tiny-p">Here at Zarooki Motors we pride ourselves on being Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>
				</div>
			</div>	
		</div>
	</section>
	
	<section class="search-submission">
		<div class="container">
			<h2>Looking for Something Specific?</h2>
			<p>Fill out the form below with what you're looking for and we'll let you know when the perfect car for you will be in stock.</p>
			<form>
				<div class="row">
					<input class="col-3-input" type="text" name="make" placeholder="Make"></input>
					<input class="col-3-input" type="text" name="model" placeholder="Model"></input>
					<input class="col-3-input" type="text" name="year" placeholder="Year"></input>
				</div>	
				<div class="row">
					<input class="col-2-input" type="text" name="firstname" placeholder="First Name"></input>
					<input class="col-2-input" type="text" name="lastname" placeholder="Last Name"></input>
				</div>	
				<textarea placeholder="Additional Details" rows="10"></textarea>
				<input class="button secondary" type="submit" value="Submit">
			</form>
		</div>
	</section>
	<section id="contact-us" class="contact">
		<div class="container">
			<h2>Contact Zarooki Motors</h2>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua.</p>
			<div class="contact-container">
				<div class="contact-text">
					<ul>
						<li><span>Address:</span><br>2240 South Jason Street<br>Denver, CO 80223</li>
						<li><span>Phone:</span><br>(303) 668-3133</li>
						<li><span>Fax:</span><br>(555) 555-555</li>
						<li><span>Hours:</span><br>Monday - Friday 9am - 5pm</li>
					</ul>
				</div>
				<div class="contact-map">
					<img src="wp-content/themes/vtg-theme/assets/img/zarooki-map.jpg">
				</div>
			</div>
		</div>
	</section>
</div>


<?php get_footer(); ?>