<?php
/* @var $this yii\web\View */
/* @var $myCompany \app\models\mgcms\db\Company */

use yii\helpers\Html;
use app\components\mgcms\MgHelpers;
use \yii\helpers\Url;

?>

<section class="companies-wrapper companies-wrapper--dashboard">
    <div class="container">
        <div class="search-results search-results--dashboard">
            <?= $this->render('_leftMenu')?>
            <div>
                <div class="dashboard-wrapper">
                    <div class="row">
                    <h1 class="text-left col-md-4"><?= Yii::t('db', 'Dashboard') ?></h1>
                    <?if($myCompany):?>
                        <div class="text-left col-md-8 paySubscription">
							<a href="<?= Url::to('/account/pay-subscription-stripe') ?>" class="btn btn--primary"><?= Yii::t('db', 'Pay subscription') ?></a>
                            <a href="<?= Url::to('/account/pay-subscription') ?>" class="btn btn--primary"><?= Yii::t('db', 'Pay by tokens') ?></a>
                            <a href="<?= Url::to('/account/connect-with-stripe') ?>" class="btn btn--primary"><?= Yii::t('db', 'Connect with Stripe') ?></a>
                        </div>
                    <?endif?>
                    </div>
                    <div class="contact-box">
                        <div class="person person--big">
                            <div>
                                <div class="big-number"><?= $myCompany ? count($myCompany->agents) : 0 ?></div>
                            </div>
                            <div>
                                <div class="person__role person__role--normal"><?= Yii::t('db', 'List of') ?></div>
                                <?= Yii::t('db', 'Agents') ?>
                            </div>
                        </div>
                        <a href="<?= Url::to('/account/add-agent') ?>" class="btn btn--primary">+ <?= Yii::t('db', 'Add') ?></a>
                        <a href="<?= Url::to('/account/agents') ?>" class="btn btn--primary"><?= Yii::t('db', 'See') ?></a>
                    </div>
                    <div class="contact-box">
                        <div class="person person--big">
                            <div>
                                <div class="big-number"><?= $myCompany ? count($myCompany->products) : 0 ?></div>
                            </div>
                            <div>
                                <div class="person__role person__role--normal"><?= Yii::t('db', 'List of') ?></div>
                                <?= Yii::t('db', 'Products') ?>
                            </div>
                        </div>
                        <a href="<?= Url::to('/account/add-product') ?>" class="btn btn--primary">+ <?= Yii::t('db', 'Add') ?></a>
                        <a href="<?= Url::to('/account/products') ?>" class="btn btn--primary"><?= Yii::t('db', 'See') ?></a>
                    </div>
                    <div class="contact-box">
                        <div class="person person--big">
                            <div>
                                <div class="big-number"><?= $myCompany ? count($myCompany->services) : 0 ?></div>
                            </div>
                            <div>
                                <div class="person__role person__role--normal"><?= Yii::t('db', 'List of') ?></div>
                                <?= Yii::t('db', 'Services') ?>
                            </div>
                        </div>
                        <a href="<?= Url::to('/account/add-service') ?>" class="btn btn--primary">+ <?= Yii::t('db', 'Add') ?></a>
                        <a href="<?= Url::to('/account/services') ?>" class="btn btn--primary"><?= Yii::t('db', 'See') ?></a>
                    </div>
                    <div class="contact-box">
                        <div class="person person--big">
                            <div>
                                <div class="big-number"><?= $myCompany ? count($myCompany->jobs) : 0 ?></div>
                            </div>
                            <div>
                                <div class="person__role person__role--normal"><?= Yii::t('db', 'List of') ?></div>
                                <?= Yii::t('db', 'Jobs') ?>
                            </div>
                        </div>
                        <a href="<?= Url::to('/account/add-job') ?>" class="btn btn--primary">+ <?= Yii::t('db', 'Add') ?></a>
                        <a href="<?= Url::to('/account/jobs') ?>" class="btn btn--primary"><?= Yii::t('db', 'See') ?></a>
                    </div>
                    <div id="ACCORDION" class="accordion">
                        <div class="accordion__header">
                            Jak uzupełnić dane dotyczące firmy?
                        </div>
                        <div class="accordion__content">
                            Aby uzupełnić dane Twojej firmy przejdź do zakładki „Firmy”
                            znajdującej się w menu panelu administracyjnego a następnie
                            wybierz opcję „Edytuj firmę”. Po wprowadzeniu wszystkich
                            wymaganych danych zatwierdź zmiany poprzez przycisk „Zapisz”.
                            Pamiętaj, że wprowadzone przez Ciebie dane będą wyświetlane w
                            obrębie platformy Meetfaces Trading, dlatego zadbaj o ich
                            najlepszą jakość.
                        </div>
                        <div class="accordion__header">
                            Jak dodać przedstawiciela firmy?
                        </div>
                        <div class="accordion__content">
                            Aby uzupełnić dane Twojej firmy przejdź do zakładki „Firmy”
                            znajdującej się w menu panelu administracyjnego a następnie
                            wybierz opcję „Edytuj firmę”. Po wprowadzeniu wszystkich
                            wymaganych danych zatwierdź zmiany poprzez przycisk „Zapisz”.
                            Pamiętaj, że wprowadzone przez Ciebie dane będą wyświetlane w
                            obrębie platformy Meetfaces Trading, dlatego zadbaj o ich
                            najlepszą jakość.
                        </div>
                        <div class="accordion__header">
                            Jak dodać produkty oraz usługi?
                        </div>
                        <div class="accordion__content">
                            Aby uzupełnić dane Twojej firmy przejdź do zakładki „Firmy”
                            znajdującej się w menu panelu administracyjnego a następnie
                            wybierz opcję „Edytuj firmę”. Po wprowadzeniu wszystkich
                            wymaganych danych zatwierdź zmiany poprzez przycisk „Zapisz”.
                            Pamiętaj, że wprowadzone przez Ciebie dane będą wyświetlane w
                            obrębie platformy Meetfaces Trading, dlatego zadbaj o ich
                            najlepszą jakość.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
