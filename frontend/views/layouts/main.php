<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use frontend\assets\AppAsset;

AppAsset::register($this);
$common_contents = common\models\CommonContents::find()->where(['id' => 1])->one();
$services = common\models\Services::find()->where(['status' => 1])->all();
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>

        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
        <link rel="shortcut icon" href="<?= yii::$app->homeUrl ?>images/favicon.png">

        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
        <meta name="google-site-verification" content="U7CmROAcEIog8PWQ4kyGFKoAl_7hQB-WUGu--wvZHew" />
    </head>
    <body>
        <?php $this->beginBody() ?>
        <?php $action = Yii::$app->controller->id . '/' . Yii::$app->controller->action->id; // controller action id    ?>
        <div class="header" id="myHeader">
            <div id="header-full">
                <div id="top-header" class="top-header">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-3 col-3 logo-div">
                                <a class="navbar-brand" href="index.php"><img src="<?= yii::$app->homeUrl ?>images/logo.png" alt="Sia logo" class="img-fluid"/></a>
                            </div>
                            <div class="col-xl-9 col-lg-9 col-md-8 col-sm-9 col-9 navigation-div">
                                <div class="row">
                                    <div class="col-12 head-contact">
                                        <ul>
                                            <li>
                                            <icon><img class="img-fluid" src="<?= yii::$app->homeUrl ?>images/icons/email-on-air.png"/></icon>
                                            <div class="contact-info">
                                                <span>You can mail us</span>
                                                <h5 class="info"><?= $common_contents->email ?></h5>
                                            </div>
                                            </li>
                                            <li>
                                            <icon><img class="img-fluid" style="margin-top: 5px;" src="<?= yii::$app->homeUrl ?>images/icons/phone.png"/></icon>
                                            <div class="contact-info">
                                                <span>We are open 8am - 5pm</span>
                                                <a href="tel:+971502302023" class="info"><?= $common_contents->phone ?></a>
                                            </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-12 pad0 btop">
                                        <nav class="navbar navbar-expand-lg navbar-light">
                                                            <!--<a class="navbar-brand" href="index.php"><img src="images/logo.png" alt="Al-Hajis-Perfumes logo" class="img-responsive"/></a>-->
                                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                                <span class="navbar-toggler-icon"></span>
                                            </button>

                                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                                <ul class="navbar-nav float-left">
                                                    <li class="nav-item <?= $action == 'site/index' ? 'active' : '' ?>">
                                                        <?= Html::a('Home', ['/site/index'], ['class' => 'nav-link']) ?>
                                                    </li>
                                                    <li class="nav-item <?= $action == 'site/about' ? 'active' : '' ?>">
                                                        <?= Html::a('About us', ['/site/about'], ['class' => 'nav-link']) ?>
                                                    </li>
                                                    <li class="nav-item <?= $action == 'site/services' ? 'active' : '' ?>">
                                                        <?= Html::a('services', ['/site/services'], ['class' => 'nav-link']) ?>
                                                    </li>
                                                    <li class="nav-item <?= $action == 'site/careers' ? 'active' : '' ?>">
                                                        <?= Html::a('careers', ['/site/careers'], ['class' => 'nav-link']) ?>
                                                    </li>
                                                    <li class="nav-item <?= $action == 'site/contact' ? 'active' : '' ?>">
                                                        <?= Html::a('Contact us', ['/site/contact'], ['class' => 'nav-link']) ?>
                                                    </li>
                                                </ul>
                                            </div>
                                        </nav>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="mobile-header" class="">
                <div class="top-header">
                    <div class="menu-section">
                        <nav class="navbar navbar-expand-lg navbar-light">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mobile-nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse" id="mobile-nav">
                                <ul class="navbar-nav float-left">
                                    <li class="nav-item <?= $action == 'site/index' ? 'active' : '' ?>">
                                        <?= Html::a('Home', ['/site/index'], ['class' => 'nav-link']) ?>
                                    </li>
                                    <li class="nav-item <?= $action == 'site/about' ? 'active' : '' ?>">
                                        <?= Html::a('About us', ['/site/about'], ['class' => 'nav-link']) ?>
                                    </li>   
                                    <li class="nav-item <?= $action == 'site/services' ? 'active' : '' ?>">
                                        <?= Html::a('services', ['/site/services'], ['class' => 'nav-link']) ?>
                                    </li>
                                    <li class="nav-item <?= $action == 'site/careers' ? 'active' : '' ?>">
                                        <?= Html::a('careers', ['/site/careers'], ['class' => 'nav-link']) ?>
                                    </li>
                                    <li class="nav-item <?= $action == 'site/contact' ? 'active' : '' ?>">
                                        <?= Html::a('Contact us', ['/site/contact'], ['class' => 'nav-link']) ?>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                    <div class="logo-section">
                        <a class="navbar-brand" href="index.php"><img src="<?= yii::$app->homeUrl ?>images/logo.png" alt="Sia logo" class="img-fluid"/></a>
                    </div>
                    <div class="navigation-section">
                        <div class="head-contact">
                            <ul>
                                <li>
                                <icon><img class="img-fluid" src="<?= yii::$app->homeUrl ?>images/icons/email-on-air.png"/></icon>
                                <div class="contact-info">
                                    <span>You can mail us</span>
                                    <h5 class="info"><?= $common_contents->email ?></h5>
                                </div>
                                </li>
                                <li>
                                <icon><img class="img-fluid" style="margin-top: 5px;" src="<?= yii::$app->homeUrl ?>images/icons/phone.png"/></icon>
                                <div class="contact-info">
                                    <span>We are open 8am - 5pm</span>
                                    <h5 class="info"><?= $common_contents->phone ?></h5>
                                </div>
                                </li>
                            </ul>
                        </div>

                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

        </div>
        <?= $content ?>

        <footer>
            <div class="container">
                <div class="footer">
                    <div class="row">
                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                            <img src="<?= yii::$app->homeUrl ?>images/logo.png" class="img-fluid foot-logo"/>
                            <p class="foot-abt"><?= $common_contents->about_content_footer ?></p>
                            <div class="social-links">
                                <h5>Follow Us:</h5> 
                                <ul>
                                    <li><a target="_blank" href="<?= $common_contents->facebook_link != '' ? $common_contents->facebook_link : '' ?>"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a target="_blank" href="<?= $common_contents->twitter_link != '' ? $common_contents->twitter_link : '' ?>"><i class="fab fa-twitter"></i></a></li>
                                    <li><a target="_blank" href="<?= $common_contents->linkedin_link != '' ? $common_contents->linkedin_link : '' ?>"><i class="fab fa-linkedin-in"></i></a></li>
                                    <li><a target="_blank" href="<?= $common_contents->youtube_link != '' ? $common_contents->youtube_link : '' ?>"><i class="fab fa-youtube"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12 links">
                            <h5 class="heading">Our Services</h5>
                            <ul>
                                <?php
                                if (!empty($services)) {
                                    foreach ($services as $service_links) {
                                        if (!empty($service_links)) {
                                            ?>
                                            <li>
                                                <?= Html::a($service_links->service_name, ['/site/service-details', 'service' => $service_links->canonical_name], ['class' => '']) ?>
                                            </li>
                                            <?php
                                        }
                                    }
                                }
                                ?>
                            </ul>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-12 links">
                            <h5 class="heading">Quick Link</h5>
                            <ul>
                                <li> <?= Html::a('Home', ['/site/index'], ['class' => '']) ?></li>
                                <li><?= Html::a('About Us', ['/site/about'], ['class' => '']) ?></li>
                                <li><?= Html::a('Services', ['/site/services'], ['class' => '']) ?></li>
                                <li><?= Html::a('Careers', ['/site/careers'], ['class' => '']) ?></li>
                                <li><?= Html::a('Contact us', ['/site/contact'], ['class' => '']) ?></li>
                            </ul>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 col-12">
                            <h5 class="heading">Contact us</h5>
                            <div class="address">
                                <ul>
                                    <li><i class="fas fa-map-marker-alt"></i><?= $common_contents->address ?></li>
                                    <li><i class="fas fa-phone-volume"></i><?= $common_contents->phone ?></li>
                                    <li><i class="fas fa-envelope"></i><?= $common_contents->email ?></li>
                                    <li><i class="fas fa-globe"></i><?= $common_contents->web ?></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="bottom-footer">
                <div class="container">
                    <p>Copyright© 2018 SIA Accounting & Auditing LLC. All rights reserved.</p>
                </div>
            </div>
        </footer>

        <?php $this->endBody() ?>

    </body>
</html>
<?php $this->endPage() ?>
<script>
    $(document).ready(function () {
        $(document).on('submit', '.contact-enquiry', function (e) {
            e.preventDefault();
            var str = $(this).serialize();
            $.ajax({
                type: "POST",
                url: '<?= Yii::$app->homeUrl; ?>site/contact-enquiry',
                data: str,
                success: function (data)
                {
                    if (data == 1) {
                        $('.contact-enquiry').before('<div id="email-alert" style=""><i class="fa fa-check"></i> Your Contact Enquiry Send Successfully</div>');
                    }
                    $('#name').val("");
                    $('#email').val("");
                    $('#phone').val("");
                    $('#service').val("");
                    $('#message').val("");
                    $('#email-alert').delay(1000).fadeOut('slow');
                }
            });
        });
    });
</script>
