<?php

use app\models\mgcms\db\Category;
use yii\helpers\Html;
use app\components\mgcms\yii\ActiveForm;
use app\components\mgcms\MgHelpers;
use kartik\icons\Icon;
use \app\models\mgcms\db\Company;


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
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END,
    'viewParams' => [
        'class' => 'Service',
        'relID' => 'service',
        'value' => \yii\helpers\Json::encode($model->services),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
?>

<div class="company-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

    <?= $this->render('/common/languageBehaviorSwicher', ['model' => $model, 'form' => $form]) ?>

    <div class="col-md-12"><legend><?= Yii::t('db', 'General information') ?></legend></div>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field12md($model, 'name')->textInput(['maxlength' => true, 'placeholder2' => 'Name']) ?>

    <?= MgHelpers::isAdmin() ? $form->field6md($model, 'status')->dropDownList(Company::STATUSES) : '' ?>

    <?= $form->field6md($model, 'is_promoted')->switchInput() ?>

    <?= $form->field12md($model, 'description')->tinyMce(['rows' => 6]) ?>

    <?= $form->field6md($model, 'category_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(Category::find()->andWhere(['type'=> Category::TYPE_COMPANY_TYPE])->orderBy('id')->asArray()->all(), 'id', 'name'),
        'options' => ['placeholder2' => Yii::t('app', 'Choose Category')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?if(MgHelpers::getUserModel()->isAdmin()): ?>
    <?= $form->field6md($model, 'user_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\mgcms\db\User::find()->orderBy('id')->asArray()->all(), 'id', 'username'),
        'options' => ['placeholder2' => Yii::t('app', 'Choose User')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>
    <?endif; ?>

    <?= $form->field6md($model, 'subscription_fee')->textInput(['placeholder2' => 'Subscription Fee']) ?>



    <?= $form->field6md($model, 'payment_status')->textInput(['maxlength' => true, 'placeholder2' => 'Payment Status']) ?>

    <?= $form->field6md($model, 'paid_from')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
        'saveFormat' => 'php:Y-m-d',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder2' => Yii::t('app', 'Choose Paid From'),
                'autoclose' => true
            ]
        ],
    ]); ?>

    <?= $form->field6md($model, 'paid_to')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
        'saveFormat' => 'php:Y-m-d',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder2' => Yii::t('app', 'Choose Paid To'),
                'autoclose' => true
            ]
        ],
    ]); ?>



    <div class="col-md-12"><legend><?= Yii::t('db', 'Contact data') ?></legend></div>


    <?= $form->field6md($model, 'first_name')->textInput(['maxlength' => true, 'placeholder2' => 'First Name']) ?>

    <?= $form->field6md($model, 'surname')->textInput(['maxlength' => true, 'placeholder2' => 'Surname']) ?>


    <?= $form->field6md($model, 'country')->dropDownList(MgHelpers::getSettingOptionArray('countries array')) ?>

    <?= $form->field6md($model, 'city')->textInput(['maxlength' => true, 'placeholder2' => 'City']) ?>

    <?= $form->field6md($model, 'postcode')->textInput(['maxlength' => true, 'placeholder2' => 'Postcode']) ?>

    <?= $form->field6md($model, 'street')->textInput(['maxlength' => true, 'placeholder2' => 'Street']) ?>

    <?= $form->field6md($model, 'phone')->textInput(['maxlength' => true, 'placeholder2' => 'Phone']) ?>

    <?= $form->field6md($model, 'email')->textInput(['maxlength' => true, 'placeholder2' => 'Email','type'=>'email']) ?>

    <?= $form->field6md($model, 'www')->textInput(['maxlength' => true, 'placeholder2' => 'Www']) ?>

    <?= $form->field6md($model, 'nip')->textInput(['maxlength' => true, 'placeholder2' => 'Nip']) ?>

    <?= $form->field6md($model, 'regon')->textInput(['maxlength' => true, 'placeholder2' => 'Regon']) ?>

    <?= $form->field6md($model, 'krs')->textInput(['maxlength' => true, 'placeholder2' => 'Krs']) ?>

    <?= $form->field6md($model, 'banc_account_no')->textInput(['maxlength' => true, 'placeholder2' => 'Banc Account No']) ?>

    <?= $form->field6md($model, 'gps_lat')->textInput(['maxlength' => true, 'placeholder2' => 'Gps Lat']) ?>

    <?= $form->field6md($model, 'gps_long')->textInput(['maxlength' => true, 'placeholder2' => 'Gps Long']) ?>



    <?= $form->field6md($model, 'thumbnail_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\mgcms\db\File::find()->orderBy('id')->asArray()->all(), 'id', 'origin_name'),
        'options' => ['placeholder2' => Yii::t('app', 'Choose File')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field6md($model, 'background_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\mgcms\db\File::find()->orderBy('id')->asArray()->all(), 'id', 'origin_name'),
        'options' => ['placeholder2' => Yii::t('app', 'Choose File')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <div class="col-md-12">
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
    </div>

    <?= $form->field6md($model, 'video')->textInput(['maxlength' => true, 'placeholder2' => $model->getAttributeLabel('video')]) ?>

    <?= $form->field6md($model, 'video_thumbnail')->textInput(['maxlength' => true, 'placeholder2' => $model->getAttributeLabel('video_thumbnail')]) ?>



    <div class="col-md-12 ">
        <div class="well row ">
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
        </div>
    </div>



    <?= $form->field12md($model, 'is_for_sale')->checkbox() ?>

    <div id="saleWrapper" class="<?= $model->is_for_sale ? '' : 'hidden'?>">
        <div class="col-md-12"><legend><?= Yii::t('db', 'Data for sale') ?></legend></div>


        <?= $form->field12md($model, 'sale_title')->textInput(['maxlength' => true, 'placeholder2' => 'Sale Title']) ?>

        <?= $form->field12md($model, 'sale_description')->textarea(['rows' => 6]) ?>

        <?= $form->field6md($model, 'sale_price')->textInput(['placeholder2' => 'Sale Price']) ?>

        <?= $form->field6md($model, 'sale_currency')->textInput(['maxlength' => true, 'placeholder2' => 'Sale Currency']) ?>

        <?= $form->field12md($model, 'sale_price_includes')->textarea(['rows' => 6]) ?>

        <?= $form->field12md($model, 'sale_reason')->textarea(['rows' => 6]) ?>

        <?= $form->field6md($model, 'sale_business_range')->textInput(['maxlength' => true, 'placeholder2' => 'Sale Business Range']) ?>

        <?= $form->field6md($model, 'sale_workers_number')->textInput(['placeholder2' => 'Sale Workers Number']) ?>

        <?= $form->field6md($model, 'sale_sale_range')->textInput(['maxlength' => true, 'placeholder2' => 'Sale Sale Range']) ?>

        <?= $form->field6md($model, 'sale_last_year_income')->textInput(['placeholder2' => 'Sale Last Year Income']) ?>

        <?= $form->field6md($model, 'sale_company_profile')->textInput(['maxlength' => true, 'placeholder2' => 'Sale Company Profile']) ?>
    </div>

    <script>
        var saleSwitch = $('#company-is_for_sale');
        saleSwitch.change(function(){
            $('#saleWrapper').toggleClass('hidden')
        })
    </script>



    <?= $form->field12md($model, 'is_institution')->checkbox() ?>
    <div id="institutionWrapper" class="<?= $model->is_institution? '' : 'hidden'?>">

        <?= $form->field6md($model, 'institution_agent_prefix')->textInput(['maxlength' => true, 'placeholder2' => 'Institution Agent Prefix']) ?>

        <?= $form->field6md($model, 'institution_invoice_amount')->textInput(['placeholder2' => 'Institution Invoice Amount']) ?>

    </div>
    <script>
      var saleSwitch = $('#company-is_institution');
      saleSwitch.change(function(){
        $('#institutionWrapper').toggleClass('hidden')
      })
    </script>



    <?php
    $forms = [
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode(Yii::t('app', 'Products')),
            'content' => $this->render('_formProduct', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->products),
            ]),
        ],
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode(Yii::t('app', 'Services')),
            'content' => $this->render('_formService', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->services),
            ]),
        ],
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode(Yii::t('app', 'Agents')),
            'content' => $this->render('_formAgent', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->agents),
            ]),
        ],
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode(Yii::t('app', 'Benefits')),
            'content' => $this->render('_formBenefit', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->benefits),
            ]),
        ],
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode(Yii::t('app', 'Jobs')),
            'content' => $this->render('_formJob', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->jobs),
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
