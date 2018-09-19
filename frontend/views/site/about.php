<?php
/* @var $this yii\web\View */

use yii\helpers\Html;

if (isset($meta_tags->meta_title) && $meta_tags->meta_title != '') {
    $this->title = $meta_tags->meta_title;
} else {
    $this->title = 'About SIA';
}
?>
<section id="banner">
    <div class="breadcrumb">
        <div class="container">
            <ul>
                <li><?= Html::a('Home', ['/site/index']) ?></li>
                <li><a class="current" href="javascript:void(0)">About</a></li>
            </ul>
            <h4 class="page-title">About Us</h4>
        </div>
    </div>
</section>

<div id="page-content">
    <div class="container">
        <div class="about">
            <div class="row">
                <div class="col-md-12">  
                    <div class="page-heading">
                        <span class="title">Welcome to</span>
                        <h3 class="heading">SIA Accounting & Auditing L.L.C</h3>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="content">
                        <div class="left-img"><img class="img-fluid" width="445" src="<?= yii::$app->homeUrl ?>uploads/about/<?= $about_content->id ?>.<?= $about_content->image ?>"/></div>
                        <?= $about_content->about_content ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section id="mission">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="box">
                        <h4 class="heading">Mission</h4>
                        <p class="content"><?= $about_content->mission ?></p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="box">
                        <h4 class="heading">Vision</h4>
                        <p class="content"><?= $about_content->vision ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="brands">
        <div class="brands-slider">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="carousel-controls brands-carousel-controls">
                            <div class="control d-flex align-items-center justify-content-center prev mt-3"><img src="<?= yii::$app->homeUrl ?>images/icons/back.png" class="img-fluid"/></div>
                            <div class="control d-flex align-items-center justify-content-center next mt-3"><img src="<?= yii::$app->homeUrl ?>images/icons/next.png" class="img-fluid"/></div>

                            <div class="brands-carousel">
                                <?php
                                if (!empty($clients)) {
                                    foreach ($clients as $client) {
                                        if (!empty($client)) {
                                            ?>
                                            <div class="one-slide mx-auto">
                                                <div class="brands text-center d-flex flex-direction-column justify-content-center flex-wrap align-items-center">
                                                    <img src="<?= yii::$app->homeUrl ?>uploads/our_clients/<?= $client->id ?>/<?= $client->id ?>.<?= $client->logo ?>" class="img-fluid"/>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

