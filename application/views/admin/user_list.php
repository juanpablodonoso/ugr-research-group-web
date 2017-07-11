<?php
// tarjeta para presentar el miembro del departamento
defined('BASEPATH') OR exit('No direct script access allowed');
?>


<!--Buscador de usarios con AJAX-->
<!--<button data-toggle="collapse" data-target="#demo">Panel de búsqueda</button>-->
<div id="panel-busqueda">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                <p>Búsqueda por nombre</p>
                <div class="input-group">
                    <input type="text" class="form-control">
                    <span class="input-group-btn">
                            <button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
                        </span>
                </div>
                <br>
                <p>Aplicar filtro</p>
                <div class="dropdown">
                    <button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">Tutorials
                        <span class="caret"></span></button>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">HTML</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">CSS</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">JavaScript</a></li>
                        <li role="presentation" class="divider"></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">About Us</a></li>
                    </ul>
                </div></div>



                <!-- /.input-group -->
            </div>
        </div>
        <!--Selector para filtrar-->
        <!--<div class="col-xs-6 col-md-4">
            <h4>Filtrar miembros:</h4>
            <div class="dropdown">
                <button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">Tutorials
                    <span class="caret"></span></button>
                <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">HTML</a></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">CSS</a></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">JavaScript</a></li>
                    <li role="presentation" class="divider"></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">About Us</a></li>
                </ul>
            </div>
        </div>-->
    </div>
</div>



<!--Lista de usuarios-->
<h4>Miembros del grupo</h4><hr>



<?php /*
<?php    foreach ($members_data as $member):      ?>
<div class="row">
    <!--Imagen del usuario-->
    <div class="col-xs-6 col-md-4">
        <img class="img-responsive img-hover" src="user.png" class="img-circle"
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
            <dd><?php echo $member['name'];?></dd>
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
<?php endforeach; ?>
*/?>
{member_card}
