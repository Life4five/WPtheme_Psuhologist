<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package family-psiholog
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
        
	<?php wp_head(); ?>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/fancybox/jquery.fancybox-1.3.8.css">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/slick.css">
    <link href="<?=get_stylesheet_uri()?>?v=<?=filemtime(get_template_directory() . '/style.css')?>" rel="stylesheet">

</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(87478706, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true
   });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/87478706" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
    <header>
        <div class="wrapper">
            <div class="header-logo"><a href="/">
                <svg><use xlink:href="#mdi_puzzle-heart"></use></svg>
                <span><?php echo get_field('logo-text'); ?></span>
            </a></div>
            <div class="header-tel">
                <a href="https://wa.me/<? echo get_tel_link( get_field('tel') )?>">
                    <svg><use xlink:href="#wa-logo"></use></svg>
                </a>
                <a href="tel:<?php echo get_tel_link( get_field('tel') ); ?>">
                    <?php echo get_field('tel'); ?>
                </a>
            </div>
        <?php wp_nav_menu( array(
                'menu' => 'Menu1',
                'container' => 'ul',
                'menu_class' => 'nav-bar',
            )); ?>
        <div class="burger-menu">
            <!-- <img src="<?php echo get_template_directory_uri();?>/img/burger-menu.svg"> -->
            <svg><use xlink:href="#burger-menu"></use></svg>
        </div>
        </div>
        <div class="nav-window">
            <div class="nav-window-innner">
                <div class="nav-window-top">
                    <div class="header-logo">
                        <svg><use xlink:href="#mdi_puzzle-heart"></use></svg>
                        <a href="/"><?php echo get_field('logo-text'); ?></a>
                    </div>
                    <div class="nav-menu-close">
                        <svg><use xlink:href="#nav-menu-close"></use></svg>
                    </div>
                </div>
                <?php wp_nav_menu( array(
                    'menu' => 'Menu1',
                    'container' => 'ul',
                    'menu_class' => 'nav-menu',
                )); ?>
                <div class="nav-window-bottom">
                    <div class="header-tel">
                        <a href="https://wa.me/<? echo get_tel_link( get_field('tel') )?>">
                            <svg><use xlink:href="#wa-logo"></use></svg>
                        </a>
                        <a href="tel:<?php echo get_tel_link( get_field('tel') ); ?>">
                            <?php echo get_field('tel'); ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>