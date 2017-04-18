<div class="col-md-12 col-lg-12" id="social-media-bar">

</div>
<footer class="col-md-12 col-lg-12">

<?php 
		$ddata_footer_nav_menu = array(
			'theme-location' => 'footer-nav-menu',
			'container' => 'nav',
			'container_class' => 'col-md-10 col-lg-10',
			'container_id' => 'footer-nav',
			'menu_class' => 'col-md-offset-4 col-lg-offset-4',
			'walker' => new footer_nav_walker()
		);
	?>
	<?php wp_nav_menu($ddata_footer_nav_menu);?>
<?php wp_footer();?>
</footer>
</div>
</body>
</html>