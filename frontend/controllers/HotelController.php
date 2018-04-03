<?php

namespace frontend\controllers;

use Yii;
use hotel\models\HotelComments;
use frontend\models\RoomModel;
use hotel\models\Reservation;
use hotel\models\ReservationRoom;
use hotel\models\Room;
use hotel\models\TempBook;
use hotel\models\TempBookRoom;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\Controller;
use frontend\models\EsewaTbl;
use frontend\models\CustomerProfile;




class HotelController extends Controller{
    
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
                        'actions' => ['view', 'book','comment','getrooms','payment','cancelbooking','paymentmethod','paymentprofile','esewapay','reserve'],
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
    
  public function actionView($id)
  {
      
      $id = Yii::$app->encrypt->decode($id);


    return $this->render("view",[
        'id'=>$id
    ]);
  }

  public function actionBook()
  {

      // get post values

      $date_check_in = Yii::$app->request->get('from_date');
      $date_check_out= Yii::$app->request->get('to_date');
      $hotel_id = Yii::$app->request->get('hotel_id');


      $rooms = Room::find()->where(['hotel_id'=>$hotel_id])->count();
      
      
      if($rooms == 0){
          return $this->render("no_room",['hotel_id'=>$hotel_id]);
      }
      
      $model = new TempBook();
      $model->check_in = $date_check_in;
      $model->check_out = $date_check_out;
      $model->hotel_id = $hotel_id;

    return $this->render("book_process",[
        'model'=>$model
    ]);
  }

  public function actionComment()
  {
      $data="";
      $comment = Yii::$app->request->post('cmt');
      $hotelid = Yii::$app->request->post('hotelid');
      $userid = Yii::$app->request->post('userid');

      if (isset($comment) && isset($hotelid) && isset($userid)) {
          // save the data in a database
          $model = new HotelComments();
          $model->hotel_hotel_id = $hotelid;
          $model->customer_id = $userid;
          $model->comments = $comment;

          if($model->save()){
            //return ;
              return \yii\helpers\Json::encode($comment);

          }else{
              return 0;
          }

      } else {
          $data = "failed";
      }

  }

  public function actionGetrooms($val,$val1,$val2,$val3,$val4)
  {
      
      if (strlen($val) == 0)
          return $this->renderPartial('book_process');


      $rooms = explode(" ",$val);

      $hotel_id = $val1;
      $user_id = $val2;

      // get transaction id

      //$transaction_id = date('Y-m').rand(100,10000);
       $transaction_id = uniqid(time(), true);

      
      $temp_book = new TempBook();
      $temp_book->user_id = $user_id;
      $temp_book->hotel_id = $hotel_id;
      $temp_book->transaction_id = $transaction_id;
      $temp_book->check_in = $val3;
      $temp_book->check_out = $val4;
      if($temp_book->save()){
          $i=1;
          
          $lengh = count($rooms);
          
          foreach ($rooms as $room){
              // save rooms details in temp_book table
              // get room price
              $price = Room::find()->where(['room_id'=>$room])->one();
              $model = new TempBookRoom();
              $model->room_no = $price['room_number'].'';
              $model->price = $price['price_per_day'];
              $model->transaction_id = $transaction_id;
              if($model->save()){
                   
              }else{
                  print_r($model->errors);
              }

              if($i == $lengh -1)
                  break;
              $i++;



          }
         
      }
      
      return $this->renderPartial('book_process_2', ['id' => $transaction_id,'hotel_id'=>$hotel_id]);

  }

  public function actionPayment($val)
  {

          // get the temp book with id
          $temp_book = TempBook::findOne($val);


          $temp_book_rooms = TempBookRoom::find()->where(['temp_book_id'=>$val])->all();

          // make a reservation
          $reservation = new Reservation();

          $reservation->hotelid = $temp_book->hotel_id;
          $reservation->date_from = $temp_book->check_in;
          $reservation->date_to = $temp_book->check_out;
          $reservation->transaction_id = $temp_book->transaction_id;
          $reservation->status = "reserved";
          $reservation->customer_id = $temp_book->user_id;
          $reservation->room_id = count($temp_book_rooms);
          if($reservation->save()){
              foreach($temp_book_rooms as $temp_book_room){
                  $reservation_room = new ReservationRoom();
                  $reservation_room->room_no = $temp_book_room->room_no;
                  $reservation_room->rate = $temp_book_room->price;
                  $reservation_room->reservation_id = $reservation->id;
                  if($reservation_room->save()){
                    return $this->renderPartial('success',[
                        'model'=>$reservation
                    ]);
                  }else{
                      return print_r($reservation_room->errors);
                  }
              }

          }else{
              print_r($reservation->errors);
          }
         // return $this->renderPartial('book_final', ['val' => $val]);
  }
  
  public function actionPaymentmethod($val,$type){
      
         
      if($type == "reserve"){          
          //reserved with unpaid
          $this->redirect(['reserve','val'=>$val]);
      }else if($type == "esewa")
      {
          return $this->renderPartial('esewapayment',['id'=>$val]);
      }else{
          return $this->renderPartial('paypalpayment',['id'=>$val]);
      }
              
  }
  
  public function actionReserve($val){
      
        // check if transaction is already created or not 
        
        $count = Reservation::find()->where(['transaction_id'=>$val])->count();
        if($count > 0){
            $model = Reservation::find()->where(['transaction_id'=>$val])->one();
            return $this->render('success',[
                        'model'=>$model
                    ]);
        }
        
        
      
        // get the temp book with id
          $temp_book = TempBook::find()->where(['transaction_id'=>$val])->one();

                   
          $temp_book_rooms = TempBookRoom::find()->where(['transaction_id'=>$val])->all();

          // make a reservation
          $reservation = new Reservation();

          $reservation->hotelid = $temp_book->hotel_id;
          $reservation->date_from = $temp_book->check_in;
          $reservation->date_to = $temp_book->check_out;
          $reservation->transaction_id = $temp_book->transaction_id;
          $reservation->status = "unpaid-book";
          $reservation->customer_id = $temp_book->user_id;
          $reservation->room_id = count($temp_book_rooms);
          if($reservation->save()){
              foreach($temp_book_rooms as $temp_book_room){
                  $reservation_room = new ReservationRoom();
                  $reservation_room->room_no = $temp_book_room->room_no;
                  $reservation_room->rate = $temp_book_room->price;
                  $reservation_room->transaction_id = $reservation->transaction_id;
                  if($reservation_room->save()){
                    
                  }else{
                      return print_r($reservation_room->errors);
                  }
              }
              
              return $this->render('success',[
                        'model'=>$reservation
                    ]);

          }else{
              print_r($reservation->errors);
          }

  }
  
  public function actionPaymentType()
  {
      return $this->renderPartial('paymenttype');
  }
  
  public function actionPaymentprofile($val){
      
      $model = new CustomerProfile();
      
      
      
      if(isset($_POST['CustomerProfile'])){
          $id = $_POST['CustomerProfile']['customer_id'];
          $count = CustomerProfile::find()->where(['customer_id'=>$id])->count();
          if($count > 0)
              $model = CustomerProfile::find()->where(['customer_id'=>$id])->one();
          
          $model->attributes = $_POST['CustomerProfile'];
          
          if($model->save()){
              // get the temp book with id         
               return $this->renderPartial('paymentmethod', ['id' => $val]);
          }else{
              print_r($model->errors);
          }
                                             
      }else{
          echo 1;
      }
         
         

  }
  
  
  
  public function actionPaymentDetails($id,$type){
      if($type == "esew"){          
          return $this->renderPartial('esewapayment',['id'=>$id]);
      }else{
          return $this->renderPartial('paypalpayment',['id'=>$id]);
      }
  }
  
  public function actionEsewapay(){
      $model = new EsewaTbl();
      
       $model->attributes = $_POST['EsewaTbl'];
       
       return $this->redirect([
           'http://dev.esewa.com.np/epay/main',
           'tAmt'=>$model->tAmt,
           'amt'=>$model->amt,
           'txAmt'=>$model->txAmt,
           'psc'=>$model->psc,
           'pdc'=>$model->pdc,
           'scd'=>$model->scd,
           'pid'=>$model->pid,
           'su'=>$model->su,
           'fu'=>$model->fu
       ]);
  }


  public function actionCancelbooking($id,$tid)
  {
        // cancel the transaction 
       
      $transaction = TempBook::find()->where(['id'=>$tid])->one();      
      TempBookRoom::deleteAll(['temp_book_id'=>$tid]);
      if($transaction->delete()){
          // delete data from temp books room as well

          return $this->redirect(['view','id'=>$id]);
      }else
      {
          print_r($transaction->errors);
      }
      
     
  }
  
  
}

 ?>
