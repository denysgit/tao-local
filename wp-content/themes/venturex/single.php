<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Venturex
 * @since Venturex 1.0
 */

get_header(); ?>

		<div id="main">
			<div id="content">
				<div id="maintext">

			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<h1 class="post-title"><?php the_title(); ?></h1>
					
					<div class="entry-utility-comment">
					<?php comments_popup_link(__('<span class="cm">No</span> <span class="cm2">Comments</span> ', 'templatesquare'), __('<span class="cm">1</span> <span class="cm2">Comments</span> ', 'templatesquare'), __('<span class="cm">%</span> <span class="cm2">Comments</span> ', 'templatesquare')); ?>
					</div>
					<div class="entry-utility"><?php  the_time('F j') ?>&nbsp;&nbsp;|&nbsp;&nbsp;<?php the_category(', ') ?>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) );?>"> <?php the_author();?></a></div>


					<div class="entry-content">
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'templatesquare' ), 'after' => '</div>' ) ); ?>
					</div><!-- .entry-content -->
					
					
					<div class="entry-utility">
						<?php ts_posted_in(); ?>
						<?php edit_post_link( __( 'Edit', 'templatesquare' ), '<span class="edit-link">', '</span>' ); ?>
					</div><!-- .entry-utility -->
					
					<?php if ( get_the_author_meta( 'description' ) ) : // If a user has filled out their description, show a bio on their entries  ?>
					<div id="entry-author-info">
						<div id="author-avatar">
							<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'templatesquare_author_bio_avatar_size', 60 ) ); ?>
						</div><!-- #author-avatar -->
						<div id="author-description">
							<h2><?php printf( esc_attr__( 'About %s', 'templatesquare' ), get_the_author() ); ?></h2>
							<?php the_author_meta( 'description' ); ?>
							<div id="author-link">
								<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
									<?php printf( __( 'View all posts by %s <span class="meta-nav">&rarr;</span>', 'templatesquare' ), get_the_author() ); ?>
								</a>
							</div><!-- #author-link	-->
						</div><!-- #author-description -->
					</div><!-- #entry-author-info -->
					<?php endif; ?>

				</div><!-- #post-## -->

				<?php comments_template( '', true ); ?>

				<?php endwhile; // end of the loop. ?>

				</div><!-- end #maintext -->
			</div><!-- end #content -->
			<div id="sideright">
				<?php get_sidebar();?>
			</div><!-- end #sideright -->
			<div class="clear"></div>
		</div><!-- end #main -->
<?php get_footer(); ?>
