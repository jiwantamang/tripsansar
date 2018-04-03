

<?php

use yii\web\View;

//$model = Place::find()->asArray()->where(['placetitle'=> $searchstring])->orderBy('place_id')->all();



// get catagory id 

if($type == "place"){
    //$sql = "select * from place where placetitle=:placetitle";
    //$model = Place::findBySql($sql,[':placetitle'=> $searchstring])->all();    
    echo \Yii::$app->view->renderFile('@frontend/views/place/place_result.php',[
        'type'=>$type,        
        'searchstring'=>$searchstring
    ]);
      
}else if($type == "hotel"){
    $sql = "select * from place where placetitle=:placetitle && placecatagory=:type";
    
    echo \Yii::$app->view->renderFile('@frontend/views/place/hotel_result.php',[
        'type'=>$type,        
        'searchstring'=>$searchstring
    ]);
    
    
}
    
$this->title = "Search: ".$searchstring;

?>
