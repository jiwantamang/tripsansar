<?php
namespace frontend\controllers;

use common\models\CustomerLoginForm;
use Yii;
use yii\base\Exception;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use frontend\models\Usersignup;
use frontend\models\Passchange;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                //'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['login','index','package','contact','about','asu','request-password-reset','reset-password','findplacenames','suggest','error','changepassword','package'],
                        'allow' => true,

                    ],
                    [
                        'actions' => ['logout','bookpackage','index','package','contact','about','asu','request-password-reset','reset-password','findplacenames','suggest','error','changepassword','package','bookpackage','bookconfirm'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
//        
//         return [
//            'access' => [
//                'class' => AccessControl::className(),
//                'rules' => [
//                    [
//                        'actions' => ['login', 'error'],
//                        'allow' => true,
//                        'roles' => ['?'],
//                    ],
//                    [
//                        'actions' => ['view', 'bookpackage'],
//                        'allow' => true,
//                        'roles' => ['@'],
//                    ],
//                ],
//            ],
//            'verbs' => [
//                'class' => VerbFilter::className(),
//                'actions' => [
//                    'logout' => ['post'],
//                ],
//            ],
//        ];
         
    }

   
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        $model = new SignupForm();
        return $this->render('index',[
            'model'=>$model
        ]);
    }

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        if(!\Yii::$app->session->has("backURL")){
            \Yii::$app->session->set("backURL", \Yii::$app->request->referrer);
        }

        $model = new CustomerLoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack(\Yii::$app->session->get('backURL'));
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
    
    public function actionContact()
    {
        $model = new ContactForm();
        
        if ($model->load(Yii::$app->request->post())) {
            $model->email = Yii::$app->user->getIdentity()->getEmail();
            $model->fname = Yii::$app->user->getIdentity()->getUsername();
            print_r($model);
            return;
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {            
            $ts = Yii::$app->db->beginTransaction();
            try{
                
                if ($user = $model->signup()) {
                EventController::sendActivateMail($user);
                if (Yii::$app->getUser()->login($user)) {
                    $ts->commit();
                    
                }
            }
                
            } catch (Exception $ex) {
                 $ts->rollBack();
            }
            
            return $this->goHome();
            
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }
    
    public function actionAsu($email,$val){
        // check the user_activation_id
        $transaction = Yii::$app->db->beginTransaction();
        try{
            $model = \hotel\models\Customer::find()->where(['email'=>$email])->one();

            if($model->user_activation_key == $val){
                $model->user_activation_key = "activated";
                if($model->update(false))
                    Yii::$app->getSession()->setFlash('user-activate','You are activated successfully !!!!');
                $transaction->commit();
            }else{
                Yii::$app->getSession()->setFlash('user-activate-keyfail','Key is invalid try by signing up again !!!!');
            }   
            return $this->goHome();
        }catch(Exception $ex){
            $transaction->rollBack();
        }

    }

    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    public function actionFindplacenames($val){
        $search = new Search(['key'=>'AIzaSyAS9wFeMXkCMkcnfAVSsrRA10LOwBDLQ9c']);
        $places = $search->text($val);
        $json_places = json_encode($places);
        return $json_places;

    }
    
    public function actionSuggest(){
     
        $searchString = Yii::$app->request->get('query');
        //$sql = 'select place_id,placetitle from place where placetitle1 like :searchString';
        //$datas = \backend\models\Place::findBySql($sql,[':searchString'=>$searchString])->all();
        $datas = \backend\models\Place::find()->where(['like','placetitle',$searchString])->limit(6)->all();
        
        // get the data from hotel table as well 
        $hotels = \backend\models\Hotel::find()->where(['like','hotelname',$searchString])->limit(6)->all();
        
        $suggestions = [];
        
        if(count($datas) > 0){
            foreach($datas as $data ){
            $suggestions [] = 
                ["value"=>$data['placetitle'],"data"=>$data['place_id']
            ];
            }
        }
       
        
        if(count($hotels) > 0){
            foreach($hotels as $hotel ){
            $suggestions [] = 
                ["value"=>$hotel['hotelname'],"data"=>$hotel['hotel_id']
            ];
        }
        }
        
        $suggestions_json = [
            "suggestions"=>$suggestions
        ];
        
       // print_r($suggestions_json);
        
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        
        
//        return [                 
//                "suggestions"=> [
//                    [ "value"=> $searchString, "data"=> "AE" ],
//                    [ "value"=> "United Kingdom",       "data"=> "UK" ],
//                    [ "value"=> "United States",        "data"=> "US" ],
//                ]
//            ];
        
        return $suggestions_json;

    }
    
   public function actionError()
   {
        $exception = Yii::$app->errorHandler->exception;
        if ($exception !== null) {
            return $this->render('error', ['exception' => $exception]);
        }
   }
    
   public function actionChangepassword(){
        $id = Yii::$app->user->id;

        if(isset($_POST['Passchange'])){
            // compare the password
           
            $transaction = Yii::$app->db->beginTransaction();

            try{

                $pmodel = new Passchange();
                $pmodel->attributes = $_POST['Passchange'];
                            
                $model = \common\models\Customer::findOne($id);
                                                
                // check if the old password is currect or not
                
                if(Yii::$app->security->validatePassword($pmodel->oldPassword,$model->password_hash)){                   
                    $model->setPassword($pmodel->newPassword);
                        if($model->save(false)){
                        $transaction->commit();
                        Yii::$app->session->setFlash('password-changed','The password changed successfully !!!');
                    }                    
                    else{
                        print_r($model->errors);
                    }
                    // log the password changed event audit table

                    
                }else{

                    Yii::$app->session->setFlash('wrong-password','The Old Password Does not match !!!');
                }




            }catch(Exception $ex){
                $transaction->rollBack();
            }


        }
        return $this->render('changepass');

    }
    
    public function actionPackage($id){
        return $this->render('package-view',[
            'id'=>$id
        ]);
    }
    
    public function actionBookpackage($id){
        return $this->render('package-book',[
            'id'=>$id
        ]);
    }

    public function actionBookconfirm($id){
        // booking process
        $package_book = new \backend\models\PackageBook();
        $package_book->package_id = $id;
        $package_book->user_id = Yii::$app->user->getId();
        $package_book->email = Yii::$app->user->identity->email;
        $package_book->created_at = strtotime(date("Y/m/d"));
        $package_book->updated_at = strtotime(date("Y/m/d"));        
        $package_book->save();
        //print_r($package_book->errors);
        Yii::$app->session->setFlash("book-success");        
        return $this->render('index');
    }
}
