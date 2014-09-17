 <?php get_header(); ?>

<section id="advocates">
	<div class="container">
		<div class="gutter">
			<?php $args = array(
				        	  'post_type' 	   => 'advocate',
				        	  'posts_per_page' => -1
				          );
				  $posts = new WP_Query($args);
				  if($posts->have_posts()){
				  echo "<div id='adv-mason'>";
				  while ( $posts->have_posts() ) { $posts->the_post(); ?>
					  <div class="adv-entry masn-three" style="background-color:<?php the_field('background'); ?>;">
						  <?php $img = get_field('image');
						  if($img){
							 echo "<img src='$img' />";
						  }else{ ?>
							 <div class="gutter cf">
							 	<span class="adv-entry-message"><?php the_field('message'); ?></span>
							 	<span class="adv-entry-advocate">- <?php the_field('advocate'); ?></span>
							 </div>
						  <?php } ?>
					  </div>
				  <?php } echo "</div>"; } wp_reset_postdata(); ?>

		</div>
	</div>
</section>

<?php get_footer(); ?>