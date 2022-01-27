<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model app\models\RegisterForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\components\mgcms\MgHelpers;

$this->title = Yii::t('db', 'Register');
$this->params['breadcrumbs'][] = $this->title;


?>
<section class="service-wrapper company-wrapper login register">
    <div class="container">
        <div class="breadcrumb">
            <a href="/"> meetfaces </a>
            <span><?= Yii::t('db', 'Register') ?></span>
        </div>

        <div class="service single-company">
            <div class="flex">
                <div>
                    <h1 class="text-left"><?= Yii::t('db', 'Register') ?></h1>
                    <div class="hr"></div>
                    <h3 class="highlighted">
                        <img src="/svg/atuty.svg" alt="" />
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
                    <h3>Masz juz swoje konto?</h3>
                    <a href="<?= \yii\helpers\Url::to('/site/login')?>" class="btn btn--primary"><?= Yii::t('db', 'Log in') ?></a>
                </div>
                <div>
                    <form class="contact-form login__form" method="POST">
                        <div class="contact-form__header">Załóz nowe konto</div>
                        <input
                                type="text"
                                class="input"
                                placeholder="Imie i nazwisko"
                                name="imie"
                        />
                        <input
                                type="email"
                                class="input"
                                placeholder="Adres e-mail"
                                name="email"
                        />
                        <input
                                type="password"
                                class="input"
                                placeholder="Hasło"
                                name="haslo"
                        />
                        <input
                                type="password"
                                class="input"
                                placeholder="Powrórz hasło"
                                name="haslo2"
                        />
                        <input
                                type="text"
                                class="input"
                                placeholder="Kod agenta (jezeli posiadasz)"
                                name="kod"
                        />
                        <div class="switch-wrapper">
                            Konto standardowe
                            <label class="switch">
                                <input type="checkbox" checked />
                                <span class="slider round"></span>
                            </label>
                            Firma na sprzedaz
                        </div>
                        <div>
                            <input
                                    type="checkbox"
                                    class="checkbox"
                                    name="zapamietaj"
                                    id="check-1"
                            />
                            <label for="check-1">
                                Akceptuje
                                <a href="" class="underline highlighted normal"
                                >regulamin</a
                                >
                                serwisu
                            </label>
                        </div>
                        <button class="btn btn--secondary btn--block" type="submit">
                            Zaloguj sie
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>



<section class="Section Section--white Register animatedParent">
    <div class="container fadeIn animated">
        <h2 class="text-center">
            <?= Yii::t('db', 'Provide Your information to register account'); ?>
        </h2>
        <div class="User-Panel__form User-Panel__form--block">
            <div>
                <?php
                $form = ActiveForm::begin([
                    'id' => 'login-form',
                    'class' => 'fadeInUpShort animated delay-250',
                    'fieldConfig' => \app\components\ProjectHelper::getFormFieldConfig()
                ]);

                //          echo $form->errorSummary($model);
                ?>
                <div class="User-Panel__form-group">
                    <?= $form->field($model, 'firstName')->textInput(['placeholder' => ' ']) ?>
                    <?= $form->field($model, 'surname')->textInput(['placeholder' => ' ']) ?>
                </div>
                <div class="User-Panel__form-group">
                    <?= $form->field($model, 'username')->textInput(['placeholder' => ' ']) ?>
                    <?= $form->field($model, 'phone')->textInput(['placeholder' => ' ']) ?>
                </div>
                <div class="User-Panel__form-group">
                    <?= $form->field($model, 'password')->passwordInput(['placeholder' => ' ']) ?>
                    <?= $form->field($model, 'passwordRepeat')->passwordInput(['placeholder' => ' ']) ?>
                </div>
                <div class="Form__group form-group text-left checkbox">
                    <?= $form->field($model, 'acceptTerms',
                        [
                            'checkboxTemplate' => "{input}\n" . $model->getAttributeLabel('acceptTerms') . "\n{error}",
                        ]
                    )->checkbox() ?>
                </div>


                <div class="text-center">
                    <input
                            style="margin-top: 0;margin-bottom: 35px;"
                            type="submit"
                            class="btn btn-success"
                            value="<?= Yii::t('db', 'REGISTER'); ?>"
                    />
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</section>
