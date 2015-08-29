(function($){
  $(function(){

    $('.button-collapse').sideNav();

    $( "#action" ).click(function() { 
	    var frm = $('#newle');
	    frm.submit(function (ev) {

		    $.ajax({
				
				type: 'POST',
				url: 'send.php',
				dataType: "html",
				data: {
					scenario : 1,
					email : $("#newletter").val()

				},
				beforeSend: function () {
					//$('#otro').text("cargando");
			    },
				success : function(data){
					json = data
				},
				error : function(XMLHttpRequest, textStatus, errorThrown) 
				{
				},
				complete : function() { 
					//$('#resultado_newle').html(json);
					//alert(json);			 
				}
			});

			ev.preventDefault();

		});

    });

    $( "#submit" ).click(function() { 
		var frm = $('#contacto');
    	frm.submit(function (ev) {

		    $.ajax({
				
				type: 'POST',
				url: 'send.php',
				dataType: "json",
				data: {
					scenario : 2,
					datos: frm.serialize()
				},
				beforeSend: function () {
					//$('#otro').text("cargando");
			    },
				success : function(data){
					json = data
					//console.log(data.code);
					if(data.code == 1){
						$('#area_contacto').hide(1000);

						$('#area_mensaje').show("slow");
					}else{
						alert(data.mensaje);
					}

					//console.log(data);
					//alert(data);
				},
				error : function(XMLHttpRequest, textStatus, errorThrown) 
				{
					alert("Hubo un problema con el servidor, por favor intentalo de nuevo más tarde: "+textStatus+"  "+errorThrown+"  ");
					console.log(XMLHttpRequest);
				},
				complete : function(data) { 
					
					
				}
			});

			ev.preventDefault();
			$('#contacto')[0].reset();

		});
	});

  }); // end of document ready
})(jQuery); // end of jQuery name space