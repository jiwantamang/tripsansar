<?php
namespace hotel\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\HotelLogin;
use backend\models\Hotel;
use edofre\fullcalendarscheduler\models\Event;

/**
 * Site controller
 */
class SiteController extends Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index','general','premium','addnew','calendar','calendarbooking','getbookdetails'],
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
    }


    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }


    public function actionIndex()
    {
    	  $hotel = Hotel::find()->where(['hotel_id'=>Yii::$app->user->identity->hotelid])->one();
        return $this->render('index',[
				'hotel'=>$hotel        
        ]);
    }


    public function actionLogin()
    {

        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $this->layout = 'login_layout';
        $model = new HotelLogin();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
        		// get the hotel profile as well         		        		
            return $this->goBack();            
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

    public function actionGeneral(){
      return $this->render('general');
    }

    public function actionPremium()
    {
      return $this->render('premium');
    }

    public function actionAddnew()
    {
      return $this->render('addnew');
    }

    public function actionCalendar(){
      return $this->render('calendar');
    }
    
    public function actionGetbookdetails(){
        $bid = Yii::$app->request->post('bid');
        //$model = $this->findModel($bid);
        
        $model = \hotel\models\Reservation::findOne($bid);
        

//        return $this->renderPartial('view',[
//            'model'=>$model
//        ]);
        
        return $this->renderPartial('bookdetails',[
            'model'=>$model
        ]);
    }
}
