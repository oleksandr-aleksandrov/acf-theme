			</main>


			<footer class="container footer">
				<div class="row">
					<div class="col-sm-4 footer-logo">
						<?php $custom_logo_id = get_theme_mod( 'custom_logo' );
						$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' ); ?>
						<a href="<?php bloginfo('url'); ?>" class="logo navbar-brand">
							<img src="<?php echo $logo[0]; ?>" alt="<?php bloginfo('name'); ?>" />
						</a>
					</div>
					<div class="col-sm-4 col-xs-6 footer-copyright">
						<p>© 2017 FDI Spotlight Ltd</p>
					</div>
					<div class="col-sm-4 col-xs-6 footer-contact pull-right">
						<a href="" class="pull-right">Contact Us</a>
					</div>
				</div>
			</footer>
			<?php wp_footer(); ?>
			<script src="https://cdn.jsdelivr.net/jquery.sidr/2.2.1/jquery.sidr.min.js"></script>
		</body>
		</html>