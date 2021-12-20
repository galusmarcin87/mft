<?php
/* @var $model app\models\mgcms\db\Company */
/* @var $form app\components\mgcms\yii\ActiveForm */

/* @var $this yii\web\View */
/* @var $subscribeForm \app\models\SubscribeForm */

use app\components\mgcms\MgHelpers;
use yii\web\View;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;


$this->title = $model->name;
$model->language = Yii::$app->language;

?>

<section class="service-wrapper company-wrapper">
    <div class="container">
        <div class="breadcrumb">
            <a href="/company/index"> <?= Yii::t('db', 'List of companies') ?> </a>
            <span><?=$model->name?>></span>
        </div>

        <div class="service single-company">
            <div class="badge-corner"><?= Yii::t('db', 'Company') ?></div>
            <div class="relative">
                <?if($model->background && $model->background->isImage()):?>
                    <img
                        class="single-company__image"
                        src="<?=$model->background->getImageSrc()?>"
                        alt=""
                    />
                <?endif;?>
                <?if($model->thumbnail && $model->thumbnail->isImage()):?>
                    <img src="<?=$model->thumbnail->getImageSrc(0, 45)?>" class="training__logo" />
                <?endif;?>
            </div>
            <div class="single-company__content ">
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
                <h1 class="text-left"><?=$model->name?></h1>
                <div class="hr"></div>
                <div class="label"><?= Yii::t('db', 'Address') ?>:</div>
                <?= $model->city?>,<?= $model->street?>, <?= $model->country?>

                <div class="buttons-wrapper">
                    <a href="./tekstowa.html" class="btn btn--primary btn--small"
                    >Informacje</a
                    >
                    <a href="./produkty.html" class="btn btn--secondary btn--small"
                    >Produkty</a
                    >
                    <a href="./uslugi.html" class="btn btn--secondary btn--small"
                    >Usługi</a
                    >
                    <a href="./tekstowa.html" class="btn btn--secondary btn--small"
                    >Przedstawiciele</a
                    >
                    <a
                        href="./oferty-pracy.html"
                        class="btn btn--secondary btn--small"
                    >Oferty pracy</a
                    >
                </div>
                <h3><?= Yii::t('db', 'General information') ?></h3>
                <p>
                    <?=$model->description?>
                </p>
                <h3><?= Yii::t('db', 'Contact data') ?></h3>
                <div class="single-company__contact flex text-left">
                    <div>
                        <div class="flex">
                            <div class="label"><?= Yii::t('db', 'Country') ?>:</div>
                            <strong><?=$model->country ?></strong>
                        </div>
                        <div class="flex">
                            <div class="label"><?= Yii::t('db', 'City') ?>:</div>
                            <strong><?=$model->city ?></strong>
                        </div>
                        <div class="flex">
                            <div class="label"><?= Yii::t('db', 'Street') ?>:</div>
                            <strong><?=$model->street ?></strong>
                        </div>
                        <div class="flex">
                            <div class="label"><?= Yii::t('db', 'Postcode') ?>:</div>
                            <strong><?=$model->postcode ?></strong>
                        </div>
                        <div class="flex">
                            <div class="label"><?= Yii::t('db', 'Phone') ?>:</div>
                            <strong><?=$model->phone ?></strong>
                        </div>
                    </div>
                    <div>
                        <div class="flex">
                            <div class="label"><?= Yii::t('db', 'E-mail') ?>:</div>
                            <strong><?=$model->email ?></strong>
                        </div>
                        <div class="flex">
                            <div class="label"><?= Yii::t('db', 'WWW page') ?>:</div>
                            <strong><?=$model->www ?></strong>
                        </div>
                        <div class="flex">
                            <div class="label">NIP:</div>
                            <strong><?= $model->nip ?></strong>
                        </div>
                        <div class="flex">
                            <div class="label">REGON:</div>
                            <strong><?=$model->regon ?></strong></strong>
                        </div>
                    </div>
                </div>
                <?if($model->gps_lat && $model->gps_long):?>
                <h3><?= Yii::t('db', 'Localization') ?></h3>
                <div id="MAP"></div>
                <?endif ?>

                <?if(count($model->fileRelations)):?>
                    <h3><?= Yii::t('db', 'Gallery') ?></h3>
                    <div class="carousel-wrap">
                        <div class="owl-carousel owl-theme" id="GALLERY">
                            <? foreach ($model->fileRelations as $relation): ?>

                                <?if ($relation->json == '1' || !$relation->file) continue?>

                                <img
                                        class="item"
                                        src="<?= $relation->file->getImageSrc()?>"
                                />
                            <? endforeach ?>

                        </div>
                    </div>
                <?endif?>
                <h3>Film o firmie</h3>
                <div class="single-company__video">
                    <a
                        class="popup-video"
                        href="<?= $model->video?>"
                    >
                        <img src="<?= $model->video_thumbnail?>" />
                        <img
                            class="single-company__video__play"
                            src="/svg/play.svg"
                            alt=""
                        />
                    </a>
                </div>
                <div class="flex">
                    <?if(count($model->fileRelations)):?>
                    <div>
                        <h3><?= Yii::t('db', 'Multimedia') ?></h3>
                        <div class="carousel-wrap">
                                <? foreach ($model->fileRelations as $relation): ?>
                                    <?if ($relation->json != '1' || !$relation->file) continue?>
                                    <a href="<?= $relation->file->getLinkUrl() ?>" class="btn btn--primary btn--small">
                                        <?= $relation->file->origin_name?>
                                    </a>
                                <? endforeach ?>

                        </div>
                    </div>
                    <?endif?>
                    <div class="hidden">
                        <h3>Udostpnij</h3>
                        <div class="social-icons social-icons--color">
                            <a class="social-icons__icon social-icons__icon--fb">
                                <img src="/svg/facebook.svg" alt="" />
                            </a>
                            <a class="social-icons__icon social-icons__icon--tw">
                                <img src="/svg/twitter.svg" alt="" />
                            </a>
                            <a class="social-icons__icon social-icons__icon--in">
                                <img src="/svg/instagram.svg" alt="" />
                            </a>
                            <a class="social-icons__icon social-icons__icon--tik-tok">
                                <img src="/svg/tik-tok.svg" alt="" />
                            </a>
                            <a class="social-icons__icon social-icons__icon--ln">
                                <img src="/svg/linkedin.svg" alt="" />
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?if($model->gps_lat && $model->gps_long):?>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDeGtxbtJfB88Fgff3N_um_SjNBNAROskU"></script>
<script src="https://cdn.rawgit.com/googlemaps/js-marker-clusterer/gh-pages/src/markerclusterer.js"></script>
<script>
  $(document).ready(function () {
    const initMap = () => {
      var myLatLng = { lat: <?=$model->gps_lat?>, lng: <?=$model->gps_long?> };
      // Create a map object and specify the DOM element for display.
      map = new google.maps.Map(document.getElementById('MAP'), {
        center: myLatLng,
        zoom: 15,
        scrollwheel: false,
        mapTypeControl: false,
      });

      // Create a marker and set its position.
      var marker = new google.maps.Marker({
        map: map,
        position: myLatLng,
        title: '',
        icon: '/images/point.png',
      });
    };
    initMap();
  });
</script>
<?endif?>
