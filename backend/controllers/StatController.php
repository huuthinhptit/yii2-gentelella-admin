<?php
namespace backend\controllers;

use api\models\Profile;
use backend\models\FiltersForm;
use backend\models\ProfileRegisterSearch;
use backend\models\StatForm;
use yii\base\Controller;
use yii\filters\VerbFilter;
use yii;

class StatController extends Controller
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

    public function actionProfileRegister()
    {
        $searchModel = new ProfileRegisterSearch();
        $params = Yii::$app->request->queryParams;
        $sess = Yii::$app->session;

        if (!isset($params[$searchModel->formName()]['startTime'])) {
            $previousWeek = strtotime(date('Y-m-1'));
            $searchModel['startTime'] = date('Y-m-d', $previousWeek);
        }
        if (!isset($params[$searchModel->formName()]['endTime'])) {
            $searchModel['endTime'] = date('Y-m-d');
        }
        if ($sess->has('cur_start_time')) {
            $searchModel->startTime = $sess->get('cur_start_time');
        }
        if ($sess->has('cur_end_time')) {
            $searchModel->endTime = $sess->get('cur_end_time');
        }
        $dataProvider = $searchModel->search($params);

        return $this->render('profileRegister', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider
        ]);
    }

}
