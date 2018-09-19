<?php
/* @var $this yii\web\View */

use yii\helpers\Html;

if (isset($meta_tags->meta_title) && $meta_tags->meta_title != '') {
    $this->title = $meta_tags->meta_title;
} else {
    $this->title = 'SIA Services';
}
?>
<section id="banner">
    <div class="breadcrumb">
        <div class="container">
            <ul>
                <li><?= Html::a('Home', ['/site/index']) ?></li>
                <li><a class="current" href="javascript:void(0)">Services</a></li>
            </ul>
            <h4 class="page-title">Our Services</h4>
        </div>
    </div>
</section>

<section id="services-sec">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="main-heading">
                    <span class="title">sia Services</span>
                    <h3 class="heading">Our Services Range</h3>
                </div>
            </div>
        </div>
        <div class="services">
            <div class="row">
                <?php
                if (!empty($service_contents)) {
                    foreach ($service_contents as $service_content) {
                        if (!empty($service_content)) {
                            ?>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                <div class="service-box">
                                    <?= Html::a('<img src="' . yii::$app->homeUrl . 'uploads/services/' . $service_content->id . '/' . $service_content->id . '.' . $service_content->service_image . '" class="img-fluid"/>', ['/site/service-details', 'service' => $service_content->canonical_name], ['class' => 'img-box']) ?>
                                    <div class="content-box">
                                        <h5 class="title"><?= $service_content->service_name ?></h5>
                                        <p class="content">
                                            <?= $service_content->small_content ?>
                                        </p>
                                    </div>
                                    <?= Html::a('Read more', ['/site/service-details', 'service' => $service_content->canonical_name], ['class' => 'read-more']) ?>
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
</section>