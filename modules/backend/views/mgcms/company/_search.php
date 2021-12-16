<?php

use yii\helpers\Html;
use app\components\mgcms\yii\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\mgcms\db\CompanySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-company-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'placeholder' => 'Name']) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'is_promoted')->checkbox() ?>

    <?= $form->field($model, 'first_name')->textInput(['maxlength' => true, 'placeholder' => 'First Name']) ?>

    <?php /* echo $form->field($model, 'surname')->textInput(['maxlength' => true, 'placeholder' => 'Surname']) */ ?>

    <?php /* echo $form->field($model, 'status')->textInput(['maxlength' => true, 'placeholder' => 'Status']) */ ?>

    <?php /* echo $form->field($model, 'country')->textInput(['maxlength' => true, 'placeholder' => 'Country']) */ ?>

    <?php /* echo $form->field($model, 'city')->textInput(['maxlength' => true, 'placeholder' => 'City']) */ ?>

    <?php /* echo $form->field($model, 'postcode')->textInput(['maxlength' => true, 'placeholder' => 'Postcode']) */ ?>

    <?php /* echo $form->field($model, 'street')->textInput(['maxlength' => true, 'placeholder' => 'Street']) */ ?>

    <?php /* echo $form->field($model, 'phone')->textInput(['maxlength' => true, 'placeholder' => 'Phone']) */ ?>

    <?php /* echo $form->field($model, 'email')->textInput(['maxlength' => true, 'placeholder' => 'Email']) */ ?>

    <?php /* echo $form->field($model, 'www')->textInput(['maxlength' => true, 'placeholder' => 'Www']) */ ?>

    <?php /* echo $form->field($model, 'nip')->textInput(['maxlength' => true, 'placeholder' => 'Nip']) */ ?>

    <?php /* echo $form->field($model, 'regon')->textInput(['maxlength' => true, 'placeholder' => 'Regon']) */ ?>

    <?php /* echo $form->field($model, 'krs')->textInput(['maxlength' => true, 'placeholder' => 'Krs']) */ ?>

    <?php /* echo $form->field($model, 'banc_account_no')->textInput(['maxlength' => true, 'placeholder' => 'Banc Account No']) */ ?>

    <?php /* echo $form->field($model, 'gps_lat')->textInput(['maxlength' => true, 'placeholder' => 'Gps Lat']) */ ?>

    <?php /* echo $form->field($model, 'gps_long')->textInput(['maxlength' => true, 'placeholder' => 'Gps Long']) */ ?>

    <?php /* echo $form->field($model, 'subscription_fee')->textInput(['placeholder' => 'Subscription Fee']) */ ?>

    <?php /* echo $form->field($model, 'companycol')->textInput(['maxlength' => true, 'placeholder' => 'Companycol']) */ ?>

    <?php /* echo $form->field($model, 'created_on')->textInput(['placeholder' => 'Created On']) */ ?>

    <?php /* echo $form->field($model, 'category_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\mgcms\db\Category::find()->orderBy('id')->asArray()->all(), 'id', 'name'),
        'options' => ['placeholder' => Yii::t('app', 'Choose Category')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); */ ?>

    <?php /* echo $form->field($model, 'user_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\mgcms\db\User::find()->orderBy('id')->asArray()->all(), 'id', 'username'),
        'options' => ['placeholder' => Yii::t('app', 'Choose User')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); */ ?>

    <?php /* echo $form->field($model, 'payment_status')->textInput(['maxlength' => true, 'placeholder' => 'Payment Status']) */ ?>

    <?php /* echo $form->field($model, 'paid_from')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
        'saveFormat' => 'php:Y-m-d',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => Yii::t('app', 'Choose Paid From'),
                'autoclose' => true
            ]
        ],
    ]); */ ?>

    <?php /* echo $form->field($model, 'paid_to')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
        'saveFormat' => 'php:Y-m-d',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => Yii::t('app', 'Choose Paid To'),
                'autoclose' => true
            ]
        ],
    ]); */ ?>

    <?php /* echo $form->field($model, 'thumbnail_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\mgcms\db\File::find()->orderBy('id')->asArray()->all(), 'id', 'name'),
        'options' => ['placeholder' => Yii::t('app', 'Choose File')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); */ ?>

    <?php /* echo $form->field($model, 'background_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\mgcms\db\File::find()->orderBy('id')->asArray()->all(), 'id', 'name'),
        'options' => ['placeholder' => Yii::t('app', 'Choose File')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); */ ?>

    <?php /* echo $form->field($model, 'is_for_sale')->checkbox() */ ?>

    <?php /* echo $form->field($model, 'sale_title')->textInput(['maxlength' => true, 'placeholder' => 'Sale Title']) */ ?>

    <?php /* echo $form->field($model, 'sale_description')->textarea(['rows' => 6]) */ ?>

    <?php /* echo $form->field($model, 'sale_price')->textInput(['placeholder' => 'Sale Price']) */ ?>

    <?php /* echo $form->field($model, 'sale_currency')->textInput(['maxlength' => true, 'placeholder' => 'Sale Currency']) */ ?>

    <?php /* echo $form->field($model, 'sale_price_includes')->textarea(['rows' => 6]) */ ?>

    <?php /* echo $form->field($model, 'sale_reason')->textarea(['rows' => 6]) */ ?>

    <?php /* echo $form->field($model, 'sale_business_range')->textInput(['maxlength' => true, 'placeholder' => 'Sale Business Range']) */ ?>

    <?php /* echo $form->field($model, 'sale_workers_number')->textInput(['placeholder' => 'Sale Workers Number']) */ ?>

    <?php /* echo $form->field($model, 'sale_sale_range')->textInput(['maxlength' => true, 'placeholder' => 'Sale Sale Range']) */ ?>

    <?php /* echo $form->field($model, 'sale_last_year_income')->textInput(['placeholder' => 'Sale Last Year Income']) */ ?>

    <?php /* echo $form->field($model, 'sale_company_profile')->textInput(['maxlength' => true, 'placeholder' => 'Sale Company Profile']) */ ?>

    <?php /* echo $form->field($model, 'is_institution')->checkbox() */ ?>

    <?php /* echo $form->field($model, 'institution_agent_prefix')->textInput(['maxlength' => true, 'placeholder' => 'Institution Agent Prefix']) */ ?>

    <?php /* echo $form->field($model, 'institution_invoice_amount')->textInput(['placeholder' => 'Institution Invoice Amount']) */ ?>

    <?php /* echo $form->field($model, 'companycol1')->textInput(['maxlength' => true, 'placeholder' => 'Companycol1']) */ ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
