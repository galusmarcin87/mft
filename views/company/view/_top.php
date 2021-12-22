<?php
/* @var $model app\models\mgcms\db\Company */
/* @var $form app\components\mgcms\yii\ActiveForm */

/* @var $this yii\web\View */

/* @var $subscribeForm \app\models\SubscribeForm */

use app\components\mgcms\MgHelpers;
use yii\web\View;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;


?>

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
