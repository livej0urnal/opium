<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\base\Controller;
use app\controllers\AppController;
use app\models\Category;
use app\models\Articles;
use app\models\About;
use app\models\Comments;
use app\models\CommentsForm;

class SiteController extends AppController
{
    /**
     * {@inheritdoc}
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
     * {@inheritdoc}
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
        $id = Yii::$app->request->get('id');
        $category = Category::find()->all();
        $articles = Articles::find()->all();
        $popular = Articles::find()->where(['popular' => '1'])->limit(4)->all();
        $about = About::find()->where('id' === 1)->all();
        $this->setMeta('Opium - Personal Blog');
        return $this->render('index' , compact('category' , 'articles' , 'about' , 'popular'));
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

        $model->password = '';
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

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionCategory()
    {
        $id = Yii::$app->request->get('id');
        $category = Category::findOne($id);
        $this->setMeta($category->seotitle .' | Opium - Personal Blog' , '' , $category->seodescription);
        return $this->render('category' , compact('category'));
    }

    public function actionSingle()
    {
        $id = Yii::$app->request->get('id');
        $article = Articles::findOne($id);
        $comments = Comments::find()->where(['articleid' => $id])->all();
        $about = About::find()->where(['id' => '1'])->all();
        $popular = Articles::find()->where(['popular' => '1'])->limit(4)->all();

        $model = new CommentsForm();
        $model->articleid = $article->id;
        $model->name = stripcslashes($model->name);
        $model->name = strip_tags($model->name);
        $model->subject = stripcslashes($model->subject);
        $model->subject = strip_tags($model->subject);

        if($model->load(Yii::$app->request->post()))
        {
            if($model->save()){
                Yii::$app->session->setFlash('success' , 'Done');
                return $this->refresh();
            }
            else{
                Yii::$app->session->setFlash('error' , 'Error');
                return $this->refresh();
            }
        }

        $this->setMeta($article->seotitle, '' , $article->seodescription);
        return $this->render('single' , compact('article' , 'about' , 'popular' , 'comments' , 'model'));
    }
}
