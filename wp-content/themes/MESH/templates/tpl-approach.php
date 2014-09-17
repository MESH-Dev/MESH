 <?php /* Template Name: Approach */
get_header(); ?>

<section id="approach">
	<div class="container">
		<div class="gutter cf">
			<div id="approach-intro">
				<?php the_field('intro'); ?>
			</div>
			<div id="approach-threeCol">
				<div class="onethird floatleft first">
					<div class="gutter">
						<?php the_field('left_column'); ?>
					</div>
				</div>
				<div class="onethird floatleft">
					<div class="gutter">
						<?php the_field('center_column'); ?>
					</div>
				</div>
				<div class="onethird floatleft last">
					<div class="gutter">
						<?php the_field('right_column'); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>