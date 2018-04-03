<?php

namespace hotel\controllers;

use Yii;
use hotel\models\HotelFacility;
use hotel\models\HotelFacilitySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * HotelfacilityController implements the CRUD actions for HotelFacility model.
 */
class HotelfacilityController extends Controller
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
     * Lists all HotelFacility models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new HotelFacilitySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single HotelFacility model.
     * @param integer $id
     * @param integer $hotel_hotel_id
     * @return mixed
     */
    public function actionView($id, $hotel_hotel_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id, $hotel_hotel_id),
        ]);
    }

    /**
     * Creates a new HotelFacility model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new HotelFacility();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'hotel_hotel_id' => $model->hotel_hotel_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing HotelFacility model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @param integer $hotel_hotel_id
     * @return mixed
     */
    public function actionUpdate($id, $hotel_hotel_id)
    {
        $model = $this->findModel($id, $hotel_hotel_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'hotel_hotel_id' => $model->hotel_hotel_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing HotelFacility model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @param integer $hotel_hotel_id
     * @return mixed
     */
    public function actionDelete($id, $hotel_hotel_id)
    {
        $this->findModel($id, $hotel_hotel_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the HotelFacility model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param integer $hotel_hotel_id
     * @return HotelFacility the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $hotel_hotel_id)
    {
        if (($model = HotelFacility::findOne(['id' => $id, 'hotel_hotel_id' => $hotel_hotel_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
