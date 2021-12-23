<?
/* @var $model app\models\mgcms\db\Product */

use yii\web\View;
use \app\models\mgcms\db\Category;
use yii\widgets\ListView;

$categories = Category::find()->where(['type' => Category::TYPE_COMPANY_TYPE])->all();
?>
<section class="companies-wrapper">
    <div class="container">
        <h1 class="text-left"><?= Yii::t('db', 'Search results') ?></h1>
        <div class="search-results">
            <div class="menu-vertical">
                <div class="label"><?= Yii::t('db', 'Filter') ?></div>
                <div class="menu-vertical__toggle">
                    <i class="fa fa-times" aria-hidden="true"></i>
                    <i class="fa fa-bars" aria-hidden="true"></i>
                </div>
                <div class="menu-vertical__item">Wszystko</div>
                <div class="menu-vertical__category">
                    <div class="menu-vertical__item menu-vertical__item--active">
                        Firmy
                    </div>
                    <?foreach ($categories as $category): ?>
                    <a
                            href="<?=\yii\helpers\Url::to('company/index',['category_id'=>$category->id]) ?>"
                            class="menu-vertical__item menu-vertical__item--active"
                    >
                        <?=$category->name ?>
                    </a>
                    <?endforeach;?>
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
            <div>
                <div class="companies__labels">
                    <div class="label"><?= Yii::t('db', 'Companies') ?></div>
                    <div class="labell text-right hidden" style="margin-top: -12px">
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
                    <?=
                    ListView::widget([
                        'dataProvider' => $dataProvider,
                        'itemOptions' => [
                            'class' => ''
                        ],
                        'options' => [
                            'class' => 'companies companies--wide',
                        ],
                        'layout' => '{items}',
                        'itemView' => function ($model, $key, $index, $widget) {
                            return $this->render('_index', ['model' => $model, 'key' => $key, 'index' => $index, 'widget' => $widget, 'view' => $this]);
                        },
                    ])

                    ?>

                    <div class="text-center">
                        <div class="pagination">
                        <?=
                        ListView::widget([
                            'dataProvider' => $dataProvider,
                            'layout' => '{pager}',
                            'pager' => [
//                                'firstPageLabel' => '&laquo;',
//                                'lastPageLabel' => '&raquo;',
                                'prevPageLabel' => '<i class="fa fa-arrow-left" aria-hidden="true"></i>',
                                'nextPageLabel' => '<i class="fa fa-arrow-right" aria-hidden="true"></i>',


                                // Customzing CSS class for pager link
                                'linkOptions' => [
                                    'class' => 'page-link',
                                ],
                                'activePageCssClass' => 'pagination__item--active',
                                'pageCssClass' => 'pagination__item',
                                // Customzing CSS class for navigating link
                                'prevPageCssClass' => 'pagination__item',
                                'nextPageCssClass' => 'pagination__item',
                                'firstPageCssClass' => 'pagination__item',
                                'lastPageCssClass' => 'pagination__item',
                            ],
                        ])

                        ?>
                        </div>

                </div>
            </div>
        </div>
    </div>
</section>
