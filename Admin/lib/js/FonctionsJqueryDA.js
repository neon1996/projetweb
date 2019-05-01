/* Copie du langage C
 * Fonctions jquery pour DA*/

$(document).ready(function(){
    
   //auto-complétion : 
   
   $('#mdp').blur(function () {
        email = $('#email').val();
       // email2 = $('#email2').val();
        mdp = $('#mdp').val();
        
        if ($.trim(email) != '' && $.trim(mdp != '')) {
            //alert("email1 = "+email1+" et email2 = "+email2+ " et password = "+password);
            
            var recherche = "email=" + email + "&mdp=" + mdp;    
        
            $.ajax({
                type: 'GET',
                data: recherche,
                dataType: "json",
                url: './Admin/lib/php/ajax/AjaxRechercheClient.php',
                success: function (data) { // retournÃ© par le fichier php
                    $('#nom').val(data[0].nom);
                    $('#prenom').val(data[0].prenom);
                    $('#telephone').val(data[0].telephone);
                    $('#rue').val(data[0].rue);
                    $('#ville').val(data[0].ville);
                    $('#numero').val(data[0].numero);
                    $('#cp').val(data[0].cp);
                    
                    console.log(data[0].nom);
                }
            });
           
        }
    });
    
    
   // alert("Coucou ceci est une pop-up");
   $('#para1').css("color",'#FF0000');
   $('#para2').css({
       "background-color" : "lightcyan",
       "font-size" : "120%"
   });
   
   $('#para1').click(function(){
       $(this).css("color",'#0000FF');
       $('#para1').css('font-size','80%');
   });
    
    $('#submit_choix_type').remove();
    
    $('#choix_type').change(function(){
        
        var param = $(this).attr('name');
        var val = $(this).val();
        var refresh = 'index.php?'+param+'='+val+'&submit_choix_type=1';
        location.href = refresh;
    });
    
}); /*document se trouvant directement sous la fenêtre*/