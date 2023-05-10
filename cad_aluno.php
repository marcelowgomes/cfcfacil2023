<?php // CODIGO DA SESSION

if (!empty($_SESSION['id_user'])) {
} else {
	$_SESSION['msg'] = "Área restrita";
	header("Location: login.php");
}

include_once 'bd/conexao.php';

?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


<style type="text/css">
        h1 {
            color:green;
        }
        .xyz {
            background-size: auto;
            text-align: center;
            padding-top: 100px;
        }
        .btn-circle.btn-sm {
            width: 30px;
            height: 30px;
            padding: 6px 0px;
            border-radius: 15px;
            font-size: 14px;
            text-align: center;
        }
        .btn-circle.btn-md {
            width: 50px;
            height: 50px;
            padding: 7px 10px;
            border-radius: 25px;
            font-size: 10px;
            text-align: center;
        }
        .btn-circle.btn-xl {
            width: 70px;
            height: 70px;
            padding: 10px 16px;
            border-radius: 35px;
            font-size: 12px;
            text-align: center;
        }
    </style>




<div>
                 
                 <div>
                    <h4>Novo cadastro aluno </h4>
                    
                 </div>  </div></div></div>

<br>





<div class="col-xxl-12 mb-25">

<div class="card border-0 px-25">
     <br>
     <form id="verificacpf">
<div class="form-group">
                                       <label for="a1" class="il-gray fs-14 fw-500 align-center mb-10">Informe o cpf</label>
                                       <input type="text" name="cpf2" required class="form-control ih-medium ip-light radius-xs b-light px-15" id="a1" onkeyup="cpfCheck(this)" maxlength="18" onkeydown="javascript: fMasc( this, mCPF );">
                                    </div>
                                    <span id="cpfResponse"></span>
                                  
                                       
                                  
<br>
</form>
<div id="results"></div>

     </div>
      
     


   </div>

   
  

   
  <script>	

$(document).ready(function() {
 $("#verificacpf").submit(function(){
var formData = new FormData(this);
  $.ajax({
    url: 'verifica_cpf.php',
    cache: false,
    data: formData,
    type: "POST",  
    enctype: 'multipart/form-data',
    processData: false, // impedir que o jQuery tranforma a "data" em querystring
    contentType: false, // desabilitar o cabeçalho "Content-Type"
    success: function(msg){
      $("#results").empty();
      $("#results").append(msg);
      document.getElementById("results").style.display = "block";
      document.getElementById("botao").style.display = "none";


    }
  });
   return false;
 });
});

function is_cpf (c) {

if((c = c.replace(/[^\d]/g,"")).length != 11)
  return false

if (c == "00000000000")
  return false;

var r;
var s = 0;

for (i=1; i<=9; i++)
  s = s + parseInt(c[i-1]) * (11 - i);

r = (s * 10) % 11;

if ((r == 10) || (r == 11))
  r = 0;

if (r != parseInt(c[9]))
  return false;

s = 0;

for (i = 1; i <= 10; i++)
  s = s + parseInt(c[i-1]) * (12 - i);

r = (s * 10) % 11;

if ((r == 10) || (r == 11))
  r = 0;

if (r != parseInt(c[10]))
  return false;

return true;
}


function fMasc(objeto,mascara) {
obj=objeto
masc=mascara
setTimeout("fMascEx()",1)
}

function fMascEx() {
obj.value=masc(obj.value)
}

function mCPF(cpf){
cpf=cpf.replace(/\D/g,"")
cpf=cpf.replace(/(\d{3})(\d)/,"$1.$2")
cpf=cpf.replace(/(\d{3})(\d)/,"$1.$2")
cpf=cpf.replace(/(\d{3})(\d{1,2})$/,"$1-$2")
return cpf
}

cpfCheck = function (el) {
  document.getElementById('cpfResponse').innerHTML = is_cpf(el.value)? '<span style="color:green">  <div class="layout-button mt-10" id="botao"><button type="submit"  class="btn btn-primary btn-default btn-squared px-30">Avancar</button></div></span>' : '<span style="color:red">inválido</span>';
  if(el.value=='') document.getElementById('cpfResponse').innerHTML = '';
}

</script>

                  


                  </table>
               </div>
            </div>
         </div>
        
      </div>
   </div>
</div>

</div>



