<?php
/*=====================
Location: function.php - Select what post type include on the search query
=======================*/
function my_search_filter($query) {
  if ( !is_admin() && $query->is_main_query() ) {
    if ($query->is_search) {
      $query->set('post_type', array( 'post', 'portfolio' ) );
    }
  }
}
add_action('pre_get_posts','my_search_filter');
?>