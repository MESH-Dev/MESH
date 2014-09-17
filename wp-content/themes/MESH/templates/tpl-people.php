 <?php /* Template Name: People */ get_header(); ?>

<section id="people">
	<div class="container">
		<div class="gutter">
		<div id="contentPrimary">
			<?php
				if ( have_posts() ) { while ( have_posts() ) { the_post();
						the_content();
					}
				}
			?>
		</div>
		<div id="contentSecondary">
			<section id="people-masn">
				<?php $people = get_field('people_order');
				foreach($people as $post){
					setup_postdata($post); ?>
					<div class="people-entry <?php echo cycle('right','right','left','left'); ?>">
						<div class="people-entry-img" style="background:url(<?php the_field('people_cover'); ?>) center center no-repeat;background-size:cover;">
							<div class="people-entry-img-active" style="background:url(<?php the_field('active_portrait'); ?>) center center no-repeat;background-size:cover;">
							</div>

						</div>
						<div class="people-entry-data" style="background:<?php the_field('background_color'); ?>;">
							<div class="people-entry-data-vis">
								<div class="gutter">
									<span class="people-entry-title"><?php the_title(); ?></span>
									<span class="people-entry-posit"><?php the_field('people_title'); ?></span>
									
									<div class="people-entry-content">
										<?php the_field('people_about'); ?>
									</div>
								</div>
							</div>
							<div class="people-entry-data-add">
								<div class="gutter">
									<span class="people-entry-statement"><?php the_field('people_intro'); ?></span>
								</div>
							</div>
						</div>
					</div>
				<?php } ?>
			</section>
		</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>