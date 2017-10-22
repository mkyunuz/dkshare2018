<?php

namespace frontend\controllers;

use Yii;
use common\models\MyLib;
use frontend\models\BackupFile;
use frontend\models\BackupFileDetail;
use frontend\models\BackupFileSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use yii\filters\AccessControl;
use yii\web\UploadedFile;

use common\models\BackupFileLib;

/**
 * BackupFileController implements the CRUD actions for BackupFile model.
 */
class BackupFileController extends Controller
{
    /**
     * @inheritdoc
     */
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
                        'actions' => ['logout', 'index','data','upload','get-list-of-data'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all BackupFile models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BackupFileSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single BackupFile model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new BackupFile model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new BackupFile();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->backup_file_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'week' => '',
            ]);
        }
    }
    public function actionTest(){
        $backupModel = new BackupFile();
                // if($backupModel->load(Yii::$app->request->post())){
        $backupModel->backup_file_id = '11111';
        $backupModel->distributor_id = 11111;
        $backupModel->backup_file_created_at =  date('Y:m:d H:i:s');
        $backupModel->week =  1;
        $backupModel->save();
                // }
                
    }
    public function actionData($w){
         return $this->render('data', [
                    'week' => $w,
                ]);
    }
    public function actionUpload(){
    $fileName = 'file';
    $uploadPath = 'D:';
    $model = new BackupFile();
    $backupModel = new BackupFile();
    
    
    if(isset($_GET['w'])){  
           
        if (isset($_FILES[$fileName])) {          
            $backupModelLib = new BackupFileLib;
            $backupModelLib->distributor_id =  Yii::$app->user->identity->distributor_id;
            $backupModelLib->week =  $_GET['w'];
            $backupRowCountInweek = count($backupModelLib->checkBackupExistInWeek());
            $file = \yii\web\UploadedFile::getInstanceByName($fileName);
            $ext = explode(".", $file->name);
            $ext = end($ext);
            // if($ext=='7z'){
                $backupDetailModel = new BackupFileDetail();
                 if($backupRowCountInweek <= 0){
                    $backupModel->backup_file_id = date('YmdHis');
                    $backupModel->distributor_id =  Yii::$app->user->identity->distributor_id;
                    $backupModel->backup_file_created_at =  date('Y:m:d H:i:s');
                    $backupModel->week =  $backupModelLib->week;
                    $backupModel->save();

                    /*Jika sudah pernah upload, maka bakup_file_id yang dipakai untuk bakup file detail diambil dari nilao tabel bakup file*/
                    $backupDetailModel->backup_file_id = $backupModel->backup_file_id;
                }else{
                    $rowBackup = $backupModelLib->getBakupFileId();
                    $backupDetailModel->backup_file_id = $rowBackup['backup_file_id'];
                    /*ambil data backup detail yang id nya sama dan nama filenya sama*/

                     $backupModelLib->backup_file_name =  $file->name;
                     $backupModelLib->backup_file_id = $rowBackup['backup_file_id'];
                     $backupModelLib->deleteExistFile();


                }

                 $newUploadPath = $backupModelLib->setTargetUploadDist();

                if ($file->saveAs($newUploadPath. $file->name)) {
                    $backupDetailModel->backup_file_detail_id =  'FID'.MyLib::generateRandomString();
                    $backupDetailModel->backup_file_name =  $file->name;
                    $backupDetailModel->path =  $backupModelLib->setTargetUploadDist().$file->name;
                    $backupDetailModel->created_at =  date('Y-m-d H:i:s');
                    $backupDetailModel->save();
                }
            // }
           die();
        }
        return $this->renderAjax('upload',['week'=>$_GET['w'], 'model'=>$model]);
        
    }else{
        
    }

    return false;
    die();
        $fileName = 'backup_file_name';
        $uploadPath = 'D:';
        if(isset($_GET['w'])){
           if(isset($_FILES[$fileName])){
                $file = \yii\web\UploadedFile::getInstanceByName($fileName);
                if(substr($file->name,0,3)=='Har'){
                    if(!file_exists($uploadPath."/".$file->name)){
                         if($file->saveAs($uploadPath."/".$file->name)){
                        // echo \yii\helpers\Json::encode($file);
                            echo json_encode(['success'=>'OK']);
                        }else{

                            
                        }
                    }else{
                        echo json_encode(['error'=> $file->name." exist"]);
                    }
                   
                }else{
                    echo json_encode(['error'=>'Error']);
                }
           }else{
                return $this->render('upload');
           }


        }else{
            throw new NotFoundHttpException('The requested Item could not be found.');
        }
        // return false;
    }

    function actionGetListOfData(){
        $backup = new BackupFileLib;
        $backup->distributor_id = Yii::$app->user->identity->distributor_id;
        $backup->week = $_POST['week'];
        $data = $backup->getBackupFileDetail();
        
        return $this->renderAjax('list_of_backup',['data'=>$data]);


    }
    public function actionSaveupload(){
        // echo 1;
        $model = new BackupFile();
        /*if()
        $a = UploadedFile::getInstance($backupModel, 'backup_file_name');
        $path = 'backupfile/';
        // $a->saveAs($path.$a->name);
        if($a['fileName']){
            echo 1;
        }*/
        $file = $_FILES['backup_file_name'];
        $count_file = count($file);
        $result = array();
        // echo json_encode(['error'=>pathinfo($file['name'], PATHINFO_EXTENSION)]);
        // die();
        if($count_file > 0){
            for($i=0; $i < $count_file; $i++){
                if(pathinfo($_FILES['backup_file_name'][$i], PATHINFO_EXTENSION)=='7z' || pathinfo($_FILES['backup_file_name'][$i], PATHINFO_EXTENSION)=='zip' ){
                    // $result = ['success'=> 'upload success'];
                // }else{
                    $result = ['error'=> pathinfo($_FILES['backup_file_name'][$i], PATHINFO_EXTENSION)];
                }
            }
            // foreach ($file['name'] as $file_name) {
            //     if(pathinfo($file_name, PATHINFO_EXTENSION)=='7z' || pathinfo($file_name, PATHINFO_EXTENSION)=='zip' ){
            //         $result = ['success'=> 'upload success'];
            //     }else{
            //         $result = ['error'=> 'upload failed. Extension ditolak'];
            //     }
            // }
        }
        echo json_encode($result);
        die();


        if (count($_FILES['backup_file_name'])>0) {
                // if(substr($_FILES['backup_file_name']['name'],0,3)=='Har'){
                   echo json_encode(['success'=>pathinfo($_FILES['backup_file_name']['name'], PATHINFO_EXTENSION)]);
                // }
        }else{
            echo json_encode(['error'=>'No selected files. Please reload this page']);
        }

    }



   
    /**
     * Updates an existing BackupFile model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->backup_file_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing BackupFile model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the BackupFile model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return BackupFile the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = BackupFile::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
