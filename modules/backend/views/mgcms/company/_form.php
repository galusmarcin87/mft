<?php

use app\models\mgcms\db\Category;
use yii\helpers\Html;
use app\components\mgcms\yii\ActiveForm;
use app\components\mgcms\MgHelpers;
use kartik\icons\Icon;

/* @var $this yii\web\View */
/* @var $model app\models\mgcms\db\Company */
/* @var $form app\components\mgcms\yii\ActiveForm */

\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END,
    'viewParams' => [
        'class' => 'Agent',
        'relID' => 'agent',
        'value' => \yii\helpers\Json::encode($model->agents),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END,
    'viewParams' => [
        'class' => 'Benefit',
        'relID' => 'benefit',
        'value' => \yii\helpers\Json::encode($model->benefits),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END,
    'viewParams' => [
        'class' => 'Job',
        'relID' => 'job',
        'value' => \yii\helpers\Json::encode($model->jobs),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END,
    'viewParams' => [
        'class' => 'Product',
        'relID' => 'product',
        'value' => \yii\helpers\Json::encode($model->products),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
?>

<div class="company-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'placeholder' => 'Name']) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'is_promoted')->checkbox() ?>

    <?= $form->field($model, 'first_name')->textInput(['maxlength' => true, 'placeholder' => 'First Name']) ?>

    <?= $form->field($model, 'surname')->textInput(['maxlength' => true, 'placeholder' => 'Surname']) ?>

    <?= $form->field($model, 'status')->textInput(['maxlength' => true, 'placeholder' => 'Status']) ?>

    <?= $form->field($model, 'country')->textInput(['maxlength' => true, 'placeholder' => 'Country']) ?>

    <?= $form->field($model, 'city')->textInput(['maxlength' => true, 'placeholder' => 'City']) ?>

    <?= $form->field($model, 'postcode')->textInput(['maxlength' => true, 'placeholder' => 'Postcode']) ?>

    <?= $form->field($model, 'street')->textInput(['maxlength' => true, 'placeholder' => 'Street']) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true, 'placeholder' => 'Phone']) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true, 'placeholder' => 'Email']) ?>

    <?= $form->field($model, 'www')->textInput(['maxlength' => true, 'placeholder' => 'Www']) ?>

    <?= $form->field($model, 'nip')->textInput(['maxlength' => true, 'placeholder' => 'Nip']) ?>

    <?= $form->field($model, 'regon')->textInput(['maxlength' => true, 'placeholder' => 'Regon']) ?>

    <?= $form->field($model, 'krs')->textInput(['maxlength' => true, 'placeholder' => 'Krs']) ?>

    <?= $form->field($model, 'banc_account_no')->textInput(['maxlength' => true, 'placeholder' => 'Banc Account No']) ?>

    <?= $form->field($model, 'gps_lat')->textInput(['maxlength' => true, 'placeholder' => 'Gps Lat']) ?>

    <?= $form->field($model, 'gps_long')->textInput(['maxlength' => true, 'placeholder' => 'Gps Long']) ?>

    <?= $form->field($model, 'subscription_fee')->textInput(['placeholder' => 'Subscription Fee']) ?>

    <?= $form->field($model, 'category_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(Category::find()->andWhere(['type'=> Category::TYPE_COMPANY_TYPE])->orderBy('id')->asArray()->all(), 'id', 'name'),
        'options' => ['placeholder' => Yii::t('app', 'Choose Category')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'user_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\mgcms\db\User::find()->orderBy('id')->asArray()->all(), 'id', 'username'),
        'options' => ['placeholder' => Yii::t('app', 'Choose User')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'payment_status')->textInput(['maxlength' => true, 'placeholder' => 'Payment Status']) ?>

    <?= $form->field($model, 'paid_from')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
        'saveFormat' => 'php:Y-m-d',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => Yii::t('app', 'Choose Paid From'),
                'autoclose' => true
            ]
        ],
    ]); ?>

    <?= $form->field($model, 'paid_to')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
        'saveFormat' => 'php:Y-m-d',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => Yii::t('app', 'Choose Paid To'),
                'autoclose' => true
            ]
        ],
    ]); ?>

    <?= $form->field($model, 'thumbnail_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\mgcms\db\File::find()->orderBy('id')->asArray()->all(), 'id', 'origin_name'),
        'options' => ['placeholder' => Yii::t('app', 'Choose File')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'background_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\mgcms\db\File::find()->orderBy('id')->asArray()->all(), 'id', 'origin_name'),
        'options' => ['placeholder' => Yii::t('app', 'Choose File')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'is_for_sale')->checkbox() ?>

    <?= $form->field($model, 'sale_title')->textInput(['maxlength' => true, 'placeholder' => 'Sale Title']) ?>

    <?= $form->field($model, 'sale_description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'sale_price')->textInput(['placeholder' => 'Sale Price']) ?>

    <?= $form->field($model, 'sale_currency')->textInput(['maxlength' => true, 'placeholder' => 'Sale Currency']) ?>

    <?= $form->field($model, 'sale_price_includes')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'sale_reason')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'sale_business_range')->textInput(['maxlength' => true, 'placeholder' => 'Sale Business Range']) ?>

    <?= $form->field($model, 'sale_workers_number')->textInput(['placeholder' => 'Sale Workers Number']) ?>

    <?= $form->field($model, 'sale_sale_range')->textInput(['maxlength' => true, 'placeholder' => 'Sale Sale Range']) ?>

    <?= $form->field($model, 'sale_last_year_income')->textInput(['placeholder' => 'Sale Last Year Income']) ?>

    <?= $form->field($model, 'sale_company_profile')->textInput(['maxlength' => true, 'placeholder' => 'Sale Company Profile']) ?>

    <?= $form->field($model, 'is_institution')->checkbox() ?>

    <?= $form->field($model, 'institution_agent_prefix')->textInput(['maxlength' => true, 'placeholder' => 'Institution Agent Prefix']) ?>

    <?= $form->field($model, 'institution_invoice_amount')->textInput(['placeholder' => 'Institution Invoice Amount']) ?>

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


    <?php
    $forms = [
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode(Yii::t('app', 'Agent')),
            'content' => $this->render('_formAgent', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->agents),
            ]),
        ],
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode(Yii::t('app', 'Benefit')),
            'content' => $this->render('_formBenefit', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->benefits),
            ]),
        ],
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode(Yii::t('app', 'Job')),
            'content' => $this->render('_formJob', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->jobs),
            ]),
        ],
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode(Yii::t('app', 'Product')),
            'content' => $this->render('_formProduct', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->products),
            ]),
        ],
    ];
    echo kartik\tabs\TabsX::widget([
        'items' => $forms,
        'position' => kartik\tabs\TabsX::POS_ABOVE,
        'encodeLabels' => false,
        'pluginOptions' => [
            'bordered' => true,
            'sideways' => true,
            'enableCache' => false,
        ],
    ]);
    ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Cancel'), Yii::$app->request->referrer , ['class'=> 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
