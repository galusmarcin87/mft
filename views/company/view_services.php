<?php
/* @var $model app\models\mgcms\db\Company */
/* @var $form app\components\mgcms\yii\ActiveForm */

/* @var $this yii\web\View */

/* @var $subscribeForm \app\models\SubscribeForm */

use app\components\mgcms\MgHelpers;
use yii\web\View;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;


$this->title = $model->name;
$model->language = Yii::$app->language;

?>

<section class="service-wrapper company-wrapper">
    <div class="container">
        <?= $this->render('view/_breadcrumbs', ['model' => $model]) ?>

        <div class="service single-company">
            <?= $this->render('view/_logo', ['model' => $model]) ?>
            <div class="single-company__content ">
                <?= $this->render('view/_top', ['model' => $model]) ?>
                <?= $this->render('view/_buttons', ['model' => $model]) ?>

            </div>
        </div>
    </div>
</section>


<div class="container">
    <div class="search-results">
        <div class="menu-vertical">
            <div class="menu-vertical__toggle">
                <i class="fa fa-times" aria-hidden="true"></i>
                <i class="fa fa-bars" aria-hidden="true"></i>
            </div>
            <div class="menu-vertical__item">Wszystko</div>
            <div
                    class="menu-vertical__category menu-vertical__category--collapsed"
            >
                <div class="menu-vertical__item">Firmy</div>
                <a href="" class="menu-vertical__item">
                    Pozostałe działalności
                </a>
                <a
                        href=""
                        class="menu-vertical__item menu-vertical__item--active"
                >
                    Reklama i marketing
                </a>
                <a href="" class="menu-vertical__item"> Produkcja </a>
                <a href="" class="menu-vertical__item"> Budowa i architektura </a>
                <a href="" class="menu-vertical__item"> Handel </a>
                <a href="" class="menu-vertical__item">
                    Transport i składowanie
                </a>
                <a href="" class="menu-vertical__item">
                    Hotelarstwo i gastronomia</a
                >
                <a href="" class="menu-vertical__item">
                    Działalność finansowa i ubezpieczenia</a
                >
                <a href="" class="menu-vertical__item"> Nieruchomości</a>
                <a href="" class="menu-vertical__item">
                    Działalność prawnicza, podatkowa, ksigowa</a
                >
                <a href="" class="menu-vertical__item"> Edukacja</a>
                <a href="" class="menu-vertical__item">
                    Sport, sztuka, kulturam rozrywka i rekreacja</a
                >
                <a href="" class="menu-vertical__item"> Usługi</a>
                <a href="" class="menu-vertical__item">
                    Odpady, rekultywacja, energia odnawialna</a
                >
                <a href="" class="menu-vertical__item"> Turystyka</a>
                <a href="" class="menu-vertical__item"> IT</a>
                <a href="" class="menu-vertical__item"> Telekomunikacja</a>
                <a href="" class="menu-vertical__item"> Opieka zdrowotna</a>
            </div>
            <a href="./produkty.html" class="menu-vertical__category">
                <div class="menu-vertical__item ">Produkty</div>
            </a>
            <a href="./firmy-napsprzedaz.html" class="menu-vertical__category">
                <div class="menu-vertical__item">Firmy na sprzedaż</div>
            </a>
            <a href="./uslugi.html" class="menu-vertical__category">
                <div class="menu-vertical__item menu-vertical__item--active">
                    Usługi
                </div>
            </a>
            <a href="./oferty-pracy.html" class="menu-vertical__category">
                <div class="menu-vertical__item">Oferty pracy</div>
            </a>
        </div>
        <div>
            <div class="companies__labels hidden">
                <div class="label">Produkty</div>
                <div class="label text-right hidden" style="margin-top: -12px">
                    Sortuj wg
                    <div class="select-wrqpper">
                        <select class="select">
                            <option>- największa liczba wejść na MFT</option>
                        </select>
                        <i
                                class="select__icon fa fa-chevron-down"
                                aria-hidden="true"
                        ></i>
                    </div>
                </div>
            </div>
            <div class="companies companies--wide">
                <? foreach ($model->services as $service): ?>
                    <?= $this->render('/service/_index', ['model' => $service]) ?>
                <? endforeach ?>
            </div>
        </div>
    </div>
</div>

