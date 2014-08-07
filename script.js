$(document).ready(init);

function init() {

    // add handlers to .like
    // if() {}

    $(".like").hover(likeHover, likeHout);
    $(".like").click(likeClick);
    $(".unlike").hover(likeHover(), unlikeHout());
    $(".unlike").click(unlikeClick);
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

    UserId = $(this).parent().attr('class');
    UserIdJson = UserId.split(" ");
    UserIdJson = UserIdJson[0].substring(5);

    Data = { "userId": UserIdJson, "postId": PostIdJson };


    $(this).unbind('click');
    $(this).hover(likeHover, likeHout);
    $(this).css("opacity", "0.9")

    $(this).click(likeClick);

    $.ajax({
        type: 'POST',
        url: 'ajax_like/unlike',
        data: Data,
        //   contentType: 'application/json',
        success: function (data) {
            //   $(this).parent().css("border", "1px solid red");

            //data1 = $.parseJSON(data);
            //  data = data.substring(4);
            data = $.parseJSON(data);

            $('#' + PostId + ' .status').html(data.summ + "  ");
            //$(".status").html(data);


            //$(this).attr({src:"img/404.jpg", alt:"Your vote was accepted!"+data});
            // alert($(this).parent().parent().attr('src'));
        }
    });

}

function likeClick() {

    //@todo переделать

    var PostId = $(this).parent().attr('id');
    var PostIdJson = PostId.substring(4);

    var UserId = $(this).parent().attr('class');
    var UserIdJson = UserId.split(" ");
    var UserIdJson = UserIdJson[0].substring(5);

    var Data = {'userId': UserIdJson, 'postId': PostIdJson};

    //PostId = PostId.substring(5);
    //alert(UserId);

    $(this).css("opacity", "0.9")
    $(this).hover(likeHover, unlikeHout);
    $(this).unbind('click');
    $(this).click(unlikeClick);


    // alert(PostId);
    //  alert(UserId);
//     Data = JSON.stringify(Data);

//    $.post( "ajax_like/like", Data, function( data ) {
//        console.log(data);
//    }, 'json');
    $.ajax({
        type: 'POST',
        url: 'ajax_like/like',
        //    contentType: 'application/json',
        data: Data,
        //  dataType: 'json',


        success: function (data) {
            //  $(this).css("border", "1px solid red");
            //  $(".status").html(data);
            //  $(this.parent()..status.html(data);

            // console.log(data);
            //alert(PostId);

            //data1 = $.parseJSON(data + "");
            //    alert(data);


            data = $.parseJSON(data);
            //       alert(data.summ);
            $('#' + PostId + ' .status').html(data.summ + "  ");

            //$(this).attr({src:"img/404.jpg", alt:"Your vote was accepted!"+data});
            // alert($(this).parent().parent().attr('src'));
        }
    });


}
