<?php

use yii\helpers\Html;
use app\components\mgcms\yii\ActiveForm;
use app\components\mgcms\MgHelpers;
use kartik\icons\Icon;

/* @var $this yii\web\View */
/* @var $model app\models\mgcms\db\Product */
/* @var $form app\components\mgcms\yii\ActiveForm */

?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'placeholder' => 'Name']) ?>

    <?= $form->field($model, 'category_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\mgcms\db\Category::find()->andWhere(['type'=>\app\models\mgcms\db\Category::TYPE_PRODUCT_TYPE])->orderBy('id')->asArray()->all(), 'id', 'name'),
        'options' => ['placeholder' => Yii::t('app', 'Choose Category')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'description')->tinyMce(['rows' => 6]) ?>

    <?= $form->field($model, 'specification')->tinyMce(['rows' => 6]) ?>

    <?= $form->field($model, 'price')->textInput(['placeholder' => 'Price']) ?>

    <?= $form->field($model, 'number')->textInput(['placeholder' => 'Number']) ?>

    <?= $form->field($model, 'is_special_offer')->checkbox() ?>

    <?= $form->field($model, 'special_offer_from')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
        'saveFormat' => 'php:Y-m-d',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => Yii::t('app', 'Choose Special Offer From'),
                'autoclose' => true
            ]
        ],
    ]); ?>

    <?= $form->field($model, 'special_offer_to')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
        'saveFormat' => 'php:Y-m-d',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => Yii::t('app', 'Choose Special Offer To'),
                'autoclose' => true
            ]
        ],
    ]); ?>

    <?= $form->field($model, 'min_amount_of_purchase')->textInput(['placeholder' => 'Min Amount Of Purchase']) ?>

    <?= $form->field($model, 'special_offer_price')->textInput(['placeholder' => 'Special Offer Price']) ?>


    <?= $form->field($model, 'file_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\mgcms\db\File::find()->where(['created_by' => MgHelpers::getUserModel()->id])->orderBy('id')->asArray()->all(), 'id', 'origin_name'),
        'options' => ['placeholder' => Yii::t('app', 'Choose File')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <div class="well">
        <div class="col-md-12">
            <?= $form->relatedFileInput($model, true, true) ?>
        </div>

        <legend><?= Yii::t('app', 'Images'); ?></legend>
        <?/*---------------specyfic for this project distinguish between files ------------------*/?>
        <div class="row images itemsFlex">
            <? foreach ($model->fileRelations as $relation): ?>

                <?if ($relation->json == '1' || !$relation->file) continue?>
                <div class="col-md-3 center bottom10">
                    <?= \kartik\helpers\Html::hiddenInput("fileOrder[".$relation->file->id."]") ?>
                    <? echo \yii\helpers\Html::a(Icon::show('trash', ['class' => 'gi-2x']), MgHelpers::createUrl(['backend/mgcms/file/delete-relation', 'relId' => $model->id, 'fileId' => $relation->file->id, 'model' => $model::className()]), ['onclick' => 'return confirm("' . Yii::t('app', 'Are you sure?') . '")', 'class' => 'deleteLink']) ?>
                    <?= $relation->file->getThumb(250, 250, true, \Imagine\Image\ManipulatorInterface::THUMBNAIL_INSET, ['class' => 'img-responsive']) ?>
                    <? \kartik\helpers\Html::textarea("FileRelation[$relation->file->id][$model->id][" . $model::className() . "][description]", 'aaa', ['class' => 'form-control']) ?>
                </div>
            <? endforeach ?>
        </div>

        <script type="text/javascript">
          $(document).ready(function () {
            $('.images').sortable()
          })

        </script>
    </div>

    <div class="col-md-12">
        <?= $form->field($model, 'downloadFiles[]')->fileInput(['multiple' => true]) ?>
        <legend><?= Yii::t('app', 'Files to download'); ?></legend>
        <? foreach ($model->fileRelations as $relation): ?>
            <?if ($relation->json != '1' || !$relation->file) continue?>
            <div class="col-md-3 center bottom10">
                <? echo \yii\helpers\Html::a(Icon::show('trash', ['class' => 'gi-2x']), MgHelpers::createUrl(['backend/mgcms/file/delete-relation', 'relId' => $model->id, 'fileId' => $relation->file->id, 'model' => $model::className()]), ['onclick' => 'return confirm("' . Yii::t('app', 'Are you sure?') . '")', 'class' => 'deleteLink']) ?>
                <?= Html::a($relation->file->origin_name,$relation->file->linkUrl) ?>

            </div>
        <? endforeach ?>
    </div>

    <div class="form-group">
    <?php if(Yii::$app->controller->action->id != 'save-as-new'): ?>
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    <?php endif; ?>
    <?php if(Yii::$app->controller->action->id != 'create'): ?>
        <?= Html::submitButton(Yii::t('app', 'Save As New'), ['class' => 'btn btn-info', 'value' => '1', 'name' => '_asnew']) ?>
    <?php endif; ?>
        <?= Html::a(Yii::t('app', 'Cancel'), Yii::$app->request->referrer , ['class'=> 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
