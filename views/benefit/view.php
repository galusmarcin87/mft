<?
/* @var $model app\models\mgcms\db\Benefit */

use yii\web\View;

$model->language = Yii::$app->language;
?>
<section class="service-wrapper">
    <div class="container">
        <div class="breadcrumb">
            <a href=""> <?= $model->company->category ?> </a>
            <span><?= $model->name ?></span>
        </div>
        <div class="service">
            <div class="training">
                <div>
                    <div class="item">
                        <? if ($model->company->thumbnail && $model->company->thumbnail->isImage()): ?>
                            <img src="<?= $model->company->thumbnail->getImageSrc(0, 376) ?>" class="training__logo"/>
                        <? endif; ?>
                    </div>
                </div>
                <div>
                    <div class="training__badge"><?= Yii::t('db', 'BENEFIT') ?></div>
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
                    <div class="label"><?= Yii::t('db', 'Seller') ?>:</div>
                    <?= $model->company ?>
                    <div class="hr"></div>
                    <div class="training__prices">
                        <div>
                            <div class="label"><?= Yii::t('db', 'Price') ?> PLN:</div>
                            <?= $model->price ?> PLN / szt
                            <div class="hr"></div>
                        </div>
                        <div class="hidden">
                            <div class="label">Cena USD:</div>
                            - $
                            <div class="hr"></div>
                        </div>
                        <div class="hidden">
                            <div class="label">Cena NFT:</div>
                            <a href="">zapłać tokenami NFT</a>
                            <div class="hr"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="service__content">


                <h3><?= Yii::t('db', 'Description') ?></h3>
                <?= $model->description ?>
                <div class="flex">
                    <div class="hidden">
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
