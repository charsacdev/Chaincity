$(document).ready(function() {

    var currentYear = new Date().getFullYear();
    $('#year').text(currentYear);


     //NAVBAR TOGGLING - ADMIN
     const admMenuBtn = $('.adm-menu-btn');
     let admMenuOpen = false;
     admMenuBtn.on('click', function() {

     if(!admMenuOpen){
         admMenuBtn.addClass('open');
         $('.adm-sidebar').animate({left: '0px'});
         admMenuOpen = true;
     }else{
         admMenuBtn.removeClass('open');
         $('.adm-sidebar').animate({left: '-350px'});
         admMenuOpen = false;
     }
     })
 
     let admSideClose = $('.adm-sidebar-close');
     admSideClose.on('click', function(){
     admMenuBtn.removeClass('open');
         $('.adm-sidebar').animate({left: '-350px'});
         admMenuOpen = false;
     });


     $('body').on('click', function(){
         $('.td-dsb-popup').fadeOut();
     }); 

     $('.svg-inline--fa.fa-ellipsis-v').on('click', function(event){
         $('.td-dsb-popup').fadeOut();
        $(this).siblings('.td-dsb-popup').fadeIn();
        event.stopPropagation();
       
     })


     $('.td-btn-edit').on('click', function(event){
         event.stopPropagation();
     });

     
 
});