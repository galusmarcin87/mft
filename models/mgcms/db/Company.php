<?php

namespace app\models\mgcms\db;

use Yii;
use app\components\mgcms\MgHelpers;

/**
 * This is the base model class for table "company".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $is_promoted
 * @property string $first_name
 * @property string $surname
 * @property string $status
 * @property string $country
 * @property string $city
 * @property string $postcode
 * @property string $street
 * @property string $phone
 * @property string $email
 * @property string $www
 * @property string $nip
 * @property string $regon
 * @property string $krs
 * @property string $banc_account_no
 * @property string $gps_lat
 * @property string $gps_long
 * @property double $subscription_fee
 * @property string $companycol
 * @property integer $created_by
 * @property string $created_on
 * @property integer $category_id
 * @property integer $user_id
 * @property string $payment_status
 * @property string $paid_from
 * @property string $paid_to
 * @property integer $thumbnail_id
 * @property integer $background_id
 * @property integer $is_for_sale
 * @property string $sale_title
 * @property string $sale_description
 * @property double $sale_price
 * @property string $sale_currency
 * @property string $sale_price_includes
 * @property string $sale_reason
 * @property string $sale_business_range
 * @property integer $sale_workers_number
 * @property string $sale_sale_range
 * @property double $sale_last_year_income
 * @property string $sale_company_profile
 * @property integer $is_institution
 * @property string $institution_agent_prefix
 * @property double $institution_invoice_amount
 * @property string $companycol1
 *
 * @property \app\models\mgcms\db\Agent[] $agents
 * @property \app\models\mgcms\db\Benefit[] $benefits
 * @property \app\models\mgcms\db\Category $category
 * @property \app\models\mgcms\db\File $thumbnail
 * @property \app\models\mgcms\db\File $background
 * @property \app\models\mgcms\db\User $createdBy
 * @property \app\models\mgcms\db\User $user
 * @property \app\models\mgcms\db\Job[] $jobs
 * @property \app\models\mgcms\db\Product[] $products
 */
class Company extends \app\models\mgcms\db\AbstractRecord
{

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'description', 'first_name', 'surname', 'country', 'city', 'postcode', 'street', 'phone', 'email', 'nip', 'regon', 'category_id', 'user_id', 'background_id'], 'required'],
            [['description', 'sale_description', 'sale_price_includes', 'sale_reason'], 'string'],
            [['gps_lat', 'gps_long', 'subscription_fee', 'sale_price', 'sale_last_year_income', 'institution_invoice_amount'], 'number'],
            [['created_by', 'category_id', 'user_id', 'thumbnail_id', 'background_id', 'sale_workers_number'], 'integer'],
            [['created_on', 'paid_from', 'paid_to'], 'safe'],
            [['name', 'first_name', 'surname', 'email', 'www', 'sale_title', 'sale_business_range', 'sale_sale_range'], 'string', 'max' => 245],
            [['is_promoted', 'is_for_sale', 'is_institution'], 'string', 'max' => 1],
            [['status', 'country', 'city', 'postcode', 'street', 'banc_account_no', 'companycol', 'payment_status', 'sale_company_profile', 'institution_agent_prefix', 'companycol1'], 'string', 'max' => 45],
            [['phone', 'nip', 'regon', 'krs', 'sale_currency'], 'string', 'max' => 15]
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'company';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'description' => Yii::t('app', 'Description'),
            'is_promoted' => Yii::t('app', 'Is Promoted'),
            'first_name' => Yii::t('app', 'First Name'),
            'surname' => Yii::t('app', 'Surname'),
            'status' => Yii::t('app', 'Status'),
            'country' => Yii::t('app', 'Country'),
            'city' => Yii::t('app', 'City'),
            'postcode' => Yii::t('app', 'Postcode'),
            'street' => Yii::t('app', 'Street'),
            'phone' => Yii::t('app', 'Phone'),
            'email' => Yii::t('app', 'Email'),
            'www' => Yii::t('app', 'Www'),
            'nip' => Yii::t('app', 'Nip'),
            'regon' => Yii::t('app', 'Regon'),
            'krs' => Yii::t('app', 'Krs'),
            'banc_account_no' => Yii::t('app', 'Banc Account No'),
            'gps_lat' => Yii::t('app', 'Gps Lat'),
            'gps_long' => Yii::t('app', 'Gps Long'),
            'subscription_fee' => Yii::t('app', 'Subscription Fee'),
            'companycol' => Yii::t('app', 'Companycol'),
            'created_on' => Yii::t('app', 'Created On'),
            'category_id' => Yii::t('app', 'Category ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'payment_status' => Yii::t('app', 'Payment Status'),
            'paid_from' => Yii::t('app', 'Paid From'),
            'paid_to' => Yii::t('app', 'Paid To'),
            'thumbnail_id' => Yii::t('app', 'Thumbnail ID'),
            'background_id' => Yii::t('app', 'Background ID'),
            'is_for_sale' => Yii::t('app', 'Is For Sale'),
            'sale_title' => Yii::t('app', 'Sale Title'),
            'sale_description' => Yii::t('app', 'Sale Description'),
            'sale_price' => Yii::t('app', 'Sale Price'),
            'sale_currency' => Yii::t('app', 'Sale Currency'),
            'sale_price_includes' => Yii::t('app', 'Sale Price Includes'),
            'sale_reason' => Yii::t('app', 'Sale Reason'),
            'sale_business_range' => Yii::t('app', 'Sale Business Range'),
            'sale_workers_number' => Yii::t('app', 'Sale Workers Number'),
            'sale_sale_range' => Yii::t('app', 'Sale Sale Range'),
            'sale_last_year_income' => Yii::t('app', 'Sale Last Year Income'),
            'sale_company_profile' => Yii::t('app', 'Sale Company Profile'),
            'is_institution' => Yii::t('app', 'Is Institution'),
            'institution_agent_prefix' => Yii::t('app', 'Institution Agent Prefix'),
            'institution_invoice_amount' => Yii::t('app', 'Institution Invoice Amount'),
            'companycol1' => Yii::t('app', 'Companycol1'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAgents()
    {
        return $this->hasMany(\app\models\mgcms\db\Agent::className(), ['company_id' => 'id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBenefits()
    {
        return $this->hasMany(\app\models\mgcms\db\Benefit::className(), ['company_id' => 'id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(\app\models\mgcms\db\Category::className(), ['id' => 'category_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getThumbnail()
    {
        return $this->hasOne(\app\models\mgcms\db\File::className(), ['id' => 'thumbnail_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBackground()
    {
        return $this->hasOne(\app\models\mgcms\db\File::className(), ['id' => 'background_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(\app\models\mgcms\db\User::className(), ['id' => 'created_by']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(\app\models\mgcms\db\User::className(), ['id' => 'user_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJobs()
    {
        return $this->hasMany(\app\models\mgcms\db\Job::className(), ['company_id' => 'id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(\app\models\mgcms\db\Product::className(), ['company_id' => 'id']);
    }
    
    /**
     * @inheritdoc
     * @return \app\models\mgcms\db\CompanyQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\mgcms\db\CompanyQuery(get_called_class());
    }
}
