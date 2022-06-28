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
        <?= $this->render('view/_breadcrumbs',['model'=>$model])?>

        <div class="service single-company">
            <?= $this->render('view/_logo',['model'=>$model])?>
            <div class="single-company__content ">
                <?= $this->render('view/_top',['model'=>$model])?>
                <?= $this->render('view/_buttons',['model'=>$model])?>

                <h3><?= Yii::t('db', 'General information') ?></h3>
                <div class="description">
                    <?=$model->description?>
                </div>
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
                    <div class="">
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
