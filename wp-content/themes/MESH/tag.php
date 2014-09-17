 <?php get_header();
$term_id = get_query_var('tag_id'); ?>

<section id="blogroll">
	<div class="container">
		<div id="contentPrimary">
			<?php get_sidebar('blog'); ?>
		</div>
		<div id="contentSecondary">
			<div class="gutter">
				<h2><?php single_tag_title('Posts tagged: '); ?></h2>
				<?php $args = array(
						'post_type' => 'post',
						'posts_per_page' => -1,
						'tag_id' => $term_id
					);
					$posts = new WP_Query($args);
					if($posts->have_posts()){while($posts->have_posts()){$posts->the_post(); ?>
					<div id="posts-masn">
						<div class="blog-entry <?php echo $class; ?>">
							<div class="gutter">
								<?php $titlePos = get_field('title_position'); ?>
								<div class="post-wp-feature">
									<?php if($titlePos == 'overlay'){ ?>
										<a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
									<?php } ?>
									<?php the_post_thumbnail('full'); ?>
								</div>
								<div class="post-wp-content">
									<?php if($titlePos == 'below'){ ?>
										<a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
									<?php } ?>
									<?php echo get_the_excerpt(); ?>
								</div>
								<div class="post-wp-date">
									Published on <?php the_time('M d, Y'); ?>
								</div>
								<div class="post-wp-tags">
									<?php $tags = get_the_tags();
										foreach($tags as $tag){
											echo "<a href='".get_tag_link($tag)."'>".$tag->name."</a>";
										} ?>
								</div>
							</div>
						</div>
					</div>
				<?php } }else{
					echo "<p>No posts found under that tag. Sorry about that.</p>";
				} wp_reset_query(); ?>

			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>