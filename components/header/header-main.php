<?php
/**
 * Template part for displaying header/nav
 */

?>

<header class="header">
	<div class="logo">
		<a href="./"><img src="<?php bloginfo('template_directory')?>/img/logo.svg" alt="Logo" /></a>
	</div>

	<button class="hamburger" type="button">
		<span class="hamburger-box">
			<span class="hamburger-inner"></span>
		</span>
	</button>

	<nav class="primary-nav">
		<?php bem_menu('primary', 'primary-nav'); ?>
	</nav> <!--/.primary-nav-->

</header>
