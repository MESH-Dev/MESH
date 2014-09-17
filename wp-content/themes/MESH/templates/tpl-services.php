 <?php /* Template Name: Services */
get_header(); ?>

<section id="services">
	<div class="container">
		<div class="gutter">
			<div id="services-intro">
				<?php the_field('intro'); ?>
			</div>
			<div id="services-threeCol">
				<?php $services = get_field('services');
					$serviceChunk = array_chunk($services,3);
					foreach($serviceChunk as $serv){
						echo '<div class="service-wrap">';
						foreach($serv as $service){ ?>
							<div class="service-entry onethird <?php echo cycle('first','','last'); ?>">
								<h1><?php echo $service['title']; ?></h1>
								<div class="gutter">
									<?php echo $service['content']; ?>
								</div>
								<div class="services-seemore">
									<?php echo $service['see_more']; ?>
								</div>
							</div>
						<?php }
					echo '</div>';
					} ?>

			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>