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
              00-843 Warszawa<br /><br />
			  Kapitał Spółki 248.353,35 PLN
            </p><br />
          </div>
<div>
            <p><strong>MEETFACES TRADING</strong><br />
              <a href="/art/wiecej-o-mft">O platformie</a><br />
              <a href="/site/information-for-investors">Dla inwestorów</a><br />
              <a href="/art/cennik-za-pakiet">Cena za pakiet</a><br />
              <a href="/art/jak-nabyc-tokeny-mft">Tokeny MFT i tokenomia</a><br />
			  <a href="/art/wladze-spolki">Władze Spółki</a><br />
				<a href="https://www.mft.ai/upload/e4/56/e4566828aaddc13289d76a49746f9c0d5abe9a2f.pdf" target="_blank">WZA 2022</a><br />
            </p>
          </div>
<div>
            <p><strong>WSPARCIE</strong><br />
				<a href="/art/newslettery">Newslettery</a><br />
				<a href="/art/bni">~BNI</a><br />
				<a href="/art/instrukcje">STRIPE</a><br />
              <a href="/art/regulamin-i-dokumenty">Regulamin i Dokumenty</a><br />
              <a href="/img/RODO.pdf" target="_blank">RODO</a><br />
   			  <a href="/art/kontakt">Kontakt</a><br />
			  <a href="https://www.mft.ai/upload/e5/87/e587e7c5805da99fdf5111a416666eab0d863693.pdf" target="_blank">Teaser inwestycyjny</a><br />
            </p>
          </div>
			<div>
            <p>
<strong>SKONTAKTUJ SIĘ Z NAMI</strong><br />
              e-mail: <a href="mailto:biuro@meetfacestrading.com"> biuro@meetfacestrading.com</a><br />
              tel.: <a href="tel:+48502253886"> +48 502 253 886</a><br><br><br><br>
            </p>
			<div class="social-icons">
            <a href="https://pl.linkedin.com/in/tomaszkopacz" target="_blank"><img src="/svg/linkedin-ikona.svg" alt="linkedin" /></a>
            <a href="https://www.facebook.com/MeetfacesTrading/" target="_blank"><img src="/svg/facebook-ikona.svg" alt="facebook" /></a>
			<a href="https://www.youtube.com/channel/UCmiKo1qdL5kLan80Td1c_bg" target="_blank"><img src="/svg/yt-ikona.svg" alt="youtube" /></a>
          </div>
          </div>



        </div>
        <div class="footer__copy">
          &copy; 2022 Meetface S.A. - Meetfaces Trading Platform. All rights reserved.
          <div class="footer__realization">Realizacja: <a href="https://www.vertesdesign.pl" target="_blank" title="projektowanie stron internetowych">Vertes Design</a></div>
        </div>
      </div>
    </footer>
