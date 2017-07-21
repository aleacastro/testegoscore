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
           <li><a href="palavra">Impressão de palavra</a></li>
           <li class="active"><a href="fibonacci">Sequência de Fibonacci </a></li>
         </ul>
       </div>
     </div>
   </nav>


   <div ng-app="myApp" ng-controller="idadeCtrl">
       <h3>Criar algoritmos com um campo que possa receber apenas números e virgulas, separe os valores enviados e valide aqueles que são um número válido da Sequência de Fibonacci e imprima os números de forma crescente, conforme o exemplo: 

</h3>
<pre>
◦ INPUT RECEBE: 1,13,55,21,5,83 
◦ Imprimi: 1,5,21,55
</pre>

            <div class="modal-body">
               <form class="form-horizontal">

                  <div class="form-group">
                     <label for="inputEmail3" class="col-sm-3 control-label">Fibonacci</label>
                     <div class="col-sm-9">
                        <input type="text" maxlength="50" class="form-control" id="fibonacci" placeholder="Fibonacci" value="">
                     </div>
                  </div>
                </form>
            </div>
       </br>
          
      <div id='resultado'>

       </div>         
       </div>
   </div>   

   </div>

   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
   <script>
      function checkKey() {
          var clean = this.value.replace(/[^0-9,]/g, "");
                    if (clean !== this.value) this.value = clean;
          validafibonacci();
      }

      function isSquare(num){
        return Math.sqrt(num) % 1 === 0;
      }

      function checkFibonacci(num) {
          if (isSquare(5*(num*num)-4) || isSquare(5*(num*num)+4)) {
             return true;
          } else { return false; }

      }



      function validafibonacci() {

          var array = $('#fibonacci').val().split(',');
          array.sort(function(a, b){return a-b});
          var texto = "";

          array.forEach(function(current_value, index, initial_array) {
            if (checkFibonacci(current_value)) {
                texto = texto.concat(current_value) + ',';
            }
            $('#resultado').html(texto);
        });
      }      

$('#fibonacci').on("keyup", checkKey);


     function myfunction()
    {
      var index;
      var a = '';
      var b = '';
      
      for (index = 0; index < 4; ++index) {
          
          a = a.concat($('#palavra').val() + ' ');
          b = b.concat(a + '<br>');
      }
$('#resultado').html(b);
      

    }  
   </script>

   </body>
   
</html>