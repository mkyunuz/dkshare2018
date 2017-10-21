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
        $distributor = [
                ['id'=>'1120','distributor_name'=>'PT. SELERA ASLI','username'=>'1016121301','distributor_id'=>'1016121301','password'=>'dk1301','email'=>'example@mail.com1','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1121','distributor_name'=>'PT. SARIPATI PRIMA NIAGA','username'=>'1015081001','distributor_id'=>'1015081001','password'=>'dk1001','email'=>'example@mail.com2','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1122','distributor_name'=>'PT. ALVA MOUNTINDO','username'=>'1015081803','distributor_id'=>'1015081803','password'=>'dk1803','email'=>'example@mail.com3','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1123','distributor_name'=>'PT. SARIPATI PRIMA NIAGA','username'=>'1015090901','distributor_id'=>'1015090901','password'=>'dk0901','email'=>'example@mail.com4','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1124','distributor_name'=>'CV. SARIPATI PERMATA JAYA','username'=>'1015082744','distributor_id'=>'1015082744','password'=>'dk2744','email'=>'example@mail.com5','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1125','distributor_name'=>'CV. SARIPATI MUTIARA SENTOSA','username'=>'1015082607','distributor_id'=>'1015082607','password'=>'dk2607','email'=>'example@mail.com6','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1126','distributor_name'=>'CV. SARIPATI BERLIAN ABADI','username'=>'1015090203','distributor_id'=>'1015090203','password'=>'dk0203','email'=>'example@mail.com7','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1127','distributor_name'=>'CV. SARIPATI BERLIAN ABADI','username'=>'1015090113','distributor_id'=>'1015090113','password'=>'dk0113','email'=>'example@mail.com8','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1128','distributor_name'=>'PT. BINTANG BALIGE JAYA','username'=>'1015111302','distributor_id'=>'1015111302','password'=>'dk1302','email'=>'example@mail.com9','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1129','distributor_name'=>'PT. SINAR HARAPAN ANUGERAH SEJAHTERA','username'=>'1015110901','distributor_id'=>'1015110901','password'=>'dk0901','email'=>'example@mail.com10','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1130','distributor_name'=>'PT. SAMUDRA DISTRA PRIMA','username'=>'1015101902','distributor_id'=>'1015101902','password'=>'dk1902','email'=>'example@mail.com11','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1131','distributor_name'=>'PT. PRIMA RINTIS SEJAHTERA','username'=>'1015112305','distributor_id'=>'1015112305','password'=>'dk2305','email'=>'example@mail.com12','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1132','distributor_name'=>'PT. NIAGA INTER SUKSES','username'=>'1015120901','distributor_id'=>'1015120901','password'=>'dk0901','email'=>'example@mail.com13','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1133','distributor_name'=>'PT. MAJU JAYA','username'=>'2015111301','distributor_id'=>'2015111301','password'=>'dk1301','email'=>'example@mail.com14','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1134','distributor_name'=>'PT. BINTAN INDAH SEJATI','username'=>'1015111601','distributor_id'=>'1015111601','password'=>'dk1601','email'=>'example@mail.com15','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1135','distributor_name'=>'CV. BINTANG LESTARI SEJAHTERA','username'=>'1015081501','distributor_id'=>'1015081501','password'=>'dk1501','email'=>'example@mail.com16','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1136','distributor_name'=>'PT. BERSAMA BERSAUDARA','username'=>'3015101201','distributor_id'=>'3015101201','password'=>'dk1201','email'=>'example@mail.com17','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1137','distributor_name'=>'PT. NIAGA NIRWANA','username'=>'3015102201','distributor_id'=>'3015102201','password'=>'dk2201','email'=>'example@mail.com18','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1138','distributor_name'=>'CV. BUMI MAKMUR PERKASA','username'=>'2016012301','distributor_id'=>'2016012301','password'=>'dk2301','email'=>'example@mail.com19','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1139','distributor_name'=>'VR. SAUDARA (UD. SETIA)','username'=>'2015110603','distributor_id'=>'2015110603','password'=>'dk0603','email'=>'example@mail.com20','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1140','distributor_name'=>'PT. BINTANG MAS PUSAKA','username'=>'2015081301','distributor_id'=>'2015081301','password'=>'dk1301','email'=>'example@mail.com21','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1141','distributor_name'=>'PT. BINTANG SRIWIJAYA','username'=>'2015090401','distributor_id'=>'2015090401','password'=>'dk0401','email'=>'example@mail.com22','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1142','distributor_name'=>'PT. BINTANG SRIWIJAYA','username'=>'2016060301','distributor_id'=>'2016060301','password'=>'dk0301','email'=>'example@mail.com23','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1143','distributor_name'=>'PD. BINTANG MAS','username'=>'2015121901','distributor_id'=>'2015121901','password'=>'dk1901','email'=>'example@mail.com24','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1144','distributor_name'=>'PT. BAHTERA INTI MEGAH','username'=>'1016120602','distributor_id'=>'1016120602','password'=>'dk0602','email'=>'example@mail.com25','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1145','distributor_name'=>'PT. MANDIRI MULTI MEGAH','username'=>'2016022203','distributor_id'=>'2016022203','password'=>'dk2203','email'=>'example@mail.com26','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1146','distributor_name'=>'PT. MANDIRI MULTI MEGAH','username'=>'2015103002','distributor_id'=>'2015103002','password'=>'dk3002','email'=>'example@mail.com27','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1147','distributor_name'=>'CV. KENCANA','username'=>'2015102401','distributor_id'=>'2015102401','password'=>'dk2401','email'=>'example@mail.com28','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1148','distributor_name'=>'PT. SEMATA BERKAT KARUNIA','username'=>'2015112501','distributor_id'=>'2015112501','password'=>'dk2501','email'=>'example@mail.com29','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1149','distributor_name'=>'PT. SEMATA BERKAT KARUNIA','username'=>'2015112001','distributor_id'=>'2015112001','password'=>'dk2001','email'=>'example@mail.com30','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1150','distributor_name'=>'PT. SEMATA BERKAT KARUNIA','username'=>'2015112002','distributor_id'=>'2015112002','password'=>'dk2002','email'=>'example@mail.com31','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1151','distributor_name'=>'PT. ALAM NYIUR NUSAPERMAI','username'=>'2016112101','distributor_id'=>'2016112101','password'=>'dk2101','email'=>'example@mail.com32','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1152','distributor_name'=>'PT. CAHAYA BARU PUTRA','username'=>'4015081313','distributor_id'=>'4015081313','password'=>'dk1313','email'=>'example@mail.com33','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1153','distributor_name'=>'PT. CEMERLANG MAJU SEJAHTERA','username'=>'2015070003','distributor_id'=>'2015070003','password'=>'dk0003','email'=>'example@mail.com34','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1154','distributor_name'=>'PT. KUNCI SUKSES ABADI','username'=>'2017011201','distributor_id'=>'2017011201','password'=>'dk1201','email'=>'example@mail.com35','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1155','distributor_name'=>'PT. ANUGRAH SINERGI RAYA','username'=>'2015092802','distributor_id'=>'2015092802','password'=>'dk2802','email'=>'example@mail.com36','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1156','distributor_name'=>'PT. ALAM NYIUR NUSAPERMAI','username'=>'2016062501','distributor_id'=>'2016062501','password'=>'dk2501','email'=>'example@mail.com37','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1157','distributor_name'=>'PT. CEMERLANG MAJU SEJAHTERA','username'=>'2016072101','distributor_id'=>'2016072101','password'=>'dk2101','email'=>'example@mail.com38','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1158','distributor_name'=>'PT. KARYATAMA MAJU BERJAYA','username'=>'4015070007','distributor_id'=>'4015070007','password'=>'dk0007','email'=>'example@mail.com39','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1159','distributor_name'=>'PT. KARYATAMA MAJU BERJAYA','username'=>'4015070005','distributor_id'=>'4015070005','password'=>'dk0005','email'=>'example@mail.com40','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1160','distributor_name'=>'PT. KARYATAMA MAJU BERJAYA','username'=>'3015070009','distributor_id'=>'3015070009','password'=>'dk0009','email'=>'example@mail.com41','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1161','distributor_name'=>'PT. SENTOSA LESTARI NUSANTARA','username'=>'3016012101','distributor_id'=>'3016012101','password'=>'dk2101','email'=>'example@mail.com42','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1162','distributor_name'=>'PT. FAJAR MAS GEMILANG','username'=>'4015081201','distributor_id'=>'4015081201','password'=>'dk1201','email'=>'example@mail.com43','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1163','distributor_name'=>'PD. SEMAR PERDANA','username'=>'4015081101','distributor_id'=>'4015081101','password'=>'dk1101','email'=>'example@mail.com44','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1164','distributor_name'=>'CV. SETIA JAYA ABADI (BUMIASIH)','username'=>'4015081103','distributor_id'=>'4015081103','password'=>'dk1103','email'=>'example@mail.com45','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1165','distributor_name'=>'PT. NIAGA PERSADA LESTARI','username'=>'3015102302','distributor_id'=>'3015102302','password'=>'dk2302','email'=>'example@mail.com46','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1166','distributor_name'=>'PT. GANA SUMBER ANUGERAH','username'=>'3016112801','distributor_id'=>'3016112801','password'=>'dk2801','email'=>'example@mail.com47','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1167','distributor_name'=>'PD. AS','username'=>'3015101303','distributor_id'=>'3015101303','password'=>'dk1303','email'=>'example@mail.com48','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1168','distributor_name'=>'CV. JUJUR BANGUN BERSAMA','username'=>'3015101903','distributor_id'=>'3015101903','password'=>'dk1903','email'=>'example@mail.com49','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1169','distributor_name'=>'CV. ANDARIA NIAGA','username'=>'3015101601','distributor_id'=>'3015101601','password'=>'dk1601','email'=>'example@mail.com50','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1170','distributor_name'=>'PT. INDO PRIMA SEMESTA','username'=>'4015080404','distributor_id'=>'4015080404','password'=>'dk0404','email'=>'example@mail.com51','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1171','distributor_name'=>'DINAMIS ARTHA SENTOSA','username'=>'4015080507','distributor_id'=>'4015080507','password'=>'dk0507','email'=>'example@mail.com52','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1172','distributor_name'=>'PT. MITRA HANDAL SEJAHTERA','username'=>'4015081401','distributor_id'=>'4015081401','password'=>'dk1401','email'=>'example@mail.com53','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1173','distributor_name'=>'PT. INDO PRIMA SEMESTA','username'=>'4015080607','distributor_id'=>'4015080607','password'=>'dk0607','email'=>'example@mail.com54','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1174','distributor_name'=>'CV. HARAPAN MANDIRI','username'=>'4015080401','distributor_id'=>'4015080401','password'=>'dk0401','email'=>'example@mail.com55','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1175','distributor_name'=>'PT. INDO PRIMA SEMESTA','username'=>'4015080502','distributor_id'=>'4015080502','password'=>'dk0502','email'=>'example@mail.com56','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1176','distributor_name'=>'PT. SUBUR RITELINDO SEJAHTERA','username'=>'4015083001','distributor_id'=>'4015083001','password'=>'dk3001','email'=>'example@mail.com57','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1177','distributor_name'=>'PT. SUBUR RITELINDO SEJAHTERA','username'=>'4015083002','distributor_id'=>'4015083002','password'=>'dk3002','email'=>'example@mail.com58','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1178','distributor_name'=>'CV. TJAKRA PAMUNGKAS NUSANTARA','username'=>'4016110702','distributor_id'=>'4016110702','password'=>'dk0702','email'=>'example@mail.com59','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1179','distributor_name'=>'PT. DUTAMASINDO LABORA JAYA','username'=>'4015081806','distributor_id'=>'4015081806','password'=>'dk1806','email'=>'example@mail.com60','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1180','distributor_name'=>'UD. BUDI SUKSES MANDIRI','username'=>'5016072601','distributor_id'=>'5016072601','password'=>'dk2601','email'=>'example@mail.com61','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1181','distributor_name'=>'UD. BUDI SUKSES MANDIRI','username'=>'5015103001','distributor_id'=>'5015103001','password'=>'dk3001','email'=>'example@mail.com62','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1182','distributor_name'=>'CV. PINTU TIGA ANUGERAH','username'=>'5016092001','distributor_id'=>'5016092001','password'=>'dk2001','email'=>'example@mail.com63','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1183','distributor_name'=>'CV. PINTU TIGA ANUGERAH','username'=>'5015070006','distributor_id'=>'5015070006','password'=>'dk0006','email'=>'example@mail.com64','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1184','distributor_name'=>'UD. MURAH JAYA','username'=>'5015112003','distributor_id'=>'5015112003','password'=>'dk2003','email'=>'example@mail.com65','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1185','distributor_name'=>'CV. ANYAR PUTRA','username'=>'5015122101','distributor_id'=>'5015122101','password'=>'dk2101','email'=>'example@mail.com66','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1186','distributor_name'=>'PT. BANGUN INTAN PRATAMA SEJAHTERA','username'=>'5015100501','distributor_id'=>'5015100501','password'=>'dk0501','email'=>'example@mail.com67','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1187','distributor_name'=>'PT. SENTOSA JAYA PRIMA','username'=>'5015111433','distributor_id'=>'5015111433','password'=>'dk1433','email'=>'example@mail.com68','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1188','distributor_name'=>'TOKO ACENG','username'=>'5015111202','distributor_id'=>'5015111202','password'=>'dk1202','email'=>'example@mail.com69','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1189','distributor_name'=>'PT. KAHAYAN NIAGA UTAMA','username'=>'9015122301','distributor_id'=>'9015122301','password'=>'dk2301','email'=>'example@mail.com70','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1190','distributor_name'=>'PT. SUMBER REJEKI KHARISMA BARU','username'=>'8015090001','distributor_id'=>'8015090001','password'=>'dk0001','email'=>'example@mail.com71','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1191','distributor_name'=>'BUDIANA','username'=>'8015122901','distributor_id'=>'8015122901','password'=>'dk2901','email'=>'example@mail.com72','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1192','distributor_name'=>'SUMBER ALAM','username'=>'9015101302','distributor_id'=>'9015101302','password'=>'dk1302','email'=>'example@mail.com73','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1193','distributor_name'=>'SUMBER ALAM','username'=>'9016020401','distributor_id'=>'9016020401','password'=>'dk0401','email'=>'example@mail.com74','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1194','distributor_name'=>'PT. SINAR SUKSES SEJAHTERA','username'=>'9015112601','distributor_id'=>'9015112601','password'=>'dk2601','email'=>'example@mail.com75','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1195','distributor_name'=>'PULAU BARU MANDIRI','username'=>'9015101103','distributor_id'=>'9015101103','password'=>'dk1103','email'=>'example@mail.com76','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1196','distributor_name'=>'CV. NESIA','username'=>'8017012302','distributor_id'=>'8017012302','password'=>'dk2302','email'=>'example@mail.com77','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1197','distributor_name'=>'CV. NESIA','username'=>'8017012303','distributor_id'=>'8017012303','password'=>'dk2303','email'=>'example@mail.com78','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1198','distributor_name'=>'UD. KOTA MAKMUR','username'=>'9015120501','distributor_id'=>'9015120501','password'=>'dk0501','email'=>'example@mail.com79','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1199','distributor_name'=>'CV. SINAR MAS ABADI','username'=>'9015111702','distributor_id'=>'9015111702','password'=>'dk1702','email'=>'example@mail.com80','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1200','distributor_name'=>'PT. KRIDA MULTINIAGA PRIMA','username'=>'6015090501','distributor_id'=>'6015090501','password'=>'dk0501','email'=>'example@mail.com81','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1201','distributor_name'=>'PT. NAT DISTRIBUSI INDONESIA','username'=>'6016110701','distributor_id'=>'6016110701','password'=>'dk0701','email'=>'example@mail.com82','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1202','distributor_name'=>'PT. DUTA SEMESTA JAYA','username'=>'6015091502','distributor_id'=>'6015091502','password'=>'dk1502','email'=>'example@mail.com83','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1203','distributor_name'=>'CV. MAKMUR ABADI','username'=>'6015080901','distributor_id'=>'6015080901','password'=>'dk0901','email'=>'example@mail.com84','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1204','distributor_name'=>'CV. MAKMUR ABADI','username'=>'6015100503','distributor_id'=>'6015100503','password'=>'dk0503','email'=>'example@mail.com85','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1205','distributor_name'=>'CV. PELITA HATI','username'=>'6015082708','distributor_id'=>'6015082708','password'=>'dk2708','email'=>'example@mail.com86','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1206','distributor_name'=>'CV. TUTON','username'=>'6016080801','distributor_id'=>'6016080801','password'=>'dk0801','email'=>'example@mail.com87','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1207','distributor_name'=>'CV. JUANEVA SUKSES INDONESIA','username'=>'6115082951','distributor_id'=>'6115082951','password'=>'dk2951','email'=>'example@mail.com88','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1208','distributor_name'=>'CV. ANUGRAH ABADI','username'=>'6015091501','distributor_id'=>'6015091501','password'=>'dk1501','email'=>'example@mail.com89','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1209','distributor_name'=>'CV. BESTARI','username'=>'6015083101','distributor_id'=>'6015083101','password'=>'dk3101','email'=>'example@mail.com90','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1210','distributor_name'=>'CV. TRIO HUTAMA','username'=>'6015090102','distributor_id'=>'6015090102','password'=>'dk0102','email'=>'example@mail.com91','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1211','distributor_name'=>'PT. SARI ASIH PUTRA','username'=>'6016011201','distributor_id'=>'6016011201','password'=>'dk1201','email'=>'example@mail.com92','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1212','distributor_name'=>'PT. RUKUN MITRA SEJATI','username'=>'6017012301','distributor_id'=>'6017012301','password'=>'dk2301','email'=>'example@mail.com93','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1213','distributor_name'=>'CV. SINERGI (ERWAN SAMAJIE)','username'=>'6015082690','distributor_id'=>'6015082690','password'=>'dk2690','email'=>'example@mail.com94','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1214','distributor_name'=>'PT. SRI ANEKA PANGAN NUSANTARA','username'=>'6015092803','distributor_id'=>'6015092803','password'=>'dk2803','email'=>'example@mail.com95','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1215','distributor_name'=>'PT. ARVINDA JAYA ABADI','username'=>'7016122801','distributor_id'=>'7016122801','password'=>'dk2801','email'=>'example@mail.com96','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1216','distributor_name'=>'PT. ARVINDA JAYA ABADI','username'=>'7016122802','distributor_id'=>'7016122802','password'=>'dk2802','email'=>'example@mail.com97','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1217','distributor_name'=>'CV. ANUGRAH MADURA RETAILINDO','username'=>'7015112602','distributor_id'=>'7015112602','password'=>'dk2602','email'=>'example@mail.com98','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1218','distributor_name'=>'PT. SUBUR MITRA SUKSES','username'=>'7015112302','distributor_id'=>'7015112302','password'=>'dk2302','email'=>'example@mail.com99','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1219','distributor_name'=>'CV. ANUGRAH MADURA RETAILINDO','username'=>'7016031201','distributor_id'=>'7016031201','password'=>'dk1201','email'=>'example@mail.com100','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1220','distributor_name'=>'CV. KARYA ABADI SEJAHTERA','username'=>'7016101001','distributor_id'=>'7016101001','password'=>'dk1001','email'=>'example@mail.com101','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1221','distributor_name'=>'CV. LANDAHUR','username'=>'7015101102','distributor_id'=>'7015101102','password'=>'dk1102','email'=>'example@mail.com102','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1222','distributor_name'=>'CV. LANDAHUR','username'=>'7015090302','distributor_id'=>'7015090302','password'=>'dk0302','email'=>'example@mail.com103','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1223','distributor_name'=>'PT. HASIL TUNAS CERMELANG','username'=>'7015120702','distributor_id'=>'7015120702','password'=>'dk0702','email'=>'example@mail.com104','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1224','distributor_name'=>'CV. ANEKA KARYA UNGGUL','username'=>'7015110601','distributor_id'=>'7015110601','password'=>'dk0601','email'=>'example@mail.com105','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1225','distributor_name'=>'UD. MAPAN JAYA PERSADA','username'=>'7015102301','distributor_id'=>'7015102301','password'=>'dk2301','email'=>'example@mail.com106','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1226','distributor_name'=>'CV. PANGESTU JAYA ABADI','username'=>'7015111002','distributor_id'=>'7015111002','password'=>'dk1002','email'=>'example@mail.com107','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1227','distributor_name'=>'PT. FAJAR MAKMUR SENTOSA','username'=>'7015091601','distributor_id'=>'7015091601','password'=>'dk1601','email'=>'example@mail.com108','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1228','distributor_name'=>'CV. MICHAEL VINCENT','username'=>'7015111703','distributor_id'=>'7015111703','password'=>'dk1703','email'=>'example@mail.com109','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1229','distributor_name'=>'PT. PANGAN AGRO LESTARI','username'=>'7016102601','distributor_id'=>'7016102601','password'=>'dk2601','email'=>'example@mail.com110','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1230','distributor_name'=>"PT. TRIO'S SUKSES MAKMUR",'username'=>'7015121801','distributor_id'=>'7015121801','password'=>'dk1801','email'=>'example@mail.com111','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1231','distributor_name'=>'PT. HASIL TUNAS CEMERLANG','username'=>'7015111201','distributor_id'=>'7015111201','password'=>'dk1201','email'=>'example@mail.com112','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1232','distributor_name'=>"PT. TRIO'S SUKSES MAKMUR",'username'=>'7015111901','distributor_id'=>'7015111901','password'=>'dk1901','email'=>'example@mail.com113','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1233','distributor_name'=>'PT. BUMI PEMBANGUNAN PERTIWI','username'=>'7015121001','distributor_id'=>'7015121001','password'=>'dk1001','email'=>'example@mail.com114','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1234','distributor_name'=>'PT. ARIZONA KARYA MITRA','username'=>'7016022201','distributor_id'=>'7016022201','password'=>'dk2201','email'=>'example@mail.com115','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1235','distributor_name'=>'PT. ARIZONA KARYA MITRA','username'=>'7016022202','distributor_id'=>'7016022202','password'=>'dk2202','email'=>'example@mail.com116','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1236','distributor_name'=>'PT. ARTA SEDANA','username'=>'7015102901','distributor_id'=>'7015102901','password'=>'dk2901','email'=>'example@mail.com117','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1237','distributor_name'=>'PT. TERUS JAYA ABADI','username'=>'7015112303','distributor_id'=>'7015112303','password'=>'dk2303','email'=>'example@mail.com118','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1238','distributor_name'=>'TERUS JAYA PERKASA','username'=>'7015120801','distributor_id'=>'7015120801','password'=>'dk0801','email'=>'example@mail.com119','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1239','distributor_name'=>'TERUS JAYA TIMUR RAYA','username'=>'7015120701','distributor_id'=>'7015120701','password'=>'dk0701','email'=>'example@mail.com120','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1240','distributor_name'=>'CV. AGUNG RAYA LESTARI','username'=>'7015121802','distributor_id'=>'7015121802','password'=>'dk1802','email'=>'example@mail.com121','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1241','distributor_name'=>'CV. SKS','username'=>'7015112304','distributor_id'=>'7015112304','password'=>'dk2304','email'=>'example@mail.com122','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1242','distributor_name'=>'NAM','username'=>'7015120201','distributor_id'=>'7015120201','password'=>'dk0201','email'=>'example@mail.com123','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1243','distributor_name'=>'UD. WIJAYA HERMAN','username'=>'7015120703','distributor_id'=>'7015120703','password'=>'dk0703','email'=>'example@mail.com124','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1244','distributor_name'=>'PT. INTI SARI PERKASA','username'=>'8015103103','distributor_id'=>'8015103103','password'=>'dk3103','email'=>'example@mail.com125','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1245','distributor_name'=>'UD. MITRA MAKASSAR','username'=>'8015111801','distributor_id'=>'8015111801','password'=>'dk1801','email'=>'example@mail.com126','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1246','distributor_name'=>'UD. MITRA MAKASSAR','username'=>'8015111701','distributor_id'=>'8015111701','password'=>'dk1701','email'=>'example@mail.com127','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1247','distributor_name'=>'TK. JAYA PERKASA','username'=>'8015111001','distributor_id'=>'8015111001','password'=>'dk1001','email'=>'example@mail.com128','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1248','distributor_name'=>'PT. TUNAS MUDA LUWU RAYA','username'=>'8015111402','distributor_id'=>'8015111402','password'=>'dk1402','email'=>'example@mail.com129','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1249','distributor_name'=>'CV. SARURAN RIDHO PRATAMA','username'=>'8015112301','distributor_id'=>'8015112301','password'=>'dk2301','email'=>'example@mail.com130','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1250','distributor_name'=>'PT. MAHAMERU PUTRA HARMONIS','username'=>'8016120601','distributor_id'=>'8016120601','password'=>'dk0601','email'=>'example@mail.com131','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1251','distributor_name'=>'CV. MELAI FRESH','username'=>'8015111401','distributor_id'=>'8015111401','password'=>'dk1401','email'=>'example@mail.com132','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1252','distributor_name'=>'PT. MAHAMERU PUTRA HARMONIS','username'=>'8016101101','distributor_id'=>'8016101101','password'=>'dk1101','email'=>'example@mail.com133','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1253','distributor_name'=>'CV. MELINA UTAMA','username'=>'7015120401','distributor_id'=>'7015120401','password'=>'dk0401','email'=>'example@mail.com134','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1254','distributor_name'=>'CV. CITRA MANDIRI','username'=>'8015103102','distributor_id'=>'8015103102','password'=>'dk3102','email'=>'example@mail.com135','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1255','distributor_name'=>'PT. TOTALINDO BANGGAI PERKASA ','username'=>'8015110602','distributor_id'=>'8015110602','password'=>'dk0602','email'=>'example@mail.com136','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1256','distributor_name'=>'UD. SEHAT INDAH','username'=>'8016022401','distributor_id'=>'8016022401','password'=>'dk2401','email'=>'example@mail.com137','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1257','distributor_name'=>'ANEKA SARI','username'=>'8016092101','distributor_id'=>'8016092101','password'=>'dk2101','email'=>'example@mail.com138','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1258','distributor_name'=>'CV. MUTI INDOFOOD','username'=>'1015081701','distributor_id'=>'1015081701','password'=>'dk1701','email'=>'example@mail.com139','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1259','distributor_name'=>'PT. VICTORY','username'=>'1115113001','distributor_id'=>'1115113001','password'=>'dk3001','email'=>'example@mail.com140','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1260','distributor_name'=>'CV. BINTANG LESTARI SEJAHTERA','username'=>'1015082101','distributor_id'=>'1015082101','password'=>'dk2101','email'=>'example@mail.com141','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1261','distributor_name'=>'PT. BINTANG SRIWIJAYA','username'=>'2115090801','distributor_id'=>'2115090801','password'=>'dk0801','email'=>'example@mail.com142','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1262','distributor_name'=>'PT. MULTI GLOBAL MITRA','username'=>'2116022204','distributor_id'=>'2116022204','password'=>'dk2204','email'=>'example@mail.com143','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1263','distributor_name'=>'PT. CATUR SENTOSA ANUGERAH','username'=>'2015070103','distributor_id'=>'2015070103','password'=>'dk0103','email'=>'example@mail.com144','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1264','distributor_name'=>'PT. KARYATAMA MAJU BERJAYA','username'=>'4015070008','distributor_id'=>'4015070008','password'=>'dk0008','email'=>'example@mail.com145','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1265','distributor_name'=>'PT. KARYATAMA MAJU BERJAYA','username'=>'4015070006','distributor_id'=>'4015070006','password'=>'dk0006','email'=>'example@mail.com146','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1266','distributor_name'=>'PT. KARYATAMA MAJU BERJAYA','username'=>'4015060004','distributor_id'=>'4015060004','password'=>'dk0004','email'=>'example@mail.com147','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1267','distributor_name'=>'PT. NIAGA PERSADA LESTARI','username'=>'3116040801','distributor_id'=>'3116040801','password'=>'dk0801','email'=>'example@mail.com148','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1268','distributor_name'=>'PT. PINTU TIGA RAHARJA','username'=>'5115112801','distributor_id'=>'5115112801','password'=>'dk2801','email'=>'example@mail.com149','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1269','distributor_name'=>'PT. PAMER','username'=>'5315090502','distributor_id'=>'5315090502','password'=>'dk0502','email'=>'example@mail.com150','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1270','distributor_name'=>'CV. MULIA JAYA','username'=>'4115070001','distributor_id'=>'4115070001','password'=>'dk0001','email'=>'example@mail.com151','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1271','distributor_name'=>'PT. PING LOKA DISTRINIAGA','username'=>'6115082211','distributor_id'=>'6115082211','password'=>'dk2211','email'=>'example@mail.com152','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1272','distributor_name'=>'PT. TRIDAYA SUMBER REJEKI','username'=>'6115082661','distributor_id'=>'6115082661','password'=>'dk2661','email'=>'example@mail.com153','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1273','distributor_name'=>'CV. CAHAYA MAKMUR ABADI ','username'=>'6115101602','distributor_id'=>'6115101602','password'=>'dk1602','email'=>'example@mail.com154','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1274','distributor_name'=>'CV. TIARA MAS','username'=>'6115082404','distributor_id'=>'6115082404','password'=>'dk2404','email'=>'example@mail.com155','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1275','distributor_name'=>'BAHTERA INTRA NIAGA','username'=>'7116122201','distributor_id'=>'7116122201','password'=>'dk2201','email'=>'example@mail.com156','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1276','distributor_name'=>'PT. GIEB Indonesia','username'=>'7115091901','distributor_id'=>'7115091901','password'=>'dk1901','email'=>'example@mail.com157','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1277','distributor_name'=>'UD. SUMBER ALAM','username'=>'9115101301','distributor_id'=>'9115101301','password'=>'dk1301','email'=>'example@mail.com158','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1278','distributor_name'=>'PT. PURANA PARASINDO','username'=>'9115101501','distributor_id'=>'9115101501','password'=>'dk1501','email'=>'example@mail.com159','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1279','distributor_name'=>'PT. PURANA PARASINDO','username'=>'9115101901','distributor_id'=>'9115101901','password'=>'dk1901','email'=>'example@mail.com160','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1280','distributor_name'=>'CV. SUMBER AGUNG','username'=>'8115102801','distributor_id'=>'8115102801','password'=>'dk2801','email'=>'example@mail.com161','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1291','distributor_name'=>'new trial','username'=>'1702120001','distributor_id'=>'1702120001','password'=>'dk0001','email'=>'example@mail.com162','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1292','distributor_name'=>'New trial titik dan distributor 14 feb updates','username'=>'9876678998','distributor_id'=>'9876678998','password'=>'dk8998','email'=>'example@mail.com163','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1293','distributor_name'=>'Test','username'=>'9999999999','distributor_id'=>'9999999999','password'=>'dk9999','email'=>'example@mail.com164','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1296','distributor_name'=>'PT. PERMATA SURYA BAHARI','username'=>'1017020701','distributor_id'=>'1017020701','password'=>'dk0701','email'=>'example@mail.com165','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1297','distributor_name'=>'PT. SAMUDRA DISTRA PRIMA','username'=>'1017030601','distributor_id'=>'1017030601','password'=>'dk0601','email'=>'example@mail.com166','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1298','distributor_name'=>'UD. SINAR SURYA UTAMA','username'=>'7017022701','distributor_id'=>'7017022701','password'=>'dk2701','email'=>'example@mail.com167','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1299','distributor_name'=>'UD. SINAR SURYA UTAMA','username'=>'7017030901','distributor_id'=>'7017030901','password'=>'dk0901','email'=>'example@mail.com168','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1300','distributor_name'=>'CV. CAHAYA ABADI','username'=>'6017030401','distributor_id'=>'6017030401','password'=>'dk0401','email'=>'example@mail.com169','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1303','distributor_name'=>'PT. HOKKIAN ANUGERAH KARYA ABADI','username'=>'8017032701','distributor_id'=>'8017032701','password'=>'dk2701','email'=>'example@mail.com170','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1304','distributor_name'=>'CV. NESIA','username'=>'8017040501','distributor_id'=>'8017040501','password'=>'dk0501','email'=>'example@mail.com171','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1305','distributor_name'=>'Distrib Demo','username'=>'1029384756','distributor_id'=>'1029384756','password'=>'dk4756','email'=>'example@mail.com172','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1306','distributor_name'=>'ALAM NYIUR NUSAPERMAI','username'=>'2017031301','distributor_id'=>'2017031301','password'=>'dk1301','email'=>'example@mail.com173','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1307','distributor_name'=>'Demo Medan + Titik Demo','username'=>'1111111119','distributor_id'=>'1111111119','password'=>'dk1119','email'=>'example@mail.com174','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1309','distributor_name'=>'UD. ERISSA BAROKAH','username'=>'2017041101','distributor_id'=>'2017041101','password'=>'dk1101','email'=>'example@mail.com175','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1310','distributor_name'=>'CV. MAJU MAKMUR','username'=>'9017040301','distributor_id'=>'9017040301','password'=>'dk0301','email'=>'example@mail.com176','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1311','distributor_name'=>'CV. Angkasa Leather','username'=>'7017051801','distributor_id'=>'7017051801','password'=>'dk1801','email'=>'example@mail.com177','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1312','distributor_name'=>'PT. Mandiri ABadi Jaya Utomo ','username'=>'2017052901','distributor_id'=>'2017052901','password'=>'dk2901','email'=>'example@mail.com178','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1313','distributor_name'=>'CV. Sinar Setia Makmur','username'=>'2017060801','distributor_id'=>'2017060801','password'=>'dk0801','email'=>'example@mail.com179','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1314','distributor_name'=>'PT.SONTA MULIA ABADI','username'=>'8017060501','distributor_id'=>'8017060501','password'=>'dk0501','email'=>'example@mail.com180','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1315','distributor_name'=>'PT. SURYA PANGAN SEJAHTERA','username'=>'4017061901','distributor_id'=>'4017061901','password'=>'dk1901','email'=>'example@mail.com181','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1316','distributor_name'=>'PT. ARVINDA JAYA ABADI','username'=>'7017070301','distributor_id'=>'7017070301','password'=>'dk0301','email'=>'example@mail.com182','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1317','distributor_name'=>'CV. SINAR MAS SEJAHTERA','username'=>'2017071701','distributor_id'=>'2017071701','password'=>'dk1701','email'=>'example@mail.com183','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1318','distributor_name'=>'CV. CAHAYA ABADI','username'=>'6017081501','distributor_id'=>'6017081501','password'=>'dk1501','email'=>'example@mail.com184','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1319','distributor_name'=>'PT. BINTANG MUTIARA CEMERLANG','username'=>'1017082101','distributor_id'=>'1017082101','password'=>'dk2101','email'=>'example@mail.com185','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1320','distributor_name'=>'PT. JEFFRINDO EKAPUTRA','username'=>'8017081401','distributor_id'=>'8017081401','password'=>'dk1401','email'=>'example@mail.com186','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1321','distributor_name'=>'PT. VARIA INDAH PARAMITA','username'=>'8017082801','distributor_id'=>'8017082801','password'=>'dk2801','email'=>'example@mail.com187','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1322','distributor_name'=>'PT. FARMA NIAGA DISTRIBUSINDO','username'=>'7017090403','distributor_id'=>'7017090403','password'=>'dk0403','email'=>'example@mail.com188','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1323','distributor_name'=>'PT. FARMA NIAGA DISTRIBUSINDO','username'=>'7017090401','distributor_id'=>'7017090401','password'=>'dk0401','email'=>'example@mail.com189','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1324','distributor_name'=>'PT. FARMA NIAGA DITRIBUSINDO','username'=>'7017090402','distributor_id'=>'7017090402','password'=>'dk0402','email'=>'example@mail.com190','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1325','distributor_name'=>'CV. SINAR BANGUN PERSADA','username'=>'6017091101','distributor_id'=>'6017091101','password'=>'dk1101','email'=>'example@mail.com191','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1326','distributor_name'=>'CV. MANDIRI JAYA','username'=>'5017091801','distributor_id'=>'5017091801','password'=>'dk1801','email'=>'example@mail.com192','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1327','distributor_name'=>'CV. MEGAH PRIMA','username'=>'8017091601','distributor_id'=>'8017091601','password'=>'dk1601','email'=>'example@mail.com193','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1330','distributor_name'=>'Anugrah Jaya','username'=>'7017092201','distributor_id'=>'7017092201','password'=>'dk2201','email'=>'example@mail.com194','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],
                ['id'=>'1331','distributor_name'=>'CV. SINAR BANGUN PERSADA','username'=>'6017100501','distributor_id'=>'6017100501','password'=>'dk0501','email'=>'example@mail.com195','auth_key'=>Yii::$app->security->generateRandomString(),'created_at'=>date('Y-m-d'),'status'=>'10'],

            ];
            foreach ($distributor as $key) {
                $model = new Distributor();
                $model->id = $key['id'];
                $model->distributor_name = $key['distributor_name'];
                $model->username = $key['username'];
                $model->distributor_id = $key['distributor_id'];
                $model->titik_id = $key['titik_id'];
                $model->auth_key = $key['auth_key'];
                $model->password_hash = Yii::$app->security->generatePasswordHash($key['password']);
                $model->email = $key['email'];
                $model->created_at = $key['created_at'];
                $model->save();
            }
    }
    public function actionCreate()
    {
        // if(Yii::$app->user->can('create-distributor')){
            $model = new Distributor();

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
                    echo 'success';
                }else{
                    echo 0;
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
