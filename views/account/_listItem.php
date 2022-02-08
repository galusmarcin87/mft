<?php
/* @var $this yii\web\View */


use yii\helpers\Html;
use app\components\mgcms\MgHelpers;
use \yii\helpers\Url;


?>
<div class="contact-box contact-box--light">
    <div class="person person--big person-list">
        <? if ($imageSrc): ?>
            <div class="text-left">

                <img
                        class="person__avatar person__avatar--small"
                        src="<?= $imageSrc ?>"
                        alt=""
                />

            </div>
        <? endif; ?>
        <div class="text-left"><?= $name ?></div>
        <div>
            <a href="<?= Url::to(['/account/' . $type . '-edit', 'id' => $id]) ?>">
                <i class="fa fa-pencil" aria-hidden="true"></i>
            </a>
        </div>
        <div>
            <a href="<?= Url::to(['/account/' . $type . '-delete', 'id' => $id]) ?>">
                <i class="fa fa-trash" aria-hidden="true"></i>
            </a>
        </div>
        <div>
            <a href="<?= $linkUrl ?>">
                <i class="fa fa-eye" aria-hidden="true"></i>
            </a>
        </div>
    </div>
</div>
