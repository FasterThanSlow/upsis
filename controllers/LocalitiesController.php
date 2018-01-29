<?php

namespace app\controllers;

use Yii;
use app\models\Localities;
use app\models\LocalitiesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * LocalitiesController implements the CRUD actions for Localities model.
 */
class LocalitiesController extends Controller
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
     * Lists all Localities models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new LocalitiesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Localities model.
     * @param integer $id
     * @param integer $districts_id
     * @return mixed
     */
    public function actionView($id, $districts_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id, $districts_id),
        ]);
    }

    /**
     * Creates a new Localities model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Localities();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'districts_id' => $model->districts_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Localities model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @param integer $districts_id
     * @return mixed
     */
    public function actionUpdate($id, $districts_id)
    {
        $model = $this->findModel($id, $districts_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'districts_id' => $model->districts_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Localities model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @param integer $districts_id
     * @return mixed
     */
    public function actionDelete($id, $districts_id)
    {
        $this->findModel($id, $districts_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Localities model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param integer $districts_id
     * @return Localities the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $districts_id)
    {
        if (($model = Localities::findOne(['id' => $id, 'districts_id' => $districts_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
