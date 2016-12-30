<?php
/**
 * This file loads the content when called.
 *
 * @version 1.4.8
 */

if ( have_posts() ) :

	// Load content before the loop.
	do_action('alnp_load_before_loop');

	// Check that there are posts to load.
	while (have_posts()) : the_post();

		// Load content before the post content.
		do_action('alnp_load_before_content');
		?>

		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<h1 class="entry-title"><?php the_title(); ?></h1>

			<div class="entry-meta">
				<?php twentyten_posted_on(); ?>
			</div><!-- .entry-meta -->

			<div class="entry-content">
				<?php the_content(); ?>
				<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'twentyten' ), 'after' => '</div>' ) ); ?>
			</div><!-- .entry-content -->

			<?php if ( get_the_author_meta( 'description' ) ) : // If a user has filled out their description, show a bio on their entries  ?>
			<div id="entry-author-info">
				<div id="author-avatar">

					<?php
					/** This filter is documented in author.php */
					echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'twentyten_author_bio_avatar_size', 60 ) );
					?>
				</div><!-- #author-avatar -->

				<div id="author-description">

				<h2><?php printf( __( 'About %s', 'twentyten' ), get_the_author() ); ?></h2>
					<?php the_author_meta( 'description' ); ?>
					<div id="author-link">
						<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
							<?php printf( __( 'View all posts by %s <span class="meta-nav">&rarr;</span>', 'twentyten' ), get_the_author() ); ?>
						</a>
					</div><!-- #author-link	-->

				</div><!-- #author-description -->

			</div><!-- #entry-author-info -->
			<?php endif; ?>

			<div class="entry-utility">
				<?php twentyten_posted_in(); ?>
				<?php edit_post_link( __( 'Edit', 'twentyten' ), '<span class="edit-link">', '</span>' ); ?>
			</div><!-- .entry-utility -->

		</div><!-- #post-## -->

		<div id="nav-below" class="navigation">
			<div class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'twentyten' ) . '</span> %title' ); ?></div>
			<div class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'twentyten' ) . '</span>' ); ?></div>
		</div><!-- #nav-below -->

		<?php
		// Load content after the post content.
		do_action('alnp_load_after_content');

	// End the loop.
	endwhile;

		// Load content after the loop.
		do_action('alnp_load_after_loop');

else :

	// Load content if there are no more posts.
	do_action('alnp_no_more_posts');

endif; // END if have_posts()
