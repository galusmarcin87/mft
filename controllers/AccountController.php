<?php

namespace app\controllers;

use app\models\LoginCodeForm;
use app\models\mgcms\db\Company;
use app\models\mgcms\db\FileRelation;
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
        if (!$model) {
            $model = new Company();
            $model->user_id = $this->getUserModel()->id;
        }
        $model->language = $lang;

        if ($model->load(Yii::$app->request->post())) {
            $thumbnail = UploadedFile::getInstance($model, 'thumbnailFile');
            if ($thumbnail) {
                $fileModel = new File;
                $file = $fileModel->push(new \rmrevin\yii\module\File\resources\UploadedResource($thumbnail));
                $model->thumbnail_id = $file->id;
            }

            $background = UploadedFile::getInstance($model, 'backgroundFile');
            if ($background) {
                $fileModel2 = new File;
                $file2 = $fileModel2->push(new \rmrevin\yii\module\File\resources\UploadedResource($background));
                $model->background_id = $file2->id;
            }

            $videoThumbnail = UploadedFile::getInstance($model, 'video_thumbnail');
            if ($videoThumbnail) {
                $fileModel = new File;
                $file = $fileModel->push(new \rmrevin\yii\module\File\resources\UploadedResource($videoThumbnail));
                $model->video_thumbnail = $file->getImageSrc(240, 0);
            }

            $this->_assignDownloadFiles($model);
            if ($model->save()) {
                MgHelpers::setFlash('success', Yii::t('db', 'Saved'));
            } else {
                MgHelpers::setFlash('error', Yii::t('db', 'Saving failed'));
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
            MgHelpers::setFlash('success', Yii::t('db', 'Deleted'));
        }
        $this->back();
    }

    public function actionProducts()
    {
        $model = Company::find()->where(['user_id' => $this->getUserModel()->id])->one();
        if (!$model) {
            $models = [];
        } else {
            $models = Product::find()->where(['company_id' => $model->id])->all();
        }

        return $this->render('products', [
            'models' => $models
        ]);


    }

    public function actionProductEdit($id, $lang = false)
    {
        $model = Product::find()->joinWith('company')->where(['company.user_id' => $this->getUserModel()->id, 'product.id' => $id])->one();
        if (!$model) {
            $this->throw404();
        }
        $model->language = $lang;

        if ($model->load(Yii::$app->request->post())) {

            $fileUpload = UploadedFile::getInstance($model, 'fileUpload');
            if ($fileUpload) {
                $fileModel = new File;
                $file = $fileModel->push(new \rmrevin\yii\module\File\resources\UploadedResource($fileUpload));
                $model->file_id = $file->id;
            }

            if ($model->save()) {
                $this->_assignDownloadFiles($model);
                MgHelpers::setFlash('success', Yii::t('db', 'Saved'));
            } else {
                MgHelpers::setFlash('error', Yii::t('db', 'Saving failed'));
            }

        }

        return $this->render('editProduct', [
            'model' => $model
        ]);
    }

    public function actionAddProduct($lang = false)
    {

        $modelCompany = Company::find()->where(['user_id' => $this->getUserModel()->id])->one();
        if (!$modelCompany) {
            MgHelpers::setFlash('error', Yii::t('db', "Add company first"));
            $this->back();
        }
        $model = new Product();
        $model->language = $lang;
        $model->company_id = $modelCompany->id;

        if ($model->load(Yii::$app->request->post())) {

            $fileUpload = UploadedFile::getInstance($model, 'fileUpload');
            if ($fileUpload) {
                $fileModel = new File;
                $file = $fileModel->push(new \rmrevin\yii\module\File\resources\UploadedResource($fileUpload));
                $model->file_id = $file->id;
            }

            if ($model->save()) {
                $this->_assignDownloadFiles($model);
                MgHelpers::setFlash('success', Yii::t('db', 'Saved'));
            } else {
                MgHelpers::setFlash('error', Yii::t('db', 'Saving failed'));
            }

        }

        return $this->render('editProduct', [
            'model' => $model
        ]);
    }

    public function _assignDownloadFiles($model)
    {
        $upladedFiles = UploadedFile::getInstances($model, 'downloadFiles');

        if ($upladedFiles) {
            foreach ($upladedFiles as $CUploadedFileModel) {
                if ($CUploadedFileModel->hasError) {
                    MgHelpers::setFlash(MgHelpers::FLASH_TYPE_ERROR, Yii::t('app', 'Error with uploading file - probably file is too big'));
                    continue;
                }
                $fileModel = new File;
                $file = $fileModel->push(new \rmrevin\yii\module\File\resources\UploadedResource($CUploadedFileModel));
                if ($file) {
                    if (FileRelation::find()->where(['file_id' => $file->id, 'rel_id' => $this->id, 'model' => $this::className()])->count()) {
                        continue;
                    }
                    $fileRel = new FileRelation;
                    $fileRel->file_id = $file->id;
                    $fileRel->rel_id = $model->id;
                    $fileRel->model = $model::className();
                    $fileRel->json = 1;
                    MgHelpers::saveModelAndLog($fileRel);
                } else {
                    MgHelpers::setFlashError('Błąd dodawania pliku powiązanego');
                }
            }
            return true;
        }
        return false;
    }


}
