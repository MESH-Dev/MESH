 <?php /* Template Name: Featured Works */
get_header(); ?>

<section id="works-filter" class="cf">
	<div class="container cf">
		<div class="gutter cf">
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

<?php $args = array(
	'post_type'      => 'work',
	'meta_key'       => 'featured',
	'meta_value'     => true,
	'meta_compare'   => '=',
	'posts_per_page' => -1
);
$query = new WP_Query($args);
	if ( $query->have_posts() ) {
		//$i = 1;
		echo "<section id='works' class='featured'>
				<div class='container cf'>";
		while ( $query->have_posts() ) { $query->the_post();?>


		<a href="<?php the_permalink(); ?>">
			<div class="work-entry <?php echo cycle('right','right','right','left','left','left'); ?> <?php $terms = wp_get_post_terms($post->ID, 'medium');
				foreach($terms as $term){
					echo $term->slug.' ';
				}
			?>">
				<div class="work-entry-img" style="background:url(<?php the_field('featured_cover'); ?>) center center no-repeat;background-size:cover;">
				</div>
				<div class="work-entry-data" style="background: #383838;">
					<div class="work-entry-data-vis">
						<div class="gutter">
							<span class="work-entry-title"><?php the_field('featured_title'); ?></span>
							<span class="work-entry-medium"><?php the_field('featured_medium'); ?></span>
						</div>
					</div>
					<div class="work-entry-data-add">
						<div class="gutter">
							<span class="work-entry-statement"><?php the_field('featured_statement'); ?></span>
						</div>
					</div>
				</div>
			</div>
		</a>

	<?php /*$i++;*/ } echo "</div>
				</section>"; } wp_reset_query(); ?>





<?php get_footer(); ?>