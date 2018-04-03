<?php

namespace hotel\controllers;

use Yii;
use hotel\models\HotelProfile;
use hotel\models\HotelProfileSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\imagine\Image;
use yii\web\Response;
use yii\helpers\FileHelper;

/**
 * HotelprofileController implements the CRUD actions for HotelProfile model.
 */
class HotelprofileController extends Controller
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
     * Lists all HotelProfile models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new HotelProfileSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single HotelProfile model.
     * @param integer $id
     * @return mixed
     */
    public function actionView()
    {
        return $this->render('view');
    }

    public function actionCreate()
    {
        // check if profile is created or not of this hotel
        $model = HotelProfile::find()->where(['hotel_hotel_id'=>Yii::$app->user->identity->hotelid])->one();
        if(!$model)
             $model = new HotelProfile();

        if ($model->load(Yii::$app->request->post())) {             
               $model->hotel_hotel_id = Yii::$app->user->identity->hotelid;
               if($model->save()){               	               	
               	return $this->redirect(['view', 'id' => $model->id]);
               }else{
                    print_r($model->errors);               
               }
               
        			//$model->file->saveAs('uploads/' . $this->file->baseName . '.' . $this->file->extension); 

        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing HotelProfile model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing HotelProfile model.
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
     * Finds the HotelProfile model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return HotelProfile the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = HotelProfile::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
     public function actionImageupload($id){
        
    $transaction = Yii::$app->db->beginTransaction();
    
    // delete previous image of place 
    
    
    try{
            // check if it is new or old
            
            $model = HotelProfile::find()->where(['hotel_hotel_id'=>$id])->one();
            if(!$model)
                $model = new HotelProfile();
   
    
            $model->file = UploadedFile::getInstance($model, 'file');

            //foreach($model->file as $image){
             $uid = uniqid(time(), true);
             $fileName = $uid . '.' . $model->file->extension;
             $filePath = Yii::$app->basePath.'/'.'upload/image/' . $fileName;
             $model->image = $fileName;
             $model->hotel_hotel_id = Yii::$app->user->identity->hotelid;
             if($model->isNewRecord ? $model->save() : $model->update()){
                   if($model->file->saveAs($filePath)){
                    $path = '/' . Yii::$app->name.'/hotel/upload/hotel_thumbnail/'. $fileName;
                    

                        Image::thumbnail(Yii::$app->basePath.'/'.'upload/image/'.$fileName,200,200)
                                       ->save(Yii::$app->basePath.'/'.'upload/hotel_thumbnail/'.$fileName, ['quality' => 120]);


                       $transaction->commit();

                       Yii::$app->response->format = Response::FORMAT_JSON;
                    return [
                       'files' => [
                           [
                               'name' => $fileName,
                               'size' => $model->file->size,
                               'url' => $path,
                               'thumbnailUrl' => $path,
                               'deleteUrl' => 'index.php?r=hotelprofile/image-delete&name=' . $fileName,
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
       // $this->redirect(['image-delete',['name'=>$filename]])
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
        
        $directory1 = Yii::getAlias('@hotel/upload/image');
        $directory2 = Yii::getAlias('@hotel/upload/hotel_thumbnail');
        
            if (is_file($directory1 . DIRECTORY_SEPARATOR . $name)) {
                unlink($directory1 . DIRECTORY_SEPARATOR . $name);
            }
            if (is_file($directory2 . DIRECTORY_SEPARATOR . $name)) {
                unlink($directory2 . DIRECTORY_SEPARATOR . $name);
            }
            
                    
          $files = FileHelper::findFiles($directory1);
          
          $img = HotelProfile::find()->where(['image'=>$name])->one();
          $img->image = "";
          $img->update();
          
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

    
}
