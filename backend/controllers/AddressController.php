<?php

namespace backend\controllers;

use Yii;
use backend\models\Addresses;
use backend\models\AddressSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use backend\models\Cities;

/**
 * AddressController implements the CRUD actions for Addresses model.
 */
class AddressController extends Controller
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
     * Lists all Addresses models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AddressSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Addresses model.
     * @param integer $adress_id
     * @param integer $cities_city_id
     * @return mixed
     */
    public function actionView($adress_id, $cities_city_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($adress_id, $cities_city_id),
        ]);
    }

    /**
     * Creates a new Addresses model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Addresses();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'adress_id' => $model->adress_id, 'cities_city_id' => $model->cities_city_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Addresses model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $adress_id
     * @param integer $cities_city_id
     * @return mixed
     */
    public function actionUpdate($adress_id, $cities_city_id)
    {
        $model = $this->findModel($adress_id, $cities_city_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'adress_id' => $model->adress_id, 'cities_city_id' => $model->cities_city_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Addresses model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $adress_id
     * @param integer $cities_city_id
     * @return mixed
     */
    public function actionDelete($adress_id, $cities_city_id)
    {
        $this->findModel($adress_id, $cities_city_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Addresses model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $adress_id
     * @param integer $cities_city_id
     * @return Addresses the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($adress_id, $cities_city_id)
    {
        if (($model = Addresses::findOne(['adress_id' => $adress_id, 'cities_city_id' => $cities_city_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionSubcat() {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
          $parents = $_POST['depdrop_parents'];
          if ($parents != null) {
            $cat_id = $parents[0];
            //$out = self::getSubCatList($cat_id);

            // get list
            $out = Cities::find()->where(['countries_country_id'=>$cat_id])->asArray()->all();
            $arrayout[] = array();

            foreach($out as $val){
              $arrayout[] = [
                'id'=>$val['city_id'],
                'name'=>$val['city_name']
              ];
            }
            // the getSubCatList function will query the database based on the
            // cat_id and return an array like below:
            // [
            // ['id'=>'<sub-cat-id-1>', 'name'=>'<sub-cat-name1>'],
            // ['id'=>'<sub-cat_id_2>', 'name'=>'<sub-cat-name2>']
            // ]
            echo Json::encode(['output'=>$arrayout, 'selected'=>'']);
            return;
            }
        }
        echo Json::encode(['output'=>'', 'selected'=>'']);
  }
}
