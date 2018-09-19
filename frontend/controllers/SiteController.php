<?php

namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use common\models\Slider;
use common\models\About;
use common\models\MetaTags;

/**
 * Site controller
 */
class SiteController extends Controller {

    public function beforeAction($action) {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup', 'contact-enquiry'],
                'rules' => [
                    [
                        'actions' => ['signup', 'contact-enquiry'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout', 'contact-enquiry'],
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
    public function actions() {
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
     * @return mixed
     */
    public function actionIndex() {
        $sliders = Slider::find()->where(['status' => 1])->all();
        $clients = \common\models\OurClient::find()->where(['status' => 1])->all();
        $services = \common\models\Services::find()->where(['status' => 1])->limit(6)->all();
        $testimonials = \common\models\Testimonial::find()->where(['status' => 1])->orderBy(['DOU' => SORT_DESC])->limit(2)->all();
        $meta_tags = MetaTags::find()->where(['id' => 1])->one();
        $common_contents = \common\models\CommonContents::find()->where(['id' => 1])->one();
        \Yii::$app->view->registerMetaTag(['name' => 'keywords', 'content' => $meta_tags->meta_keyword]);
        \Yii::$app->view->registerMetaTag(['name' => 'description', 'content' => $meta_tags->meta_description]);
        return $this->render('index', [
                    'sliders' => $sliders,
                    'testimonials' => $testimonials,
                    'meta_tags' => $meta_tags,
                    'common_contents' => $common_contents,
                    'services' => $services,
                    'clients' => $clients,
        ]);
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin() {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout() {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact() {
        $services = \common\models\Services::find()->where(['status' => 1])->all();
        $contact_info = \common\models\ContactInfo::find()->one();
        $meta_tags = MetaTags::find()->where(['id' => 3])->one();
        \Yii::$app->view->registerMetaTag(['name' => 'keywords', 'content' => $meta_tags->meta_keyword]);
        \Yii::$app->view->registerMetaTag(['name' => 'description', 'content' => $meta_tags->meta_description]);
        return $this->render('contact', [
                    'contact_info' => $contact_info,
                    'meta_tags' => $meta_tags,
                    'services' => $services,
        ]);
    }

    /*
     * Contact Enguery mail function
     */

    public function sendContactMail($model) {
        $to = "info@siauae.com";

        $subject = "Contact Request";

        $message = "
<html>
<head>

</head>
<body>
<table>

<tr>

<th>Name</th>
<th>:-</th>
<td>" . $model->name . "</td>
         </tr>
<tr>

<th>Email</th>
<th>:-</th>
<td>" . $model->email . "</td>
         </tr>

<tr>


<th>Phone No</th>
<th>:-</th>
<td>" . $model->phone . "</td>
         </tr>
         <tr>


<th>Service</th>
<th>:-</th>
<td>" . $model->service . "</td>
         </tr>

<tr>

<th>Message</th>
<th>:-</th>
<td>" . $model->message . "</td>
         </tr>

</table>
</body>
</html>
";

// Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
        $headers .= 'From: <info@siauae.com>' . "\r\n";

        mail($to, $subject, $message, $headers);
        return TRUE;
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout() {
        $about_content = About::find()->where(['status' => 1])->one();
        $clients = \common\models\OurClient::find()->where(['status' => 1])->all();
        $meta_tags = MetaTags::find()->where(['id' => 2])->one();
        \Yii::$app->view->registerMetaTag(['name' => 'keywords', 'content' => $meta_tags->meta_keyword]);
        \Yii::$app->view->registerMetaTag(['name' => 'description', 'content' => $meta_tags->meta_description]);
        return $this->render('about', [
                    'about_content' => $about_content,
                    'meta_tags' => $meta_tags,
                    'clients' => $clients,
        ]);
    }

    /**
     * Displays GeneralTrading page.
     *
     * @return mixed
     */
    public function actionServices() {
        $service_contents = \common\models\Services::find()->where(['status' => 1])->all();
        $meta_tags = MetaTags::find()->where(['id' => 5])->one();
        \Yii::$app->view->registerMetaTag(['name' => 'keywords', 'content' => $meta_tags->meta_keyword]);
        \Yii::$app->view->registerMetaTag(['name' => 'description', 'content' => $meta_tags->meta_description]);
        return $this->render('services', [
                    'service_contents' => $service_contents,
                    'meta_tags' => $meta_tags,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionCareers() {
        $career_content = \common\models\Careers::find()->where(['status' => 1])->all();
        $meta_tags = MetaTags::find()->where(['id' => 6])->one();
        \Yii::$app->view->registerMetaTag(['name' => 'keywords', 'content' => $meta_tags->meta_keyword]);
        \Yii::$app->view->registerMetaTag(['name' => 'description', 'content' => $meta_tags->meta_description]);
        return $this->render('careers', [
                    'career_content' => $career_content,
                    'meta_tags' => $meta_tags,
        ]);
    }

    public function actionServiceDetails($service = NULL) {
        $service_details = \common\models\Services::find()->where(['canonical_name' => $service])->one();
        \Yii::$app->view->registerMetaTag(['name' => 'keywords', 'content' => $service_details->meta_keyword]);
        \Yii::$app->view->registerMetaTag(['name' => 'description', 'content' => $service_details->meta_description]);
        return $this->render('service-details', [
                    'service_details' => $service_details,
        ]);
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup() {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
                    'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset() {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
                    'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token) {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
                    'model' => $model,
        ]);
    }

    public function actionContactEnquiry() {
        if (Yii::$app->request->isAjax) {
            $model = new \common\models\ContactForm();
            $model->name = $_POST['name'];
            $model->email = $_POST['email'];
            $model->phone = $_POST['phone'];
            $model->service = $_POST['service'];
            $model->message = $_POST['message'];
            $model->date = date('Y-m-d');
            if ($model->save()) {
                $this->sendContactMail($model);
                echo 1;
                exit;
            } else {
                echo 0;
                exit;
            }
        }
    }

}
