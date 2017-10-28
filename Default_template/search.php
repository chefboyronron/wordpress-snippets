<?php get_header(); ?>
	<div class="row">
		<div class="col-8">
			<?php 
				if( have_posts() ):
					while( have_posts() ): 
						the_post();
						$terms = get_terms(array('field')); 
						$post_terms = '';
						$count = count($terms); 
						if ( $count > 0 ){ 
							foreach ( $terms as $term ) {
								$post_terms .= '<a href="'.get_site_url().'/'.$term->taxonomy.'/'.$term->name.'" rel="category tag">'.$term->name.'</a> '; 
							} 
						}
			?>
						<h1><?php the_title(); ?></h1>
			<?php
						if(has_category()):
			?>
						<small><?php the_category(' '); ?></small>
			<?php
						else:
			?>
						<small><?php echo $post_terms; ?></small>
			<?php
						endif;
			?>
						<p><?php the_excerpt(); ?></p>
						<hr>
			<?php
					endwhile;
				else:
					echo '<p><h3>Sorry, no results "'.get_search_query().'"</h3></p>';
				endif;
			?>
		</div>
		<div class="col-4">
			<?php get_sidebar(); ?>
		</div>
	</div>
<?php get_footer(); ?>