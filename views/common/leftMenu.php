<?
/* @var $model app\models\mgcms\db\Product */

/* @var $this View */

use yii\web\View;
use \app\models\mgcms\db\Category;
use yii\widgets\ListView;
use yii\helpers\Url;

$categories = Category::find()->where(['type' => Category::TYPE_COMPANY_TYPE])->all();
$request = $this->context->request;

?>

<div class="menu-vertical">
    <div class="label"><?= Yii::t('db', 'Filter') ?></div>
    <div class="menu-vertical__toggle">
        <i class="fa fa-times" aria-hidden="true"></i>
        <i class="fa fa-bars" aria-hidden="true"></i>
    </div>
    <div class="menu-vertical__category">
        <div class="menu-vertical__item <?= $request->getPathInfo() == 'company/index' && !$request->getQueryParam('is_for_sale') ? 'menu-vertical__item--active' : '' ?>">
            Firmy
        </div>
        <? foreach ($categories as $category): ?>
            <a
                    href="<?= \yii\helpers\Url::to(['company/index', 'category_id' => $category->id]) ?>"
                    class="menu-vertical__item <? if ($request->getQueryParam('category_id') == $category->id): ?>menu-vertical__item--active<? endif; ?>"
            >
                <?= $category->name ?>
            </a>
        <? endforeach; ?>
    </div>
    <a href="<?= Url::to(['product/index']) ?>" class="menu-vertical__category">
        <div class="menu-vertical__item <?= $request->getPathInfo() == 'product/index' ? 'menu-vertical__item--active' : '' ?>"><?= Yii::t('db', 'Products') ?></div>
    </a>
    <a href="<?= Url::to(['company/index', 'is_for_sale' => 1]) ?>" class="menu-vertical__category">
        <div class="menu-vertical__item <?= $request->getPathInfo() == 'company/index' && $request->getQueryParam('is_for_sale')? 'menu-vertical__item--active' : '' ?>"><?= Yii::t('db', 'Companies for sale') ?></div>
    </a>
    <a href="<?= Url::to(['service/index']) ?>" class="menu-vertical__category">
        <div class="menu-vertical__item <?= $request->getPathInfo() == 'service/index' ? 'menu-vertical__item--active' : '' ?>"><?= Yii::t('db', 'Services') ?></div>
    </a>
    <a href="<?= Url::to(['job/index']) ?>" class="menu-vertical__category">
        <div class="menu-vertical__item <?= $request->getPathInfo() == 'job/index' ? 'menu-vertical__item--active' : '' ?>"><?= Yii::t('db', 'Jobs offers') ?></div>
    </a>
</div>
