<?
/* @var $this yii\web\View */

use app\components\mgcms\MgHelpers;
use yii\web\View;


?>


<section class="about-wrapper">
    <div class="container">
        <h1>Czym jest Metfaces Trading?</h1>
        <div class="about">
            <div class="about__content">
                <div>
                    <h2>
                        Metfaces Trading to innowacyjna Platforma biznesowa dedykowana
                        firmom, umożliwiająca:
                    </h2>
                    <ul class="about__list">
                        <li class="about__list__item">
                            Dostp do dodatkowej reklamy poprzez zamieszczanie edytowalnej
                            oferty Twojej Firmy
                        </li>
                        <li class="about__list__item">
                            Nieograniczoną możliwość aktualizacji oferty poprzez dodawanie
                            zdjec, filmów reklamowych, plików z danymi tekstowymi
                        </li>
                        <li class="about__list__item">
                            Nawiązanie nowych relacji biznesowych poprzez uzyskanie dostpu
                            do katalogu firm, będących Użytkownikami Platformy w podziale na
                            branże, towary, usługi, dostawców i odbiorców
                        </li>
                        <li class="about__list__item">
                            Korzystanie ze spotkań biznesowych oraz szkoleń organizowanych
                            przez firmy występujące na Platformie oraz ekspertów
                            zaproszonych przez Meetface S.A.
                        </li>
                    </ul>
                </div>
                <div class="about__image">
                    <div>
                        <img src="<?= MgHelpers::getSetting('home page - about us - photo url',false,'/img/Depositphotos_307530416_xl-2015.jpg')?>" />
                        <a class="about__video-icon popup-video" href="<?= MgHelpers::getSetting('home page - about us - yt video url',false,'https://youtu.be/dUVcyWz4Kok')?>"><img src="/svg/play.svg" alt="" />
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
