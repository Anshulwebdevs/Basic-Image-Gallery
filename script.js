var app = angular.module("gallery",[])
    .controller("thumb_controller",function($http,$interval){
        var vm = this;
        vm.currentimg=""; 
        vm.currentindex=0; 
        vm.slideshow = false;
        vm.slidepromise=null;
        var modal = document.getElementById("modal");     
        $http.get("http://localhost/api.php?thumbs=-1").then(function(data){
            vm.thumbs = data.data;
            window.thumbs = vm.thumbs;
            
        });

        vm.showModal = function(index){
            vm.currentindex = index;
            vm.currentimg = vm.originalimg(vm.thumbs.data[vm.currentindex]);
            modal.style.display = "block";
        };

        vm.closeModal = function(){       
            modal.style.display = "none";
            if(vm.slideshow){
                vm.toggleSlideShow();
            }
        };

        vm.previousImg = function(){
            if(vm.currentindex == 0){
                vm.currentindex = vm.thumbs.data.length - 1;
            }else{
                vm.currentindex = vm.currentindex - 1;
            }
            vm.showModal(vm.currentindex);
        };
        vm.nextImg = function(){
            console.log("next");
            var i = vm.thumbs.data.length-1;
            if(vm.currentindex == i){
                vm.currentindex = 0;
            }else{
                vm.currentindex = vm.currentindex + 1;
            }
            vm.showModal(vm.currentindex);
        };

        vm.originalimg = function(item) {
            return item.replace("thumbs","originals").replace("_thumb","");
        };
        vm.toggleSlideShow = function(){
            if(!vm.slideshow){
                vm.slidepromise = $interval(function () {
                    
                    vm.nextImg();
                }, 2000);
            }else{
                $interval.cancel(vm.slidepromise);
                vm.slidepromise = null;
            }
            vm.slideshow = !vm.slideshow;
        };       
    });

window.onclick = function(event) {
    if (event.target.id == "modal") {
        var modal = document.getElementById("modal");
        modal.style.display = "none";
    }
};