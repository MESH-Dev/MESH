 <?php get_header(); ?>

<section id="works-filter">
	<div class="container">
		<div class="gutter">
			<a id="complete-works" href="<?php echo get_permalink(51); ?>">Case Studies</a>
			<ul id="filters">
			<?php
				$categories = get_terms('medium',array(
				 	'orderby'    => 'id',
				 	'hide_empty' => 0
				 ));
				 foreach($categories as $cat){
				 	echo "<li data-filter='".$cat->slug."'>".$cat->name."</li>";
				 }
			?>
			</ul>
			<!--<a id="other-works" href="<?php echo get_post_type_archive_link('work'); ?>">More Projects &raquo;</a>!-->
		</div>
	</div>
</section>
<section id="works-archive">
	<div class="container">
		<div class="gutter cf">
			<?php $args = array(
					'post_type'      => 'work',
					'meta_key'       => 'featured',
					'meta_value'     => true,
					'meta_compare'   => '!=',
					'posts_per_page' => -1
				);
				$query = new WP_Query($args);
				if ( $query->have_posts() ) { while ( $query->have_posts() ) { $query->the_post(); ?>

				<div class="works-archive-entry">
					<a href="#<?php echo( basename(get_permalink()) ); ?>"><?php the_title(); ?></a>
				</div>

				<?php } } wp_reset_query(); ?>
		</div>
	</div>
</section>

<?php $args = array(
	'post_type'      => 'work',
	'meta_key'       => 'featured',
	'meta_value'     => true,
	'meta_compare'   => '!=',
	'posts_per_page' => -1
);
$query = new WP_Query($args);
	if ( $query->have_posts() ) {
		echo "<section id='works' class='archive'>
				<div class='container cf'>";
		while ( $query->have_posts() ) { $query->the_post(); ?>

		<div id="<?php echo( basename(get_permalink()) ); ?>" class="work-post <?php echo cycle('white','grey'); ?>">
			<div class="work-post-intro">
				<div class="work-entry-data" style="background:<?php the_field('featured_background'); ?>;">
					<div class="work-entry-data-vis">
						<div class="gutter cf">
							<span class="work-entry-title"><?php the_field('featured_title'); ?></span>
							<span class="work-entry-medium"><?php the_field('featured_medium'); ?></span>
						</div>
					</div>
					<div class="work-entry-data-add">
						<div class="gutter cf">
							<span class="work-entry-statement"><?php the_field('featured_statement'); ?></span>
						</div>
					</div>
				</div>

				<div class="work-post-intro-extra">
					<div class="gutter cf">
						<?php the_field('intro_info'); ?>
					</div>
				</div>
			</div>

			<div class="work-post-showcase">
				<?php $featured = get_field('showcase_images');
					foreach($featured as $image){
						echo wp_get_attachment_image($image['image'],'full');
					} ?>
			</div>

			<div class="work-post-content">
				<?php the_content(); ?>
			</div>
		</div>

	<?php $i++; } echo "</div>
				</section>"; } wp_reset_query(); ?>





<?php get_footer(); ?>