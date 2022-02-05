<?php

namespace app\controllers;

use app\models\LoginCodeForm;
use app\models\mgcms\db\Company;
use app\models\mgcms\db\Product;
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
        if(!$model){
            $model = new Company();
            $model->user_id = $this->getUserModel()->id;
        }
        $model->language = $lang;

        if ($model->load(Yii::$app->request->post())) {
            $thumbnail = UploadedFile::getInstance($model, 'thumbnailFile');
            if($thumbnail){
                $fileModel = new File;
                $file = $fileModel->push(new \rmrevin\yii\module\File\resources\UploadedResource($thumbnail));
                $model->thumbnail_id = $file->id;
            }

            $background = UploadedFile::getInstance($model, 'backgroundFile');
            if($background){
                $fileModel2 = new File;
                $file2 = $fileModel2->push(new \rmrevin\yii\module\File\resources\UploadedResource($background));
                $model->background_id = $file2->id;
            }

            $videoThumbnail = UploadedFile::getInstance($model, 'video_thumbnail');
            if($videoThumbnail){
                $fileModel = new File;
                $file = $fileModel->push(new \rmrevin\yii\module\File\resources\UploadedResource($videoThumbnail));
                $model->video_thumbnail = $file->getImageSrc(240,0);
            }



            if($model->save()){
                MgHelpers::setFlash('success',Yii::t('db','Saved'));
            }else{
                MgHelpers::setFlash('error',Yii::t('db','Saving failed'));
            }

        }

        return $this->render('editCompany', [
            'model' => $model
        ]);
    }

    public function actionDeleteRelation($relId, $fileId, $model)
    {
        $file = File::find()->andWhere(['id' => $fileId, 'created_by' => $this->getUserModel()->id])->one();
        $fileRel = \app\models\mgcms\db\FileRelation::find()->where(['rel_id' => $relId, 'file_id' => $fileId, 'model' => $model])->one();
        if ($fileRel) {
            $fileRel->delete();
            MgHelpers::setFlash('success',Yii::t('db','Deleted'));
        }
        $this->back();
    }

    public function actionProducts(){
        $model = Company::find()->where(['user_id' => $this->getUserModel()->id])->one();
        if(!$model) {
            $models = [];
        }else{
            $models = Product::find()->where(['company_id' => $model->id])->all();
        }

        return $this->render('products', [
            '$model' => $models
        ]);


    }


}
