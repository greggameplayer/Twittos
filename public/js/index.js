
$("document").ready(function(){
    $("#inscriptionbutton").on("click", onClickInscriptionButton);
    $("#homebutton").on("click", onClickHomeButton);
});

function onClickInscriptionButton(){
    $.post("../../../twittos/index.php", {page: "inscription"}, function(results){
        $("body").html(results);
        $("#inscriptionform").on("submit", onSubmitInscriptionForm);
    });
}

function onClickHomeButton(){
    window.location.reload();
}

function onSubmitInscriptionForm(event){
    event.preventDefault();
    $.post("../../../twittos/index.php", {page: "inscription.model", Email: $("#emailinscription").val(),
        Pseudo: $("#pseudoinscription").val(), Password: $("#passwordinscription").val(),
        Nom: $("#nominscription").val(), Prenom: $("#prenominscription").val()}, function(results){
        alert(results);
    });
}