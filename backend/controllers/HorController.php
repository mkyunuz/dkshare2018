<?php

namespace backend\controllers;

use Yii;
use backend\models\Hor;
use backend\models\HorSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\FileHelper;
use yii\widgets\ActiveForm;


use yii\filters\AccessControl;

class HorController extends Controller
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
                    [ 'allow' => true, 'actions' => ['create'], 'roles' => ['create-hor'] ],
                    [ 'allow' => true, 'actions' => ['view'], 'roles' => ['read-hor'] ],
                    [ 'allow' => true, 'actions' => ['update'], 'roles' => ['update-hor'] ],
                    [ 'allow' => true, 'actions' => ['delete'], 'roles' => ['delete-hor'] ],
                    [ 'allow' => true, 'actions' => ['create-directory'], 'roles' => ['create-directory'] ],
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
        $searchModel = new HorSearch();
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
        $model = new Hor();
        if(Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())){
            Yii::$app->response->format = 'json';
            return ActiveForm::validate($model);
        }
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->hor_id]);
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
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->hor_id]);
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
     public function actionCreateDirectory(){
        $data = Hor::find()->all();
        $defaultPath = 'D:'.DIRECTORY_SEPARATOR."BACKUP_DIST".DIRECTORY_SEPARATOR."2018";
        echo '<pre>';
        foreach ($data as $key) {
            FileHelper::createDirectory($defaultPath.DIRECTORY_SEPARATOR.$key->hor_name, $mode = 0775, $recursive = true);
        }
        echo '</pre>';
        
    }

    protected function findModel($id)
    {
        if (($model = Hor::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


}
