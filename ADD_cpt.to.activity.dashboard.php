<?php
if ( is_admin() ) {
	add_filter( 'dashboard_recent_posts_query_args', 'add_page_to_dashboard_activity' );
	function add_page_to_dashboard_activity( $query_args ) {
		if ( is_array( $query_args[ 'post_type' ] ) ) {
			//Set yout post type
			$query_args[ 'post_type' ][] = 'portfolio';
		} else {
			$temp = array( $query_args[ 'post_type' ], 'portfolio' );
			$query_args[ 'post_type' ] = $temp;
		}
		return $query_args;
	}
}
?>