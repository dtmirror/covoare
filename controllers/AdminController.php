<?php

/**
 * @copyright (c) 2014, Armand Niculescu <armand.niculescu@gmail.com>
 */

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\UploadedFile;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\DespreForm;
use app\models\Imagine;
use app\models\ImagineForm;
use app\models\Testimonial;
use app\models\Util;

class AdminController extends Controller
{

    public $layout = 'admin';

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
        return $this->redirect('admin/login');
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->redirect('/admin/about');
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect('/admin/about');
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

    public function actionAbout()
    {
        $model = new DespreForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($post = $model->add()) {
                Yii::$app->getSession()->setFlash('success', \Yii::t('app','Salvare cu success!'));
                return $this->redirect('/admin/about');
            }
        }

        $galerie_poze = new ImagineForm();
        if ($galerie_poze->load(Yii::$app->request->post())) {
            $file = UploadedFile::getInstance($galerie_poze, 'poza_name');
            $galerie_poze->poza_name = $file;
            if ($post = $galerie_poze->add()) {
                if ($file) {
                    $file->saveAs('images/galerie_poze/' . $post->poza_data . "_" . Util::formatFileName($file->name));
                    return $this->redirect('/admin/about');
                }
            }
        }

        $poze = Imagine::find()->all();
        return $this->render('about', [
            'model' => $model,
            'galerie_poze' => $galerie_poze,
            'poze' => $poze
        ]);
    }

    public function actionDeleteImg()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : "";

        if ($poza = Imagine::findOne(['poza_id' => $id]))
        {
            unlink("images/galerie_poze/" . $poza->poza_name);
            $poza->delete();
            Yii::$app->getSession()->setFlash('success', \Yii::t('app','Salvare cu success!'));
        }

        return $this->redirect('/admin/about');
    }
}
