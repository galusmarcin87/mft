<?php
/* @var $this yii\web\View */

/* @var $myCompany \app\models\mgcms\db\Company */

use yii\helpers\Html;
use app\components\mgcms\MgHelpers;
use \yii\helpers\Url;
$request = $this->context->request;
?>

<div class="menu-vertical">
    <div class="menu-vertical__toggle">
        <i class="fa fa-times" aria-hidden="true"></i>
        <i class="fa fa-bars" aria-hidden="true"></i>
    </div>
    <div class="menu-vertical__category">
        <div class="menu-vertical__item menu-vertical__item--active">
            <?= Yii::t('db', 'Companies') ?>
        </div>
        <a
                href="<?= Url::to('/account/index') ?>"
                class="menu-vertical__item <? if($request->getPathInfo() == 'account/index'): ?>menu-vertical__item--active<? endif; ?>"
        >
            <?= Yii::t('db', 'Dashboard') ?>
        </a>
        <a href="<?= Url::to('/account/edit-company') ?>" class="menu-vertical__item <? if($request->getPathInfo() == 'account/edit-company'): ?>menu-vertical__item--active<? endif; ?>">
            <?= Yii::t('db', 'Edit company') ?>
        </a>
    </div>
    <a href="./produkty.html" class="menu-vertical__category">
        <div class="menu-vertical__item">Produkty</div>
    </a>
    <a href="./firmy-napsprzedaz.html" class="menu-vertical__category">
        <div class="menu-vertical__item">Firmy na sprzedaż</div>
    </a>
    <a href="./uslugi.html" class="menu-vertical__category">
        <div class="menu-vertical__item">Usługi</div>
    </a>
    <a href="./oferty-pracy.html" class="menu-vertical__category">
        <div class="menu-vertical__item">Oferty pracy</div>
    </a>
</div>

