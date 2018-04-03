<?php

namespace hotel\controllers;

use Yii;
use hotel\models\HotelGallary;
use hotel\models\HotelGallarySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\web\Response;
use yii\imagine\Image;
use yii\helpers\FileHelper;


/**
 * HotelgallaryController implements the CRUD actions for HotelGallary model.
 */
class HotelgallaryController extends Controller
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
     * Lists all HotelGallary models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new HotelGallarySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single HotelGallary model.
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
     * Creates a new HotelGallary model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new HotelGallary();

        if ($model->load(Yii::$app->request->post())) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            
             $uid = uniqid(time(), true);
             $filename = $uid . '.' . $model->imageFile->extension;

            //$filename = date("Y-m-d").date("h:i:sa").$model->imageFile->name;
            $model->image_name = $filename;

            if ($model->save()) {
                // file is uploaded successfully
                if($model->upload($filename)){
                    return $this->redirect(['view', 'id' => $model->id, 'hotel_hotel_id' => $model->hotel_hotel_id]);
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
     * Updates an existing HotelGallary model.
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
     * Deletes an existing HotelGallary model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @param integer $hotel_hotel_id
     * @return mixed
     */
    public function actionDelete($id, $hotel_hotel_id)
    {
        $this->findModel($id, $hotel_hotel_id)->delete();

        return $this->redirect(['editgallary']);
    }

    /**
     * Finds the HotelGallary model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param integer $hotel_hotel_id
     * @return HotelGallary the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $hotel_hotel_id)
    {
        if (($model = HotelGallary::findOne(['id' => $id, 'hotel_hotel_id' => $hotel_hotel_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function actionViewgallary()
    {
        return $this->render('gallary');
    }
    
     public function actionImageupload($id){
        
    $transaction = Yii::$app->db->beginTransaction();
    
    // delete previous image of place 
    
    
    try{
         $model = new HotelGallary();
   
    
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');

            //foreach($model->file as $image){
             $uid = uniqid(time(), true);
             $fileName = $uid . '.' . $model->imageFile->extension;
             $filePath = Yii::$app->basePath.'/'.'upload/hotel_gallary/' . $fileName;
             $model->image_name = $fileName;
             $model->hotel_hotel_id = Yii::$app->user->identity->hotelid;
             if($model->save()){
                   if($model->imageFile->saveAs($filePath)){
                    $path = '/' . Yii::$app->name.'/hotel/upload/hotel_gallary_thumbnail/'. $fileName;
                    

                        Image::thumbnail(Yii::$app->basePath.'/'.'upload/hotel_gallary/'.$fileName,200,200)
                                       ->save(Yii::$app->basePath.'/'.'upload/hotel_gallary/hotel_gallary_thumbnail/'.$fileName, ['quality' => 120]);


                       $transaction->commit();

                       Yii::$app->response->format = Response::FORMAT_JSON;
                    return [
                       'files' => [
                           [
                               'name' => $fileName,
                               'size' => $model->imageFile->size,
                               'url' => $path,
                               'thumbnailUrl' => $path,
                               'deleteUrl' => 'index.php?r=hotelgallary/image-delete&name=' . $fileName,
                               'deleteType' => 'POST'
                           ],
                       ],
                  ];
                }
             }else{
                 print_r($model->errors);
             }
           
            
        //}
        
    } catch (Exception $ex) {
        $transaction->rollBack();
    }
        
   
       
    }
    
     public function actionImageDelete($name)
    {
      
        
//      $filePath1 = Yii::getAlias('@backend/upload/image/') . $name;
//      $filePath2 = Yii::$app->name.'/backend/upload/thumbnail/' . $name;
//      $filePath3 = Yii::$app->name.'/backend/upload/thumbnail_widget/' . $name;
//        unlink($filePath1);
//        unlink($filePath2);
//        unlink($filePath3);
        
        $directory1 = Yii::getAlias('@hotel/upload/hotel_gallary');
        $directory2 = Yii::getAlias('@hotel/upload/hotel_gallary/hotel_gallary_thumbnail');
        
            if (is_file($directory1 . DIRECTORY_SEPARATOR . $name)) {
                unlink($directory1 . DIRECTORY_SEPARATOR . $name);
            }
            if (is_file($directory2 . DIRECTORY_SEPARATOR . $name)) {
                unlink($directory2 . DIRECTORY_SEPARATOR . $name);
            }
            
                    
          $files = FileHelper::findFiles($directory1);
          
          $img = HotelGallary::find()->where(['image_name'=>$name])->one();
          $img->delete();
          
           $output = [];
            foreach ($files as $file) {
                $fileName = basename($file);
               // $path = '/img/temp/' . Yii::$app->session->id . DIRECTORY_SEPARATOR . $fileName;
                $output['files'][] = [
                    'name' => $fileName,
                    'size' => filesize($file),
                    //'url' => $path,
                   // 'thumbnailUrl' => $path,
                    'deleteUrl' => 'image-delete?name=' . $fileName,
                    'deleteType' => 'POST',
                ];
            }
             Yii::$app->response->format = Response::FORMAT_JSON;
            return $output;


    }
    
    public function actionEditgallary(){        
        return $this->render('editgallary');
    }
    

    
}
