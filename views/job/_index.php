<?
/* @var $model app\models\mgcms\db\Product */

use yii\web\View;

?>
<a
        href="<?= $model->getLinkUrl() ?>"
        class="company company--service"
        target="_blank"
>
    <? if ($model->company->thumbnail && $model->company->thumbnail->isImage()): ?>
        <img
                class="company__logo company__logo--full"
                src="<?= $model->company->thumbnail->getImageSrc(250, 178, \Imagine\Image\ManipulatorInterface::THUMBNAIL_INSET) ?>"
                alt=""
        />
    <? endif; ?>
    <div>
        <div class="company__content">
            <div class="company__name">
                <?= $model->name ?>
            </div>
            <?= $model->info ?>
        </div>
    </div>
    <div class="company__offer">
        <span> <?= Yii::t('db', 'Salary') ?>: </span>
        <div><?= $model->salary ?></div>
    </div>
</a>
