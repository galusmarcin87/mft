<?php

/* @var $this yii\web\View */
/* @var $searchModel app\models\mgcms\db\CompanySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

use yii\helpers\Html;
use kartik\export\ExportMenu;
use kartik\grid\GridView;use app\components\mgcms\MgHelpers;


$this->title = Yii::t('app', 'Company');
$this->params['breadcrumbs'][] = $this->title;
$search = "$('.search-button').click(function(){
	$('.search-form').toggle(1000);
	return false;
});";
$this->registerJs($search);
?>
<div class="company-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <p>
      <? $controller = Yii::$app->controller->id;
            if(\app\components\mgcms\MgHelpers::getUserModel()->checkAccess($controller, 'create')):?>
        <?= Html::a(Yii::t('app', 'Create Company'), ['create'], ['class' => 'btn btn-success']) ?>
        <? endif?>
        <?= Html::a(Yii::t('app', 'Advance Search'), '#', ['class' => 'btn btn-info search-button']) ?>
    </p>
    <div class="search-form" style="display:none">
        <?=  $this->render('_search', ['model' => $searchModel]); ?>
    </div>
    <?php
    $gridColumn = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'visible' => false],
        [
            'class' => app\components\mgcms\yii\ActionColumn::className(),
        ],
        'name',
        'description:ntext',
        'is_promoted:boolean',
        'first_name',
        'surname',
        'status',
        'country',
        'city',
        'postcode',
        'street',
        'phone',
        'email:email',
        'www',
        'nip',
        'regon',
        'krs',
        'banc_account_no',
        'gps_lat',
        'gps_long',
        'subscription_fee',
        'companycol',
        'created_on',
        [
                'attribute' => 'category_id',
                'label' => Yii::t('app', 'Category'),
                'value' => function($model){
                    return $model->category ? $model->category->name : '';
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => \yii\helpers\ArrayHelper::map(\app\models\mgcms\db\Category::find()->asArray()->all(), 'id', 'name'),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => 'Category', 'id' => 'grid-company-search-category_id']
            ],
        [
                'attribute' => 'user_id',
                'label' => Yii::t('app', 'User'),
                'value' => function($model){
                    return $model->user ? $model->user->username : '';
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => \yii\helpers\ArrayHelper::map(\app\models\mgcms\db\User::find()->asArray()->all(), 'id', 'username'),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => 'User', 'id' => 'grid-company-search-user_id']
            ],
        'payment_status',
        'paid_from',
        'paid_to',
        'is_for_sale',
        'sale_title',
        'sale_description:ntext',
        'sale_price',
        'sale_currency',
        'sale_price_includes:ntext',
        'sale_reason:ntext',
        'sale_business_range',
        'sale_workers_number',
        'sale_sale_range',
        'sale_last_year_income',
        'sale_company_profile',
        'is_institution',
        'institution_agent_prefix',
        'institution_invoice_amount',

    ];
    ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $gridColumn,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-company']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span>  ' . Html::encode($this->title),
        ],
        // your toolbar can include the additional full export menu
        'toolbar' => [
            '{export}',
            ExportMenu::widget([
                'dataProvider' => $dataProvider,
                'columns' => $gridColumn,
                'target' => ExportMenu::TARGET_BLANK,
                'fontAwesome' => true,
                'dropdownOptions' => [
                    'label' => 'Full',
                    'class' => 'btn btn-default',
                    'itemsBefore' => [
                        '<li class="dropdown-header">Export All Data</li>',
                    ],
                ],
            ]) ,
        ],
    ]); ?>

</div>
