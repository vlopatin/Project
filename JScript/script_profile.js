$(document).ready(init);

function init() {


    reset();

    $('input[name = bReset]').click(reset);
    $('input[name = bCancel]').click(cancel);
    $('input[name = bSave]').click(save);
    $('input[name = bChange]').click(change);
}


function save() {
    var UserId = $(name = editProfile).attr('id').substring(4);
    var Name = $('input[name = name]').val();
    var LastName = $('input[name = lastname]').val();
    var Data = { "userId": UserId, "name": Name, "lastName": LastName };

    $.ajax({
        type: 'POST',
        url: 'ajax_profile/save',
        data: Data,
        success: function (data) {
            data = $.parseJSON(data);
            alert(data);

        }
    })

    reset();
}

function cancel() {
    location.href = '/forum';
}


function change() {
    var UserId = $(name = editProfile).attr('id').substring(4);
    var PasswdNew = $('input[name = passwdNew]').val();
    var PasswdNewMD5 = $.md5($('input[name = passwdNew]').val());
    var PasswdConf = $('input[name = passwdConf]').val();
    var PasswdOld = $('input[name = passwdOld]').val();
    var PasswdOldMD5 = $.md5($('input[name = passwdOld]').val());

    var Data = { "userId": UserId, "passwdOldMD5": PasswdOldMD5, "passwdNewMD5": PasswdNewMD5 };

    if (PasswdConf !== PasswdNew) {
        alert('New password and confirmation does not match !');
    } else {

        $.ajax({
            type: 'POST',
            url: 'ajax_profile/change_pswd',
            data: Data,

            success: function (data) {

                data = $.parseJSON(data);

                $('input[name = passwdNew]').val('');
                $('input[name = passwdConf]').val('');
                $('input[name = passwdOld]').val('');
                alert(data);




            }
        })
    }

}


function reset() {


    var UserId = $(name = editProfile).attr('id').substring(4);


    Data = { "userId": UserId};
//
    $.ajax({
        type: 'POST',
        url: 'ajax_profile/reset',

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
//            alert(data.login);
//            alert(data.name);
//            alert(data.lastname);
            $('input[name = login]').val(data.login);
            $('input[name = name]').val(data.name);
            $('input[name = lastname]').val(data.lastname);
//
        }
    });
}


