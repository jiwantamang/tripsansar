<?php

namespace frontend\controllers;

use Yii;
use frontend\models\CustomerProfile;
use frontend\models\CustomerProfileSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use kartik\alert\Alert;
use yii\helpers\FileHelper;
use yii\web\UploadedFile;
use yii\imagine\Image;
use yii\web\Response;
use yii\helpers\Url;
/**
 * 
 * CustomerprofileController implements the CRUD actions for CustomerProfile model.
 */
class CustomerprofileController extends Controller
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
     * Lists all CustomerProfile models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CustomerProfileSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CustomerProfile model.
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
     * Creates a new CustomerProfile model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        
        if(isset($_POST['CustomerProfile']))
        {
            //$model = CustomerProfile::findOne($_POST['CustomerProfile']['customer_id']);
            
            $model = new CustomerProfile();
            $cid = $_POST['CustomerProfile']['customer_id'];
            // check if the record is already available in the database of this user or not
            $count = CustomerProfile::find()->where(['customer_id'=>$cid])->count();
            if($count > 0){
                $model = CustomerProfile::find()->where(['customer_id'=>$_POST['CustomerProfile']['customer_id']])->one();
            }
            
            $model->attributes = $_POST['CustomerProfile'];                  
            if($count > 0 ? $model->update() : $model->save()){
                    Yii::$app->session->setFlash('profile-updated');
                    return $this->renderPartial('view', [
                    'model' => $model
                ]);
            }else{
                print_r($model->errors);
            }
            
        }
                       
    }

    /**
     * Updates an existing CustomerProfile model.
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
            return $this->renderPartial('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing CustomerProfile model.
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
     * Finds the CustomerProfile model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CustomerProfile the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        
        if (($model = $model = CustomerProfile::find()->where(['customer_id'=>$id])->one()) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function actionProfile($id)
    {
        $model ="";
        $model = CustomerProfile::find()->where(['customer_id'=>$id])->one();
            
        if($model == null){
            $model = new CustomerProfile();
        }
        
      
        return $this->renderPartial('create', ['model' => $model]);
       
    }
    
    public function actionChangepic($id){
        
        return $this->renderAjax('changepic',[
            'id'=>$id
        ]);
    }
    
     public function actionImageupload($id){
        
    $transaction = Yii::$app->db->beginTransaction();
    
    // delete previous image of place 
    
    
    try{
         $imagemodel = new \frontend\models\UploadForm();
   
    
            $imagemodel->imageFile = UploadedFile::getInstance($imagemodel, 'imageFile');

            $model = new CustomerProfile();
             
            $count = CustomerProfile::find()->where(['customer_id'=>$id])->count();
            
             if($count > 0){
                $model = CustomerProfile::find()->where(['customer_id'=>$id])->one();
                // delete previous image
                $directory1 = Yii::getAlias('@frontend/web/upload');
                $directory2 = Yii::getAlias('@frontend/web/upload/thumbnail');

                    if (is_file($directory1 . DIRECTORY_SEPARATOR . $model->image)) {
                        unlink($directory1 . DIRECTORY_SEPARATOR . $model->image);
                    }
                    if (is_file($directory2 . DIRECTORY_SEPARATOR . $model->image)) {
                        unlink($directory2 . DIRECTORY_SEPARATOR . $model->image);
                    }
             }
             
             
            //foreach($model->file as $image){
             $uid = uniqid(time(), true);
             $fileName = $uid . '.' . $imagemodel->imageFile->extension;
             $filePath = Yii::$app->basePath.'/'.'web/upload/' . $fileName;
             
             $model->image = $fileName;
             $model->customer_id = $id;
             if($model->save(false)){
                   if($imagemodel->imageFile->saveAs($filePath)){
                    $path = Yii::$app->urlManagerFrontend->baseUrl.'/'.'upload/thumbnail/'. $fileName;
                    
                   
                        Image::thumbnail(Yii::$app->basePath.'/'.'web/upload/'.$fileName,200,200)
                                       ->save(Yii::$app->basePath.'/'.'web/upload/thumbnail/'.$fileName, ['quality' => 120]);

                       //return '<pre>'.print_r($model).'</pre>';
                       $transaction->commit();

                       Yii::$app->response->format = Response::FORMAT_JSON;
                    return [
                       'files' => [
                           [
                               'name' => $fileName,
                               'size' => $imagemodel->imageFile->size,
                               'url' => $path,
                               'thumbnailUrl' => $path,
                               'deleteUrl' => Url::to(['customerprofile/image-delete','name'=> $fileName]),
                               'deleteType' => 'POST'
                           ],
                       ],
                  ];
                }
             }else{
                 return print_r($model->errors) . "from debug";
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
        
        $directory1 = Yii::getAlias('@frontend/upload');
        $directory2 = Yii::getAlias('@frontend/upload/thumbnail');
        
            if (is_file($directory1 . DIRECTORY_SEPARATOR . $name)) {
                unlink($directory1 . DIRECTORY_SEPARATOR . $name);
            }
            if (is_file($directory2 . DIRECTORY_SEPARATOR . $name)) {
                unlink($directory2 . DIRECTORY_SEPARATOR . $name);
            }
            
                    
          $files = FileHelper::findFiles($directory1);
          
          $img = CustomerProfile::find()->where(['image'=>$name])->one();
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
    
}
