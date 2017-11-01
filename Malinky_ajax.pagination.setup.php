<?php
/*
plugin URL : https://wordpress.org/plugins/malinky-ajax-pagination/
SETTINGS:
	Posts selector : .posts-selector-multiple-2
	Post selector : .post-items2  - increment the item[x] if you have multiple pagination on the page
	Navigation selector : .navigation
	Next selector : .navigation a.next
*/
?>
<div class="posts-selector-multiple-2">
 	<div class="row">
	    <?php
	    // Set custom paged query.
	    $paged2 = isset( $_GET['paged2'] ) ? (int) $_GET['paged2'] : 1;
	    // Set query args. These will vary based on your own query.
	    $args = array(
	        'post_type' => 'services',
			'tax_query' => array(
				array(
					'taxonomy' => 'ourservice',
					'field'    => 'slug',
					'terms'    => 'report'
				)),
			'posts_per_page' => 1,
			'paged' => $paged2
	    );
	    // New query.
	    $query = new WP_Query($args);
	    if( $query->have_posts() ):
			while( $query->have_posts() ): 
				$query->the_post();
	    ?>
		    <div class="col-lg-3 posts-item2">
				<a href='<?php the_permalink(); ?>'>
				<div class="panel services-list-item">
					<?php 
						$imgUrl = get_the_post_thumbnail_url(); 
						echo '<div class="services-list-img" style="background-image:url(\''.$imgUrl.'\')"></div>';
					?>
					<h2 class="title_wrap"><?php the_title(); ?></h2>
					<p class="content_wrap"><?php the_excerpt(); ?></p>
				</div>
				</a>
			</div>
		<?php
				endwhile;
			endif;
		?>
	</div>
    <!-- Wrap the pagination -->
    <div class="row clearfix mauto">
    	<nav aria-label="Page">
        	<?php
		    // Set the pagination args.
		    $paginateArgs = array(
		        'format' => '?paged2=%#%',
		        'current' => $paged2, // Reference the custom paged query we initially set.
		        'total'   => $query->max_num_pages, // Max pages from our custom query.
		        'type'  => 'array',
				'prev_text'    => __('Prev'),
				'next_text'    => __('Next'),
				'class' => 'page'
		    ); ?>
		    <!-- Wrap the pagination -->
		    <!-- Wrap the pagination -->
		    <div class="navigation">
		        <?php $pages = paginate_links( $paginateArgs );
		        	if( is_array( $pages ) ) {
						echo '<ul class="pagination pagination-sm">';
							foreach ( $pages as $k => $page ) {
								$strSearch = strpos($page, 'current');
								$active = (!$strSearch == false) ? 'active' : '';
								$page = str_replace('page-numbers', 'page-link', $page);
								echo '<li class="page-item '.$active.'">'.$page.'</li>';
							}
						echo '</ul>';
					}
		        ?>
		    </div>
    	</nav>
    </div>
 	<?php wp_reset_query(); ?>
</div>