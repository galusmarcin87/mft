<?php

use yii\helpers\Html;
use app\components\mgcms\yii\ActiveForm;
use app\components\mgcms\MgHelpers;

/* @var $this yii\web\View */
/* @var $model app\models\mgcms\db\Job */
/* @var $form app\components\mgcms\yii\ActiveForm */

?>

<div class="job-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

    <?= $this->render('/common/languageBehaviorSwicher', ['model' => $model, 'form' => $form]) ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field6md($model, 'name')->textInput(['maxlength' => true, 'placeholder' => 'Name']) ?>


    <?= $form->field6md($model, 'salary')->textInput(['placeholder' => 'Salary']) ?>

    <?= $form->field6md($model, 'position')->textInput(['maxlength' => true, 'placeholder' => 'Position']) ?>

    <?= $form->field6md($model, 'address')->textInput(['maxlength' => true, 'placeholder' => 'Address']) ?>

    <?= $form->field6md($model, 'industry')->textInput(['maxlength' => true, 'placeholder' => 'Industry']) ?>

    <?= $form->field12md($model, 'info')->tinyMce() ?>

    <?= $form->field12md($model, 'requirements')->tinyMce() ?>

    <?= $form->field6md($model, 'country')->textInput(['maxlength' => true, 'placeholder' => 'Country']) ?>

    <?= $form->field6md($model, 'city')->textInput(['maxlength' => true, 'placeholder' => 'City']) ?>

    <div class="form-group col-md-12">
    <?php if(Yii::$app->controller->action->id != 'save-as-new'): ?>
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    <?php endif; ?>
        <?= Html::a(Yii::t('app', 'Cancel'), Yii::$app->request->referrer , ['class'=> 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
