<?php get_header(); ?>

<div class="wrap">

	<?php if ( is_home() && ! is_front_page() ) : ?>
	<header class="page-header">
		<h1><?php single_post_title(); ?></h1>
	</header>
	<?php else : ?>
	<header class="page-header">
		<h2><?php _e( 'Posts', 'twentyseventeen' ); ?></h2>
	</header>
	<?php endif; ?>

	<div id="primary" class="content-area">

		<main id="main" class="site-main" role="main">

			<?php
				if ( have_posts() ) :

					while ( have_posts() ) : the_post();

						get_template_part( 'components/post/content' );

					endwhile;

					the_posts_pagination( array(
						'prev_text' => twentyseventeen_get_svg( array( 'icon' => 'previous' ) ) . '<span class="screen-reader-text">' . __( 'Previous page', 'twentyseventeen' ) . '</span>',
						'next_text' => '<span class="screen-reader-text">' . __( 'Next page', 'twentyseventeen' ) . '</span>' . twentyseventeen_get_svg( array( 'icon' => 'next' ) ),
						'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentyseventeen' ) . ' </span>',
					) );

				else :

					get_template_part( 'components/post/content', 'none' );

				endif;
			?>

		</main>

	</div>

	<?php get_sidebar(); ?>

</div>

<?php get_footer();
