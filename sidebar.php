<?php

/**
 * The Sidebar containing the primary and secondary widget areas.
 *
 */
?>

<div id="primary" class="widget-area" role="complementary">


    <div id="navi">


        <?php
        // A second sidebar for widgets, just because.
        if (is_active_sidebar('secondary-widget-area')) : ?>

            <div id="secondary" class="widget-area" role="complementary">
                <ul class="xoxo">
                    <?php dynamic_sidebar('secondary-widget-area'); ?>
                </ul>
            </div><!-- #secondary .widget-area -->

        <?php endif; ?>

        <!-- <ul>
                <li class="current"><a href="http://www.underdox-festival.de/blog/">aktuell</a>
                <li>
                <li><a href="http://www.underdox-festival.de/tickets">tickets</a></li>
                <li><a href="http://www.underdox-festival.de/de/programm.htm">programm</a></li>
                <li><a href="http://www.underdox-festival.de/de/artistinfocus.htm">in focus</a></li>
                <li><a href="http://www.underdox-festival.de/de/filme.htm">film</a></li>
                <li><a href="http://www.underdox-festival.de/de/videos.htm">videokunst</a></li>
                <li><a href="http://www.underdox-festival.de/de/kinos.htm">spielorte</a></li>
                <li><a href="http://www.underdox-festival.de/de/partner.htm">partner</a></li>
                <li><a href="http://www.underdox-festival.de/de/presse.htm">presse</a></li>
                <li><a href="http://www.underdox-festival.de/de/festival.htm">über uns</a></li>
                <li><a href="http://www.underdox-festival.de/de/archiv.htm">archiv</a></li>

            </ul> -->

    </div>
    <!--! end of #navi -->



</div><!-- #primary .widget-area -->