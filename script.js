$(document).ready(init);

function init() {

    // add handlers to .like
    // if() {}

    $(".like").hover(likeHover, likeHout);
    $(".like").click(likeClick);

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
    UserId = $(this).parent().attr('class');

    $(this).unbind('click');
    $(this).hover(likeHover, likeHout);
    $(this).css("opacity", "0.9")

    $(this).click(likeClick);

    $.ajax({
        type: 'POST',
        url: 'ajax_like/unlike',
        data: 'postId='+PostIdt+'&userId='+UserId,
        success: function (data) {
               $(this).parent().css("border", "1px solid red");

            $('#' + idOfPost + ' .status').html('Total posts: '+data);
            //$(".status").html(data);


            //$(this).attr({src:"img/404.jpg", alt:"Your vote was accepted!"+data});
            // alert($(this).parent().parent().attr('src'));
        }
    });


}


function likeClick() {

    //@todo переделать
    //   $(this).toggle('fast');
    PostId = $(this).parent().attr('id'); 
    UserId = $(this).parent().attr('class');
    $(this).css("opacity", "0.9")
    $(this).hover(likeHover, unlikeHout);
    $(this).unbind('click');
    $(this).click(unlikeClick);
//    alert(par);

    $.ajax({
        type: 'POST',
        url: 'ajax_like/like',
        data: 'postId='+PostId+'&userId='+UserId,
        success: function (data) {

            //  $(this).css("border", "1px solid red");
         //  $(".status").html(data);
          //  $(this.parent()..status.html(data);

            console.log(data);
        $('#' + idOfPost + ' .status').html('Total posts: '+data);

            //$(this).attr({src:"img/404.jpg", alt:"Your vote was accepted!"+data});
            // alert($(this).parent().parent().attr('src'));
        }
    });


}
