<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\mgcms\db\Job */

$this->title = Yii::t('app', 'Update Job') . ' ' . $model->name;
//$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Job'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="job-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
