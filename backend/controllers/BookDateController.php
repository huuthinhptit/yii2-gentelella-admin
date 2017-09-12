<?php

namespace backend\controllers;

use common\models\PModel;
use Yii;
use common\models\BookDate;
use common\models\BookDateSearch;
use yii\helpers\Json;
use yii\helpers\StringHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BookDateController implements the CRUD actions for BookDate model.
 */
class BookDateController extends Controller
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
     * Lists all BookDate models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BookDateSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single BookDate model.
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
     * Creates a new BookDate model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new BookDate();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing BookDate model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //Update status in row 2
            $model2 = BookDate::find()->where('profile_id=:profile_id',[':profile_id'=>$model->profile_book_id])
                                        ->andWhere('profile_book_id=:profile_book_id',[':profile_book_id'=>$model->profile_id])
                                        ->one();
            $model2->status = $model->status;
            $model2->save();

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing BookDate model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the BookDate model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return BookDate the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = BookDate::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionActive()
    {
        if(Yii::$app->request->post('hasEditable')){
            $bookDateId = Yii::$app->request->post('editableKey');
            $model = BookDate::findOne($bookDateId);
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

                    //Update status in row 2
                    $model2 = BookDate::find()->where('profile_id=:profile_id',[':profile_id'=>$model->profile_book_id])
                                                ->andWhere('profile_book_id=:profile_book_id',[':profile_book_id'=>$model->profile_id])
                                                ->one();
                    $model2->status = $model->status;
                    $model2->save();

                    $output = PModel::getBookName($model->status);
                }
                $out = Json::encode(['output' => $output, 'message' => $message]);
            }
            // return ajax json encoded response and exit
            echo $out;
            return;
        }
    }
}
