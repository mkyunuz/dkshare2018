<?php

namespace backend\controllers;

use Yii;
use backend\models\Distributor;
use common\models\MyLib;
use common\models\BackupFile;
use backend\models\DistributorSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use yii\widgets\ActiveForm;

use yii\filters\AccessControl;

/**
 * DistributorController implements the CRUD actions for Distributor model.
 */
class DistributorController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                // 'only' => ['index','create','update','view'],
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [ 'allow' => true, 'actions' => ['create'], 'roles' => ['create-distributor'] ],
                    [ 'allow' => true, 'actions' => ['view'], 'roles' => ['read-distributor'] ],
                    [ 'allow' => true, 'actions' => ['update'], 'roles' => ['update-distributor'] ],
                    [ 'allow' => true, 'actions' => ['delete'], 'roles' => ['delete-distributor'] ],
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
     * Lists all Distributor models.
     * @return mixed
     */
    public function actionIndex()
    {
        // echo Yii::$app->MyLib->generateRandomString();

        // Yii::$app->MyLib->username();
       /* $mylib = new MyLib(); 
        $mylib->username ='admins';
        $backupfile = new BackupFile;
        $backupfile->backup_file_name = 'DK3';
        echo $backupfile->getBackupFileName();
        echo $backupfile->checkBackup();
        echo '<pre>';
        print_r($backupfile->createQuery());
        echo '</pre>';
        // echo $mylib->resultData();
        // if(!$mylib->getAuthorize()){
        //     throw new NotFoundHttpException('The requested page does not exist.');
        // }else{
        //     echo 'akses diterima';
        // }
        die();*/
        $searchModel = new DistributorSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Distributor model.
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
     * Creates a new Distributor model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */

    public function actionUploadDist(){
    }
    public function actionCreate()
    {
        // if(Yii::$app->user->can('create-distributor')){
            $model = new Distributor();
            if(Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())){
                Yii::$app->response->format = 'json';
                return ActiveForm::validate($model);
            }
            if ($model->load(Yii::$app->request->post())) {


                $model->created_at = date('Y-m-d H:i:s');
                $model->password_hash = Yii::$app->security->generatePasswordHash($_POST['Distributor']['password_hash']);
                $model->auth_key = Yii::$app->security->generateRandomString();
                // if(!$model->save()){
                //     $model->password_hash ='';
                //     return $this->render('create', [
                //         'model' => $model,
                //     ]);
                // }
                if($model->save()){
                    // echo 'success';
                    return $this->redirect(['view', 'id' => $model->id]);
                }else{
                    // echo 0;
                    if($model->isNewRecord){
                        $model->password_hash = '';
                    }else{
                        $model->new_password = '';
                    }
                   return $this->render('create', [
                    'model' => $model,
                ]);
                }
                

                // return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                ]);
            }

        // }
        
    }

    /**
     * Updates an existing Distributor model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {

            $model->password_hash = Yii::$app->security->generatePasswordHash($_POST['Distributor']['new_password']);

            if(empty($_POST['Distributor']['new_password'])){
                 $model->password_hash = $_POST['Distributor']['password_hash'];
            }

            if(!$model->save()){
                  return $this->render('update', [
                    'model' => $model,
                ]);   
            }
            return $this->redirect(['view', 'id' => $model->id]);     
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Distributor model.
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
     * Finds the Distributor model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Distributor the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Distributor::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
