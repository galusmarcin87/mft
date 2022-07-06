<?php

namespace app\modules\backend\controllers\mgcms;

use app\models\mgcms\db\Company;
use Yii;
use app\models\mgcms\db\Auth;
use app\models\mgcms\db\AuthSearch;
use app\modules\backend\components\mgcms\MgBackendController;
use yii\db\Connection;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\components\mgcms\MgHelpers;

/**
 * AuthController implements the CRUD actions for Auth model.
 */
class StatsController extends MgBackendController
{

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Auth models.
     * @return mixed
     */
    public function actionIndex()
    {
        $connection = Yii::$app->getDb();

        $companiesByDay = $connection->createCommand("SELECT DATE_FORMAT(created_on, '%Y-%m-%d') as date , COUNT(*) AS `cnt` FROM `company` GROUP BY DATE_FORMAT(created_on, '%Y-%m-%d') ORDER BY YEAR(created_on) DESC, MONTH(created_on) DESC, DAY(created_on) DESC")->queryAll();
        $companiesByMonth = $connection->createCommand("SELECT DATE_FORMAT(created_on, '%Y-%m') as month , COUNT(*) AS `cnt` FROM `company` GROUP BY DATE_FORMAT(created_on, '%Y-%m') ORDER BY YEAR(created_on) DESC, MONTH(created_on) DESC")->queryAll();
        $companiesByQuarter = $connection->createCommand("SELECT YEAR(created_on) AS year, QUARTER(created_on) AS quarter , COUNT(*) AS `cnt` FROM `company` GROUP BY YEAR(created_on), QUARTER(created_on)  ORDER BY YEAR(created_on) DESC, QUARTER(created_on) DESC")->queryAll();

        return $this->render('index', [
            'companiesByDay' => $companiesByDay,
            'companiesByMonth' => $companiesByMonth,
            'companiesByQuarter' => $companiesByQuarter
        ]);
    }


}
