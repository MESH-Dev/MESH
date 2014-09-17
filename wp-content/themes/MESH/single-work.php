 <?php get_header(); ?>

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
				 	//echo "<li data-filter='".$cat->slug."'>".$cat->name."</li>";
				 }
			?>
			</ul>
			<!--<a id="other-works" href="<?php echo get_post_type_archive_link('work'); ?>">More Projects &raquo;</a>!-->
		</div>
	</div>
</section>

<?php
if ( have_posts() ) {
	echo "<section id='works' class='archive'>
			<div class='container cf'>
				<div class='gutter cf workcf'>";
	while ( have_posts() ) { the_post(); ?>

	<div id="<?php echo( basename(get_permalink()) ); ?>" class="work-post <?php echo cycle('white','grey'); ?>">
		

		<div class="work-post-showcase">
			<?php $featured = get_field('showcase_images');
				foreach($featured as $image){
					echo wp_get_attachment_image($image['image'],'full');
				} ?>
		</div>

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


		<div class="work-post-content">
			<div class="work-process-data">
				<div class="work-process-data-vis" style="background:<?php the_field('featured_background'); ?>;">
					<div class="gutter cf">
						<span class="work-process-title">Process</span>
					</div>
				</div>
				<div class="work-process-intro-extra">
					<div class="gutter cf">
						<?php the_field('process_description'); ?>
					</div>
				</div>
			</div>
			<!--<div class="work-entry-process">
				<?php $collage = get_field('process_collage');
					  $process = get_field('process_images');
				if($collage){ ?>
					<div class="work-entry-process-collage">
						<?php echo wp_get_attachment_image($collage, 'full'); ?>
					</div>
					<div class="work-entry-process-sketch">
						<?php foreach($process as $img){
								echo wp_get_attachment_image($img['image'], 'full');
							} ?>
					</div>
				<?php }else{ ?>
					<div class="work-entry-process-sketch fullwidth">
						<?php foreach($process as $img){
								echo "<div class='process-image ".cycle('left','right')."'>";
								echo wp_get_attachment_image($img['image'], 'full');
								echo "</div>";
							} ?>
					</div>
				<?php } ?>
			</div>!-->
		</div>
	</div>

<?php } echo "</div>
				</div>
			</section>"; } ?>

<?php get_footer(); ?>