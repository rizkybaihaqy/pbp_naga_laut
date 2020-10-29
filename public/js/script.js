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

//fungsi lihat gambar yg di upload
function previewImage()
{
    const thumbnail = document.querySelector('#gambar');
    const thumbnailLabel = document.querySelector('.custom-file-label');
    const thumbnailPreview = document.querySelector('.img-preview');

    thumbnailLabel.textContent = thumbnail.files[0].name;

    const fileThumbnail = new FileReader();
    fileThumbnail.readAsDataURL(thumbnail.files[0]);

    fileThumbnail.onload = function(e){
        thumbnailPreview.src = e.target.result;
    }
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