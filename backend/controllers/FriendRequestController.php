<?php

namespace backend\controllers;

use Yii;
use common\models\FriendRequest;
use common\models\FriendRequestSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * FriendRequestController implements the CRUD actions for FriendRequest model.
 */
class FriendRequestController extends Controller
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
     * Lists all FriendRequest models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FriendRequestSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $numPending = $searchModel->search(Yii::$app->request->queryParams)->query->where('{{%friend_request}}.status=0')->count();
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'numPending' => $numPending,
        ]);
    }

    /**
     * Displays a single FriendRequest model.
     * @param string $profile_id
     * @param integer $request_id
     * @return mixed
     */
    public function actionView($profile_id, $request_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($profile_id, $request_id),
        ]);
    }

    /**
     * Creates a new FriendRequest model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new FriendRequest();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'profile_id' => $model->profile_id, 'request_id' => $model->request_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing FriendRequest model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $profile_id
     * @param integer $request_id
     * @return mixed
     */
    public function actionUpdate($profile_id, $request_id)
    {
        $model = $this->findModel($profile_id, $request_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'profile_id' => $model->profile_id, 'request_id' => $model->request_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing FriendRequest model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $profile_id
     * @param integer $request_id
     * @return mixed
     */
    public function actionDelete($profile_id, $request_id)
    {
        $this->findModel($profile_id, $request_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the FriendRequest model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $profile_id
     * @param integer $request_id
     * @return FriendRequest the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($profile_id, $request_id)
    {
        if (($model = FriendRequest::findOne(['profile_id' => $profile_id, 'request_id' => $request_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
