<?php

namespace backend\controllers;

use backend\models\Placecatagory;
use Yii;
use backend\models\Place;
use backend\models\PlaceSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\helpers\Url;
use yii\imagine\Image;
use backend\models\PlaceImage;
use backend\models\Addresses;
use Imagine\Image\Box;
use yii\helpers\FileHelper;
use yii\web\Response;

/**
 * PlaceController implements the CRUD actions for Place model.
 */
class PlaceController extends Controller
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
     * Lists all Place models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PlaceSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Place model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($place_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($place_id),
        ]);
    }

    /**
     * Creates a new Place model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {

        $db = Yii::$app->db;
        $model = new Place();

        if ($model->load(Yii::$app->request->post()))
         {

            $outer_transaction = $db->beginTransaction();
            try{

                $id = Yii::$app->user->id;



                $model->user_id = $id;

               // $model->file = UploadedFile::getInstances($model, 'file');


                $aid = Addresses::find()->where(['cities_city_id'=>$model->city])->one()['adress_id'];

                $model->placeaddress = $aid.'';


                //$model->file = null;
                if($model->save())
                {
//                    foreach($model->file as $sfile){
//                        $inner_transaction = $db->beginTransaction();
//
//                        try{

                          //  $newName = date("Y-m-d").date("h:i:sa").$sfile->name;
                         //   $sfile->saveAs( Yii::$app->basePath.'/'.'upload/image/'.$newName);
                            // save data in image table
                         //   $newImg = new PlaceImage();
                        ///    $newImg->image_name =$newName;
                            //$model->placeimages= $newName.$sfile->name;
                         //   $newImg->place_id = $model->place_id;

                         //   if($newImg->save()){

                         //       Image::thumbnail(Yii::$app->basePath.'/'.'upload/image/'.$newName,120,120)
                          //          ->save(Yii::$app->basePath.'/'.'upload/thumbnail/'.$newName, ['quality' => 80]);

//                                Image::thumbnail(Yii::$app->basePath.'/'.'upload/image/'.$newName,200,200)
//                                    ->save(Yii::$app->basePath.'/'.'upload/thumbnail_widget/'.$newName, ['quality' => 120]);
//                                
                                //Image::getImagine()->open(Yii::$app->basePath.'/'.'upload/image/'.$newName)->thumbnail(new Box(250, 250))->save(Yii::$app->basePath.'/'.'upload/thumbnail_widget/'.$newName , ['quality' => 90]);


                                // get the place type
//                                $crop_small_40_40= false;
//                                $cname = Placecatagory::find()->select(['placecatagory'])->where(['placecatagory_id'=>$model->placecatagory])->one();
//
//
//
//                                if($cname->placecatagory == "cave" || $cname->placecatagory=="Cave"
//                                    || $cname->placecatagory== "Falls" || $cname->placecatagory == "falls"
//                                    || $cname->placecatagory== "Himalays" || $cname->placecatagory == "himalays"
//                                    || $cname->placecatagory== "National Park" || $cname->placecatagory == "National Park"
//                                    )
//                                    $crop_small_40_40 = true;
//
//
//
//                                if($crop_small_40_40 == true){
//                                    Image::thumbnail(Yii::$app->basePath.'/'.'upload/image/'.$newName,40,40)
//                                        ->save(Yii::$app->basePath.'/'.'upload/thumbnail_widget/thumbnail_widget_small/'.$newName, ['quality' => 120]);
//                                }
//
//                            }else{
//                                print_r ($newImg->errors);
//                                return;
//                            }
//                            $inner_transaction->commit();
//                        }catch (\Exception $e){
//                            $inner_transaction->rollBack();
//                            throw $e;
//                        }

                    }


                               
                else{
                    print_r ($model->errors);
                }

                $outer_transaction->commit();
                return $this->redirect(['view', 'place_id' => $model->place_id]);
            }catch(\Exception $e){
                $outer_transaction->rollBack();
                throw $e;
            }



        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    
    public function actionUpdate($place_id)
    {
        
        $outertransaction = Yii::$app->db->beginTransaction();
        $model = $this->findModel($place_id);
        
        // get country name and city name with address id 
        $address = Addresses::findOne($model->placeaddress);
        $model->country = $address->country_id;
        $model->city = $address->cities_city_id;
        
        $imageFile = UploadedFile::getInstance($model, 'file');
        if($imageFile){
             $uid = uniqid(time(), true);
             $fileName = $uid . '.' . $imageFile->extension;
        }
        
        
    
        
        if ($model->load(Yii::$app->request->post())) {

            $model->file = UploadedFile::getInstance($model, 'file');
           
            $model->file->saveAs('uploads/'.$model->file->name.'.'.$model->file->extension);
            $model->placeimages= $model->file->name.'.'.$model->file->extension;

            if($model->save()){
                return $this->redirect(['view', 'id' => $model->place_id]);
            }
            
            $outertransaction->commit();
            
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
        
        
    }
    
    public function actionImageupload($id){
        
    $transaction = Yii::$app->db->beginTransaction();
    
    // delete previous image of place 
    
    
    try{
         $model = new Place();
   
    
    $model->file = UploadedFile::getInstance($model, 'file');
    
        //foreach($model->file as $image){
             $uid = uniqid(time(), true);
             $fileName = $uid . '.' . $model->file->extension;
             $filePath = Yii::$app->basePath.'/'.'upload/image/' . $fileName;
             
             if($model->file->saveAs($filePath)){
                 $path = '/' . Yii::$app->name.'/backend/upload/thumbnail/'. $fileName;
                    Yii::$app->response->format = Response::FORMAT_JSON;
                 
                    Image::thumbnail(Yii::$app->basePath.'/'.'upload/image/'.$fileName,120,120)
                                    ->save(Yii::$app->basePath.'/'.'upload/thumbnail/'.$fileName, ['quality' => 80]);

                    Image::thumbnail(Yii::$app->basePath.'/'.'upload/image/'.$fileName,200,200)
                                    ->save(Yii::$app->basePath.'/'.'upload/thumbnail_widget/'.$fileName, ['quality' => 120]);
                    
                    
                    // save the images in the database 
                    $newImage = new PlaceImage();
                    $newImage->image_name =$fileName;
                    //$model->placeimages= $newName.$sfile->name;
                    $newImage->place_id = $id;
                    $newImage->save();
                    
                    $transaction->commit();
                 
                 
                 return [
                    'files' => [
                        [
                            'name' => $fileName,
                            'size' => $model->file->size,
                            'url' => $path,
                            'thumbnailUrl' => $path,
                            'deleteUrl' => 'index.php?r=place/image-delete&name=' . $fileName,
                            'deleteType' => 'POST'
                        ],
                    ],
               ];
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
        
        $directory1 = Yii::getAlias('@backend/upload/image');
        $directory2 = Yii::getAlias('@backend/upload/thumbnail');
        $directory3 = Yii::getAlias('@backend/upload/thumbnail_widget');
            if (is_file($directory1 . DIRECTORY_SEPARATOR . $name)) {
                unlink($directory1 . DIRECTORY_SEPARATOR . $name);
            }
            if (is_file($directory2 . DIRECTORY_SEPARATOR . $name)) {
                unlink($directory2 . DIRECTORY_SEPARATOR . $name);
            }
            
            if (is_file($directory3 . DIRECTORY_SEPARATOR . $name)) {
                unlink($directory3 . DIRECTORY_SEPARATOR . $name);
            }
            
          $files = FileHelper::findFiles($directory1);
          
          $img = PlaceImage::find()->where(['image_name'=>$name])->one();
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
    


        /**
     * Deletes an existing Place model.
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
     * Finds the Place model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Place the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Place::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }



    public function actionPlacedescription($id){
        return $this->render(
            "placedescription",['id'=>$id,


                ]);

    }

    public function actionSearch()
    {
         $search_string = isset($_POST['placestring']) ? $str = $_POST['placestring'] : $str="default";

        return $this->render("place_search",[
            'searchstring'=>$search_string
        ]);
    }

    public function actionAllplace()
    {
        return $this->render('allplaces');
    }
    
   
}
