<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Affiliate Blogger
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('posts-entry fbox blogposts-list'); ?>>
	<?php if ( has_post_thumbnail() ) : ?>
		<div class="featured-img-box">
			<a href="<?php the_permalink() ?>" class="featured-thumbnail" rel="bookmark">
				<div class="featured-thumbnail-inner" style="background-image:url(<?php the_post_thumbnail_url('full'); ?>);">
				</div>
			</a>
		<?php else : ?>
			<div class="no-featured-img-box">
			<?php endif; ?>
			<div class="content-wrapper">
	
				<header class="entry-header">
					<?php
					if ( is_singular() ) :
						the_title( '<h1 class="entry-title">', '</h1>' );
					else :
						the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
					endif;

					if ( 'post' === get_post_type() ) : ?>
					<?php
					endif; ?>
				</header><!-- .entry-header -->
			<div class="entry-meta">
					<div class="post-data-text">
						<?php draftly_posted_on(); ?> <?php echo esc_html_e('By', 'affiliate-blogger') ?> <?php echo get_the_author(); ?>
					</div>
				</div><!-- .entry-meta -->
				<div class="entry-content">
					<?php
					the_excerpt( sprintf(
						wp_kses(
							/* translators: %s: Name of current post. Only visible to screen readers */
							__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'affiliate-blogger' ),
							array(
								'span' => array(
									'class' => array(),
									),
								)
							),
						get_the_title()
						) );


					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'affiliate-blogger' ),
						'after'  => '</div>',
						) );
						?>
						<div class="read-more-blogfeed">
							<a href="<?php the_permalink() ?>"><?php echo __('Read More', 'affiliate-blogger') ?></a>
						</div>
					</div><!-- .entry-content -->

				</div>
			</div>
		</article><!-- #post-<?php the_ID(); ?> -->
