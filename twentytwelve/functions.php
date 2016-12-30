<?php
// This removes the default post navigation in the plugin "Auto Load Next Post" template.
remove_action('alnp_load_after_content', 'auto_load_next_post_navigation', 1, 10);

// This adds a compaitable post navigation for Twenty Twelve for the plugin "Auto Load Next Post".
function twentytwelve_alnp_post_nav() {
?>
<nav class="nav-single">
	<h3 class="assistive-text"><?php _e( 'Post navigation', 'twentytwelve' ); ?></h3>
	<span class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'twentytwelve' ) . '</span> %title' ); ?></span>
	<span class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'twentytwelve' ) . '</span>' ); ?></span>
</nav><!-- .nav-single -->
<?php
}
add_action('alnp_load_after_content', 'twentytwelve_alnp_post_nav', 1, 10);
