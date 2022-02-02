<?php
/* @var $this yii\web\View */

/* @var $model \app\models\mgcms\db\Company */

use app\extensions\mgcms\yii2TinymceWidget\TinyMce;
use yii\helpers\Html;
use app\components\mgcms\MgHelpers;
use \yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use \app\models\mgcms\db\Category;

$fieldConfig = \app\components\ProjectHelper::getFormFieldConfig(true);
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
                        <h2>Informacje ogólne</h2>
                        <?php $form = ActiveForm::begin([
                            'id' => 'category-edit-form',
                            'options' => ['class' => 'contact-form'],
                            'fieldConfig' => $fieldConfig
                        ]); ?>
                        <?= $form->field($model, 'name')->textInput(['placeholder' => $model->getAttributeLabel('name'), 'class' => 'input full-width']) ?>

                        <div class="mb-4">
                            <?= $form->field($model, 'description')->widget(TinyMce::className(), MgHelpers::getTinyMceOptions(['placeholder' => $model->getAttributeLabel('description'), 'class' => 'input full-width'])) ?>
                        </div>
                        <div class="mb-4">
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
                        </form>
                    </div>
                    <div class="form-wrapper">
                        <h2><?= Yii::t('db', 'Contact data') ?></h2>
                        <form action="" class="contact-form" method="POST">
                            <div class="flex">
                                <?= $form->field($model, 'first_name')->textInput(['placeholder' => $model->getAttributeLabel('first_name'), 'class' => 'input full-width']) ?>
                                <?= $form->field($model, 'surname')->textInput(['placeholder' => $model->getAttributeLabel('surname'), 'class' => 'input full-width']) ?>
                            </div>
                            <div class="flex">
                                <div>
                                    <div class="select-wrqpper full-width">
                                        <?= $form->field($model, 'country')->
                                        dropDownList(MgHelpers::getSettingOptionArrayTranslated('countries array'),
                                            ['prompt' => '','class' => 'select full-width']) ?>

                                        <i
                                                class="select__icon fa fa-chevron-down"
                                                aria-hidden="true"
                                        ></i>
                                    </div>
                                </div>

                                <?= $form->field($model, 'city')->textInput(['placeholder' => $model->getAttributeLabel('city'), 'class' => 'input full-width']) ?>
                            </div>
                            <div class="flex">
                                <div>
                                    <div class="select-wrqpper full-width">
                                        <select class="select full-width" name="wojewodztwo">
                                            <option readonly>Województwo</option>
                                        </select>
                                        <i
                                                class="select__icon fa fa-chevron-down"
                                                aria-hidden="true"
                                        ></i>
                                    </div>
                                </div>

                                <input
                                        type="text"
                                        class="input full-width"
                                        placeholder="Kod pocztowy"
                                        name="kod-pocztowy"
                                />
                            </div>
                            <div class="flex">
                                <input
                                        type="text"
                                        class="input full-width"
                                        placeholder="Adres"
                                        name="adres"
                                />
                                <input
                                        type="text"
                                        class="input full-width"
                                        placeholder="Numer telefonu"
                                        name="nr-tel"
                                />
                            </div>
                            <div class="flex">
                                <input
                                        type="email"
                                        class="input full-width"
                                        placeholder="Adres e-mail"
                                        name="e-mail"
                                />
                                <input
                                        type="text"
                                        class="input full-width"
                                        placeholder="Adres strony www"
                                        name="strona"
                                />
                            </div>
                            <div class="switch-wrapper">
                                Konto standardowe
                                <label class="switch">
                                    <input type="checkbox"/>
                                    <span class="slider round"></span>
                                </label>
                                Firma na sprzedaz
                            </div>
                            <div class="flex">
                                <input
                                        type="text"
                                        class="input full-width"
                                        placeholder="NIP"
                                        name="nip"
                                />
                                <input
                                        type="text"
                                        class="input full-width"
                                        placeholder="REGON"
                                        name="regon"
                                />
                            </div>
                            <div class="flex">
                                <input
                                        type="text"
                                        class="input full-width"
                                        placeholder="KRS"
                                        name="krs"
                                />
                                <input
                                        type="text"
                                        class="input full-width"
                                        placeholder="Numer konta"
                                        name="numer-konta"
                                />
                            </div>
                            <h2>Mapa</h2>
                            <div class="flex">
                                <input
                                        type="text"
                                        class="input full-width"
                                        placeholder="Latitude"
                                        name="latitude"
                                />
                                <input
                                        type="text"
                                        class="input full-width"
                                        placeholder="Longitude"
                                        name="longityde"
                                />
                            </div>
                            <div class="text-right">
                                <button class="btn btn--primary btn--medium" type="submit">
                                    Zapisz
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="form-wrapper">
                        <form action="" class="contact-form" method="POST">
                            <h2 class="with-label">Miniatura</h2>
                            <label>Wybierz plik graficzny</label>

                            <div
                                    id="MINIATURE-PREVIEW"
                                    class="file-uplad"
                                    style="display: none"
                            ></div>

                            <label class="file-uplad">
                                + Dodaj
                                <input
                                        type="file"
                                        name="file"
                                        id="MINIATURE"
                                        accept="image/*"
                                        class="inputfile"
                                />
                            </label>

                            <h2 class="with-label">Zdjcie tła</h2>
                            <label>Wybierz plik graficzny</label>

                            <div
                                    id="BG-IMAGE-PREVIEW"
                                    class="file-uplad"
                                    style="display: none"
                            ></div>

                            <label class="file-uplad">
                                + Dodaj
                                <input
                                        type="file"
                                        name="file"
                                        id="BG-IMAGE"
                                        accept="image/*"
                                        class="inputfile"
                                />
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

                            <h2 class="with-label">Filmy</h2>
                            <label>Filmy w formacie *.mp4</label>
                            <div
                                    id="VIDEO-PREVIEW"
                                    class="file-uplad"
                                    style="display: none"
                            ></div>

                            <label class="file-uplad">
                                + Dodaj
                                <input
                                        type="file"
                                        name="file"
                                        id="VIDEO"
                                        accept="video/mp4,video/*"
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
