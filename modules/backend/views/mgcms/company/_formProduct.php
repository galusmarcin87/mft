<div class="form-group" id="add-product">
<?php
use kartik\grid\GridView;
use kartik\builder\TabularForm;
use yii\data\ArrayDataProvider;
use yii\helpers\Html;
use yii\widgets\Pjax;

$dataProvider = new ArrayDataProvider([
    'allModels' => $row,
    'pagination' => [
        'pageSize' => -1
    ]
]);
echo TabularForm::widget([
    'dataProvider' => $dataProvider,
    'formName' => 'Product',
    'checkboxColumn' => false,
    'actionColumn' => false,
    'attributeDefaults' => [
        'type' => TabularForm::INPUT_TEXT,
    ],
    'attributes' => [
        "id" => ['type' => TabularForm::INPUT_HIDDEN_STATIC, 'columnOptions' => ['hidden' => true]],
        'name' => ['type' => TabularForm::INPUT_TEXT],
        'category_id' => [
            'label' => 'Category',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\app\models\mgcms\db\Category::find()->andWhere(['type'=>\app\models\mgcms\db\Category::TYPE_PRODUCT_TYPE])->orderBy('name')->asArray()->all(), 'id', 'name'),
                'options' => ['placeholder' => Yii::t('app', 'Choose Category')],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'file_id' => [
            'label' => 'File',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\app\models\mgcms\db\File::find()->orderBy('origin_name')->asArray()->all(), 'id', 'origin_name'),
                'options' => ['placeholder' => Yii::t('app', 'Choose File')],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        //'description' => ['type' => TabularForm::INPUT_TEXTAREA],
        //'specification' => ['type' => TabularForm::INPUT_TEXTAREA],
        'price' => ['type' => TabularForm::INPUT_TEXT],
        'number' => ['type' => TabularForm::INPUT_TEXT],
        'is_special_offer' => ['type' => TabularForm::INPUT_CHECKBOX,
            'options' => [
                'style' => 'position : relative; margin-top : -9px'
            ]
        ],
        'special_offer_from' => ['type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\datecontrol\DateControl::classname(),
            'options' => [
                'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
                'saveFormat' => 'php:Y-m-d',
                'ajaxConversion' => true,
                'options' => [
                    'pluginOptions' => [
                        'placeholder' => Yii::t('app', 'Choose Special Offer From'),
                        'autoclose' => true
                    ]
                ],
            ]
        ],
        'special_offer_to' => ['type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\datecontrol\DateControl::classname(),
            'options' => [
                'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
                'saveFormat' => 'php:Y-m-d',
                'ajaxConversion' => true,
                'options' => [
                    'pluginOptions' => [
                        'placeholder' => Yii::t('app', 'Choose Special Offer To'),
                        'autoclose' => true
                    ]
                ],
            ]
        ],
        'min_amount_of_purchase' => ['type' => TabularForm::INPUT_TEXT],
        'special_offer_price' => ['type' => TabularForm::INPUT_TEXT],
        'del' => [
            'type' => 'raw',
            'label' => '',
            'value' => function($model, $key) {
                return Html::a('<i class="glyphicon glyphicon-trash"></i>', '#', ['title' =>  Yii::t('app', 'Delete'), 'onClick' => 'delRowProduct(' . $key . '); return false;', 'id' => 'product-del-btn']);
            },
        ],
        'edit' => [
            'type' => 'raw',
            'label' => '',
            'value' => function($model, $key) {
                return isset($model) && isset($model['id']) ? Html::a('<i class="glyphicon glyphicon-edit"></i>',
                    ['mgcms/product/update', 'id' => $model['id']]) : false;
            },
        ],
    ],
    'gridSettings' => [
        'panel' => [
            'heading' => false,
            'type' => GridView::TYPE_DEFAULT,
            'before' => false,
            'footer' => false,
            'after' => Html::button('<i class="glyphicon glyphicon-plus"></i>' . Yii::t('app', 'Add Product'), ['type' => 'button', 'class' => 'btn btn-success kv-batch-create', 'onClick' => 'addRowProduct()']),
        ]
    ]
]);
echo  "    </div>\n\n";
?>

