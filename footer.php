					</main><!-- #content -->

				</div><!-- #primary -->

			</div><!-- #content -->

			<footer id="colophon" class="site-footer" role="contentinfo">

				<div class="wrap">

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

				</div>

			</footer>

		</div><!-- .site-content-contain -->

	</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
