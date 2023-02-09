<?php
$post = $wp_query->post;
if ( in_category('3') ) {
   include(TEMPLATEPATH . '/casinoreviews.php');
} 
else {
   include(TEMPLATEPATH . '/post.php');
}
?>