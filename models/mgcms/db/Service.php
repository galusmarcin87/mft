<?php

namespace app\models\mgcms\db;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use mootensai\behaviors\UUIDBehavior;
use yii\helpers\Html;

/**
 * This is the base model class for table "service".
 *
 * @property integer $id
 * @property string $name
 * @property double $price
 * @property string $description
 * @property string $specification
 * @property integer $company_id
 *
 * @property \app\models\mgcms\db\Company $company
 */
class Service extends \app\models\mgcms\db\AbstractRecord
{

    public $downloadFiles;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'company_id'], 'required'],
            [['price'], 'number'],
            [['description', 'specification'], 'string'],
            [['company_id'], 'integer'],
            [['name'], 'string', 'max' => 245],
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'service';
    }


    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'price' => Yii::t('app', 'Price'),
            'description' => Yii::t('app', 'Description'),
            'specification' => Yii::t('app', 'Specification'),
            'company_id' => Yii::t('app', 'Company ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompany()
    {
        return $this->hasOne(\app\models\mgcms\db\Company::className(), ['id' => 'company_id']);
    }


    /**
     * @inheritdoc
     * @return \app\models\mgcms\db\ServiceQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\mgcms\db\ServiceQuery(get_called_class());
    }

    public function getLinkUrl()
    {
        return \yii\helpers\Url::to(['/service/view', 'id' => $this->id, 'name' => $this->name]);
    }

    public function getLink()
    {
        return Html::a(Yii::t('db', 'See'), \yii\helpers\Url::to(['/service/view', 'id' => $this->id, 'name' => $this->name]));
    }
}
