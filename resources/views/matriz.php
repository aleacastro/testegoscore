<!DOCTYPE html>
<html lang="pt-BR">
<head>
   <title>Teste Go Score!</title>
   <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
   <style type="text/css">
      @media print
      {
      body * { visibility: hidden !important; }
      #myModalRecibo * { visibility: visible !important; }
      #myModalRecibo { position: absolute; top: 40px; left: 30px; }
      }
   </style>
</head>
<body>
   <nav class="navbar navbar-default">
     <div class="container-fluid">
       <div class="navbar-header">
         <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
           <span class="sr-only">Toggle navigation</span>
           <span class="icon-bar"></span>
           <span class="icon-bar"></span>
           <span class="icon-bar"></span>
         </button>
         <a class="navbar-brand" href="#">Teste Go Score</a>
       </div>

       <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
         <ul class="nav navbar-nav">
           <li><a href="">Empréstimo de Livros<span class="sr-only">(current)</span></a></li>
           <li class="active"><a href="matriz">Matriz</a></li>
           <li><a href="idade">Cálculo de idade</a></li>
           <li><a href="palavra">Impressão de palavra</a></li>
           <li><a href="fibonacci">Sequência de Fibonacci </a></li>
         </ul>
       </div>
     </div>
   </nav>


   <div ng-app="myApp" ng-controller="matrizCtrl">
       <h3>Array gerado via função randomica, sendo visualizado somente os pares, os impares e a matriz total</h3>
       <pre>
          <?php print_r($arrayParImpar); ?>
      </pre>

   </div>   

   </div>

   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
   
</body>
</html>