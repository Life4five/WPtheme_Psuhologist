<?php get_header(); ?>
    <div class="header-path">
        <div class="main">
            <?php breadcrumbs(); ?>
        </div>
    </div>
<div class="content">
    <div class="main">
        <div class="articles2">
            <h1 class="page-articles-title"><span><?=page_title($cat)?></span></h1>
            <div class="articles-wrapper">
                <div class="articles-list">
                <?php
                if (!have_posts()) { ?>
                    <div class="articles_empty">Нет статей</div>
                <?php
                } else {
                    while(have_posts()) {
                        the_post();
                        ?>
                        <div class="articles-block">
                            <div class="ab_img">
                                <a href="<? the_permalink(); ?>">
                                    <?php
                                        if (has_post_thumbnail()) {
                                            the_post_thumbnail('article_thumb');
                                        } else {
                                            echo "<img src='http://beton2022.tmweb.ru/wp-content/uploads/2022/01/blank-article.png' width='100%' alt=''>";
                                        }
                                    ?>
                                </a>
                            </div>
                            <div class='articles-block-date'><? the_time('d.m.Y'); ?></div>
                                <div class="articles-block-text">
                                    <a href="<? the_permalink(); ?>"><? the_title(); ?></a>
                                </div>
                        </div>
                    <?php } ?>
                <?php } ?>
            </div>
            </div> 
        </div>
        <?php 
		echo paginate_links(array(
			'prev_text' => '',
			'next_text' => '',
			'type' => 'list'
		)); ?>
    </div>
</div>
<?php include 'footer-offer.php';?>
<?php get_footer(); ?>