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
           <li class="active"><a href="">Empréstimo de Livros<span class="sr-only">(current)</span></a></li>
           <li><a href="matriz">Matriz</a></li>
           <li><a href="idade">Cálculo de idade</a></li>
           <li><a href="palavra">Impressão de palavra</a></li>
           <li><a href="fibonacci">Sequência de Fibonacci </a></li>
         </ul>
       </div>
     </div>
   </nav>


   <div ng-app="myApp" ng-controller="emprestimosCtrl">
      
   <table class="table">
      <thead>
         <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Livro</th>
            <th>Tipo</th>
            <th><button id="btn-add" class="btn btn-primary btn-xs" ng-click="toggle('add',0)">Novo Empréstimo</button></th>
         </tr>
      </thead>
      <tbody>
         <tr ng-repeat="emprestimo in emprestimos">
            <td>{{ emprestimo.id }}</td>
            <td>{{ emprestimo.nome }}</td>
            <td>{{ emprestimo.livro }}</td>
            <td>{{ emprestimo.tipo }}</td>
            <td>
               <button class="btn btn-default btn-xs btn-detail" ng-click="toggle('recibo',emprestimo.id)">Recibo</button>
               <button class="btn btn-danger btn-xs btn-delete" ng-click="confirmDelete(emprestimo.id)">Excluir</button>
            </td>
         </tr>
      </tbody>
   </table>

   <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
               <h4 class="modal-title" id="myModalLabel">{{state}}</h4>
            </div>
            <div class="modal-body">
               <form class="form-horizontal">

                  <div class="form-group">
                     <label for="inputEmail3" class="col-sm-3 control-label">Nome</label>
                     <div class="col-sm-9">
                        <input type="text" maxlength="50" class="form-control" id="inputEmail3" placeholder="Nome Completo" value="{{nome}}" ng-model="formData.nome">
                     </div>
                  </div>

                  <div class="form-group">
                     <label for="inputEmail3" class="col-sm-3 control-label">Livro</label>
                     <div class="col-sm-9">
                        <input type="text" maxlength="50" class="form-control" id="inputEmail3" placeholder="Nome do Livro" value="{{livro}}" ng-model="formData.livro">
                     </div>
                  </div>

                  <div class="form-group">
                     <label for="inputPassword3" class="col-sm-3 control-label">Tipo</label>
                     <div class="col-sm-9">
                        <select class="form-control" ng-model="formData.tipo">
                          <option>Aluno</option>
                          <option>Professor</option>
                        </select>
                     </div>
                  </div> 

               </form>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
               <button type="button" class="btn btn-primary" id="btn-save" ng-click="save(modalstate,emprestimo_id)">Salvar</button>
            </div>
         </div>
      </div>
   </div>

   <div class="modal fade" id="myModalRecibo" name="myModalRecibo" tabindex="-5" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
               <h4 class="modal-title" id="myModalLabel">{{state}}</h4>
            </div>
            <div class="modal-body">
               <div >

                  <div class="page-header">
                      <h1>Recibo de Empréstimo de Livro</h1>
                  </div>
                  <div >
                      <div class="row">
                          <div class="col-md-12">
                              <div class="panel panel-default">
                                  <div class="panel-heading">
                                      <h3 class="text-center"><strong>Conteúdo</strong></h3>
                                  </div>
                                  <div class="panel-body">
                                      <div class="table-responsive">
                                          <table class="table table-condensed">
                                              <thead>
                                                  <tr>
                                                      <td><strong>Número</strong></td>
                                                      <td><strong>Nome</strong></td>
                                                      <td><strong>Livro</strong></td>
                                                      <td><strong>Tipo</strong></td>
                                                  </tr>
                                              </thead>
                                              <tbody>
                                                  <tr>
                                                      <td >{{formData.id}}</td>
                                                      <td >{{formData.nome}}</td>
                                                      <td >{{formData.livro}}</td>
                                                      <td >{{formData.tipo}}</td>
                                                  </tr>
                                              </tbody>
                                          </table>
                                          O {{formData.tipo}} {{formData.nome}} tem {{formData.dias}} dias para a devolução.
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
               <button type="button" class="btn btn-primary" id="btn-print" onclick="window.print()">Imprimir</button>
            </div>
         </div>
      </div>
   </div>   

   </div>

   <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
   <script src="js/emprestimoApp.js"></script>

</body>
</html>