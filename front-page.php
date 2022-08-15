<?php get_header(); ?>

    <div id="intro" class="intro">
        <div class="wrapper">
            <div class="intro-content">
                <div class="intro-title title">
                    <?php the_field('intro-title'); ?>
                    <div class="intro-title-overlap"></div>
                </div>
                <div class="intro-text"><?php the_field('intro-text'); ?></div>
                <div class="btn exp-btn"><span class="show_modal" data-window="call_form">получить консультацию</span></div>
            </div>
            <div class="intro-img">
                <div class="intro-img-container"><img src="<?php the_field('intro-img'); ?>"></div>
                <div class="intro-img-link">
                    <span>
                        Чумакова Александра 
                    </span>
                </div>
            </div>
            <div class="mobile-btn btn"><span class="show_modal" data-window="call_form">получить консультацию</span></div>
        </div>
    </div>
    <div id="exp" class="exp">
        <div class="wrapper">
            <div class="layout">
                <div class="btn exp-btn-mobile"><span class="show_modal" data-window="call_form">получить консультацию</span></div>
                <div class="exp-img">
                    <div class="video-thumbnail">
                       <img src="<?php the_field('exp-img'); ?>"/>
                    </div>
                </div>
                <div class="exp-content">
                    <div class="exp-title title">
                        <div class="exp-title-wrapper">
                            <span><?php the_field('exp-title'); ?></span>
                            <div class="exp-title-overlap"></div>
                        </div>
                    </div>
                    <div class="exp-serts-mobile">
                        <?php
                            while (have_rows('serts')) { the_row();
                                echo getACFpic(get_sub_field('img'), array('modal' => 'fancybox'));
                            }   
                        ?>
                    </div>
                    <div class="exp-list"><?php the_field('exp-list'); ?></div>
                    <div class="exp-text"><span><?php the_field('exp-text'); ?></span></div>
                    <div class="exp-serts">
                        <?php
                            while (have_rows('serts')) { the_row();
                                echo getACFpic(get_sub_field('img'), array('modal' => 'fancybox'));
                            }   
                        ?>
                    </div>
                    <!-- <div class="btn exp-btn"><span class="show_modal" data-window="call_form">получить консультацию</span></div> -->
                </div>
            </div>
        </div>
    </div>
    <div class="psiholog">
        <div class="wrapper">
            <div class="psiholog-container">
                <div class="psiholog-title title">ПСИХОЛОГ ЭТО</div>
                <div class="psiholog-cards">
                    <?php
                    $psiholog_card = 0;
                    while (have_rows('psiholog-cards')) { the_row();
                        $psiholog_card++;
                        echo '<div class="psiholog-card">';
                        echo    '<div class="psiholog-card-img" id="psiholog-card-img-'.$psiholog_card.'">
                                    <img src="'.get_sub_field('card-img').'">
                                </div>';
                        echo    '<div class="psiholog-card-text">';
                        echo        '<span>'.get_sub_field('card-text').'</span>';
                        echo    '</div>';
                        echo'</div>';
                    }   
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div id="appointment" class="appointment">
        <div class="appointment-bg" id="appointment-bg">
            <!-- <img src="<?php echo get_template_directory_uri();?>/img/appointment-gif.gif" alt=""> -->
            <div class="white-blank"></div>
        </div>
        <div class="appointment-bg-mobile">
            <img src="<?php echo get_template_directory_uri();?>/img/appointment-gif.gif" alt="">
            <div class="white-blank"></div>
        </div>
        <div class="wrapper">
            <div class="appointment-title title">Как проходят <br> сессии</div>
            <div class="appointment-text"><?php the_field('appointment-text'); ?></div>
            <div class="btn appointment-btn"><span class="show_modal" data-window="call_form">получить консультацию</span></div>
        </div>
    </div>
    <div id="result" class="result">
        <div class="wrapper">
                
                <div class="result-content">
                    <div class="result-container">
                        <div class="result-title title"><?php the_field('result-title'); ?></div>
                            <div class="result-img-mobile">
                                <img src="<?php the_field('result-img'); ?>">
                            </div>
                        <div class="result-list">
                            <?php the_field('result-list'); ?>
                        </div>
                    </div>
                </div>
                <div class="result-img">
                       <img src="<?php the_field('result-img'); ?>">
                </div>
        </div>
        <div class="wrapper">
                <div class="result-img" id="result-img">
                    <!-- <img src="<?php the_field('result-img2'); ?>"> -->
                </div>
            <div class="result-content">
                <div class="result-container">
                    <div class="result-title title"><?php the_field('result-title2'); ?></div>
                    <div class="result-img-mobile" id="result-img-mobile">
                        <!-- <img src="<?php the_field('result-img2'); ?>"> -->
                    </div>
                    <div class="result-list">
                        <?php the_field('result-list2'); ?>
                    </div>
                    <div class="btn result-btn"><span class="show_modal" data-window="call_form">ПОЛУЧИТЬ КОНСУЛЬТАЦИЮ</span></div>
                </div>
            </div>
        </div>
    </div>
    <div class="reviews_ter">
        <div class="wrapper">
            <div class="reviews_tit_ter title"><?php the_field('reviews_tit_ter'); ?></div>
            <div class="reviews_slider reviews_ter_slider">
                <?php while (have_rows('reviews_ter')) { the_row(); ?>
                    <div class="review_ter_slide">
                        <? echo getACFpic(get_sub_field('img'), array('modal' => 'fancybox', 'size_name' => 'rev_thumb')); ?>
                    </div>
                <? } ?>
            </div>
        </div>
    </div>
    <div id="prices" class="prices">
        <div class="wrapper">
            <div class="prices-title title">Стоимость консультации</div>
            <div class="prices-subtitle">Консультации проходят как online так и offline</div>
            <div class="prices-cards">

                <?php while (have_rows('prices-cards')) { the_row ();
                echo '<div class="prices-card">';
                echo    '<div class="prices-card-title">';
                echo        '<span>'. get_sub_field('card-title1') .'</span><br>';
                echo        '<span>'. get_sub_field('card-title2') .'</span>';
                echo    '</div>';
                echo    '<div class="prices-card-subtitle">
                         ⁃ обратная связь<br>
                         ⁃ смс, звонки<br>
                         ⁃ SOS случаи<br>
                         </div>';
                echo    '<div>';
                echo    '<div class="prices-card-price">'. get_sub_field('card-price') .'</div>';
                echo    '<div class="prices-card-btn"><span class="show_modal" data-window="call_form" data-seans="'. strip_tags(get_sub_field('card-title1')) .' '. strip_tags(get_sub_field('card-title2')) .' '. strip_tags(get_sub_field('card-price')) .'">Записаться</span></div>';
                echo    '</div>';
                echo    '<div class="card-ribbon"><img src="'.get_template_directory_uri().'/img/ribbon.svg"></div>';
                echo '</div>';
                }
                ?>

            </div>
        </div>
    </div>
    <div class="game">
        <div class="wrapper">
            <div class="layout">
                <div class="game-content">
                    <div class="game-title title"><?php the_field('game-title'); ?></div>
                        <div class="game-img-mobile">
                            <div class="game-video-thumbnail">
                               <img src="<?php the_field('game-img'); ?>" alt="">
                               <div class="play-btn show_modal" data-window="video_window">
                                    <svg><use xlink:href="#play-btn"></use></svg>
                                   <!-- <img src="<?php echo get_template_directory_uri();?>/img/play-btn.svg"> -->
                               </div>
                            </div>
                        </div>
                    <div class="game-text"><?php the_field('game-text'); ?></div>
                    <div class="btn game-btn"><span class="show_modal" data-window="call_form" data-seans="Запись на игру">Записаться на игру</span></div>
                </div>
                <div class="game-img">
                    <div class="game-video-thumbnail">
                       <img src="<?php the_field('game-img'); ?>" alt="">
                       <div class="play-btn show_modal" data-window="video_window">
                            <svg><use xlink:href="#play-btn"></use></svg>
                           <!-- <img src="<?php echo get_template_directory_uri();?>/img/play-btn.svg"> -->
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php /*
    <div class="reviews">
        <div class="wrapper">
            <div class="reviews_tit"><?php the_field('reviews_tit'); ?></div>
            <div class="reviews_slider">
                <?php while (have_rows('reviews')) { the_row(); ?>
                    <div class="review_slide">
                        <div class="review_slide_inner">
                            <div class="review_author"><?=get_sub_field('author')?></div>
                            <div class="review_note"><?=get_sub_field('note')?></div>
                            <div class="review_text"><?=get_sub_field('text')?></div>
                        </div>
                    </div>
                <? } ?>
            </div>
        </div>
    </div>
    */ ?>
    <!-- Ценник игры -->
    <div class="game_prices">
        <div class="wrapper">
            <div class="game_prices-title title">Стоимость Игры «Путь желаний»</div>
            <div class="prices-cards">

                <?php while (have_rows('game-prices-cards')) { the_row ();
                echo '<div class="prices-card">';
                echo    '<div class="prices-card-title">';
                echo        '<span>'. get_sub_field('card-title1') .'</span><br>';
                echo        '<span>'. get_sub_field('card-title2') .'</span>';
                echo    '</div>';
                echo    '<div>';
                echo    '<div class="prices-card-price">'. get_sub_field('card-price') .'</div>';
                echo    '<div class="prices-card-btn"><span class="show_modal" data-window="call_form2" data-seans="'. get_sub_field('card-title1') .' '. get_sub_field('card-title2') .' '. get_sub_field('card-price') .'">Записаться</span></div>';
                echo    '</div>';
                echo '</div>';
                }
                ?>

            </div>
        </div>
    </div>
    <div class="reviews_game">
        <div class="wrapper">
            <div class="reviews_tit_game title"><?php the_field('reviews_tit_game'); ?></div>
            <div class="reviews_slider reviews_game_slider">
                <?php while (have_rows('reviews_game')) { the_row(); ?>
                    <div class="review_game_slide">
                        <? echo getACFpic(get_sub_field('img'), array('modal' => 'fancybox', 'size_name' => 'rev_thumb')); ?>
                    </div>
                <? } ?>
            </div>
        </div>
    </div>
    <div id="form" class="form">
        <!-- <div class="form-bg"><img src="<?php echo get_template_directory_uri();?>/img/form-img.svg"></div> -->
        <div class="wrapper">
            <?php echo do_shortcode('[contact-form-7 id="7" title="Appointment_form"]'); ?>
            <div class="contacts">
                <p class="c_tel"><a href="tel:<?php echo get_tel_link( get_field('tel') ); ?>">
                    <svg><use xlink:href="#akar-icons_whatsapp-fill-1"></use></svg>
                    <span><?php echo get_field('tel'); ?></span>
                </a></p>
                <p class="c_wa"><a href="https://wa.me/<? echo get_tel_link( get_field('tel') )?>">
                    <svg><use xlink:href="#akar-icons_whatsapp-fill"></use></svg>
                    <span><?php echo get_field('tel'); ?></span>
                </a></p>
                <p class="c_mail"><a href="mailto:<?php echo get_field('mail'); ?>">
                    <svg><use xlink:href="#Group22655"></use></svg>
                    <span><?php echo get_field('mail'); ?></span>
                </a></p>
            </div>
        </div>
    </div>

<?php get_footer(); ?>