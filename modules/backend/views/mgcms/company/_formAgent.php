<div class="form-group" id="add-agent">
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
    'formName' => 'Agent',
    'checkboxColumn' => false,
    'actionColumn' => false,
    'attributeDefaults' => [
        'type' => TabularForm::INPUT_TEXT,
    ],
    'attributes' => [
        "id" => ['type' => TabularForm::INPUT_HIDDEN_STATIC, 'columnOptions' => ['hidden' => true]],
        'full_name' => ['type' => TabularForm::INPUT_TEXT],
        'position' => ['type' => TabularForm::INPUT_TEXT],
        'description' => ['type' => TabularForm::INPUT_TEXTAREA],
        'phone' => ['type' => TabularForm::INPUT_TEXT],
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
        'email' => ['type' => TabularForm::INPUT_TEXT],
        'agentcol' => ['type' => TabularForm::INPUT_TEXT],
        'del' => [
            'type' => 'raw',
            'label' => '',
            'value' => function($model, $key) {
                return Html::a('<i class="glyphicon glyphicon-trash"></i>', '#', ['title' =>  Yii::t('app', 'Delete'), 'onClick' => 'delRowAgent(' . $key . '); return false;', 'id' => 'agent-del-btn']);
            },
        ],
        'edit' => [
            'type' => 'raw',
            'label' => '',
            'value' => function($model, $key) {
                return isset($model) && isset($model['id']) ? Html::a('<i class="glyphicon glyphicon-edit"></i>',
                    ['mgcms/agent/update', 'id' => $model['id']]) : false;
            },
        ],
    ],
    'gridSettings' => [
        'panel' => [
            'heading' => false,
            'type' => GridView::TYPE_DEFAULT,
            'before' => false,
            'footer' => false,
            'after' => Html::button('<i class="glyphicon glyphicon-plus"></i>' . Yii::t('app', 'Add Agent'), ['type' => 'button', 'class' => 'btn btn-success kv-batch-create', 'onClick' => 'addRowAgent()']),
        ]
    ]
]);
echo  "    </div>\n\n";
?>

