<?php

namespace frontend\controllers;

class ProfileController extends \yii\web\Controller
{
    public function actionView()
    {
        return $this->render('profiledash');
    }

      public function actionProfileplace()
    {
        return $this->render('profileplace');
    }

       public function actionProfilesetting()
    {
        return $this->render('profilesetting');
    }
        public function actionProfilefollowup()
    {
        return $this->render('profilefollowup');
    }
    public function actionProfilecomments()
    {
        return $this->render('profilecomments');
    }
     public function actionProfileview($id,$place_type)
    {
    
        return $this->render('profileview',[
            'id'=>$id,
            'placetype' =>$place_type,
      
        ]);
    }
    
    
    
    
}
