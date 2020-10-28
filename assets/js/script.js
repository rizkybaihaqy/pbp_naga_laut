function nama()
{
    if(document.forms["formContact"]["name"].value == "")
    {
        alert("Please enter your name.");
            return false;
    }
}

function email()
{
    if(document.forms["formContact"]["email"].value == "")
    {
        alert("Please enter your email.");
        return false;
    }
}

function message()
{
    if(document.forms["formContact"]["message"].value == ""){
        alert("Please enter your message.");
        return false;
    }
}

function validateForm(){
    nama();
    email();
    message();
}

$(document).ready(function(){
    $(".navbar-toggler").click(function(){
      $("#navbarMain").toggleClass("bg-black");
    });
});

$(function () {
    $(document).scroll(function() {
        var $nav = $("#navbarMain");
        $nav.toggleClass("scrolled", $(this).scrollTop() > $nav.height() );
    })
})