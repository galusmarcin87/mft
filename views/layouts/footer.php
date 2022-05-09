<?

use app\widgets\NobleMenu;
use yii\helpers\Html;
use app\components\mgcms\MgHelpers;
use yii\bootstrap\ActiveForm;

$menu = new NobleMenu(['name' => 'footer_' . Yii::$app->language, 'loginLink' => false]);
$menu2 = new NobleMenu(['name' => 'footer2_' . Yii::$app->language, 'loginLink' => false]);
$email = MgHelpers::getSetting('footer email', false, 'biuro@meetfacestrading.com');
$phone = MgHelpers::getSetting('footer phone', false, '+48502253886');

?>
<footer class="footer-wrapper">
    <div class="container">
        <img src="/img/logo_meetfaces_white.png" class="footer__Logo" alt=""/>
        <div class="footer">
            <div>
                <?= MgHelpers::getSetting('footer left', true, '<p>
                    <strong>Meetface S.A.</strong> <br/>
                    The Warsaw HUB <br/>
                    ul. Rondo Daszyńskiego 2B<br/>
                    00-843 Warszawa
                </p>') ?>
                <br/>

            </div>
            <div>
                <p>
                    <strong><?= MgHelpers::getSetting('footer 1 header ' . Yii::$app->language, false, 'MEETFACES TRADING') ?></strong><br/>
                    <? foreach ($menu->getItems() as $item): ?>
                <li>
                    <? if (isset($item['url'])): ?>
                        <a href="<?= \yii\helpers\Url::to($item['url']) ?>"><?= $item['label'] ?></a><br/>
                    <? endif ?>
                </li>
                <? endforeach ?>
                </p>
            </div>
            <div>
                <p>
                    <strong><?= MgHelpers::getSetting('footer 2 header ' . Yii::$app->language, false, 'WSPARCIE') ?></strong><br/>
                    <? foreach ($menu2->getItems() as $item): ?>
                <li>
                    <? if (isset($item['url'])): ?>
                        <a href="<?= \yii\helpers\Url::to($item['url']) ?>"><?= $item['label'] ?></a><br/>
                    <? endif ?>
                </li>
                <? endforeach ?>
                </p>
            </div>
            <div>
                <p>
                    <strong><?= Yii::t('db', 'Contact us') ?></strong><br/>
                    <?= Yii::t('db', 'e-mail') ?>: <a href="mailto:<?= $email ?>"> <?= $email ?></a><br/>
                    tel.: <a href="tel:<?= $phone ?>"> <?= $phone ?></a><br><br><br><br>
                </p>
                <div class="social-icons">
                    <? if (MgHelpers::getSetting('tiktok url')): ?>
                        <a href="<?= MgHelpers::getSetting('tiktok url') ?>"  class="social-icons__icon">
                            <img src="/svg/tik-tok.svg" alt="" />
                        </a>
                    <? endif ?>

                    <? if (MgHelpers::getSetting('facebook url')): ?>
                        <a href="<?= MgHelpers::getSetting('facebook url') ?>"  class="social-icons__icon">
                            <img src="/svg/facebook.svg" alt="" />
                        </a>
                    <? endif ?>

                    <? if (MgHelpers::getSetting('linkedin url')): ?>
                        <a href="<?= MgHelpers::getSetting('linkedin url') ?>"  class="social-icons__icon">
                            <img src="/svg/linkedin.svg" alt="" />
                        </a>
                    <? endif ?>
                    <? if (MgHelpers::getSetting('instagram url')): ?>
                        <a href="<?= MgHelpers::getSetting('instagram url') ?>"  class="social-icons__icon">
                            <img src="/svg/instagram.svg" alt="" />
                        </a>
                    <? endif ?>
                </div>
            </div>


        </div>
        <div class="footer__copy">
            <?= MgHelpers::getSetting('footer copyright '.Yii::$app->language,false,'&copy; 2022 Meetface S.A. - Meetfaces Trading Platform. All rights reserved.')?>

            <div class="footer__realization"><?= Yii::t('db', 'Realization') ?>: Vertes Design</div>
        </div>
    </div>
</footer>
