$(document).ready(function(){

	
	var iddepart;
	var idprov;

	$('#opcDepart').change(function(){
		iddepart = $('#opcDepart').val();
		$.ajax({
			url: 'carga_cbos.php',
			type: 'POST',
			data: {sw:1,id: iddepart},
		})
		.done(function(htmlexterno) {
			// console.log(htmlexterno);
			$("#content_prov").html(htmlexterno);
		})
		.fail(function() {
			// console.log("error");
		})
		.always(function() {
			// console.log("completadooooo");
		});
	});


	$('#opcProvincia').change(function(){
		idprov = $('#opcProvincia').val();
		$.ajax({
			url: 'carga_cbos.php',
			type: 'POST',
			data: {sw:2,id: idprov}
		})
		.done(function(htmlexterno) {
			// console.log(htmlexterno);
			$("#content_distrito").html(htmlexterno);
		})
		.fail(function() {
			// console.log("error");
		})
		.always(function() {
			// console.log("completadooooo");
		});
	});


})


$("#frmBusqueda").on('submit',(function(e) {
  e.preventDefault();
	$('consultar')	
		$.ajax({
			url: 'buscar.php',
			type: 'POST',
			data:  new FormData(this),
			contentType: false,
      cache: false,
   		processData:false,
		})
		.done(function(htmlexterno) {
			// console.log(htmlexterno);
			$("#cont_busqueda").html(htmlexterno);
			$("#frmBusqueda")[0].reset(); 
		})
		.fail(function() {
			// console.log("error");
		})
		.always(function() {
			// console.log("completadooooo");
		});

  // $.ajax({
  //        url: "grabar_imagen.php",
  //  type: "POST",
  //  data:  new FormData(this),
  //  contentType: false,
  //        cache: false,
  //  processData:false,
  //  beforeSend : function()
  //  {
  //   //$("#preview").fadeOut();
  //   $("#err").fadeOut();
  //  },
  //  success: function(data)
  //     {
  //   if(data=='invalid')
  //   {
  //    // invalid file format.
  //    $("#err").html("Invalid File !").fadeIn();
  //   }
  //   else
  //   {
  //    // view uploaded file.
  //    $("#preview").html(data).fadeIn();
  //    $("#form")[0].reset(); 
  //   }
  //     },
  //    error: function(e) 
  //     {
  //   $("#err").html(e).fadeIn();
  //     }          
  //   });
 }));