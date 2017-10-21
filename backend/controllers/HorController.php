<?php

namespace backend\controllers;

use Yii;
use backend\models\Hor;
use backend\models\HorSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\FileHelper;


use yii\filters\AccessControl;

/**
 * HorController implements the CRUD actions for Hor model.
 */
class HorController extends Controller
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
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                   [ 'allow' => true, 'actions' => ['create'], 'roles' => ['create-hor'] ],
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

    /**
     * Lists all Hor models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new HorSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Hor model.
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
     * Creates a new Hor model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        // if(Yii::$app->user->can('create-hor')){
            
        $model = new Hor();
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->hor_id]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        // }else{
        //     throw new ForbiddenHttpException;
        // }
    }

    /**
     * Updates an existing Hor model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->hor_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Hor model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
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
            // mkdir($defaultPath.DIRECTORY_SEPARATOR.$key->hor_name,0700);
            FileHelper::createDirectory($defaultPath.DIRECTORY_SEPARATOR.$key->hor_name, $mode = 0775, $recursive = true);
        }
        echo '</pre>';
        
    }

    /**
     * Finds the Hor model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Hor the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Hor::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


}
