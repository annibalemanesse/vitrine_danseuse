'use strict';

/**************Récupération des données de formulaire au moyen d'ajax sans rechargement de la page */
$("#contact_form").submit(function(e){
    e.preventDefault();

    $("#submit").html("chargement ...")

    $.ajax({
        url : "index.php?class=contact&action=addContact",
        type: "post",
        dataType: "json",
        data: $("#contact_form").serializeArray()
    }).done(function(r){
        if(r.result == "success")
        $("#contact_form").html("<p> votre message a été bien envoyé </p>")
        else
        {
            alert("réessayer")
            $('#submit').html("<input id='submit' type='submit' value='Envoyer message'>")
        }
        
    }).fail(function(x){
        console.log(x);
        alert("contactez l'administrateur")
    })
})