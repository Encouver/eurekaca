(function ($) {

    $(function () {

        $('.button-collapse').sideNav();

        $("#newle").on('submit',function (ev) {
           // var frm = $('#newle');

           // frm.submit(function (ev) {

                $.ajax({
                    type: 'POST',
                    url: 'send.php',
                    dataType: "json",
                    data: {
                        scenario: 1,
                        email: $("#newletter").val()

                    },
                    beforeSend: function () {

                        //$('#otro').text("cargando");
                        //alert('Enviando');

                    },
                    success: function (data) {

                        json = data

                        //console.log(data);
                        if(data['status']) {
                            $('#newletter').val('');

                            $('#area_subscripcion').hide(1000);

                            $('#men_sub_text').empty().html(data['message']);

                            $('#area_mensaje_sub').show("slow");

                        }else
                            alert(data["message"]);


                    },
                    error: function (XMLHttpRequest, textStatus, errorThrown) {

                    },
                    complete: function () {
                        //$('#resultado_newle').html(json);

                        //alert(json);
                    }
                });

                ev.preventDefault();

            //return false;

           // });

        });


        $("#submit").click(function () {

            var frm = $('#contacto');

            frm.submit(function (ev) {

                $.ajax({
                    type: 'POST',
                    url: 'send.php',
                    dataType: "json",
                    data: {

                        scenario: 2,

                        datos: frm.serialize()

                    },
                    beforeSend: function () {

                        //$('#otro').text("cargando");

                    },
                    success: function (data) {

                        json = data

                        //console.log(data.code);

                        if (data.code == 1) {

                            $('#area_contacto').hide(1000);


                            $('#area_mensaje').show("slow");

                        }
                        /*else{

                         alert(data.mensaje);

                         }*/


                        //console.log(data);

                        //alert(data);

                    },
                    error: function (XMLHttpRequest, textStatus, errorThrown) {
                        //alert("Hubo un problema con el servidor, por favor intentalo de nuevo más tarde: "+textStatus+"  "+errorThrown+"  ");

                        console.log(XMLHttpRequest);
                    },
                    complete: function (data) {


                    }
                });


                ev.preventDefault();

                $('#contacto')[0].reset();


            });

        });


    }); // end of document ready

})(jQuery); // end of jQuery name space