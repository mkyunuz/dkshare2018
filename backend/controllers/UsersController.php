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

/**
 * UsersController implements the CRUD actions for Users model.
 */
class UsersController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [

            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Users models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Users model.
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
     * Creates a new Users model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Users();
       
        if ($model->load(Yii::$app->request->post())) {

            $model->created_at = date('Y-m-d H:i:s');
            $model->password_hash = Yii::$app->security->generatePasswordHash($_POST['Users']['password_hash']);
            $model->auth_key = Yii::$app->security->generateRandomString();

            if($model->save()){
                return $this->redirect(['view', 'id' => $model->id]);
            }else{
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

    /**
     * Updates an existing Users model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->password_hash = $_POST['Users']['password_hash'];
            if($_POST['Users']['new_password']!=""){
                $model->password_hash = $_POST['Users']['new_password'];
            }
            print_r($model->password_hash);
            if($model->save()){
                return $this->redirect(['view', 'id' => $model->id]);
            }else{
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

    /**
     * Deletes an existing Users model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
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
            // $authIter['create'] = AuthItem::model()->find(['name=:name', 'rule_name:ruleName'], array(':postID'=>10));
            $authItem = AuthItem::find()->where(['rule_name' => $role_id])
                                ->andWhere(['like', 'name', 'create'])
                                ->all();
            $authItem = ArrayHelper::map($authItem, 'name', 'name');
            return $this->renderAjax('auth_role_form', ['role_id' => $role_id,'authItem'=>$authItem,'model'=>$model]);
        }
         

    }

    /**
     * Finds the Users model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Users the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Users::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
