<?php
// This removes the default post navigation in the plugin "Auto Load Next Post" template.
remove_action('alnp_load_after_content', 'auto_load_next_post_navigation', 1, 10);

// This adds a compaitable post navigation for Twenty Thirteen for the plugin "Auto Load Next Post".
function twentythirteen_alnp_post_nav() {
	twentythirteen_post_nav();
}
add_action('alnp_load_after_content', 'twentythirteen_alnp_post_nav', 1, 10);
