<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<a class="skip-link screen-reader-text" href="#content">Skip to content</a>

	<header id="masthead" class="site-header" role="banner">

		<div class="custom-header">

			<div class="navigation-top site-navigation-fixed">

				<div class="wrap">

					<div class="site-title">
						<a href="<?php echo esc_url( home_url() ); ?>" rel="home"><span class="weight">JC</span>Dream</a>
					</div>

					<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="Top Menu">

						<button id="js-menu-toggle" class="menu-toggle" aria-controls="top-menu" aria-expanded="false">
							<svg class="icon icon-bars" aria-hidden="true" role="img">
								<use href="#icon-bars" xlink:href="#icon-bars"></use>
							</svg>
							<svg class="icon icon-close" aria-hidden="true" role="img">
								<use href="#icon-close" xlink:href="#icon-close"></use>
							</svg>
							<span class="screen-reader-text">Toggle site menu</span>
							<span aria-hidden="true">Menu</span>
						</button>

						<?php
						wp_nav_menu( array(
							'theme_location' => 'top',
							'menu_id' => 'top-menu',
							'menu_class' => '',
							'container_class' => 'top-menu-container',
							'fallback_cb' => false,
							'depth' => 1,
						) );
						?>

					</nav><!-- #site-navigation -->

				</div><!-- .wrap -->

			</div><!-- .navigation-top -->

		</div><!-- .custom-header -->

	</header><!-- #masthead -->

	<main id="content" class="site-main" role="main">
