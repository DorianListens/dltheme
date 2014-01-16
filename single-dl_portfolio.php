<?php get_header(); ?>

	<section class="eight columns push_one">	
		<div id="content" <?php post_class('home-post'); ?>>
				<?php while ( have_posts() ) : the_post(); ?>
					<div class="row">
						<?php the_post_thumbnail() ?>
					</div>
					<div class ="row">
					
						<h2 class="post-title"><?php the_title(); ?></h2>
						<div class="entry-meta"><i class="icon-folder"></i>
							<?php $terms = get_the_terms( $post->ID, 'portfolio_cats');
							foreach ($terms as $term) {
   							 //Always check if it's an error before continuing. get_term_link() can be finicky sometimes
    						$term_link = get_term_link( $term, 'portfolio_cats' );
    						if( is_wp_error( $term_link ) )
        					continue;
   							 //We successfully got a link. Print it out.
    						echo '<a href="' . $term_link . '">' . $term->name . '</a>';
							}
							?>
						 <?php if ( has_tag() ) : {echo '<i class="icon-tag"></i>'; the_tags( '', ', ', '');} endif; ?>
						 	</div>
						<?php the_content(); ?>
					
					
				</div>
				<?php endwhile; ?>
		</div>
	</section>

<?php get_footer(); ?>