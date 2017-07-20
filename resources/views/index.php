<!DOCTYPE html>
<html lang="pt-BR">
<head>
   <title>Teste Go Score!</title>
   <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
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
           <li class="active"><a href="#">Empréstimo de Livros <span class="sr-only">(current)</span></a></li>
           <li><a href="#">Matriz</a></li>
           <li><a href="#">Cálculo de idade</a></li>
           <li><a href="#">Impressão de palavra</a></li>
           <li><a href="#">Sequência de Fibonacci </a></li>
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
            <th>Data de Criação</th>
            <th><button id="btn-add" class="btn btn-primary btn-xs" ng-click="toggle('add',0)">Novo Empréstimo</button></th>
         </tr>
      </thead>
      <tbody>
         <tr ng-repeat="emprestimo in emprestimos">
            <td>{{ $index + 1 }}</td>
            <td>{{ emprestimo.name }}</td>
            <td>{{ emprestimo.livro }}</td>
            <td>{{ emprestimo.tipo }}</td>
            <td>{{ emprestimo.created_at }}</td>
            <td>
               <button class="btn btn-default btn-xs btn-detail" ng-click="toggle('edit',emprestimo.id)">Editar</button>
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
                        <input type="text" class="form-control" id="inputEmail3" placeholder="Fullname" value="{{name}}" ng-model="formData.name">
                     </div>
                  </div>

                  <div class="form-group">
                     <label for="inputEmail3" class="col-sm-3 control-label">Livro</label>
                     <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputEmail3" placeholder="Email Address" value="{{email}}" ng-model="formData.email">
                     </div>
                  </div>

                  <div class="form-group">
                     <label for="inputPassword3" class="col-sm-3 control-label">Tipo</label>
                     <div class="col-sm-9">
                        <input type="password" class="form-control" id="inputPassword3" placeholder="Leave empty to unchange" ng-model="formData.password">
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

   </div>

   <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

<script>
   var app = angular.module('myApp', []);
   app.controller('emprestimosCtrl', function($scope, $http) {

      $http.get("read-emprestimos")
      .success(function(response) {
         $scope.emprestimos = response;
      });

         $scope.save = function(modalstate,emprestimo_id){
            switch(modalstate){
               case 'add': var url = "create-emprestimo"; break;
               case 'edit': var url = "edit-emprestimo/"+emprestimo_id; break;
               default: break;
            }
            $http({
               method  : 'POST',
               url     : url,
               data    : $.param($scope.formData),  
               headers : { 'Content-Type': 'application/x-www-form-urlencoded' }  
            }).
            success(function(response){
               location.reload();
            }).
            error(function(response){
               console.log(response);
               alert('Incomplete Form');
            });
         }
      /* End of the -C- and -U- part */

      /* The -D- Part */
         $scope.confirmDelete = function(id){
            var isOkDelete = confirm('Is it ok to delete this?');
            if(isOkDelete){
               $http.post('http://localhost:8000/delete-emprestimo', {id:id}).
               success(function(data){
                  location.reload();
               }).
               error(function(data) {
                  console.log(data);
                  alert('Unable to delete');
               });
            } else {
               return false;
            }
         }
      /* End of the -D- Part */

      /* Show the modal */
      $scope.toggle = function(modalstate,id) {
            $scope.modalstate = modalstate;
            switch(modalstate){
               case 'add':
                           $scope.state = "Novo Empréstimo";
                           $scope.emprestimo_id = 0;
                           $scope.name = '';
                           $scope.livro = '';
                           $scope.tipo = '';
                           $scope.data = '';
                           break;
               case 'edit':
                           $scope.state = "Detalhe do Empréstimo";
                           $scope.emprestimo_id = id;
                           $http.get("read-user/" + id)
                           .success(function(response) {
                              console.log(response);
                              $scope.formData = response;
                           });
                           break;
               default: break;
            }
            

            $('#myModal').modal('show');
         }
   });
</script>
</body>
</html>