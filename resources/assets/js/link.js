/**
 * Created by antho_000 on 12/03/2017.
 */
$(function(){

    console.log('ready!!!');

    //drop a media form

    var mediaForm = $(".media-form");
    mediaForm.hide();


    mediaForm.parent().click(function(){

        mediaForm.slideDown();
    });

   /* mediaForm.parent().blur(function(){


        mediaForm.slideUp();
    });*/

    //add pointer
    mediaForm.parent().hover(function(){

        $(this).css( 'cursor', 'pointer' );

    });

/*
    //add a link
    var addLink = $('#add-link');
    addLink.click(function() {
        // get all the inputs into an array.
        var $inputs = $('#add-link :input');

        // get an associative array of just the values.
        var values = {};
        $inputs.each(function() {
            values[this.name] = $(this).val();
        });

        console.log(values);


        $.ajax({
            url: "/link",
            type: "POST",
            data: values,


            success: function(data){

                data = JSON.parse(data);
                $("#link-list").append("<li>data.title  <button type=\"button\" class=\"btn btn-info icon glyphicon glyphicon-remove pull-right\" name=\"delete-link\" id=\"delete-link\"></button>")

            }});

    });*/






    /*$('delete-link').click(function(){
        $.ajax({
            url: "/link/"+$('this').parent().val(),
            type: "DELETE",

            success: function(){
                $('this').parent().remove();

            }});
    });*/



});