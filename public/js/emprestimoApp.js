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

         $scope.confirmDelete = function(id){
            var isOkDelete = confirm('Is it ok to delete this?');
            if(isOkDelete){
               $http.post('delete-emprestimo/' + id, {'id':id}).
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

      $scope.toggle = function(modalstate,id) {
            $scope.modalstate = modalstate;
            switch(modalstate){
               case 'add':
                           $scope.state = "Novo Empréstimo";
                           $scope.emprestimo_id = 0;
                           $scope.nome = '';
                           $scope.livro = '';
                           $scope.tipo = '';
                           $('#myModal').modal('show');           
                           break;
               case 'recibo':
                           $scope.state = "Imprimir Empréstimo";
                           $scope.emprestimo_id = id;
                           $http.get("read-emprestimo/" + id)
                           .success(function(response) {
                              console.log(response);
                              $scope.formData = response[0];
                              $scope.formData['dias'] = response[0]['tipo'] == 'Aluno' ? 3 : 10;
                           });
                           $('#myModalRecibo').modal('show'); 
                           break;
               default: break;
            }
            


         }
   });