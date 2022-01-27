<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\components\mgcms\MgHelpers;
use yii\authclient\widgets\AuthChoice;


$this->title = Yii::t('db', 'Log in');
$this->params['breadcrumbs'][] = $this->title;
$fieldConfig = \app\components\ProjectHelper::getFormFieldConfig(true)

//https://yii2-framework.readthedocs.io/en/stable/guide/security-auth-clients/
?>
<style>
    .service p{
        margin-bottom: 0;
    }
</style>
<section class="service-wrapper company-wrapper login">
    <div class="container">
        <div class="breadcrumb">
            <a href="/"> meetfaces </a>
            <span><?= Yii::t('db', 'Log in') ?></span>
        </div>

        <div class="service single-company">
            <div class="flex">
                <div>
                    <h1 class="text-left"><?= Yii::t('db', 'Log in') ?></h1>
                    <div class="hr"></div>
                    <h3 class="highlighted">
                        <img src="/svg/atuty.svg" alt=""/>
                        Zalety posiadania konta:
                    </h3>
                    <ul class="list">
                        <li></li>
                        <li>
                            lorem ipsum dolor sit amet, consectetur adipisicing elit
                        </li>
                        <li>
                            sed do eiusmod tempor incididunt ut labore et dolore magna
                            aliqua
                        </li>
                        <li>ut enim ad minim veniam, quis nostrud exercitation</li>
                        <li>lamco laboris nisi ut aliquip ex ea commodo consequat</li>
                    </ul>
                    <div class="hr"></div>
                    <h3>Nie masz jeszcze konta?</h3>
                    <a href="<?= \yii\helpers\Url::to('/site/register') ?>" class="btn btn--secondary"
                    ><?= Yii::t('db', 'Register') ?></a
                    >
                </div>
                <div>
                    <?php
                    $form = ActiveForm::begin([
                        'id' => 'login-form',
                        'options' => ['class' => 'contact-form login__form'],
                        'fieldConfig' => $fieldConfig
                    ]);

                    //echo $form->errorSummary($loginCodeForm);
                    ?>
                    <div class="contact-form__header">
                        <?= Yii::t('db', 'Log in into your account') ?>
                    </div>
                    <?= $form->field($loginCodeForm, 'code')->textInput(['type' => 'text', 'required' => true, 'placeholder' => $loginCodeForm->getAttributeLabel('code')]) ?>
                    <?= $form->field($loginCodeForm, 'userId')->hiddenInput() ?>
                    <?= $form->field($loginCodeForm, 'rememberMe')->hiddenInput() ?>

                    <button class="btn btn--primary btn--block" type="submit">
                        <?= Yii::t('db', 'Log in') ?>
                    </button>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</section>

