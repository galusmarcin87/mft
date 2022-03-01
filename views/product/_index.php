<?
/* @var $model app\models\mgcms\db\Product */

use yii\web\View;
$model->language = Yii::$app->language;
?>
<a
        href="<?=$model->getLinkUrl()?>"
        class="company company--service"
        target="_blank"
>
    <?if($model->file && $model->file->isImage()):?>
    <img
            class="company__logo company__logo--full"
            src="<?= $model->file->getImageSrc(250,178, \Imagine\Image\ManipulatorInterface::THUMBNAIL_INSET)?>"
            alt=""
    />
    <?endif;?>
    <div>
        <div class="company__content">
            <div class="company__name">
                <?=$model->name?>
            </div>
            <?=$model->description?>
        </div>
    </div>
    <div class="company__offer">
        <span> <?= Yii::t('db', 'Price') ?>: </span>
        <div><?=$model->price?></div>
    </div>
</a>
