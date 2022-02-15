<?php
/**
 * The template for displaying Category pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

	<section id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

			<?php if ( have_posts() ) : ?>

			<header class="archive-header">
                <h1 class="archive-title">
                <?php
                /* translators: %s: Category title. */
                // printf( __( 'Category Archives: %s', 'twentyfourteen' ), single_cat_title( '', false ) );
                echo single_cat_title( '', false );
				?>
				</h1>

				<?php
					// Show an optional term description.
					$term_description = term_description();
				if ( ! empty( $term_description ) ) :
					printf( '<div class="taxonomy-description">%s</div>', $term_description );
					endif;
				?>
			</header><!-- .archive-header -->

                <article>
                    <div class="entry-content">
    				<?php
                        $shortcode = "[catlist id=";
                        $shortcode .= get_queried_object_id();
                        $shortcode .=  " orderby=date order=desc title_class=lcp_title date=yes date_class=lcp_date author=yes author_class=lcp_author dateformat=\"j. F Y \" numberposts=100 posts_cats=yes posts_cats_class=lcp_cats]";
                        echo do_shortcode($shortcode);
                    ?>
                    </div>
                </article>

<?php
				// // Start the Loop.
				// while ( have_posts() ) :
				// 	the_post();
				// 	/*
				// 	* Include the post format-specific template for the content. If you want
				// 	* to use this in a child theme, then include a file called content-___.php
				// 	* (where ___ is the post format) and that will be used instead.
				// 	*/
				// 	// get_template_part( 'content', get_post_format() );
					// endwhile;
				// 	// Previous/next page navigation.
				// 	twentyfourteen_paging_nav();
                        ?>

            <?php
			else :
				// If no content, include the "No posts found" template.
				get_template_part( 'content', 'none' );

			endif;
			?>
		</div><!-- #content -->
	</section><!-- #primary -->

<?php
get_sidebar( 'content' );
get_sidebar();
get_footer();
