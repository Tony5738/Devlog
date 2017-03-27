/**
 * Created by antho_000 on 12/03/2017.
 */
$(function(){

    console.log('ready!!!');

    var LinkIsOpen = false;

    //slide up all media form
    var mediaForm = $(".media-form");
    mediaForm.hide();


    //slide down link form
    $("#link").click(function(){

        $("#link .media-form").slideDown();

    });

    //slide down image form
    $("#image").click(function(){

        $("#image .media-form").slideDown();
    });

    //slide down video form
    $("#video").click(function(){

        $("#video .media-form").slideDown();
    });

    //slide down document form
    $("#document").click(function(){

        $("#document .media-form").slideDown();
    });

    //add pointer
    mediaForm.parent().hover(function(){

        $(this).css( 'cursor', 'pointer' );

    });

});