<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Place;
use frontend\models\PlaceSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * PlaceController implements the CRUD actions for Place model.
 */
class PlaceController extends Controller
{
  
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

    public function actionIndex()
    {
        $searchModel = new PlaceSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCreate()
    {
        $model = new Place();

        if ($model->load(Yii::$app->request->post()))
                 {



             $id = Yii::$app->user->id;


            $model->user_id = $id;

            $model->file = UploadedFile::getInstance($model, 'placeimages');

            $model->file->saveAs('uploads/'.$model->file->name.'.'.$model->file->extension);
            $model->placeimages= $model->file->name.'.'.$model->file->extension;

            if($model->save())
                return $this->redirect(['view', 'id' => $model->place_id]);
            else
                print_r ($model->errors);

        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {



             $model->file = UploadedFile::getInstance($model, 'placeimages');

            $model->file->saveAs('uploads/'.$model->file->name.'.'.$model->file->extension);
            $model->placeimages= $model->file->name.'.'.$model->file->extension;

            if($model->save())





            return $this->redirect(['view', 'id' => $model->place_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = Place::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionPlacedescription($place){
        $place = Yii::$app->encrypt->decode($place);
        return $this->render(
            "placedescription",['id'=>$place,


                ]);

    }

    public function actionSearch()
    {
         $search_string = isset($_GET['query']) ? $str = $_GET['query'] : $str="default";
         $type = isset($_GET['type']) ? $str = $_GET['type'] : $str="default";
         
        
        return $this->render("place_search",[
            'searchstring'=>$search_string,
            'type'=>$type
        ]);
    }
    
    public function actionRafting(){
        return $this->render('rafting');
    }
    
    public function actionAdventure()
    {
        return $this->render('adventure');
    }
    
    public function actionBunji()
    {
        return $this->render('bunji');
    }
}
