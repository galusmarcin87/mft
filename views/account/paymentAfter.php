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
        <h1>Payment</h1>
        <div><?= MgHelpers::getSetting('payment after ' . $type . ' ' . Yii::$app->language, true, 'payment after ' . $type) ?></div>

    </div>
</section>
