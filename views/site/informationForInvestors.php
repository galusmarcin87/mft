<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\components\mgcms\MgHelpers;
use yii\authclient\widgets\AuthChoice;

$fieldConfig = \app\components\ProjectHelper::getFormFieldConfig(true)

//https://yii2-framework.readthedocs.io/en/stable/guide/security-auth-clients/
?>
<style>
    .service p {
        margin-bottom: 0;
    }
</style>
<section class="service-wrapper company-wrapper login">
    <div class="container">
        <div class="breadcrumb">
            <a href="/"> meetfaces </a>
            <span><?= Yii::t('db', 'Information for investors') ?></span>
        </div>

        <div class="service single-company">
            <div class="flex">
                <div>
                    <?php
                    $form = ActiveForm::begin([
                        'id' => 'login-form',
                        'options' => ['class' => 'contact-form login__form'],
                        'fieldConfig' => $fieldConfig
                    ]);

                    echo $form->errorSummary($model);
                    ?>
                    <div class="contact-form__header">
                        <?= Yii::t('db', 'Information for investors') ?>
                    </div>
                    <p>
                        <?= Yii::t('db', 'If you would like to invest, leave us information') ?>
                    </p>
                    <?= $form->field($model, 'name')->textInput(['required' => true, 'placeholder' => $model->getAttributeLabel('name')]) ?>
                    <?= $form->field($model, 'email')->textInput(['required' => true, 'type' => 'email', 'placeholder' => $model->getAttributeLabel('email')]) ?>
                    <?= $form->field($model, 'investitionAmount')->dropDownList(MgHelpers::arrayCombineFromOneArray(['',Yii::t('db','to 10 000'), '10 000 - 25 000','25 000 - 50 000',Yii::t('db','over 50 000'),Yii::t('db','over 100 000')])
                        , ['required' => true, 'placeholder' => $model->getAttributeLabel('investitionAmount')]) ?>

                    <button class="btn btn--primary btn--block" type="submit">
                        <?= Yii::t('db', 'Send') ?>
                    </button>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
  $('#paysubscriptionform-exchangerate').on('change keyup', (function () {
    $('#paysubscriptionform-tokensamount').val($(this).val() * $('#paysubscriptionform-subscrriptionfee').val());
  }));
</script>