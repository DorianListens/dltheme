<?php get_header(); ?>

	<section class="eight columns push_one">	
		<div id="content">
				<?php while ( have_posts() ) : the_post(); ?>
					<div>
						<h2><?php the_title(); ?></h2>
						<?php the_content(); ?>
					</div>
				<?php endwhile; ?>
		</div>
	</section>

<?php get_footer(); ?>