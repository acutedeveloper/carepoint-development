<?php get_header(); ?> 

	<div class="container">
		
		<?php the_breadcrumb(); ?>

	</div>

		<div class="two-column-grid">
			<article class="left-column text">

				<?php if(have_posts()): while ( have_posts() ) : the_post(); ?>

				<h1><?php the_title(); ?></h1>	
				<?php the_content(); ?>

				<?php endwhile; else: // End the loop. Whew. ?>
					<h1>Sorry No article here</h1>
				<?php endif; ?>

			</article>			
				
			<aside class="right-column">

				<div class="nhs-choices-label">
					<small>This article is sourced from:</small>
					<img src="<?php bloginfo("template_url"); ?>/library/images/nhs-choices-logo.jpg" alt="NHS Choices">
				</div>

				<h2 class="section-header">Save &amp; Share</h2>
				<div class="social-share">
					<ul>
						<li><a class="tooltip" title="Save this article" href="{{ url }}"><i class="fa fa-plus-circle"></i></a></li>
						<li><a class="tooltip" title="Print this article" href="{{ url }}"><i class="fa fa-print"></i></a></li>
						<li><a class="tooltip" title="Download article to PDF" href="{{ url }}"><i class="fa fa-file-pdf-o"></i></a></li>
						<li><a class="tooltip" title="Email this article" href="{{ url }}"><i class="fa fa-envelope-o"></i></a></li>
						<li><a class="tooltip" title="Share on Facebook" href="{{ url }}"><i class="fa fa-facebook"></i></a></li>
						<li><a class="tooltip" title="Share on Twitter" href="{{ url }}"><i class="fa fa-twitter"></i></a></li>
					</ul>
				</div>

				<h2 class="section-header">Article tags</h2>
				<div class="article-tags">
					<a href="#">Health care</a>
					<a href="#">Medicine</a>
					<a href="#">tablets</a>
				</div>

			<?php

			$related = get_posts( array(
				'category__in' => wp_get_post_categories($post->ID),
				'post_type' => 'care-advice',
				'numberposts' => 5,
				'post__not_in' => array($post->ID)
				) );

			if( $related ){

			?>

				<section class="section related-posts">
					<h2 class="section-header">Related articles</h2>
					<ul class="headline-list">

			<?php

			foreach( $related as $post ) {
			setup_postdata($post);

			?>

						<li><h3><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3></li>

			<?php } ?>
					</ul>
				</section>

			<?php } wp_reset_postdata(); ?>


				<h2 class="section-header">Related directory services</h2>
				<div class="directory-service-list">
					<a href="">
						Accessible sports  for adults
						<small>Services available: 9</small>
					</a>
					<a href="">
						Care Equipment
						<small>Services available: 29</small>
					</a>
				</div>

			</aside>

		</div><!-- end of .two-up-grid -->

<?php get_footer(); ?> 