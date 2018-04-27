  $(document).ready(function () {
  var captcha = $("#g-recaptcha-response").val();
  if(captcha!=undefined){
      document.getElementById('logear').style.display = 'block';

  }

    });

        $("#frm-proveedor").submit(function () {
            return $(this).validate();
        });

$(document).ready(function () {
        $("#frm-usuario").submit(function () {
            return $(this).validate();
        });
    });
    $(document).ready(function () {
        $("#frm-usuario-e").submit(function () {
            return $(this).validate();
        });
    });
 
    
$(document).ready(function () {
        $("#frm-login").submit(function () {
            return $(this).validate();
        });
    });






$(document).ready(function () {

  $('#validar').click(function(){ 
      //alert('entra al evento');
     var valorReal = $("#capt").val();
     var valorIngresado = $("#captText").val();
     if(valorReal == valorIngresado ){
          document.getElementById('logear').style.display = 'block';
          document.getElementById('captcha').style.display = 'none';
          document.getElementById('captText').style.display = 'none';
          document.getElementById('validar').style.display = 'none';
          swal("Correcto!", "", "success");
     }else{
        swal("Error!", "Vuelva a intentar", "error");
     }

  });
});
 /*$('#nvProductos').click(function(){
     window.location.href="list_videojuegos.php";
 });
 
 $('#videoJuego').click(function(){
     window.location.href="catalogos/list_videojuegos.php";
 });*/
 
 



 /*   
    $('#valor').click(function () {
        alert('hola');
    });
    
  var trigger = $('.hamburger'),
      overlay = $('.overlay'),
     isClosed = false;

    trigger.click(function () {
      hamburger_cross();      
    });

    function hamburger_cross() {

      if (isClosed == true) {          
        overlay.hide();
        trigger.removeClass('is-open');
        trigger.addClass('is-closed');
        isClosed = false;
      } else {   
        overlay.show();
        trigger.removeClass('is-closed');
        trigger.addClass('is-open');
        isClosed = true;
      }
  }
  
  $('[data-toggle="offcanvas"]').click(function () {
        $('#wrapper').toggleClass('toggled');
  }); 

  */ 
