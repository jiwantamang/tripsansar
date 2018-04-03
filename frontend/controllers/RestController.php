<?php
namespace frontend\controllers;
use yii\web\Response;


class RestController extends \yii\rest\ActiveController{
    public function actionIndex(){
        $data = [
					"newsItems"=>
					[
						"image"=>"http://abhanimedia.com.np/backend/web/images/newsimage/150606812159c4c699f1b656.01270069.jpg",
						"title"=>"title1",
						"time"=>"1:00",
						"content"=>"this is a content",
						"date" =>"22 jan",
						"link"=>"http://abhanimedia.com.np/backend/web/images/newsimage/150606812159c4c699f1b656.01270069.jpg"
					     ],
					[
						"image"=>"http://abhanimedia.com.np/backend/web/images/newsimage/150606812159c4c699f1b656.01270069.jpg",
						"title"=>"title1",
						"time"=>"1:00",
						"content"=>"this is a content",
						"date" =>"22 jan",
						"link"=>"http://abhanimedia.com.np/backend/web/images/newsimage/150606812159c4c699f1b656.01270069.jpg"
					     ],
					[
						"image"=>"http://abhanimedia.com.np/backend/web/images/newsimage/150606812159c4c699f1b656.01270069.jpg",
						"title"=>"title1",
						"time"=>"1:00",
						"content"=>"this is a content",
						"date" =>"22 jan",
						"link"=>"http://abhanimedia.com.np/backend/web/images/newsimage/150606812159c4c699f1b656.01270069.jpg"
					     ],
					[
						"image"=>"http://abhanimedia.com.np/backend/web/images/newsimage/150606812159c4c699f1b656.01270069.jpg",
						"title"=>"title1",
						"time"=>"1:00",
						"content"=>"this is a content",
						"date" =>"22 jan",
						"link"=>"http://abhanimedia.com.np/backend/web/images/newsimage/150606812159c4c699f1b656.01270069.jpg"
					     ],
					[
						"image"=>"http://abhanimedia.com.np/backend/web/images/newsimage/150606812159c4c699f1b656.01270069.jpg",
						"title"=>"title1",
						"time"=>"1:00",
						"content"=>"this is a content",
						"date" =>"22 jan",
						"link"=>"http://abhanimedia.com.np/backend/web/images/newsimage/150606812159c4c699f1b656.01270069.jpg"
					     ],
					[
						"image"=>"http://abhanimedia.com.np/backend/web/images/newsimage/150606812159c4c699f1b656.01270069.jpg",
						"title"=>"title1",
						"time"=>"1:00",
						"content"=>"this is a content",
						"date" =>"22 jan",
						"link"=>"http://abhanimedia.com.np/backend/web/images/newsimage/150606812159c4c699f1b656.01270069.jpg"
					     ],
				];
        
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        
        return $data;
	
    }
}

