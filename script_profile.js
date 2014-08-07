$(document).ready(init);

function init() {

    reset();

// add handlers to .like
// if() {}
//    $(".like").hover(likeHover, likeHout);
//    $(".like").click(likeClick);
//    $(".unlike").hover(likeHover(), unlikeHout());
//    $(".unlike").click(unlikeClick);


//    alert('22');


//    $('input[name = login]').val();
//    $('input[name = name]').val();
//    $('input[name = lastname]').val();


}

function reset() {

//    $(name = editProfile).css("border", "1px solid red");
    //alert($(name = editProfile).attr('id'));
    var UserId = $(name = editProfile).attr('id').substring(4);
    // alert(UserId);


    Data = { "userId": UserId};

    $.ajax({
        type: 'POST',
        url: 'ajax_reset/reset',
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


            $('input[name = login]').val(data.login) ;
            $('input[name = name]').val(data.name);
            $('input[name = lastname]').val(data.lastname);


//           $('#' + PostId + ' .status').html(data.summ + "  ");

            //$(this).attr({src:"img/404.jpg", alt:"Your vote was accepted!"+data});
            // alert($(this).parent().parent().attr('src'));
        }
    });
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