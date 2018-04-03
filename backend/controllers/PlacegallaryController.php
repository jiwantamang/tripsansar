<?php

namespace backend\controllers;

use Yii;
use backend\models\PlaceGallary;
use backend\models\PlaceGallarySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * GallaryimageController implements the CRUD actions for PlaceGallary model.
 */
class PlacegallaryController extends Controller
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
     * Lists all PlaceGallary models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PlaceGallarySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PlaceGallary model.
     * @param integer $id
     * @param integer $place_id
     * @return mixed
     */
    public function actionView($id, $place_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id, $place_id),
        ]);
    }

    /**
     * Creates a new PlaceGallary model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PlaceGallary();

        if ($model->load(Yii::$app->request->post())) {
          $model->imageFile = UploadedFile::getInstance($model, 'imageFile');

            $filename = date("Y-m-d").date("h:i:sa").$model->imageFile->name;
            $model->image_name = $filename;

             if ($model->save()) {
                 // file is uploaded successfully
                 if($model->upload($filename)){
                    return $this->redirect(['view', 'id' => $model->id, 'place_id' => $model->place_id]);
                 }else{
                   print_r($model->errors);
                 }


             }else{
               print_r($model->errors);
             }

        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing PlaceGallary model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @param integer $place_id
     * @return mixed
     */
    public function actionUpdate($id, $place_id)
    {
        $model = $this->findModel($id, $place_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'place_id' => $model->place_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing PlaceGallary model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @param integer $place_id
     * @return mixed
     */
    public function actionDelete($id, $place_id)
    {
        $this->findModel($id, $place_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the PlaceGallary model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param integer $place_id
     * @return PlaceGallary the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $place_id)
    {
        if (($model = PlaceGallary::findOne(['id' => $id, 'place_id' => $place_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
