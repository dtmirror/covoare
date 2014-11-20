<?php

/**
 * @copyright (c) 2014, Armand Niculescu <armand.niculescu@gmail.com>
 */

namespace app\controllers;

use Yii;
use yii\base\Model;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Despre;
use app\models\Imagine;
use app\models\Oferta;
use app\models\Partener;
use app\models\Testimonial;

class SiteController extends Controller
{
    public $layout = 'template_01';

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

    public function actionIndex()
    {
        $this->layout = 'homepage';
        $parteneri = Partener::find()->all();
        return $this->render('index', [
            'parteneri' => $parteneri
        ]);
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    public function actionDespreNoi()
    {
        $despre_text = Despre::find()->one();
        $galerie_poze = Imagine::find()->all();
        return $this->render('despre_noi', [
            'despre_text' => $despre_text,
            'galerie_poze' => $galerie_poze
        ]);
    }

    public function actionDespreSpalare()
    {
        $despre_text = Despre::find()->one();
        $galerie_poze = Imagine::find()->all();
        return $this->render('despre_spalare', [
            'despre_text' => $despre_text,
            'galerie_poze' => $galerie_poze
        ]);
    }

    public function actionClienti()
    {
        $testimoniale = Testimonial::findAll([
            'testimonial_status' => Testimonial::STATUS_ACTIVE
        ]);

        return $this->render('clienti', [
            'testimoniale' => $testimoniale
        ]);
    }

    public function actionOferte()
    {
        $oferte = Oferta::findAll([
            'oferta_status' => Oferta::STATUS_ACTIVE
        ]);
        return $this->render('oferte', [
            'oferte' => $oferte,
        ]);
    }
}
