<script>
function validaNumericos(event) {
    if(event.charCode >= 48 && event.charCode <= 57){
      return true;
     }
     return false;        
}

function validaletraynumero(event) {
    if(event.charCode >= 48 && event.charCode <= 57 || event.charCode >= 65 && event.charCode <= 90 || event.charCode >= 97 && event.charCode <= 122 || event.charCode == 209 || event.charCode == 241){
      return true;
     }
     return false;        
}

function validaletraynumeroconespacio(event) {
    if(event.charCode >= 48 && event.charCode <= 57 || event.charCode >= 65 && event.charCode <= 90 || event.charCode >= 97 && event.charCode <= 122 || event.charCode == 209 || event.charCode == 241 || event.charCode ==32){
      return true;
     }
     return false;        
}

function validaletras(event) {
    if(event.charCode >= 65 && event.charCode <= 90 || event.charCode >= 97 && event.charCode <= 122 || event.charCode == 209 || event.charCode == 241 || event.charCode ==32){
      return true;
     }
     return false;        
}

function validaemail(event) {
    if(event.charCode >= 48 && event.charCode <= 57 ||
      event.charCode >= 65 && event.charCode <= 90 ||
      event.charCode >= 97 && event.charCode <= 122 ||
      event.charCode == 209 || event.charCode == 241 || 
      event.charCode == 64 || event.charCode == 95 ||
      event.charCode == 45 || event.charCode == 46){
      return true;
    }
      return false;           
}
</script>