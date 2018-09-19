<?php
/* @var $this yii\web\View */

use yii\helpers\Html;

if (isset($meta_tags->meta_title) && $meta_tags->meta_title != '') {
    $this->title = $meta_tags->meta_title;
} else {
    $this->title = 'Careers';
}
?>
<section id="banner">
    <div class="breadcrumb">
        <div class="container">
            <ul>
                <li><?= Html::a('Home', ['/site/index']) ?></li>
                <li><a class="current" href="javascript:void(0)">Careers</a></li>
            </ul>
            <h4 class="page-title">Careers</h4>
        </div>
    </div>
</section>

<div id="careers-page">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="main-heading">
                    <span class="title">sia</span>
                    <h3 class="heading">CAREERS</h3>
                </div>
            </div>
        </div>
        <div class="careers">
            <p class="content m0">We are extremely proud of our organisation and the amazing team of people we have assembled to service and promote our business.</p>
            <p class="content">At present we have following vacancies :</p>
            <br>
            <?php
            if (!empty($career_content)) {
                $n = 1;
                foreach ($career_content as $career) {
                    if (!empty($career)) {
                        ?>
                        <div class="single-choose-us-box ">
                            <div class="choose_us-content-wrapper">
                                <div class="choose-us-box-icon">
                                    <i><?= $n ?></i>
                                </div>
                                <div class="choose_us-box-content">
                                    <h4 class="vacancy-title"><?= $career->post_name ?> :</h4>
                                    <?= $career->description ?>
                                </div>
                            </div>
                        </div>
                        <?php
                        $n++;
                    }
                }
            }
            ?>
            <p class="carrer-contact">Should you not see a current vacancy but feel you have something amazing to offer us please mail : <a href="mailto:careers@siauae.com">careers@siauae.com</a></p>
        </div>
    </div>
</div>

