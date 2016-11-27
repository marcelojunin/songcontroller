

        angular.module("photo_profile").factory("photoProfileAPI", function($http, config){
            
            var _getLoadPhotoProfileAPI = function(){
                
                return $http.get(config.baseUrl+"perfil_pessoal/perfil_pessoal_controller/load_image");
                
            };
            
            
            var _getSavePhotoProfileAPI =  function(action){
                
                return $http.post(config.baseUrl+"perfil_pessoal/perfil_pessoal_controller/alter_photo_profile",action);   
                
            };
            
            return{
              
                getLoadPhotoProfileAPI : _getLoadPhotoProfileAPI,
                
                getSavePhotoProfileAPI :_getSavePhotoProfileAPI
                
            };
        });
