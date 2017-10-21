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

use  yii\helpers\FileHelper;

/**
 * TitikController implements the CRUD actions for Titik model.
 */
class TitikController extends Controller
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
     * Lists all Titik models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TitikSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Titik model.
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
     * Creates a new Titik model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Titik();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->titik_id]);
        } else {
            return $this->renderAjax('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Titik model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->titik_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Titik model.
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
        $db = new Query;
        $data = $db->select('titik.titik_name, hor.hor_name, distributor.distributor_name')
                ->from('distributor')
                ->join('left join','titik', 'titik.titik_id=distributor.titik_id')
                ->join('left join','hor', 'hor.hor_id=titik.hor_id')
                ->where('distributor.distributor_name!="PT. TOTALINDO BANGGAI PERKASA"')
                ->andWhere('distributor.distributor_name!="CV. CAHAYA MAKMUR ABADI"')
                ->andWhere('distributor.distributor_name!="PT. Mandiri ABadi Jaya Utomo"')
               
                ->all();
                // echo '<pre>';
                // print_r($data);
        $defaultPath = 'D:'.DIRECTORY_SEPARATOR."BACKUP_DIST".DIRECTORY_SEPARATOR."2018";
        echo '<pre>';
        foreach ($data as $key) {

            for($i=1;$i<=52;$i++){
                $distributor = $defaultPath.DIRECTORY_SEPARATOR.$key['hor_name'].DIRECTORY_SEPARATOR.$key['titik_name'].DIRECTORY_SEPARATOR.$key['distributor_name'].DIRECTORY_SEPARATOR.$i;
                // echo $distributor.'<br>';
                FileHelper::createDirectory($distributor, $mode = 0777, $recursive = true);
            }
            // mkdir($defaultPath.DIRECTORY_SEPARATOR.$key->hor_name,0700);
            // FileHelper::createDirectory($titik, $mode = 0775, $recursive = true);
        }
        echo '</pre>';
        
    }

    /**
     * Finds the Titik model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Titik the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Titik::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
