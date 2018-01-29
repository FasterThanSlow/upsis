<?php

namespace app\controllers;
use app\models\Regions;
use app\models\Localities;
use app\models\Districts;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $regions = Regions::find()->all();
        $regionsArray = [];
        foreach($regions as $region){
            $regionsArray[$region->id ] = $region->name;
        }
        
        
        return $this->render('index',['regions' => $regionsArray]);
    }

    public function actionRegions($id){
        $districts = Districts::find()->where(['regions_id'=>$id])->all();
        $districtsArray = [];
        
        foreach($districts as $district){
            $districtsArray[$district->id ] = $district->name;
        }
        
        $region = Regions::findOne($id);
        return $this->render('region',['districts' => $districtsArray, 'name' => $region->name]);
    }
    
    public function actionDistricts($id){
        $localities = Localities::find()->where(['districts_id'=>$id])->all();
        $localitiesArray = [];
        
        foreach($localities as $locality){
            $localitiesArray[$locality->id ] = $locality->name;
        }
        
        $district = Districts::findOne($id);
        return $this->render('district',['localities' => $localitiesArray, 'name' => $district->name]);
    }
    
    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
