	</main>

	<footer id="colophon" class="site-footer" role="contentinfo">

		<nav class="footer-nav">

			<?php
			wp_nav_menu( array(
				'theme_location' => 'footer',
				'menu_class' => '',
				'container' => '',
				'fallback_cb' => false,
				'depth' => 1,
			) );
			?>

		</nav>

	</footer>

<?php wp_footer(); ?>

</body>
</html>
