<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package UnderGongs
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'undergongs' ); ?></a>


			<?php /* DISPLAY 3 GONGS */
			if ( is_post_type_archive('record')){
				$gong_nb = 1;
			} else {
				$gong_nb = 3;
			}


			for ($x = 0; $x < $gong_nb; $x++) {
				// Pick a random gong
				$gong_model =  rand(1, 8) ;
				$gong_base_url =  get_stylesheet_directory_uri() . '/img/gong_' . $gong_model;
				$gongs_srcset = $gong_base_url . '_small.png 100w, ' . $gong_base_url . '_medium.png 250w, ' . $gong_base_url . '_large.png 500w' ;


				if ($x == 0) : // First gongs goes with..

					if (has_custom_logo()) { //  .. the logo and description
						$custom_logo_id = get_theme_mod( 'custom_logo' );
						$image = wp_get_attachment_image_src( $custom_logo_id , 'medium' );

					?><div class="site-branding site-gongs site-logo-wrapper" style="background-image:url('<?php echo $image[0]; ?>')"> <?php
				} else { // Juste the name of the blog
					?><div class="site-branding">
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1><?php
				}

				else :  // Others gongs comes alone ?>

					<div class="site-gongs site-branding">

				<?php endif; ?>

					<img 	src="<?php echo $gong_base_url . '.png'; ?>"
								width="250"
								height="250"
								alt="Gong"
								srcset="<?php echo $gongs_srcset; ?>"
								sizes="30vh"
					/>
				</div>


			<?php }  ?>

<!-- NOTE TAILLES ECRANS : breakpoints
	Mobile : moins de 768 de large
	Small : 768×1024
	Standard : 1024×768
	HD : 1536×864
 -->

			<?php $undergongs_description = get_bloginfo( 'description', 'display' );
			if ( $undergongs_description || is_customize_preview() ) : ?>
			<div class="site-branding">
				<p class="site-description"><?php echo $undergongs_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
			</div>
			<?php endif; ?>

<div class="center-bar">
	<?php if (is_front_page()) { ?>
		<h1 class="entry-title"></h1>
	<?php } elseif (is_singular()) {
		the_title( '<h1 class="entry-title">', '</h1>' );
	} elseif (is_archive()) {
		the_archive_title( '<h1 class="page-title">', '</h1>' );
	}
	?>

	<nav id="site-navigation" class="main-navigation">
		<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'undergongs' ); ?></button>
		<?php
		wp_nav_menu(
			array(
				'theme_location' => 'menu-1',
				'menu_id'        => 'primary-menu',
			)
		);
		?>
	</nav><!-- #site-navigation -->
</div>
