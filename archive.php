<?php
/**
 * The template for displaying Archive pages
 *
 *
 * 
 */
get_header(); ?>

	<section class="eight columns push_one">	
	<div id="content">
		<header class="entry-header">
				<h2 class="entry-title"><?php single_cat_title(); ?></h2>

			<?php if ( category_description() ) : // Show an optional category description ?>
				<div class="archive-meta"><?php echo category_description(); ?></div>
			<?php endif; ?>
			</header>
		<?php while ( have_posts() ) : the_post();?>
			<div class="row">
				<div class="blog-item clearfix">
					<div class="four columns">
						<div class="port-image">
					<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_post_thumbnail('medium'); ?></a>
						<div class="port-cat">
							<h5><?php the_category(); ?></h5>
						</div>
					</div>
				</div>
				<div class="eight columns">
					<h3 class="entry-title">
						<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
					</h3>
					<div class="entry-excerpt">
						<?php the_excerpt(); ?>
					</div> <!-- entry-excerpt -->
					<div class="entry-tags">
					<?php if ( has_tag() ) : {echo '<i class="icon-tag"></i>'; the_tags( '', ', ', '');} endif; ?>
					</div>
					<div class ="keep-reading">
				<a href="<?php the_permalink(); ?>" rel="bookmark">Keep Reading...</a>
			</div>
				</div> 
				</div> <!-- Blog Item -->
			</div> <!-- Row -->
			<?php endwhile;?>
			<?php echo paginate_links();?>
	</div>
	</section>
		

<?php get_footer(); ?>