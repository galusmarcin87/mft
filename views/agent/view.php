<?
/* @var $model app\models\mgcms\db\Agent */

use yii\web\View;
$model->language = Yii::$app->language;
?>

<section class="service-wrapper">
    <div class="container">
        <div class="service">
            <div class="training">
                <div>

                    <div id="SERVICE_SLIDER" class="owl-carousel owl-theme">
                            <div class="item">
                                <img src="<?= $model->file->getImageSrc(765)?>" alt=""/>
                            </div>
                    </div>
                </div>
                <div>
                    <div class="training__badge"><?= Yii::t('db', 'Agent') ?></div>
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
                    <h1><?= $model->full_name ?></h1>
                    <div class="hr"></div>
                    <div class="label"><?= Yii::t('db', 'Position') ?>:</div>
                    <?= $model->position ?>
                    <div class="hr"></div>
                    <div class="label"><?= Yii::t('db', 'Phone') ?>:</div>
                    <?= $model->phone ?>
                    <div class="hr"></div>
                    <div class="label"><?= Yii::t('db', 'Email') ?>:</div>
                    <?= $model->email ?>
                    <div class="hr"></div>

                </div>
            </div>
            <div class="service__content">

                <h3><?= Yii::t('db', 'Description') ?></h3>
                <?=$model->description?>
            </div>
        </div>
    </div>
</section>
