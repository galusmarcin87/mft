<?php

namespace app\controllers;

use app\models\LoginCodeForm;
use app\models\mgcms\db\Company;
use FiberPay\FiberIdClient;
use app\models\mgcms\db\File;
use app\models\ReportRealEstateForm;
use FiberPay\FiberPayClient;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\Json;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\RegisterForm;
use \app\models\mgcms\db\User;
use \app\components\mgcms\MgHelpers;
use \app\models\mgcms\db\Payment;
use app\components\GetResponse\GetResponse;
use app\components\GetResponse\jsonRPCClient;
use yii\web\UploadedFile;
use app\models\mgcms\db\Article;

class AccountController extends \app\components\mgcms\MgCmsController
{

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index'],
                'rules' => [
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }


    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $myCompany = Company::find()->where(['user_id' => $this->getUserModel()->id])->one();


        return $this->render('index', [
            'myCompany' => $myCompany
        ]);
    }

    public function actionEditCompany($lang = false)
    {
        $model = Company::find()->where(['user_id' => $this->getUserModel()->id])->one();
        $model->language = $lang;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            MgHelpers::setFlash('success',Yii::t('db','Saved'));
        }

        return $this->render('editCompany', [
            'model' => $model
        ]);
    }


}
