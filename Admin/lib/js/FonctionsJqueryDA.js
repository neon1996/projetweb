/* Copie du langage C
 * Fonctions jquery pour DA*/

$(document).ready(function(){
    
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