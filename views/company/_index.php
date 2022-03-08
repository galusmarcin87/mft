<?
/* @var $model app\models\mgcms\db\Company */

use yii\web\View;

/* @var $this yii\web\View */
$model->language = Yii::$app->language;

?>

<a href="<?= $model->getLinkUrl() ?>" class="company <?= $model->is_promoted ? 'company--highlighted': ''?>">
    <? if ($model->thumbnail && $model->thumbnail->isImage()): ?><img class="company__logo"
                                                                      src="<?= $model->thumbnail->getImageSrc(250, 178, \Imagine\Image\ManipulatorInterface::THUMBNAIL_INSET) ?>"
                                                                      alt="" /><? endif ?>
    <div class="company__content">
        <div class="company__name"><?= $model->name ?></div>
        <div class="company__description">
            <?= $model->description ?>
        </div>
    </div>
</a>
