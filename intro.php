<?php
/*
Template Name: intro
*/

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> style="height: 100%;">

<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
	<title><?php
					/*
	 * Print the <title> tag based on what is being viewed.
	 */
					global $page, $paged;

					wp_title('-', true, 'right');

					// Add the blog name.
					bloginfo('name');

					// Add the blog description for the home/front page.
					$site_description = get_bloginfo('description', 'display');
					if ($site_description && (is_home() || is_front_page()))
						echo " - $site_description";

					// Add a page number if necessary:
					if ($paged >= 2 || $page >= 2)
						echo ' - ' . sprintf(__('Page %s', 'twentyten'), max($paged, $page));

					?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

</head>

<body <?php body_class(); ?>>


	<div id="titelcenter">

		<p><a href="https://underdox-festival.de/blog/"><img class="alignnone size-full wp-image-1240" src="https://underdox-festival.de/wp-content/uploads/2021/06/UX16_banner_web-2-e1623069113107.jpg" alt="Underdox Filmfestival für Dokument und Experiment München" width="696" height="79" /></a></p>
		<p align="center"><a href="https://underdox-festival.de/blog/">deutsch</a> | <a href="https://www.underdox-festival.de/en/programme.htm">english</a></p>

	</div>

	<div class="" style=" position:absolute; bottom:0; right:0;  padding:1em 2em; color:#7160f9;">&copy; UNDERDOX filmfestival </div>

</body>

</html>