<?php

namespace backend\controllers;

use Yii;
use backend\models\Users;
use backend\models\UserSearch;
use backend\models\AuthItem;
use backend\models\MasterPage;
use backend\models\AuthAssignment;

use common\models\User;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;;
use yii\filters\AccessControl;

class UsersController extends Controller
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
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [ 'allow' => true, 'actions' => ['create'], 'roles' => ['create-user'] ],
                    [ 'allow' => true, 'actions' => ['view'], 'roles' => ['read-user'] ],
                    [ 'allow' => true, 'actions' => ['update'], 'roles' => ['update-user'] ],
                    [ 'allow' => true, 'actions' => ['delete'], 'roles' => ['delete-user'] ],
                    [ 'allow' => true, 'actions' => ['user-assignment'], 'roles' => ['set-auth-assignment'] ],
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

    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCreate()
    {
        $model = new Users();
        if(Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())){
            Yii::$app->response->format = 'json';
            return ActiveForm::validate($model);
        }

        if ($model->load(Yii::$app->request->post())) {

            $model->created_at = date('Y-m-d H:i:s');
            $model->password_hash = Yii::$app->security->generatePasswordHash($_POST['Users']['password_hash']);
            $model->auth_key = Yii::$app->security->generateRandomString();

            if($model->save()){
                return $this->redirect(['view', 'id' => $model->id]);
            }else{
                $model->password_hash = '';
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
            
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }


    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
         if(Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())){
            Yii::$app->response->format = 'json';
            return ActiveForm::validate($model);
        }

        if ($model->load(Yii::$app->request->post())) {
            $model->password_hash = $_POST['Users']['password_hash'];
            if($_POST['Users']['new_password']!=""){
                $model->password_hash = $_POST['Users']['new_password'];
            }
            
            if($model->save()){
                return $this->redirect(['view', 'id' => $model->id]);
            }else{
                $model->password_hash ='';
                 return $this->render('update', [
                    'model' => $model,
                ]);
            }
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

   
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }



    public function actionUserAssignment($id){
        $model = new AuthAssignment;
        $masterPage = new MasterPage;
        $userModel = $this->findModel($id);
         
         if($model->load(Yii::$app->request->post())){

            $assigment = $_POST['AuthAssignment']['item_name'];
            if(count($assigment)){
                 AuthAssignment::deleteAll('user_id = :user_id', [':user_id' => $userModel->id]);
                 foreach ($assigment as $value) {
                    $newModel = new AuthAssignment();
                    $newModel->item_name = $value;
                    $newModel->user_id =  $userModel->id;
                    $newModel->save();
                 }
                 Yii::$app->session->setFlash('success', 'Data berhasi diperbaruhi.');
                  return $this->render('userassignment', 
                                            [
                                                'userModel'=>$userModel,
                                                'model'=>$model,
                                                'masterPage'=>$masterPage,
                                            ]);
            }
         }else{
            return $this->render('userassignment', 
                [
                    'userModel'=>$userModel,
                    'model'=>$model,
                    'masterPage'=>$masterPage,
                ]);
         }

    }

     public function actionGetAuthRole($id){
        $role_id = $id;

        $model = new AuthAssignment;

        if($model->load(Yii::$app->request->post())){

        }else{
            $authItem = AuthItem::find()->where(['rule_name' => $role_id])
                                ->andWhere(['like', 'name', 'create'])
                                ->all();
            $authItem = ArrayHelper::map($authItem, 'name', 'name');
            return $this->renderAjax('auth_role_form', ['role_id' => $role_id,'authItem'=>$authItem,'model'=>$model]);
        }
         

    }
    protected function findModel($id)
    {
        if (($model = Users::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
