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
           <li><a href="matriz">Matriz</a></li>
           <li><a href="idade">Cálculo de idade</a></li>
           <li class="active"><a href="palavra">Impressão de palavra</a></li>
           <li><a href="fibonacci">Sequência de Fibonacci </a></li>
         </ul>
       </div>
     </div>
   </nav>


   <div ng-app="myApp" ng-controller="idadeCtrl">
       <h3>Criar um algoritmos que entre com uma palavra e imprima conforme o exemplo 
</h3>
<pre>
◦ Palavra: sonho 
◦ SONHO 
◦ SONHO SONHO 
◦ SONHO SONHO SONHO 
◦ SONHO SONHO SONHO SONHO
</pre>
   <script>
     function myfunction()
    {
      var index;
      var a = '';
      var b = '';
      var b = '';
      
      for (index = 0; index < 5; ++index) {
          
          a = a.concat($('#palavra').val() + ' ');
          c = b.concat(a + '\n');
      }
$('#resultado').html(c);
      

    }  
   </script>
            <div class="modal-body">
               <form class="form-horizontal">

                  <div class="form-group">
                     <label for="inputEmail3" class="col-sm-3 control-label">Nome</label>
                     <div class="col-sm-9">
                        <input type="text" maxlength="50" class="form-control" id="palavra" onkeydown="myfunction();" placeholder="Palavra" value="">
                     </div>
                  </div>
                </form>
            </div>
       </br>
          
      <label id='resultado'>

       </label>         
       </div>
   </div>   

   </div>

   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>


   </body>
   
</html>