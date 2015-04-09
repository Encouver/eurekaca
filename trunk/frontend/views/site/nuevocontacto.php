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
    <div class="row">
        <div class="col-lg-6">
           <h4>Nos encontramos ubicados en los Teques: </h4>
            <p><span class="icon icon-home"></span> Los Teques 1021, Miranda <br/>
                        <span class="icon icon-phone"></span> +58 0212-3216583<br/>
                        <span class="icon icon-mobile"></span> +58 0414-3453988 <br/>
                        <span class="icon icon-mobile"></span> +58 0414-3189549 <br/>
                        <span class="icon icon-envelop"></span> <a href="#"> info@eureksolutions.com</a> <br/>
                        <span class="icon icon-twitter"></span> <a href="https://twitter.com/eurekave"> @eurekave </a> <br/>
                        <span class="icon icon-facebook"></span> <a href="https://www.facebook.com/people/Eureka-VE/100004718627172"> Eureka-VE </a> <br/>
                    </p>
           <div id="map-canvas"></div>

        </div>
        <div class="col-lg-6">
            <h4>Mantente en contacto: </h4>
            <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>
                <?= $form->field($model, 'nombre') ?>
                <?= $form->field($model, 'correo') ?>
                <?= $form->field($model, 'telefono') ?>
                <?= $form->field($model, 'descripcion')->textArea(['rows' => 6]) ?>
              
                <div class="form-group centered">
                    <?= Html::submitButton('Enviar', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
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
        
        
    
        </body>
</div>
