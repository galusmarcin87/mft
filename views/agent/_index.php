<?
/* @var $model app\models\mgcms\db\Agent */

use yii\web\View;

?>
<a
        href="<?= $model->getLinkUrl() ?>"
        class="agent col-md-4
        target="_blank"
>
    <? if ($model->company->thumbnail && $model->company->thumbnail->isImage()): ?>
        <img
                class="cagentImage"
                src="<?= $model->company->thumbnail->getImageSrc(290, 194, \Imagine\Image\ManipulatorInterface::THUMBNAIL_INSET) ?>"
                alt=""
        />
    <? endif; ?>

    <div class="agentName">
        <?= $model->full_name ?>
    </div>

</a>
