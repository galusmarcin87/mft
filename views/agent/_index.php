<?
/* @var $model app\models\mgcms\db\Agent */

use yii\web\View;
$model->language = Yii::$app->language;
?>
<a
        href="<?= $model->getLinkUrl() ?>"
        class="agent col-md-4
        target="_blank"
>
    <? if ($model->file && $model->file->isImage()): ?>
        <img
                class="agentImage"
                src="<?= $model->file->getImageSrc(290, 194, \Imagine\Image\ManipulatorInterface::THUMBNAIL_INSET) ?>"
                alt=""
        />
    <? endif; ?>

    <div class="agentName">
        <?= $model->full_name ?>
    </div>

</a>
