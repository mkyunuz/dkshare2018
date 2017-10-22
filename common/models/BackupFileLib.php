<?php
namespace common\models;
// use frontend\models\BackupFile;

use Yii;
use Yii\base\Component;
use yii\db\Command;
use yii\db\Query;
use yii\db\ActiveQuery;
use backend\models\Distributor;



class BackupFileLib extends Component{
  public $backup_file_id='';
  public $distributor_id='';
  public $week = '';
  public $backup_file_name='';
  public $db;
  

  
  function checkBackupExistInWeek(){
    $db = new Query;
    return $db->select('*')
                ->from('backup_file')
                ->where('distributor_id=:distributor_id', array(':distributor_id'=>$this->distributor_id))
                ->andWhere('week=:week', array(':week'=>$this->week))
                ->all();
  }
  function getBackupFileDetail(){
     $db = new Query;
      return $db->select('*')
                ->from('backup_file_detail')
                ->join('left join','backup_file', 'backup_file.backup_file_id=backup_file_detail.backup_file_id')
                ->where('backup_file.distributor_id=:distributor_id', array(':distributor_id'=>$this->distributor_id))
                ->andWhere('backup_file.week=:week', array(':week'=>$this->week))
                ->all();
  }
  function getBakupFileId(){
     $db = new Query;
      return $db->select('*')
                ->from('backup_file')
                ->where('distributor_id=:distributor_id', array(':distributor_id'=>$this->distributor_id))
                ->andWhere('week=:week', array(':week'=>$this->week))
                ->one();
  }

  function createQuery(){
      $db = new Query;
      return $db->select('*')
                ->from('distributor')
                ->limit(10);
  }

  function getBackupFileName(){
    return $this->backup_file_name;
  }

  function getBackupDetailIfExist(){
   // return  $this->db->select('*')
   //              ->from('backup_file_detail')
   //              ->where('backup_file_id=:backup_file_id', array(':backup_file_id'=>'20171020185707'))
   //              // ->andWhere('backup_file_name=:backup_file_name', array(':backup_file_name'=>$this->backup_file_name))
   //              ->one();
  }

  function deleteExistFile(){
      $db = new Query;
      return  $db->createCommand()->delete('backup_file_detail', ['backup_file_id' => $this->backup_file_id, 'backup_file_name'=> $this->backup_file_name])
                    ->execute();
  }

  public function setTargetUploadDist(){
      $db = new Query;
      $query = $db->select('*')
                  ->from('distributor')
                  ->join('join','titik', 'titik.titik_id=distributor.titik_id')
                  ->join('join','hor', 'hor.hor_id=titik.hor_id')
                  ->where('distributor.distributor_id=:distributor_id', array(':distributor_id'=>$this->distributor_id))
                  ->one();
      return $this->setDefaultBackupPath().DIRECTORY_SEPARATOR.$query['hor_name'].DIRECTORY_SEPARATOR.$query['titik_name'].DIRECTORY_SEPARATOR.$query['distributor_name'].DIRECTORY_SEPARATOR.$this->week.DIRECTORY_SEPARATOR;


  }

  function setDefaultBackupPath(){
      return "D:".DIRECTORY_SEPARATOR."BACKUP_DIST".DIRECTORY_SEPARATOR."2018";
  }

  function human_filesize($bytes, $decimals = 2) {
      $factor = floor((strlen($bytes) - 1) / 3);
      if ($factor > 0) $sz = 'KMGT';
      return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$sz[$factor - 1] . 'B';
  }
}
