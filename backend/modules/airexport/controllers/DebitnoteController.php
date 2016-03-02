<?php

namespace backend\modules\airexport\controllers;

use Yii;
use backend\modules\airexport\models\Debitnote;
use backend\modules\airexport\models\DebitnoteSearch;
use backend\modules\airexport\models\Debitnotedet;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use yii\filters\AccessControl;

use mPDF;

/**
 * DebitnoteController implements the CRUD actions for Debitnote model.
 */
class DebitnoteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['create','update','delete'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['create','update','delete'],
                        'roles' => ['admin'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Debitnote models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DebitnoteSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination->pageSize=10;

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Debitnote model.
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
     * Creates a new Debitnote model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Debitnote();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->debitnote_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Debitnote model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ( $model->load(Yii::$app->request->post()) ) {

            $model->update_by   = Yii::$app->user->identity->id;
            $model->update_date = date('Y-m-d');
            if( $model->save() )
                return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Debitnote model.
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
     * Finds the Debitnote model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Debitnote the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Debitnote::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionDebitnoteview($id)
    {
        $this->layout = 'blankpage';

        $model      = $this->findModel($id);
        $modeldet   = Debitnotedet::findAll(['debitnote_id' => $id]);

        $terbilang = $this->convert($model->tot_amount);

        //echo $terbilang;die;

        $mpdf = new mPDF;
        $mpdf->WriteHTML(
                            $this->renderPartial('debitnotepdfview', ['model' => $model, 'modeldet' => $modeldet, 'terbilang' => $terbilang])
                        );
        $mpdf->Output();
        exit;    
    }

    //for 1 - 19
    private function OneDigit($number){
        $one_digit=array('0'=>'zero','1'=>'one','2'=>'two','3'=>"three",
    '4'=>"four",'5'=>"five",'6'=>'six','7'=>'seven',
        '8'=>'eight','9'=>'nine','10'=>'ten','11'=>'eleven',"12"=>'twelve',
    '13'=>'thirteen','14'=>'fourteen',
        '15'=>'fifteen','16'=>'sixteen','17'=>'seventeen','18'=>'eighteen',
    '19'=>'nineteen','-'=>'minus');
    return $one_digit[$number]; 
    }

    private function TenDigit($number){
        $ten_digit = array('2'=>'twenty','3'=>'thirty','4'=>'forty','5'=>'fifty','6'=>'sixty','7'=>'seventy','8'=>'eighty',
                            '9'=>'ninty');
        if(isset($ten_digit[$number])){
            return $ten_digit[$number];
        }else{
            return $ten_digit;
        }

    }

    private function NumberLong($number){
        $number = strlen($number);
        $numberlong=array('3'=>'hundred','4'=>'thousand','5'=>'thousand',
    '6'=>'thousand','7'=>'million',
        '8'=>'million','9'=>'million','10'=>'billion','11'=>'billion',
    '12'=>'billion','13'=>'trillion','14'=>'trillion','15'=>'trillion');
    return $numberlong[$number];    
    }

    private function EraseChar($number) {
        $remove = array("'", "+", "*", "(", ")", " ", "%", ",");
        $number = str_replace($remove, "", $number);
    return $number;
    }

    private function is_number($element) {
      return preg_match ("/[^0-9]/", $element);
    }

    private function str_rsplit($str, $sz)
    {
        if ( !$sz ) { return false; }
        if ( $sz > 0 ) { return str_split($str,$sz); }   
        $l = strlen($str);
        $sz = min(-$sz,$l);
        $mod = $l % $sz;
        if ( !$mod ) { return str_split($str,$sz); }    

        return array_merge(array(substr($str,0,$mod)), str_split(substr($str,$mod),$sz));
    }

    private function TwoDigit($number) {
        $number = intval($number);
        $count1 = substr($number, -2, 1);
        $count2 = substr($number, -1, 1);
        $counter1 = $this->TenDigit($count1);
        $counter2 = $this->OneDigit($count2);
            if(($number>=0) && ($number<=19)) {
                $number = $this->OneDigit($number);
            } else {
                if ($count2 == 0) {
                    $number = $counter1;
                } else {
                    $number = $counter1."-".$counter2;
                }
            }
        return $number;
    } 

    private function ThreeDigit($number) {
        $count1 = substr($number, -3, 1);
        $count2 = substr($number, -2, 2);
        $counter1 = $this->OneDigit($count1);
        $counter2 = $this->TwoDigit($count2);
            if ($count2 == 0) {
                $number = $counter1." hundred";
            } else if ($count1 == 0) {
                $number = $this->TwoDigit($number);;
            } else {
                $number = $counter1." hundred ".$counter2;
            }
        return $number;
    } 

    private function ThousandDigit($number) {
        $NumberLong = NumberLong($number);
        $splitnumb = str_rsplit($number,-3);
            $ribuan = $splitnumb[0];
            $ratusan = $splitnumb[1];
            $nratusan = ThreeDigit($ratusan);
            $nribuan = NumberSplit($ribuan);
            if ($ratusan!=0) {
                $and = " and ";
            }
            if ($ribuan==0) {
                $number = $nratusan;
            } else {
                $number = $nribuan." ".$NumberLong.$and.$nratusan;
            }
    return $number;
    }

    private function MillionDigit($number) {
        $NumberLong = NumberLong($number);
        $splitnumb = str_rsplit($number,-3);
        $jutaan = $splitnumb[0];
        $ribuan = $splitnumb[1];
        $ratusan = $splitnumb[2];
        
        $ribuan = $splitnumb[1].$splitnumb[2];
        $nribuan = ThousandDigit($ribuan);
        $njutaan = NumberSplit($jutaan);
        if ($ribuan!=0) {
                $and = " and ";
            }
        if ($jutaan==0) {
            $number = $nribuan;
        } else {
            $number = $njutaan." ".$NumberLong.$and.$nribuan;
        }
    return $number;
    }

    private function BillionDigit($number) {
        $NumberLong = NumberLong($number);
        $splitnumb = str_rsplit($number,-3);
        $milyaran = $splitnumb[0];
        $jutaan = $splitnumb[1];
        $ribuan = $splitnumb[2];
        $ratusan = $splitnumb[3];
        
        $jutaan = $splitnumb[1].$splitnumb[2].$splitnumb[3];
        $njutaan = MillionDigit($jutaan);
        $nmilyaran = NumberSplit($milyaran);
        if ($jutaan!=0) {
                $and = " and ";
            }
        if($milyaran==0) {
            $number = $njutaan;
        } else {
            $number = $nmilyaran." ".$NumberLong.$and.$njutaan;
        }
    return $number;
    }

    private function TrillionDigit($number) {
        $NumberLong = NumberLong($number);
        $splitnumb = str_rsplit($number,-3);
        $triliunan = $splitnumb[0];
        $milyaran = $splitnumb[1];
        $jutaan = $splitnumb[2];
        $ribuan = $splitnumb[3];
        $ratusan = $splitnumb[4];
        
        $milyaran = $splitnumb[1].$splitnumb[2].$splitnumb[3].$splitnumb[4];
        $nmilyaran = BillionDigit($milyaran);
        $ntriliunan = NumberSplit($triliunan);
        if ($milyaran!=0) {
                $and = " and ";
            }
        if($triliunan==0) {
            $number = $nmilyaran;
        } else {
            $number = $ntriliunan." ".$NumberLong.$and.$nmilyaran;
        }
    return $number;
    }

    private function NumberSplit($number){
        $number = $this->EraseChar($number);
        if (($number >= 0) && ($number < 100)) {
            $number = $this->TwoDigit($number);
        } else if (($number >= 100) && ($number < 1000)) {
            $number = $this->ThreeDigit($number);
        } else if (($number >= 1000) && ($number < 1000000)) {
            $number = $this->ThousandDigit($number);
        } else if (($number >= 1000000) && ($number < 1000000000)) {
            $number = $this->MillionDigit($number);
        } else if (($number >= 1000000000) && ($number < 1000000000000)) {
            $number = $this->BillionDigit($number);
        } else if (($number >= 1000000000000) && ($number < 1000000000000000)) {
            $number = $this->TrillionDigit($number);
        } else {
            $number = "Not Valid";
        }
    return strtoupper($number);
    }

    private function convert($number) {
        $arraye = explode(".",$number);
        $dollar = $this->NumberSplit($arraye[0]);
        $cent = $this->NumberSplit($arraye[1]);
        
        $cekcent = $arraye[1];
            if ($cekcent==0) {
                $number = $dollar." DOLLARS ";
            } else {
                $cent = " AND ".$cent." CENTS";
                $number = $dollar." DOLLARS ".$cent;
            }
    return $number;
    }
}
