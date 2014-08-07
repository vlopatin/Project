$(document).ready(init);

function init() {

// add handlers to .like
// if() {}
//    $(".like").hover(likeHover, likeHout);
//    $(".like").click(likeClick);
//    $(".unlike").hover(likeHover(), unlikeHout());
//    $(".unlike").click(unlikeClick);


//    alert('22');

    $('input[name = login]').val();
    $('input[name = name]').val();
    $('input[name = lastname]').val();

    $(name=editProfile).css("border", "1px solid red");

    alert($(name=editProfile).attr('id'));






}


// like mouse over event
function likeHover() {
    $(this).css("opacity", "1")
}


// like mouse out event
function unlikeHout() {
    $(this).css("opacity", "0.9")
}


function likeHout() {
    $(this).css("opacity", "0.5")
}


function unlikeClick() {

    //   $(this).toggle('fast');
    PostId = $(this).parent().attr('id');
    PostIdJson = PostId.substring(4);

    UserId = $(this).parent().att
}