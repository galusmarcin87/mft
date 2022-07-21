<?php
/* @var $this yii\web\View */

/* @var $models \app\models\mgcms\db\Agent[] */

use app\extensions\mgcms\yii2TinymceWidget\TinyMce;
use yii\helpers\Html;
use app\components\mgcms\MgHelpers;
use \yii\helpers\Url;
use yii\bootstrap\ActiveForm;


?>
<section class="companies-wrapper companies-wrapper--dashboard">
    <div class="container">
        <h1><?= Yii::t('db', 'Thank you for buying') ?></h1>
        <div><?= MgHelpers::getSetting('buy after ' . $type . ' ' . Yii::$app->language, true, 'buy after ' . $type) ?></div>
        <a class="btn btn--primary" href="<?= Url::to(['account/rate','hash' => MgHelpers::encrypt($payment->id)])?>"><?= Yii::t('db', 'Rate the purchase') ?></a>
    </div>
</section>
