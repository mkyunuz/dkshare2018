<?php

namespace backend\controllers;

use Yii;
use backend\models\Titik;
use backend\models\TitikSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use yii\db\Command;
use yii\db\Query;
use yii\widgets\ActiveForm;

use  yii\helpers\FileHelper;

class TitikController extends Controller{
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

    
    public function actionIndex()
    {
        $searchModel = new TitikSearch();
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
        $model = new Titik();
        if(Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())){
            Yii::$app->response->format = 'json';
            return ActiveForm::validate($model);
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->titik_id]);
        } else {
            return $this->renderAjax('create', [
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
            return $this->redirect(['view', 'id' => $model->titik_id]);
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
        $db = new Query;
        $data = $db->select('titik.titik_name, hor.hor_name, distributor.distributor_name')
                ->from('distributor')
                ->join('left join','titik', 'titik.titik_id=distributor.titik_id')
                ->join('left join','hor', 'hor.hor_id=titik.hor_id')
                ->where('distributor.distributor_name!="PT. TOTALINDO BANGGAI PERKASA"')
                ->andWhere('distributor.distributor_name!="CV. CAHAYA MAKMUR ABADI"')
                ->andWhere('distributor.distributor_name!="PT. Mandiri ABadi Jaya Utomo"')
               
                ->all();
        $defaultPath = 'D:'.DIRECTORY_SEPARATOR."BACKUP_DIST".DIRECTORY_SEPARATOR."2018";
        echo '<pre>';
        foreach ($data as $key) {

            for($i=1;$i<=52;$i++){
                $distributor = $defaultPath.DIRECTORY_SEPARATOR.$key['hor_name'].DIRECTORY_SEPARATOR.$key['titik_name'].DIRECTORY_SEPARATOR.$key['distributor_name'].DIRECTORY_SEPARATOR.$i;
                FileHelper::createDirectory($distributor, $mode = 0777, $recursive = true);
            }
        }
        echo '</pre>';
        
    }
    
    protected function findModel($id)
    {
        if (($model = Titik::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
