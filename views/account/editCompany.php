<?php
/* @var $this yii\web\View */

/* @var $model \app\models\mgcms\db\Company */

use app\extensions\mgcms\yii2TinymceWidget\TinyMce;
use yii\helpers\Html;
use app\components\mgcms\MgHelpers;
use \yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use \app\models\mgcms\db\Category;

$fieldConfig = \app\components\ProjectHelper::getFormFieldConfigMyAccount();
?>
<section class="companies-wrapper companies-wrapper--dashboard">
    <div class="container">
        <div class="search-results search-results--dashboard">
            <?= $this->render('_leftMenu') ?>
            <div>
                <div class="dashboard-wrapper">
                    <h1 class="text-left"><?= Yii::t('db', 'Edit company') ?></h1>
                    <div class="contact-box">
                        <div class="person person--big display-block">
                            <div>
                                <div class="person__role person__role--normal">
                                    <?= Yii::t('db', 'Content description') ?>
                                </div>
                                <?= Yii::t('db', 'Choose language') ?>
                            </div>
                        </div>

                        <?php $form = ActiveForm::begin(['method' => 'get', 'action' => Url::to(['account/edit-company']),]); ?>
                        <select class="select full-width" name="lang" onchange="this.form.submit()">
                            <? foreach (MgHelpers::getConfigParam('languages') as $lang): ?>
                                <option value="<?php echo $lang ?>" <?= $model->language == $lang ? 'selected' : '' ?>><?= $lang ?></option>
                            <? endforeach ?>
                        </select>
                        <?php ActiveForm::end(); ?>


                    </div>
                    <div class="form-wrapper">
                        <h2><?= Yii::t('db', 'Main information') ?></h2>
                        <?php $form = ActiveForm::begin([
                            'id' => 'category-edit-form',
                            'options' => ['class' => 'contact-form'],
                            'fieldConfig' => $fieldConfig
                        ]); ?>
                        <?= $form->errorSummary($model); ?>
                        <?= $form->field($model, 'name')->textInput(['placeholder' => $model->getAttributeLabel('name')]) ?>

                        <div class="mb-4 bottom25">
                            <?= $form->field($model, 'description')->widget(TinyMce::className(), MgHelpers::getTinyMceOptions(['placeholder' => $model->getAttributeLabel('description')])) ?>
                        </div>
                        <div class="mb-4 bottom25">
                            <?= $form->field($model, 'category_id')->widget(\kartik\widgets\Select2::classname(), [
                                'data' => \yii\helpers\ArrayHelper::map(Category::find()->andWhere(['type' => Category::TYPE_COMPANY_TYPE])->orderBy('id')->asArray()->all(), 'id', 'name'),
                                'options' => ['placeholder2' => Yii::t('db', 'Choose Category'), 'prompt' => ''],
                                'pluginOptions' => [
                                    'allowClear' => true
                                ],
                            ]); ?>
                        </div>

                        <div class="text-right">
                            <button class="btn btn--primary btn--medium" type="submit">
                                <?= Yii::t('db', 'Save') ?>
                            </button>
                        </div>
                        <?php ActiveForm::end(); ?>
                    </div>
                    <div class="form-wrapper">
                        <h2><?= Yii::t('db', 'Contact data') ?></h2>
                        <?php $form = ActiveForm::begin([
                            'id' => 'category-edit-form',
                            'options' => ['class' => 'contact-form'],
                            'fieldConfig' => $fieldConfig
                        ]); ?>

                        <div class="flex">
                            <?= $form->field($model, 'first_name')->textInput(['placeholder' => $model->getAttributeLabel('first_name')]) ?>
                            <?= $form->field($model, 'surname')->textInput(['placeholder' => $model->getAttributeLabel('surname')]) ?>
                        </div>
                        <div class="flex">
                            <div>
                                <div class="select-wrqpper full-width">
                                    <?= $form->field($model, 'country')->
                                    dropDownList(MgHelpers::getSettingOptionArrayTranslated('countries array'),
                                        ['prompt' => '', 'class' => 'select full-width']) ?>

                                    <i
                                            class="select__icon fa fa-chevron-down"
                                            aria-hidden="true"
                                    ></i>
                                </div>
                            </div>

                            <?= $form->field($model, 'city')->textInput(['placeholder' => $model->getAttributeLabel('city')]) ?>
                        </div>
                        <div class="flex">

                            <?= $form->field($model, 'postcode')->textInput(['placeholder' => $model->getAttributeLabel('postcode')]) ?>
                        </div>
                        <div class="flex">
                            <?= $form->field($model, 'street')->textInput(['placeholder' => $model->getAttributeLabel('street')]) ?>
                            <?= $form->field($model, 'phone')->textInput(['placeholder' => $model->getAttributeLabel('address')]) ?>
                        </div>
                        <div class="flex">
                            <?= $form->field($model, 'email')->textInput(['placeholder' => $model->getAttributeLabel('email'), 'type' => 'email']) ?>
                            <?= $form->field($model, 'www')->textInput(['placeholder' => $model->getAttributeLabel('www')]) ?>

                        </div>
                        <div class="switch-wrapper">
                            <?= Yii::t('db', 'Standard account') ?>
                            <label class="switch">
                                <input type="checkbox"
                                       name="Company[is_for_sale]" <?= $model->is_for_sale ? 'checked' : '' ?>/>
                                <span class="slider round"></span>
                            </label>
                            <?= Yii::t('db', 'Company for sale') ?>
                        </div>
                        <div class="flex">
                            <?= $form->field($model, 'nip')->textInput(['placeholder' => $model->getAttributeLabel('nip')]) ?>
                            <?= $form->field($model, 'regon')->textInput(['placeholder' => $model->getAttributeLabel('regon')]) ?>

                        </div>
                        <div class="flex">
                            <?= $form->field($model, 'krs')->textInput(['placeholder' => $model->getAttributeLabel('krs')]) ?>
                            <?= $form->field($model, 'banc_account_no')->textInput(['placeholder' => $model->getAttributeLabel('banc_account_no')]) ?>
                        </div>
                        <h2><?= Yii::t('db', 'Map') ?></h2>
                        <div class="flex">
                            <?= $form->field($model, 'gps_lat')->textInput(['placeholder' => $model->getAttributeLabel('gps_lat')]) ?>
                            <?= $form->field($model, 'gps_long')->textInput(['placeholder' => $model->getAttributeLabel('gps_long')]) ?>
                        </div>

                        <h2><?= Yii::t('db', 'Video') ?></h2>
                        <div class="flex">
                            <?= $form->field($model, 'video')->textInput(['placeholder' => $model->getAttributeLabel('video')]) ?>
                            <?= $form->field($model, 'video_thumbnail')->textInput(['placeholder' => $model->getAttributeLabel('video_thumbnail')]) ?>
                        </div>
                        <div class="text-right">
                            <button class="btn btn--primary btn--medium" type="submit">
                                <?= Yii::t('db', 'Save') ?>
                            </button>
                        </div>
                        <?php ActiveForm::end(); ?>
                    </div>
                    <div class="form-wrapper">
                        <?php $form = ActiveForm::begin([
                            'id' => 'category-edit-form',
                            'options' => ['class' => 'contact-form'],
                            'fieldConfig' => $fieldConfig
                        ]); ?>
                        <h2 class="with-label"><?= Yii::t('db', 'Thumbnail') ?></h2>
                        <label><?= Yii::t('db', 'Choose graphics file') ?></label>


                        <? if ($model->thumbnail && $model->thumbnail->isImage()): ?>
                            <div
                                    id="MINIATURE-PREVIEW"
                                    class="file-uplad"
                            >
                                <img src="<?= $model->thumbnail->getImageSrc(240, 0) ?>" class=""/>
                            </div>
                        <? endif; ?>


                        <label class="file-uplad">
                            + <?= Yii::t('db', 'Add') ?>

                            <?= $form->field($model, 'thumbnailFile')->fileInput(['multiple' => false, 'accept' => 'image/*', 'class' => 'inputfile']); ?>

                        </label>

                        <h2 class="with-label"><?= Yii::t('db', 'Background photo') ?></h2>
                        <label><?= Yii::t('db', 'Choose graphics file') ?></label>

                        <? if ($model->background && $model->background->isImage()): ?>
                        <div
                                id="BG-IMAGE-PREVIEW"
                                class="file-uplad"
                        >
                            <img
                                    src="<?= $model->background->getImageSrc(240,0) ?>"
                                    alt=""
                            />
                        </div>
                        <? endif; ?>

                        <label class="file-uplad">
                            + <?= Yii::t('db', 'Add') ?>
                            <?= $form->field($model, 'backgroundFile')->fileInput(['multiple' => false, 'accept' => 'image/*', 'class' => 'inputfile']); ?>
                        </label>

                        <h2 class="with-label">Galeria</h2>
                        <label>Zdjcia w rozmiarze co najmniej 1000 x 1000 px</label>

                        <div
                                id="GALLERY-IMAGE-PREVIEW"
                                class="file-uplad"
                                style="display: none"
                        ></div>

                        <label class="file-uplad">
                            + Dodaj
                            <input
                                    type="file"
                                    name="file"
                                    id="GALLERY-IMAGE"
                                    accept="image/*"
                                    class="inputfile"
                            />
                        </label>


                        <h2 class="with-label">Pliki</h2>
                        <label>Pliki z rozszerzeniami *.pdf</label>
                        <div class="file-uplad file-upload--light">
                            <img src="./svg/file.svg" alt=""/>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        </div>
                        <label class="file-uplad">
                            + Dodaj
                            <input
                                    type="file"
                                    name="file"
                                    id="file"
                                    class="inputfile"
                            />
                        </label>

                        <div class="text-right">
                            <button class="btn btn--primary btn--medium" type="submit">
                                Zapisz
                            </button>
                        </div>
                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
