<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Landing_site
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
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'landing_site' ); ?></a>

	<header id="masthead" class="s-header">
		<div class="sm-header__branding">
			<?php
			the_custom_logo();
			if ( is_front_page() && is_home() ) :
				?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
			else :
				?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
			endif;
			$landing_site_description = get_bloginfo( 'description', 'display' );
			if ( $landing_site_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $landing_site_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
			<?php endif; ?>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="row s-header__navigation">
			<div class="s-header__nav-wrap">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
						'menu_class'     => 's-header__nav',
					)
				);
				?>
			</div>
		</nav>		
		<button class="s-header__search-trigger" aria-label="<?php echo esc_attr__('Open Search', 'your-text-domain'); ?>">
    		<i class="fas fa-search"></i>
		</button>
		<div class="s-header__search">
    		<div class="s-header__search-inner">
        		<div class="row">
            		<form role="search" method="get" class="s-header__search-form" action="<?php echo esc_url(home_url('/')); ?>">
                		<label>
                    		<span class="u-screen-reader-text"><?php _e('Search for:', 'your-text-domain'); ?></spa>
                    		<input type="search" class="s-header__search-field" 
                           placeholder="<?php echo esc_attr__('Search for...', 'your-text-domain'); ?>" 
                           value="<?php echo get_search_query(); ?>" 
                           name="s" 
                           title="<?php echo esc_attr__('Search for:', 'your-text-domain'); ?>" 
                           autocomplete="off">
                		</label>
                		<input type="submit" class="s-header__search-submit" value="<?php echo esc_attr__('Search', 'your-text-domain'); ?>">
            		</form>
            		<a href="#0" title="<?php echo esc_attr__('Close Search', 'your-text-domain'); ?>" class="s-header__search-close">
                		<?php _e('Close', 'your-text-domain'); ?>
            		</a>
        		</div> 
    		</div>
		</div> 

	</header>