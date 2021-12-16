<?

use app\widgets\NobleMenu;
use yii\helpers\Html;
use app\components\mgcms\MgHelpers;
use yii\bootstrap\ActiveForm;

$menu = new NobleMenu(['name' => 'footer_' . Yii::$app->language, 'loginLink' => false]);
$menu2 = new NobleMenu(['name' => 'footer2_' . Yii::$app->language, 'loginLink' => false]);

?>
<footer class="footer-wrapper">
    <div class="container">
        <img src="./img/logo_meetfaces_white.png" class="footer__Logo" alt="" />
        <div class="footer">
            <div>
                <p>
                    Meetfaces S.A <br />
                    ul. Reformacka 6<br />
                    35-026 Rzeszów
                </p>

                <p>
                    <a href="mailto:biuro@meetfacestrading.com"> biuro@meetfacestrading.com</a><br>
                    <a href="tel:+48000000000"> +48 00 000 00 00</a>
                </p>
            </div>
            <div>
                <ul class="footer__menu fadeIn animated">
                    <li class="footer__menu__item">
                        <a class="footer__menu__link" href="http://meetfaces.eu" target="_blank">Aplikacja Meetfaces</a>
                    </li>
                    <li class="footer__menu__item">
                        <a class="footer__menu__link footer__menu__link--active" href="https://biznes.meetfaces.eu" target="_blank">Meetfaces Conference & Exibition System</a
                        >
                    </li>
                </ul>
            </div>
            <div>
                <ul class="footer__menu fadeIn animated">
                    <li class="footer__menu__item">
                        <a class="footer__menu__link" href="./img/RODO.pdf">RODO</a>
                    </li>
                    <li class="footer__menu__item">
                        <a class="footer__menu__link" href="./pomoc.html">Pomoc</a>
                    </li>
                    <li class="footer__menu__item">
                        <a class="footer__menu__link" href="./regulamin.html"
                        >Regulamin i dokumenty</a
                        >
                    </li>
                    <li class="footer__menu__item">
                        <a class="footer__menu__link" href=""
                        >Inspektor Danych Osobowych</a
                        >
                    </li>
                    <li class="footer__menu__item">
                        <a class="footer__menu__link" href="./register.html"
                        >Załóz konto</a
                        >
                    </li>
                    <li class="footer__menu__item">
                        <a class="footer__menu__link" href="./login.html"
                        >Zaloguj sie
                        </a>
                    </li>
                </ul>
            </div>
            <div class="social-icons">
                <a class="social-icons__icon">
                    <img src="./svg/tik-tok.svg" alt="" />
                </a>
                <a class="social-icons__icon">
                    <img src="./svg/facebook.svg" alt="" />
                </a>
                <a class="social-icons__icon">
                    <img src="./svg/linkedin.svg" alt="" />
                </a>
                <a class="social-icons__icon">
                    <img src="./svg/instagram.svg" alt="" />
                </a>
            </div>
        </div>
        <div class="footer__copy">
            &copy; 2021, Meetfaces Trading, All right reserved · Polityka
            prywatności
            <div class="footer__realization">Realizacja: Vertes Design</div>
        </div>
    </div>
</footer>
