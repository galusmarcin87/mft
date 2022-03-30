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
              <strong>Meetface S.A.</strong> <br />
			  The Warsaw HUB <br />
              ul. Rondo Daszyńskiego 2B<br />
              00-843 Warszawa
            </p><br />
<div class="social-icons">
            <a class="social-icons__icon">
              <img src="/svg/tik-tok.svg" alt="tiktok" />
            </a>
            <a class="social-icons__icon">
              <img src="/svg/facebook.svg" alt="facebook" />
            </a>
            <a class="social-icons__icon">
              <img src="/svg/linkedin.svg" alt="linkedin" />
            </a>

          </div>

          </div>
<div>
            <p><strong>MEETFACES TRADING</strong><br />
              <a href="/art/wiecej-o-mft">O platformie</a><br />
              <a href="/site/information-for-investors">Dla inwestorów</a><br />
<a href="#">Współpraca</a><br />
<a href="#">Kariera</a><br />
              <a href="/art/cennik-korzystania-z-platformy">Cennik</a><br />
              <a href="/art/jak-nabyc-tokeny-mft">Tokeny MFT i tokenomia</a><br />
<a href="#">Media o nas</a><br />
            </p>
          </div>
<div>
            <p><strong>WSPARCIE</strong><br />
            <a href="#">Do pobrania</a><br />
<a href="#">Pomoc / FAQ</a><br />
              <a href="#">Instrukcja</a><br />
              <a href="/art/regulamin-i-dokumenty">Regulamin i Dokumenty</a><br />
              <a href="/img/RODO.pdf" target="_blank">RODO</a><br />
   <a href="#">Kontakt</a><br />
            </p>
          </div>
			<div>
            <p>
<strong>SKONTAKTUJ SIĘ Z NAMI</strong><br />
              e-mail: <a href="mailto:biuro@meetfacestrading.com"> biuro@meetfacestrading.com</a><br />
              tel.: <a href="tel:+48502253886"> +48 502 253 886</a>
            </p>
          </div>


        </div>
        <div class="footer__copy">
          &copy; 2022 Meetface S.A. - Meetfaces Trading Platform. All rights reserved.
          <div class="footer__realization">Realizacja: <a href="https://www.vertesdesign.pl" target="_blank" title="projektowanie stron internetowych">Vertes Design</a></div>
        </div>
      </div>
    </footer>
