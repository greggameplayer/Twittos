let toggledropdown = false;


$("document").ready(function(){
    $("#inscriptionbutton").on("click", onClickInscriptionButton);
    $("#homebutton").on("click", onClickHomeButton);
    $("#connexionform").on("submit", onSubmitConnexionForm);
    $("#deconnexionbutton").on("click", onClickDeconnexionButton);
    $("#searchform").on("submit", onSubmitSearchForm);
    $("#parametersbutton").on("click", onClickParametersButton);
    $("#tweetcreationform").on("submit", onSubmitTweetcreationForm);
    $("#tweetcreationTextarea").on("input", onChangeTextArea);
});

function onClickInscriptionButton(){
    $.post("../../../twittos/index.php", {page: "inscription"}, function(results){
        $("body").html(results);
        $("#inscriptionform").on("submit", onSubmitInscriptionForm);
        $(".dropdown-toggle").off("click");
        $(".dropdown-toggle").on("click", {toggle: toggledropdown}, onDropdownClick);
        $("#homebutton").on("click", onClickHomeButton);
        $("#connexionform").on("submit", onSubmitConnexionForm);
        $("#deconnexionbutton").on("click", onClickDeconnexionButton);
        $("#searchform").on("submit", onSubmitSearchForm);
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
        $("#alert").html(results);
        $("#alert").css("visibility", "visible");
        $(".dropdown-toggle").off("click");
        $(".dropdown-toggle").on("click", {toggle: toggledropdown}, onDropdownClick);
        $("#homebutton").on("click", onClickHomeButton);
        $("#connexionform").on("submit", onSubmitConnexionForm);
        $("#deconnexionbutton").on("click", onClickDeconnexionButton);
    });
}

function onSubmitConnexionForm(event){
    event.preventDefault();
    $.post("../../../twittos/index.php", {page: "connexion.model", Email: $("#emailconnexion").val(),
        Password: $("#passwordconnexion").val()}, function(results){
        $("body").html(results);
        $(".dropdown-toggle").off("click");
        $(".dropdown-toggle").on("click", {toggle: toggledropdown}, onDropdownClick);
        $("#homebutton").on("click", onClickHomeButton);
        $("#connexionform").on("submit", onSubmitConnexionForm);
        $("#deconnexionbutton").on("click", onClickDeconnexionButton);
        $("#searchform").on("submit", onSubmitSearchForm);
        $("#tweetcreationform").on("submit", onSubmitTweetcreationForm);
        $("#parametersbutton").on("click", onClickParametersButton);
        $("#tweetcreationTextarea").on("input", onChangeTextArea);
    });
}

function onClickDeconnexionButton(event){
    $.post("../../../twittos/index.php", {page: "deconnexion"}, function(results){
        $("body").html(results);
        $(".dropdown-toggle").off("click");
        $(".dropdown-toggle").on("click", {toggle: toggledropdown}, onDropdownClick);
        $("#homebutton").on("click", onClickHomeButton);
        $("#connexionform").on("submit", onSubmitConnexionForm);
        $("#inscriptionbutton").on("click", onClickInscriptionButton);
        $("#deconnexionbutton").on("click", onClickDeconnexionButton);
        $("#searchform").on("submit", onSubmitSearchForm);
    });
}

function onDropdownClick(event){
    if(event.data.toggle == false){
        $(".dropdown").addClass("show");
        $(".dropdown-menu").addClass("show");
        event.data.toggle = true;
    }else{
        $(".dropdown").removeClass("show");
        $(".dropdown-menu").removeClass("show");
        event.data.toggle = false;
    }
}

function onSubmitSearchForm(event){
    event.preventDefault();
    $.post("../../../twittos/index.php", {page: "tweetsearch", searchvalue: $("#searchbar").val()}, function(results){
        $("body").html(results);
        $("#homebutton").on("click", onClickHomeButton);
        $("#connexionform").on("submit", onSubmitConnexionForm);
        $("#deconnexionbutton").on("click", onClickDeconnexionButton);
        $("#searchform").on("submit", onSubmitSearchForm);
        $("#tweetcreationform").on("submit", onSubmitTweetcreationForm);
        $("#parametersbutton").on("click", onClickParametersButton);
        $("#tweetcreationTextarea").on("input", onChangeTextArea);
        $(".dropdown-toggle").off("click");
        $(".dropdown-toggle").on("click", {toggle: toggledropdown}, onDropdownClick);
    });
}

function onSubmitTweetcreationForm(event){
    event.preventDefault();
    $.post("../../../twittos/index.php", {page: "tweetcreation.model", content: $("#tweetcreationTextarea").val()}, function(results){
        $("#alert").html(results);
        $("#alert").css("visibility", "visible");
        $("#homebutton").on("click", onClickHomeButton);
        $("#connexionform").on("submit", onSubmitConnexionForm);
        $("#deconnexionbutton").on("click", onClickDeconnexionButton);
        $("#searchform").on("submit", onSubmitSearchForm);
        $("#tweetcreationform").on("submit", onSubmitTweetcreationForm);
        $("#parametersbutton").on("click", onClickParametersButton);
        $("#tweetcreationTextarea").on("input", onChangeTextArea);
        $(".dropdown-toggle").off("click");
        $(".dropdown-toggle").on("click", {toggle: toggledropdown}, onDropdownClick);
        setTimeout(function(){
            window.location.reload();
        }, 500);
    });
}

function onClickParametersButton(event){
    $.post("../../../twittos/index.php", {page: "parameters"}, function(results){
        $("body").html(results);
        $("#homebutton").on("click", onClickHomeButton);
        $("#connexionform").on("submit", onSubmitConnexionForm);
        $("#deconnexionbutton").on("click", onClickDeconnexionButton);
        $("#parametersbutton").on("click", onClickParametersButton);
        $("#maindivparameters form").on("submit", onSubmitPasswordChangeForm);
    });
}

function onSubmitPasswordChangeForm(event){
    event.preventDefault();
    $.post("../../../twittos/index.php", {page: "parameters.model", oldPassword: $("#oldPassword").val(),
    newPassword: $("#newPassword").val()}, function(results){
        $("#alert").html(results);
        $("#alert").css("visibility", "visible");
        $("#homebutton").on("click", onClickHomeButton);
        $("#connexionform").on("submit", onSubmitConnexionForm);
        $("#deconnexionbutton").on("click", onClickDeconnexionButton);
        $("#parametersbutton").on("click", onClickParametersButton);
        $("#maindivparameters form").on("submit", onSubmitPasswordChangeForm);
        setTimeout(function(){
            window.location.reload();
        }, 500);
    });
}

function onChangeTextArea(event){
    $("#characterlength").html($("#tweetcreationTextarea").val().length + "/255");
    if($("#tweetcreationTextarea").val().length > 240){
        $("#characterlength").css("color", "red");
    }else{
        $("#characterlength").css("color", "black");
    }
}