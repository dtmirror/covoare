<?php

/**
 * @copyright (c) 2014, Armand Niculescu <armand.niculescu@gmail.com>
 */

namespace app\controllers;

use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\Testimonial;
use app\models\TestimonialForm;

class TestimonialController extends Controller
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
        $dataProvider = new ActiveDataProvider([
            'query' => Testimonial::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionAdd()
    {
        $model = new TestimonialForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($post = $model->add()) {
                Yii::$app->getSession()->setFlash('success', \Yii::t('app','Salvare cu success!'));
                return $this->redirect('/admin/clienti');
            }
        }
        return $this->render('clients', [
            'model' => $model
        ]);
    }

    public function actionEdit()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : "";

        if ($testimonial = Testimonial::findOne(['testimonial_id' => $id]))
        {
            $model = new TestimonialForm();
            if ($model->load(Yii::$app->request->post())) {
                if ($post = $model->update($testimonial)) {
                    Yii::$app->getSession()->setFlash('success', \Yii::t('app','Salvare cu success!'));
                    return $this->redirect('/testimonial');
                }
            }
            return $this->render('edit_testimonial', [
                'model' => $model,
                'testimonial' => $testimonial,
            ]);
        }
        return $this->redirect('[/testimonial]');
    }
}
