<?php
	get_header();
	the_post(); ?>
	<div class="article-container">
		<div class="main"><?
            breadcrumbs();
            page_h1_title();
            page_content();
            ?>
		</div>
	</div>
<?
	get_footer();
?>