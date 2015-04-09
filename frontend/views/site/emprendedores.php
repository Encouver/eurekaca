<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
$this->title = 'My Yii Application';
?>
         <!-- ==== ABOUT ==== -->
        <div class="container" id="about" name="about">
            <div class="row white">

                <h1 class="centered">Eureka Solutions en busca de emprendedores</h1>
                <hr>
                
                <div class="col-lg-12">
                    <p>Apoyamos en talento venezolanos, dar lo mejor de nosotros es algo que realizamos todos los dias y nuestra comPañia lo sabe, por eso andamos en busca de emprendedores.
                    Si posees el perfil de un emprendedor, eres responsable, proactivo y te gusta innovar de seguro encontraras irresistibles las ofertas de empleo que tenemos para ti</p>
                </div><!-- col-lg-6 -->
            </div><!-- row -->
        </div><!-- container -->
        
         <div id="greywrap">
            <div class="row">
                <div class="col-lg-4 callout">
                  
                    <h2>Diseñador Web</h2>
                    <p>Creamos que el diseño forma parte de las soluciones por eso necesitamos personal con experiencia en:.</p>
                    <p><b>HTML,CSS,JAVASCRIPT,FRAMEWORK CSS, PHOTOSHOP, ILUSTRATOR, INDESING, SEO.</b></p>
 
                </div><!-- col-lg-4 -->
                    
                <div class="col-lg-4 callout">
                  
                    <h2>Desarrollo Web</h2>
                    <p>Con cumplir tres de los siguientes requisitos eres bienvenido en nuestra empresa.</p>
                    <p><b>PHP, ASP, JAVA, PYTHON, ANDROID, IOS, AJAX, LINUX, FRAMEWORK, SEO, MODELADO UML, LEVANTAMIENTO DE REQUERIMIENTOS.</b></p>
                </div><!-- col-lg-4 --> 
                
                <div class="col-lg-4 callout">
                   
                    <h2>Base de datos</h2>
                    <p>Administradores de las siguientes base de datos</p>
                    <p><b>POSTGRESQL, MYSQL, SQL SERVER, ORACLE, ETL, INTELIGENCIA DE NEGOCIOS, MIGRACION DE DATOS, PENTAHO.</b></p>
                </div><!-- col-lg-4 --> 
                
            </div><!-- row -->
            
            <div class="row centered" id="postu">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Postulate
                </button>
            </div><!-- row -->
        </div><!-- greywrap -->
        

        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Postulate</h4>
                    </div>
                    <div class="modal-body">
                        <?php $form = ActiveForm::begin(['options'=>['enctype' => 'multipart/form-data']]); ?>
                        <div class="row-fluid">
                            <?= $form->field($model, 'categoria')->dropDownList(
                            ArrayHelper::map($model->obtenercategorias(),'nombre','nombre'),
                            ['prompt' => 'Seleccione Categoria'] 
                            )->label(false) ?>
                        </div>
                        <div class="row-fuid">
                        <?= $form->field($model, 'file')->fileInput()->label(false) ?>
                        </div>
          
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <?= Html::submitButton('Postularse Ya!!', ['class' => 'btn btn-primary', 'name' => 'postulantes-button']) ?>
                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
            </div>
        </div><!-- modal-->
        
        <div class="container" id="about" name="about">
            <div class="row white">
                <h1 class="centered">Conoce nuestra metodologia de trabajo</h1>
                <hr>
                
                <div class="col-lg-6">
                    <h3>Metodologia Scrum</h3>
                    <p>Scrum que significa melé, es un proceso en el que se aplican de manera regular un conjunto de buenas prácticas para trabajar colaborativamente, en equipo, y obtener el mejor resultado posible de un proyecto. Estas prácticas se apoyan unas a otras y su selección tiene origen en un estudio de la manera de trabajar de equipos altamente productivos. Al igual que pasa en Rugby, si un miembro se viene abajo falla toda la melé, por lo que todos los jugadores deben estar bien coordinados para empujar al mismo tiempo  y avanzar a la misma velocidad.</p>
                 
                </div><!-- col-lg-6 -->
                
                <div class="col-lg-6">
                    <h3>Beneficios</h3>
                    <p>Entre las ventajas de usar Scrum para la gestión de proyectos, cabe destacar que permite mostrar de manera regular avances al cliente con resultados tangibles por lo que sirve para gestionar mejor sus expectativas. También permite disponer de entregas de proyecto funcionales con los que poder comenzar a medir resultados y así poder introducir cambios que mejoren el proyecto.

                    Los miembros de un equipo Scrum también están más motivados ya que les permite tener mayor autonomía a la vez que estar más organizados trabajando en equipo para alcanzar las metas definidas.</p>
                </div><!-- col-lg-6 -->
            </div><!-- row -->
        </div><!-- container -->
            <section class="section-divider textdivider divider7">
            <div class="container">
                <h1>Scrum</h1>
                <hr>
                <p>En la union esta la fuerza.</p>
            </div><!-- container -->
        </section><!-- section -->
        
         <script>
         $('#myModal').on('shown.bs.modal', function () {
  $('#myInput').focus()
})
         </script>