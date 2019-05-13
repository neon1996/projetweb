/* Copie du langage C
 * Fonctions jquery pour DA*/

$(document).ready(function(){
    
    
    // Tableau editable vue ingredient - type !! uniquement ingrédient éditable ! 
    $("span[id]").click(function () {
      //Récupération du contenu d'origine de la zone cliquée
        var valeur1 = $.trim($(this).text());

        //s'il fallait tester si on utilise edge :
        if (/Edge\/\d./i.test(navigator.userAgent)) {
            $(this).addClass("borderInput");
        }

        //2 lignes suivantes pour firefox
        $(this).contentEditable = "true";
        $(this).addClass("borderInput");

       //récupération, pour la zone cliquée, des attributs id et name, pour les envoyer à la requête sql
        var ident = $(this).attr("id");
        var name = $(this).attr("name");

        $(this).blur(function () {
            $(this).removeClass("borderInput");
           //récupération de la nouveau contenu du champ qui vient de perdre le focus (blur)
            var valeur2 = $(this).text();
            valeur2 = $.trim(valeur2);

            if (valeur1 != valeur2) // Si on a fait un changement
            {
               //adjonction des paramètres qui accompagnent le nom du fichier appelé
                var parametre = 'champ=' + name + '&id=' + ident + '&nouveau=' + valeur2;
               // alert (parametre);
                var retour = $.ajax({
                    type: 'GET',
                    data: parametre,
                    dataType: "text",
                    url: "./lib/php/ajax/ajaxUpdateIngredient.php",
                    success: function (data) {
                       //rien de particulier à faire
                        console.log("success");
                    }
                });
                retour.fail(function (jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR);
                    console.log(textStatus);
                    console.log(errorThrown);
                });
            };
        });
    });
    
    
    // Tableau éditable vue Client - Commande
    
    $("span[id]").click(function () {
      //Récupération du contenu d'origine de la zone cliquée
        var valeur1 = $.trim($(this).text());

        //s'il fallait tester si on utilise edge :
        if (/Edge\/\d./i.test(navigator.userAgent)) {
            $(this).addClass("borderInput");
        }

        //2 lignes suivantes pour firefox
        $(this).contentEditable = "true";
        $(this).addClass("borderInput");

       //récupération, pour la zone cliquée, des attributs id et name, pour les envoyer à la requête sql
        var ident = $(this).attr("id");
        var name = $(this).attr("name");

        $(this).blur(function () {
            $(this).removeClass("borderInput");
           //récupération de la nouveau contenu du champ qui vient de perdre le focus (blur)
            var valeur2 = $(this).text();
            valeur2 = $.trim(valeur2);

            if (valeur1 != valeur2) // Si on a fait un changement
            {
               //adjonction des paramètres qui accompagnent le nom du fichier appelé
                var parametre = 'champ=' + name + '&id=' + ident + '&nouveau=' + valeur2;
               // alert (parametre);
                var retour = $.ajax({
                    type: 'GET',
                    data: parametre,
                    dataType: "text",
                    url: "./lib/php/ajax/ajaxUpdateClient.php",
                    success: function (data) {
                       //rien de particulier à faire
                        console.log("success");
                    }
                });
                retour.fail(function (jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR);
                    console.log(textStatus);
                    console.log(errorThrown);
                });
            };
        });
    });
  
    //auto-complétion : 
   
   $('#mdp').blur(function () {
       //alert("coucou");
        email1 = $('#email1').val();
        email2 = $('#email2').val();
       // email2 = $('#email2').val();
         mdp = $('#mdp').val();
       // alert(email1 + " "+email2+ " "+mdp);
 
        if (($.trim(email1) != '' && $.trim(email2 != '')) && (email1 == email2) && $.trim(mdp != '')) {
            //alert("email1 = "+email1+" et email2 = "+email2+ " et password = "+password);
            var recherche = "email=" + email1 + "&mdp=" + mdp;   
         //alert(recherche);
            $.ajax({
                type: 'GET',
                data: recherche,
                dataType: "json", //type de données reçues
                url: './Admin/lib/php/ajax/ajaxRechercheClient.php',
                success: function (data) { // retournÃ© par le fichier php
                    $('#nom').val(data[0].nom);
                    $('#prenom').val(data[0].prenom);
                    $('#telephone').val(data[0].telephone);
                    $('#rue').val(data[0].rue);
                    $('#ville').val(data[0].ville);
                    $('#numero').val(data[0].numero);
                    $('#cp').val(data[0].cp);
                    
                    
                    
                    console.log(data[0].nom);
                    console.log('dfghjk');
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