$("#contactForm").validator().on("submit", function (event) {
    if (event.isDefaultPrevented()) {
        // handle the invalid form...
        formError();
        submitMSG(false, "Todos los campos son requeridos");
    } else {
        // everything looks good!
        event.preventDefault();
        submitForm();
    }
});


function submitForm() {
    // Initiate Variables With Form Content
    var usuario = $("#usuario").val();
    var password = $("#password").val();
    

    $.ajax({
        type: "POST",
        url: "php/form-process.php",
        data: "usuario=" + usuario + "&password=" + password,
        success: function (text) {
            if (text == "success") {
                formSuccess();
            } else {
                formError();
                submitMSG(false, text);
            }
        }
    });
}

function formSuccess() {
    $("#contactForm")[0].reset();
    submitMSG(true, "Bienvenido!")
    $(location).attr('href', 'RespuestasBlueBuffalo.php')
}

function formError() {
    $("#contactForm").removeClass().addClass('shake animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
        $(this).removeClass();
    });
}

function submitMSG(valid, msg) {
    if (valid) {
        var msgClasses = "h3 text-center tada animated text-success";
    } else {
        var msgClasses = "h3 text-center text-danger";
    }
    $("#msgSubmit").removeClass().addClass(msgClasses).text(msg);
}