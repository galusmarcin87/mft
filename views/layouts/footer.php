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
			  The Warsaw HUB <br />
              ul. Rondo Daszyńskiego 2B<br />
              00-843 Warszawa
            </p>

            <p>
              <a href="mailto:office@meetfaces.com"> office@meetfaces.com</a><br />
              <a href="tel:+48224634718"> +48 48 22 463 47 18</a>
            </p>
          </div>
          <div>
            <p>
              Oddział w Warszawie <br />
              Mindspace, ul. Koszykowa 61 <br />
              00-667 Warszawa
            </p>
          </div>
          <div>
            <ul class="footer__menu fadeIn animated">
              <li class="footer__menu__item">
                <a class="footer__menu__link" href="./rodo.html">RODO</a>
              </li>
              <li class="footer__menu__item">
                <a class="footer__menu__link" href="./regulamin.html"
                  >Regulamin</a>
              </li>
              <li class="footer__menu__item">
                <a class="footer__menu__link" href=""
                  >Dokumenty</a>
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
          &copy; 2022 Meetfaces Trading
          <div class="footer__realization">Realizacja: Vertes Design</div>
        </div>
      </div>
    </footer>
