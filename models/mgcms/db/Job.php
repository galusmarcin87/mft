<?php

namespace app\models\mgcms\db;

use Yii;
use app\components\mgcms\MgHelpers;

/**
 * This is the base model class for table "job".
 *
 * @property integer $id
 * @property string $name
 * @property integer $company_id
 * @property double $salary
 * @property string $position
 * @property string $address
 * @property string $industry
 * @property string $info
 * @property string $requirements
 * @property string $country
 * @property string $city
 *
 * @property \app\models\mgcms\db\Company $company
 */
class Job extends \app\models\mgcms\db\AbstractRecord
{

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'company_id', 'salary', 'position', 'address', 'industry', 'info', 'requirements', 'country', 'city'], 'required'],
            [['company_id'], 'integer'],
            [['salary'], 'number'],
            [['info', 'requirements'], 'string'],
            [['name', 'position', 'address', 'industry', 'country', 'city'], 'string', 'max' => 245]
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'job';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'company_id' => Yii::t('app', 'Company ID'),
            'salary' => Yii::t('app', 'Salary'),
            'position' => Yii::t('app', 'Position'),
            'address' => Yii::t('app', 'Address'),
            'industry' => Yii::t('app', 'Industry'),
            'info' => Yii::t('app', 'Info'),
            'requirements' => Yii::t('app', 'Requirements'),
            'country' => Yii::t('app', 'Country'),
            'city' => Yii::t('app', 'City'),
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
     * @return \app\models\mgcms\db\JobQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\mgcms\db\JobQuery(get_called_class());
    }
}
