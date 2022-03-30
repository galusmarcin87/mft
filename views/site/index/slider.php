<?
/* @var $this yii\web\View */

use app\components\mgcms\MgHelpers;
use app\models\mgcms\db\Project;
use yii\bootstrap\ActiveForm;
use yii\web\View;



$index=0;

?>

<section class="main-slider-wrapper">
    <div class="container">
        <div id="MAIN-SLIDER" class="owl-carousel owl-theme">
            <div class="main-slider item">
                <div class="main-slider__content">
                    <h1>
                        <strong>Agent numer 1 </strong>online<br />
                        łączący Cię z dostawcami<br />
                        i klientami <strong>na całym świecie</strong>
                    </h1>
                    <div class="block-icons">
                        <a href="/site/information-for-investors">
                            <div class="block-icons__block">
                                <img
                                        src="./svg/inwestor.svg"
                                        class="block-icons__icon"
                                        alt=""
                                />
                                Zainwestuj <br />
                                w MFT
                            </div>
                        </a>
                        <a href="/product/index?specialOffer=1">
                            <div class="block-icons__block">
                                <img
                                        src="./svg/promocje.svg"
                                        class="block-icons__icon"
                                        alt=""
                                />
                                Produkty <br />
                                w promocji
                            </div>
                        </a>
                        <a href="/company/index?isBenefit=1">
                            <div class="block-icons__block">
                                <img
                                        src="./svg/benefity.svg"
                                        class="block-icons__icon"
                                        alt=""
                                />
                                Benefity <br />
                                i Korzyści
                            </div>
                        </a>
						<a href="/site/become-consultant">
                            <div class="block-icons__block">
                                <img
                                        src="./svg/konsultant.svg"
                                        class="block-icons__icon"
                                        alt=""
                                />
                                Program <br />
                                Partnerski
                            </div>
                        </a>
                    </div>
					<a href="/art/wiecej-o-mft" class="btn btn--primary">
                        O Meetfaces Trading
                    </a>
                </div>
                <div class="main-slider__images">
                    <a href="/upload/60/6d/606d8a3b734fd099d34ba0df80d532a76a601a14.pdf" target="_blank"><img src="img/slider-rabat.jpg" alt="" /></a>
                    <img src="img/Depositphotos_233884870_xl-2015.jpg" alt="" />
                </div>
            </div>
            <div class="main-slider item">
                <div class="main-slider__content">
                    <h1>
                        <strong>Meetfaces Trading</strong> <br>to platforma
                        <br>dla Twojego biznesu</strong>
                    </h1>
                    <div class="block-icons">
                        <a href="/site/information-for-investors">
                            <div class="block-icons__block">
                                <img
                                        src="./svg/inwestor.svg"
                                        class="block-icons__icon"
                                        alt=""
                                />
                                Zainwestuj <br />
                                w MFT
                            </div>
                        </a>
                        <a href="/product/index?specialOffer=1">
                            <div class="block-icons__block">
                                <img
                                        src="./svg/promocje.svg"
                                        class="block-icons__icon"
                                        alt=""
                                />
                                Produkty <br />
                                w promocji
                            </div>
                        </a>
                        <a href="">
                            <div class="block-icons__block">
                                <img
                                        src="./svg/benefity.svg"
                                        class="block-icons__icon"
                                        alt=""
                                />
                                Benefity <br />
                                i Korzyści
                            </div>
                        </a>
						<a href="/site/become-consultant">
                            <div class="block-icons__block">
                                <img
                                        src="./svg/konsultant.svg"
                                        class="block-icons__icon"
                                        alt=""
                                />
                                Program <br />
                                Partnerski
                            </div>
                        </a>
                    </div>
                    <a href="/art/wiecej-o-mft" class="btn btn--primary">
                        O Meetfaces Trading
                    </a>
                </div>
                <div class="main-slider__images">
                <a href="/art/jak-nabyc-tokeny-mft"><img src="img/slider_cennik.jpg" alt="" /></a>
                    <img src="/img/Depositphotos_233884870_xl-2015.jpg" alt="" />
                </div>
            </div>
        </div>
    </div>
</section>
