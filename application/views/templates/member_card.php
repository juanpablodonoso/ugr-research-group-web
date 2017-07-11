<?php
/**
 * Created by PhpStorm.
 * User: pablo
 * Date: 9/07/17
 * Time: 4:30
 */
defined('BASEPATH') OR exit('No direct script access allowed');
?>


{member_info}
<div class="row">
    <!--Imagen del usuario-->
    <div class="col-xs-6 col-md-4">
        <img class="img-responsive img-hover" src="<?php echo base_url();?>{img_path}" class="img-circle"
             width="100" height="100">
        <dl class="dl">
            <dt>Nombre</dt>
            <dd>Hector de Miguel</dd>
        </dl>
    </div>
    <!--Datos del usuario-->
    <div class="col-xs-12 col-md-8 text-left">
        <dl class="dl">
            <dt>Miembro</dt>
            <dd>{name}</dd>
            <dt>Catergoría</dt>
            <dd>Profesor contratado doctor</dd>
            <dt>Centro</dt>
            <dd>{center}</dd>
            <dt>Telefono</dt>
            <dd>{telefono}</dd>
            <dt>Página persona</dt>
            <dd>{personal_url}</dd>
            <dt>Dirección</dt>
            <dd>{personal_url}</dd>
        </dl>
        <!--Acciones sobre los usuarios-->
        <a class="btn btn-primary" href="portfolio-item.html">Publicaciones</i></a>
        <a class="btn btn-default" href="portfolio-item.html">Editar</i></a>
        <a class="btn btn-danger" href="portfolio-item.html">Eliminar</i></a>
    </div>



</div>

<hr>
<br>
{/member_info}
