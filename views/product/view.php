<?
/* @var $model app\models\mgcms\db\Product */

use yii\web\View;

?>
<section class="service-wrapper">
    <div class="container">
        <div class="breadcrumb">
            <a href=""> <?= $model->category ?> </a>
            <span><?= $model->name ?></span>
        </div>
        <div class="service">
            <div class="training">
                <div>
                    <div id="SERVICE_SLIDER" class="owl-carousel owl-theme">
                        <div class="item">
                            <img src="./img/elektrotel/produkt1.jpg" alt=""/>
                            <img
                                    src="./img/logo-elektro.jpg"
                                    class="training__logo"
                            />
                        </div>
                    </div>
                </div>
                <div>
                    <div class="training__badge"><?= Yii::t('db', 'PRODUCT') ?></div>
                    <div class="rating hidden">
                        Oceń:
                        <i
                                class="fa fa-star rating__star rating__star--active"
                                aria-hidden="true"
                        ></i>
                        <i
                                class="fa fa-star rating__star rating__star--active"
                                aria-hidden="true"
                        ></i>
                        <i
                                class="fa fa-star rating__star rating__star--active"
                                aria-hidden="true"
                        ></i>
                        <i
                                class="fa fa-star rating__star rating__star--active"
                                aria-hidden="true"
                        ></i>
                        <i
                                class="fa fa-star rating__star rating__star--active"
                                aria-hidden="true"
                        ></i>
                        <i
                                class="fa fa-star rating__star rating__star--active"
                                aria-hidden="true"
                        ></i>
                        <i class="fa fa-star rating__star" aria-hidden="true"></i>
                        <span class="rating__rate">(6,0)</span>
                    </div>
                    <h1><?= $model->name ?></h1>
                    <div class="hr"></div>
                    <div class="label">Kategoria:</div>
                    <a href=""> IT i Telekomunikacja / Telekomunikacja / Telefony komórkowe </a>
                    <div class="hr"></div>
                    <div class="label">Sprzedawca:</div>
                    P.H.U. ElektroTEL
                    <div class="hr"></div>
                    <div class="training__prices">
                        <div>
                            <div class="label">Cena PLN:</div>
                            3499 PLN / szt
                            <div class="hr"></div>
                        </div>
                        <div>
                            <div class="label">Cena USD:</div>
                            - $
                            <div class="hr"></div>
                        </div>
                        <div>
                            <div class="label">Cena NFT:</div>
                            <a href="">zapłać tokenami NFT</a>
                            <div class="hr"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="service__content">
                <div class="contact-box">
                    <div class="person person--big">
                        <div>
                            <img
                                    class="person__avatar person__avatar--small"
                                    src="./img/person.png"
                                    alt=""
                            />
                        </div>
                        <div>
                            <div class="person__role person__role--normal">
                                Skontaktuj sie z przedstawicielem
                            </div>

                        </div>
                    </div>
                    <a href="tel: 000-000-000" class="btn btn--primary"
                    >000-000-000</a
                    >
                    <a href="mailto:kontakt@twojmail.pl" class="btn btn--primary"
                    >kontakt@twojmail.pl</a
                    >
                </div>
                <h3>Opis produktu</h3>
                <p>
                    Telefon Huawei P30 Pro 256GB/8GB VOG-L29
                </p>
                <h3>Specyfikacja</h3>
                <p>
                    Wersja PL (telefony pochodzą z polskiej dystrybucji). Menu w języku polskim. Fabrycznie nie posiada
                    blokady simlock.<br>
                    Nie otwierany z pudełka- oryginalnie zafoliowane pudełko, telefon nie aktywowany.<br>
                    Kolor: Black - czarny<br>
                    <br>
                    Zawartość zestawu:<br>
                    - telefon Huawei P30 Pro 256GB/8GB black<br>
                    - instrukcja w j. polskim<br>
                    - ładowarka sieciowa<br>
                    - kabel USB<br>
                    - zestaw słuchawkowy<br>
                    - pudełko ze zgodnymi nr IMEI<br>
                    - dowód zakupu
                </p>
                <div class="flex">
                    <div>
                        <h3>Multimedia</h3>
                        <a href="" class="btn btn--primary btn--small">
                            Pobierz logo
                        </a>
                        <a href="" class="btn btn--primary btn--small">
                            Zobacz video
                        </a>
                    </div>
                    <div>
                        <h3>Udostpnij</h3>
                        <div class="social-icons social-icons--color">
                            <a class="social-icons__icon social-icons__icon--fb">
                                <img src="./svg/facebook.svg" alt=""/>
                            </a>
                            <a class="social-icons__icon social-icons__icon--tw">
                                <img src="./svg/twitter.svg" alt=""/>
                            </a>
                            <a class="social-icons__icon social-icons__icon--in">
                                <img src="./svg/instagram.svg" alt=""/>
                            </a>
                            <a class="social-icons__icon social-icons__icon--tik-tok">
                                <img src="./svg/tik-tok.svg" alt=""/>
                            </a>
                            <a class="social-icons__icon social-icons__icon--ln">
                                <img src="./svg/linkedin.svg" alt=""/>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
