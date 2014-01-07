<?php
/**
 * Template Name: Portfolio Display Template
 *
 * Description: The template for displying the portfolio page properly
 *
 *
 */
get_header(); ?>

	<section class="eight columns push_one">	
		<div id="content">
		<?php while ( have_posts() ) : the_post(); ?>
					<div>
						<h2><?php the_title(); ?></h2>
						<?php the_content(); ?>
					</div>	
					<?php endwhile; ?>
					<hr />
					<div class="port-grid clearfix">
<?php
	$temp = $wp_query; 
  $wp_query = null; 
  $wp_query = new WP_Query(); 
  $show_posts = 12;  //How many post you want on per page
  $permalink = 'Post name'; // Default, Post name
  $post_type = 'dl_portfolio';
   
  //Know the current URI
  $req_uri =  $_SERVER['REQUEST_URI'];  
   
  //Permalink set to default
  if($permalink == 'Default') {
  $req_uri = explode('paged=', $req_uri);
   
  if($_GET['paged']) {
  $uri = $req_uri[0] . 'paged='; 
  } else {
  $uri = $req_uri[0] . '&paged=';
  }
  //Permalink is set to Post name
  } elseif ($permalink == 'Post name') {
  if (strpos($req_uri,'page/') !== false) {
  $req_uri = explode('page/',$req_uri);
  $req_uri = $req_uri[0] ;
  }
  $uri = $req_uri . 'page/';
   
  }
   
  //Query
  $wp_query->query('showposts='.$show_posts.'&post_type='. $post_type .'&paged='.$paged); 
  //count posts in the custom post type
 $count_posts = wp_count_posts($post_type);
 
  while ($wp_query->have_posts()) : $wp_query->the_post(); 
  ?>
  <!--Do stuff-->

 		<div class="portfolio-item">
			<div class="port-image">
				<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_post_thumbnail('medium'); ?></a>
				<div class="port-cat">
				<h5><?php the_category(); ?></h5>
				</div>
			</div>
			<h3 class="entry-title">
				<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
			</h3>
			<!--<div class="entry-excerpt">
				<?php the_excerpt(); ?>
			</div>-->
		</div>
 
  <?php endwhile;?>
  </div>
  <br />
  <nav>
  <div class = "navleft"><?php previous_posts_link('Previous') ?></div>
  <div class="navright"><?php next_posts_link('More') ?></div>
  </nav>
  	
	</div>
	</section>
 
  <?php 
  $wp_query = null; 
  $wp_query = $temp;  // Reset
  get_footer(); ?>