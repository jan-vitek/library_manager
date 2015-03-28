<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="/css/bootstrap.min.css">
<link rel="stylesheet" href="/css/local.css">
<script src="js/jquery-1.10.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<title>Knihovna katedry kybernetiky</title>
{!! Rapyd::head() !!}
</head>
<body style="background-color:#0066cc">

 <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                        Přihlásit se
                        <span class="glyphicon glyphicon-user"></span>
                    </a>
                </li>
                <li>
                    <a href="/authors">Autoři</a>
                </li>
                <li>
                    <a href="/">Hlavní strana 
                    <span class="glyphicon glyphicon-home"></span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
          <div class="container-fluid">
            <div class="row">
              <div class="col-lg-12">
              
              @yield('content')
              
              </div>
            </div>
          </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>

  </body>
  </html>
