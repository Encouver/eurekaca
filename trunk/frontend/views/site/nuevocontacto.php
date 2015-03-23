<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\Contactos */

$this->title = 'Nuevo Contacto';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.
    </p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>
                <?= $form->field($model, 'nombre') ?>
                <?= $form->field($model, 'correo') ?>
                <?= $form->field($model, 'telefono') ?>
                <?= $form->field($model, 'descripcion')->textArea(['rows' => 6]) ?>
              
                <div class="form-group">
                    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
    


        
        <head>
            <meta charset="utf-8">
            <script src="https://maps.googleapis.com/maps/api/js"></script>
            <script>
              
              function initialize() {

                var myLatlng = new google.maps.LatLng(10.3511216, -67.040135);
                var mapCanvas = document.getElementById('map-canvas');
                var mapOptions = {
                  center: myLatlng,
                  zoom: 16,
                  mapTypeId: google.maps.MapTypeId.ROADMAP
                }
                var map = new google.maps.Map(mapCanvas, mapOptions);
                var marker = new google.maps.Marker({
                  position: myLatlng,
                  map: map,
                  title: 'Eureka Solutions C.A.'
                });
              }
              google.maps.event.addDomListener(window, 'load', initialize);

            </script>
                <style type="text/css">
                  #map-canvas {
                    width: 500px;
                    height: 400px;
                  }
                </style>          
        </head>
        <body>
        
        <h4>Nos encontramos ubicados en los Teques: </h4>   
        <div id="map-canvas"></div>

    
        </body>
</div>
