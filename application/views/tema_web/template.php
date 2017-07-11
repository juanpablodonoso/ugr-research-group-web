<!DOCTYPE html>
<html lang="en">
<head>
  <title>{pagetitle}</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="icon" type="image/png" href="/assets/images/ci-icon.png" />
		<link rel="stylesheet" type="text/css" href="public/assets/css/bootstrap.min.css" media="screen"/>
		<link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="public/assets/css/style.css"/>
		<link rel="stylesheet" type="text/css" href="public/assets/github-buttons/style.css"/>
  <style>

      .pie {
          background-color: rgba(7, 49, 126, 0.29);
          padding: 0px;
          margin-bottom: 10px;
          border-bottom: 1px solid rgba(255, 154, 154, 0);
      }


  .header{
    background-color: rgba(7, 49, 126, 0.29);
    padding: 0px;
    margin-bottom: 10px;
    border-bottom: 1px solid rgba(255, 154, 154, 0);
  }
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
      border-color: rgba(123, 114, 111, 0);
      background-color: rgba(85, 81, 68, 0.19)
    }
    
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 450px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #405;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;} 
    }
  </style>
</head>
<body>


<nav class="navbar">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Investiga</a>
    </div>
    <ul class="nav navbar-nav">
      <!--<li class="active"><a href="#">Home</a></li>-->
      <!--<li><a href="#">Page 1</a></li>-->
      <!--<li><a href="#">Page 2</a></li>-->
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <!--<li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>-->
      {bar_login}
    </ul>
  </div>
</nav>

<!-- Encabezado -->
{sub_titulo}


<!-- Posicionamiento y navegación por las páginas -->
<div class="container">

    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li><a href="index.html">Home</a>
                </li>
                <li class="active">Blog Home Two</li>
            </ol>
        </div>
    </div>
    <!-- /.row -->



<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-2 sidenav">
    
        
         <p>Menú de navegación</p> 
        <ul class="nav nav-pills nav-stacked">
        {menu}
        </ul>

        <div class="well">
            <p>Opciones para usuario logueado</p>
            {options}
        </div>
    </div>
    <div class="col-sm-10">
       {content}

    </div>
</div>



</body>
</html>
