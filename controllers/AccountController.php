<?php

namespace app\controllers;

use app\models\LoginCodeForm;
use app\models\mgcms\db\Agent;
use app\models\mgcms\db\Company;
use app\models\mgcms\db\FileRelation;
use app\models\mgcms\db\Job;
use app\models\mgcms\db\Product;
use app\models\mgcms\db\Service;
use app\models\PaySubscriptionForm;
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
        $myCompany = $this->_getMyCompany();


        return $this->render('index', [
            'myCompany' => $myCompany
        ]);
    }

    private function _getMyCompany()
    {
        $user = $this->getUserModel();
        $myCompany = Company::find()->where(['user_id' => $user->id])->one();
        if (!$myCompany) {
            $myCompany = Company::find()->where(['id' => $user->company_id])->one();
        }

        return $myCompany;
    }

    public function actionEditCompany($lang = false)
    {
        $model = $this->_getMyCompany();
        if (!$model) {
            $model = new Company();
            $model->user_id = $this->getUserModel()->id;
            $model->subscription_fee = MgHelpers::getSetting('kwota abonamentu', false, 10000);
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
        $model = $this->_getMyCompany();
        if (!$model) {
            $models = [];
        } else {
            $models = Product::find()->where(['company_id' => $model->id])->all();
        }

        return $this->render('products', [
            'models' => $models
        ]);

    }

    public function actionAgents()
    {
        $model = $this->_getMyCompany();
        if (!$model) {
            $models = [];
        } else {
            $models = Agent::find()->where(['company_id' => $model->id])->all();
        }

        return $this->render('agents', [
            'models' => $models
        ]);

    }

    public function actionServices()
    {
        $model = $this->_getMyCompany();
        if (!$model) {
            $models = [];
        } else {
            $models = Service::find()->where(['company_id' => $model->id])->all();
        }

        return $this->render('services', [
            'models' => $models
        ]);


    }

    public function actionJobs()
    {
        $model = $this->_getMyCompany();
        if (!$model) {
            $models = [];
        } else {
            $models = Job::find()->where(['company_id' => $model->id])->all();
        }

        return $this->render('jobs', [
            'models' => $models
        ]);


    }

    public function actionProductEdit($id, $lang = false)
    {
        $myCompany = $this->_getMyCompany();
        $model = Product::find()->where(['company_id' => $myCompany->id, 'id' => $id])->one();
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

    public function actionAgentEdit($id, $lang = false)
    {
        $myCompany = $this->_getMyCompany();
        $model = Agent::find()->where(['company_id' => $myCompany->id, 'id' => $id])->one();
        if (!$model) {
            $this->throw404();
        }
        $model = $model->user;
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

        return $this->render('editAgent', [
            'model' => $model
        ]);
    }

    public function actionJobEdit($id, $lang = false)
    {
        $myCompany = $this->_getMyCompany();
        $model = Job::find()->where(['company_id' => $myCompany->id, 'id' => $id])->one();
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

        return $this->render('editJob', [
            'model' => $model
        ]);
    }

    public function actionServiceEdit($id, $lang = false)
    {
        $myCompany = $this->_getMyCompany();
        $model = Service::find()->where(['company_id' => $myCompany->id, 'id' => $id])->one();
        if (!$model) {
            $this->throw404();
        }
        $model->language = $lang;

        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                $this->_assignDownloadFiles($model);
                MgHelpers::setFlash('success', Yii::t('db', 'Saved'));
            } else {
                MgHelpers::setFlash('error', Yii::t('db', 'Saving failed'));
            }

        }

        return $this->render('editService', [
            'model' => $model
        ]);
    }

    public function actionAddService($lang = false)
    {
        $modelCompany = $this->_getMyCompany();
        if (!$modelCompany) {
            MgHelpers::setFlash('error', Yii::t('db', "Add company first"));
            return $this->back();
        }
        $model = new Service();
        $model->language = $lang;
        $model->company_id = $modelCompany->id;

        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                $this->_assignDownloadFiles($model);
                MgHelpers::setFlash('success', Yii::t('db', 'Saved'));
            } else {
                MgHelpers::setFlash('error', Yii::t('db', 'Saving failed'));
            }

        }

        return $this->render('editService', [
            'model' => $model
        ]);
    }

    public function actionAddJob($lang = false)
    {
        $modelCompany = $this->_getMyCompany();
        if (!$modelCompany) {
            MgHelpers::setFlash('error', Yii::t('db', "Add company first"));
            return $this->back();
        }
        $model = new Job();
        $model->language = $lang;
        $model->company_id = $modelCompany->id;

        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                $this->_assignDownloadFiles($model);
                MgHelpers::setFlash('success', Yii::t('db', 'Saved'));
            } else {
                MgHelpers::setFlash('error', Yii::t('db', 'Saving failed'));
            }

        }

        return $this->render('editJob', [
            'model' => $model
        ]);
    }

    public function actionProductDelete($id)
    {
        $myCompany = $this->_getMyCompany();
        $model = Product::find()->where(['company_id' => $myCompany->id, 'id' => $id])->one();
        if (!$model) {
            $this->throw404();
        }
        $model->delete();
        return $this->back();
    }

    public function actionAgentDelete($id)
    {
        $myCompany = $this->_getMyCompany();
        $model = Agent::find()->where(['company_id' => $myCompany->id, 'id' => $id])->one();
        if (!$model) {
            $this->throw404();
        }
        $model->delete();
        return $this->back();
    }

    public function actionJobDelete($id)
    {
        $myCompany = $this->_getMyCompany();
        $model = Job::find()->where(['company_id' => $myCompany->id, 'id' => $id])->one();
        if (!$model) {
            $this->throw404();
        }
        $model->delete();
        return $this->back();
    }

    public function actionServiceDelete($id)
    {
        $myCompany = $this->_getMyCompany();
        $model = Service::find()->where(['company_id' => $myCompany->id, 'id' => $id])->one();
        if (!$model) {
            $this->throw404();
        }
        $model->delete();
        return $this->back();
    }


    public function actionAddProduct($lang = false)
    {

        $modelCompany = $this->_getMyCompany();
        if (!$modelCompany) {
            MgHelpers::setFlash('error', Yii::t('db', "Add company first"));
            return $this->back();
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

    public function actionAddAgent()
    {

        $modelCompany = $this->_getMyCompany();
        if (!$modelCompany) {
            MgHelpers::setFlash('error', Yii::t('db', "Add company first"));
            return $this->back();
        }
        $model = new User();
        $model->company_id = $modelCompany->id;
        $model->role = User::ROLE_REPRESENTATIVE;

        $modelAgent = new Agent();
        $modelAgent->company_id = $modelCompany->id;

        if ($model->load(Yii::$app->request->post())) {
            $fileUpload = UploadedFile::getInstance($model, 'fileUpload');
            if ($fileUpload) {
                $fileModel = new File;
                $file = $fileModel->push(new \rmrevin\yii\module\File\resources\UploadedResource($fileUpload));
                $model->file_id = $file->id;
            }

            $model->password = uniqid();
            if ($model->save()) {
                $this->_assignDownloadFiles($model);
                $modelAgent->user_id = $model->id;
                $modelAgent->save();
                MgHelpers::setFlash('success', Yii::t('db', 'Saved'));
                $this->redirect(['index']);
            } else {
                MgHelpers::setFlash('error', Yii::t('db', 'Saving failed'));
            }

        }

        return $this->render('editAgent', [
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

    function actionPaySubscription()
    {
        $modelCompany = $this->_getMyCompany();
        if (!$modelCompany) {
            MgHelpers::setFlash('error', Yii::t('db', "Add company first"));
            $this->back();
        }

        $model = new PaySubscriptionForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $this->redirect("https://trade.kanga.exchange/tpg/payment/PAxD8ZmDtKgcDVvpqlqWvxLCNDoDwp?currency=MFT&amount=$model->tokensAmount&transactionKey=$modelCompany->id&name=Meetfaces%20Trading%20-%20zakup%20tokena");
        }

        $model->subscrriptionFee = $modelCompany->subscription_fee * 0.6;
        return $this->render('paySubscription', [
            'model' => $model,
        ]);
    }


    function actionPaySubscriptionStripe()
    {
        $modelCompany = $this->_getMyCompany();
        if (!$modelCompany) {
            MgHelpers::setFlash('error', Yii::t('db', "Add company first"));
            $this->back();
        }

        $apiKey = MgHelpers::getSetting('stripe api key', false, 'sk_test_51FOmrVInHv9lYN6G23xLhzLTDNytsH8bOStCMPJ472ZAoutfeNag8DSuQswJkDmkpGPd1yRqqKtFfrrSb2ReZhtM00J3jbGTp0');
        $stripeAccountId = MgHelpers::getSetting('stripe account id', false, 'acct_1FOmrVInHv9lYN6G');
        $subscriptionPriceId = MgHelpers::getSetting('stripe price id', false, 'price_1KtH7tInHv9lYN6GmgumYmlZ');

        \Stripe\Stripe::setApiKey($apiKey);
        $session = \Stripe\Checkout\Session::create([
            'line_items' => [[
                'price' => $subscriptionPriceId,
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => Url::to(['account/payment-after', 'type' => 'success', 'hash' => MgHelpers::encrypt($modelCompany->id . '.' . date('Y-m-d'))], true),
            'cancel_url' => Url::to(['account/payment-after', 'type' => 'cancel'], true),
        ], ['stripe_account' => $stripeAccountId]);

        $this->redirect($session->url);
    }

    function actionPaymentAfter($type, $hash)
    {

        if ($type == 'success') {
            $decrypted = explode('.', MgHelpers::decrypt($hash));
            if (count($decrypted) < 2) {
                return $this->throw404();
            }
            $companyId = $decrypted[0];
            $date = $decrypted[1];
            $modelCompany = Company::find($companyId)->one();
            if (!$companyId || !$modelCompany || $date != date('Y-m-d')) {
                return $this->throw404();
            }
            $modelCompany->paid_from = date('Y-m-d H:i:s');
            $modelCompany->paid_to = date('Y-m-d H:i:s', strtotime('+1 year'));
            $saved = $modelCompany->save();
        }

        return $this->render('paymentAfter', ['type' => $type]);
    }

    public function actionBuy($hash)
    {
        $thisUser = MgHelpers::getUserModel();
        if (!$thisUser->getModelAttribute('stripeId')) {
            $this->createStripeAccount();
        }
        $data = unserialize(MgHelpers::decrypt($hash));
        $type = $data['type'];
        $id = $data['id'];


        switch ($type) {
            case 'Product':
                $model = Product::findOne($id);
                break;
            case 'Service':
                $model = Service::findOne($id);
                break;

            default:
                $model = null;
        }

        if (!$model) {
            MgHelpers::setFlashError(Yii::t('db', 'Problem with fecthing product'));
            return $this->back();
        }

        $priceId = $model->getModelAttribute('priceId');
        if (!$priceId) {
            MgHelpers::setFlashError(Yii::t('db', 'Problem with fetching product price'));
            return $this->back();
        }

        $apiKey = MgHelpers::getSetting('stripe api key', false, 'sk_test_51FOmrVInHv9lYN6G23xLhzLTDNytsH8bOStCMPJ472ZAoutfeNag8DSuQswJkDmkpGPd1yRqqKtFfrrSb2ReZhtM00J3jbGTp0');
        $stripe = new \Stripe\StripeClient($apiKey);
        try {
            $res = $stripe->paymentLinks->create([
                'line_items' => [
                    [
                        'price' => $priceId,
                        'quantity' => 1,
                    ],
                ],
            ]);
            if ($res['url']) {
                $this->redirect($res['url']);
            } else {
                MgHelpers::setFlashError(Yii::t('db', 'Stripe: problem with generating redirect url'));
                return $this->back();
            }
        } catch (Exception $e) {

            MgHelpers::setFlashError(Yii::t('db', $e));
            return $this->back();
        }

    }

    public function actionConnectStripeAccount($hash){

    }

    public function createStripeAccount()
    {
        $thisUser = MgHelpers::getUserModel();

        $apiKey = MgHelpers::getSetting('stripe api key', false, 'sk_test_51FOmrVInHv9lYN6G23xLhzLTDNytsH8bOStCMPJ472ZAoutfeNag8DSuQswJkDmkpGPd1yRqqKtFfrrSb2ReZhtM00J3jbGTp0');
        $stripe = new \Stripe\StripeClient($apiKey);
        $account = $stripe->accounts->create([
            'type' => 'standard',
            'country' => 'PL',
            'email' => $thisUser->email ? $thisUser->email : $thisUser->username,
        ]);
        if(!$account['id']){
            MgHelpers::setFlashError(Yii::t('db', 'Stripe: problem with creating account'));
            return $this->back();
        }

        $accountLink = $stripe->accountLinks->create([
            'account' => $account['id'],
            'refresh_url' => Url::to(['account'],true),
            'return_url' => Url::to(['account/connect-stripe-account','hash' => MgHelpers::encrypt($thisUser->id)],true),
            'type' => 'account_onboarding',
        ]);

        echo '<pre>';
        echo var_dump($accountLink);
        echo '</pre>';
        exit;
    }


}
