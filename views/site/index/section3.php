<?
/* @var $this yii\web\View */

use app\components\mgcms\MgHelpers;
use yii\web\View;


?>

<section
        class="Section Section--bg text-center"
        style="background-image: url(<?= MgHelpers::getSetting('Home section 3 image', false, '/images/bg.jpg') ?>)"
>
    <div>
        <svg
                class="Section--bg__icon"
                id="Layer_5"
                height="512"
                viewBox="0 0 64 64"
                width="512"
                xmlns="http://www.w3.org/2000/svg"
        >
            <linearGradient id="gradient-horizontal">
                <stop offset="0%" stop-color="var(--color-stop-1)" />
                <stop offset="50%" stop-color="var(--color-stop-2)" />
                <stop offset="100%" stop-color="var(--color-stop-3)" />
            </linearGradient>
            <path
                    d="m47 15c-.551 0-1-.449-1-1h-2c0 1.654 1.346 3 3 3v2h2v-2h3v-3c0-1.654-1.346-3-3-3h-2c-.551 0-1-.449-1-1v-1h3c.551 0 1 .449 1 1h2c0-1.654-1.346-3-3-3v-2h-2v2h-3v3c0 1.654 1.346 3 3 3h2c.551 0 1 .449 1 1v1z"
            />
            <path
                    d="m59 29v-4h-22v4h-4v34h30v-34zm-20-2h18v2h-18zm14 24v10h-10v-10zm8 10h-6v-10h2v-2h-18v2h2v10h-6v-30h26z"
            />
            <path d="m47 33h-10v6h10zm-2 4h-6v-2h6z" />
            <path d="m59 33h-10v6h10zm-2 4h-6v-2h6z" />
            <path d="m47 41h-10v6h10zm-2 4h-6v-2h6z" />
            <path d="m59 41h-10v6h10zm-2 4h-6v-2h6z" />
            <path
                    d="m27 37h-22v4h-4v22h30v-22h-4zm-20 2h18v2h-18zm14 16v6h-10v-6zm8 6h-6v-6h2v-2h-18v2h2v6h-6v-18h26z"
            />
            <path d="m15 45h-10v6h10zm-2 4h-6v-2h6z" />
            <path d="m27 45h-10v6h10zm-2 4h-6v-2h6z" />
            <path
                    d="m24 21.414 6 6 9.047-9.047c1.996 2.799 5.261 4.633 8.953 4.633 6.065 0 11-4.935 11-11s-4.935-11-11-11-11 4.935-11 11c0 1.634.368 3.181 1.01 4.576l-8.01 8.01-6-6-15.707 15.707 1.414 1.414zm24-18.414c4.962 0 9 4.038 9 9s-4.038 9-9 9-9-4.038-9-9 4.038-9 9-9z"
            />
        </svg>
        <b><?= MgHelpers::getSettingTypeText('Home section 3 - 1 text' . Yii::$app->language, false, 'Inwestycje przysz??o??ci poprzez') ?></b>
        <h1><?= MgHelpers::getSettingTypeText('Home section 3 - 2 text' . Yii::$app->language, false, 'tokenizacj?? nieruchomo??ci') ?></h1>
    </div>
</section>
