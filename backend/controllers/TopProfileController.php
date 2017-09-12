<?php

namespace backend\controllers;

use common\models\PModel;
use common\models\Profile;
use Yii;
use common\models\TopProfile;
use common\models\TopProfileSearch;
use yii\helpers\Json;
use yii\helpers\StringHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TopProfileController implements the CRUD actions for TopProfile model.
 */
class TopProfileController extends Controller
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
     * Lists all TopProfile models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TopProfileSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $numProcessing = $searchModel->search(Yii::$app->request->queryParams)->query->where('{{%top_profile}}.status ='.PModel::TOP_PENDING)->count();
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'numProcessing' => $numProcessing,
        ]);
    }

    /**
     * Displays a single TopProfile model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new TopProfile model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TopProfile();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing TopProfile model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $profile = Profile::findIdentity($model->profile_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $ids[] = $model->profile_id;

            $notification = array();
            $type = PModel::NOTIFY_ONTOP;

            if($model->status == PModel::TOP_REJECT){
                $type = PModel::NOTIFY_CANCEL_ONTOP;
            }
            $notification['profile_id'] = $profile->id;
            $notification['profile_name'] = $profile->display_name;
            $notification['avatar'] = $profile->avatar_path;
            $notification['gender'] = $profile->gender;

            // sent mess to queue
            PModel::notifyMQ($ids, $type, $notification);

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'display_name' => $profile->display_name,
            ]);
        }
    }

    /**
     * Deletes an existing TopProfile model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionActiveTop()
    {
        if(Yii::$app->request->post('hasEditable')){
            $topProfileId = Yii::$app->request->post('editableKey');
            $model = TopProfile::findOne($topProfileId);
            $className = StringHelper::basename($model->className());

            // store a default json response as desired by editable
            $out = Json::encode(['output' => '', 'message' => '']);
            $post = [];
            $posted = current($_POST[$className]);
            $post[$className] = $posted;

            $message = "";
            $output = "";

            // load model like any single model validation
            if ($model->load($post)) {
                if (isset($posted['status'])) {
                    $model->save();
                    $output = PModel::getTopName($model->status);

                    $ids[] = $model->profile_id;

                    $profile = Profile::findIdentity($model->profile_id);
                    $notification = [];
                    $type = PModel::NOTIFY_ONTOP;

                    if($model->status == PModel::TOP_REJECT){
                        $type = PModel::NOTIFY_CANCEL_ONTOP;
                    }
                    $notification['profile_id'] = $profile->id;
                    $notification['profile_name'] = $profile->display_name;
                    $notification['avatar'] = $profile->avatar_path;
                    $notification['gender'] = $profile->gender;

                    // sent mess to queue
                    PModel::notifyMQ($ids, $type, $notification);
                }
                $out = Json::encode(['output' => $output, 'message' => $message]);
            }
            // return ajax json encoded response and exit
            echo $out;
            return;
        }
    }

    /**
     * Finds the TopProfile model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TopProfile the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TopProfile::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
