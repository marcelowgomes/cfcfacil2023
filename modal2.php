 <!-- CADASTRAR ALUNO -->



 
 <div class="modal fade " id="modal-basic" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">

<div class="modal-dialog modal-md modal-xl" role="document">
   <div class="modal-content modal-bg-white "> 


   <div id="dvp">


      <div class="modal-header">
     
     

         <h6 class="modal-title">Cadastrar Aluno</h6>
        
         <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <img src="img/svg/x.svg" alt="x" class="svg">
         </button>
        
      </div>
      
<!-- inicio div principal -->





      <form method="post" action="#" id="verificar" > 
                        <div class="card-body">
                           <div class="edit-profile__body">
                              <div class="form-group mb-25">
                                 <label for="username">Nome:</label>
                                 <input type="text" required class="form-control" name="nome" id="nome">
                              </div>
                              <div class="form-group mb-15">
                                 <label for="password-field">CPF:</label>
                                 <div class="position-relative">
                                    <input required type="text" class="form-control"  name="cpf">
                                    
                                 </div>
                              </div>
                              
                              <div class="admin__button-group button-group d-flex pt-1 justify-content-md-start justify-content-center">
                                 <button type="submit" class="btn btn-primary btn-default w-100 btn-squared text-capitalize lh-normal px-50 signIn-createBtn ">
                                    ACESSAR
                                 </button>
                              </div>
                           </div>
                        </div>
</form>

<!-- fim div principal -->
</div>

<div id="results"> </div>


</div>



</div>
</div>

<script src="//code.jquery.com/jquery-3.2.1.min.js"></script>
          

                                <script>
															
$(document).ready(function() {
$("#verificar").submit(function(){
var dados = jQuery( this ).serialize();
$.ajax({
url: 'check_cpf.php',
cache: false,
data: dados,
type: "POST",  
success: function(msg){
    $("#results").empty();
    $("#results").append(msg);
	document.getElementById("dvp").style.display = "none";
}

});

return false;
});
                                                             
});
</script> 

   <!-- inject:js-->



   <script src="assets/vendor_assets/js/jquery/jquery-3.5.1.min.js"></script>

   <script src="assets/vendor_assets/js/jquery/jquery-ui.js"></script>

   <script src="assets/vendor_assets/js/bootstrap/popper.js"></script>

   <script src="assets/vendor_assets/js/bootstrap/bootstrap.min.js"></script>

   <script src="assets/vendor_assets/js/moment/moment.min.js"></script>

   <script src="assets/vendor_assets/js/accordion.js"></script>

   <script src="assets/vendor_assets/js/apexcharts.min.js"></script>

   <script src="assets/vendor_assets/js/autoComplete.js"></script>

   <script src="assets/vendor_assets/js/Chart.min.js"></script>

   <script src="assets/vendor_assets/js/daterangepicker.js"></script>

   <script src="assets/vendor_assets/js/drawer.js"></script>

   <script src="assets/vendor_assets/js/dynamicBadge.js"></script>

   <script src="assets/vendor_assets/js/dynamicCheckbox.js"></script>

   <script src="assets/vendor_assets/js/footable.min.js"></script>

   <script src="assets/vendor_assets/js/fullcalendar@5.2.0.js"></script>

   <script src="assets/vendor_assets/js/google-chart.js"></script>

   <script src="assets/vendor_assets/js/jquery-jvectormap-2.0.5.min.js"></script>

   <script src="assets/vendor_assets/js/jquery-jvectormap-world-mill-en.js"></script>

   <script src="assets/vendor_assets/js/jquery.countdown.min.js"></script>

   <script src="assets/vendor_assets/js/jquery.filterizr.min.js"></script>

   <script src="assets/vendor_assets/js/jquery.magnific-popup.min.js"></script>

   <script src="assets/vendor_assets/js/jquery.peity.min.js"></script>

   <script src="assets/vendor_assets/js/jquery.star-rating-svg.min.js"></script>

   <script src="assets/vendor_assets/js/leaflet.js"></script>

   <script src="assets/vendor_assets/js/leaflet.markercluster.js"></script>

   <script src="assets/vendor_assets/js/loader.js"></script>

   <script src="assets/vendor_assets/js/message.js"></script>

   <script src="assets/vendor_assets/js/moment.js"></script>

   <script src="assets/vendor_assets/js/muuri.min.js"></script>

   <script src="assets/vendor_assets/js/notification.js"></script>

   <script src="assets/vendor_assets/js/popover.js"></script>

   <script src="assets/vendor_assets/js/select2.full.min.js"></script>

   <script src="assets/vendor_assets/js/slick.min.js"></script>

   <script src="assets/vendor_assets/js/trumbowyg.min.js"></script>

   <script src="assets/vendor_assets/js/wickedpicker.min.js"></script>

   <script src="assets/theme_assets/js/apexmain.js"></script>

   <script src="assets/theme_assets/js/charts.js"></script>

   <script src="assets/theme_assets/js/drag-drop.js"></script>

   <script src="assets/theme_assets/js/footable.js"></script>

   <script src="assets/theme_assets/js/full-calendar.js"></script>

   <script src="assets/theme_assets/js/googlemap-init.js"></script>

   <script src="assets/theme_assets/js/icon-loader.js"></script>

   <script src="assets/theme_assets/js/jvectormap-init.js"></script>

   <script src="assets/theme_assets/js/leaflet-init.js"></script>

   <script src="assets/theme_assets/js/main.js"></script>

   <!-- endinject-->
</body>

</html>


