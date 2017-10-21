<?php
namespace common\models;

use Yii;
use Yii\base\Component;


class MyLib extends Component{
    public $username;
    public function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopq'.date('ymd').'rstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
              if($i==3){
                 $randomString .= date('y');          
                        
              }
              if($i==6){
                  $randomString .= date('m');  
              }
              if($i==8){
                  $randomString .= date('d');  
              }
              
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
        
    } 



    public function resultData(){
        
        return $this->username.Yii::$app->user->identity->username;
    }

    function getAuthorize(){
        if($this->username == Yii::$app->user->identity->username){
            return true;
        }else{
            return false;
        }
    }

    function checkBackupFile(){
        
    }
}
