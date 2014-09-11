// JavaScript Document
$(document).ready(function(){
	fn_buscar();
	$("#grilla tbody tr").mouseover(function(){
		$(this).addClass("over");
	}).mouseout(function(){
		$(this).removeClass("over");
	});
});

function fn_cerrar(){
	$.unblockUI({ 
		onUnblock: function(){
			$("#div_oculto").html("");
		}
	}); 
};
function fn_reglamento(rama){
	//alert('Disponible a partir del 29/9/2014');
	 window.location.href="reglamento.php?esp="+rama
};
function fn_mostrar_frm_agregar(ide_per){
	//alert('Lee el reglamente');
	// window.location.href="documentacion/reglamento.pdf";
	MiVariable=prompt("Ingresa tu DNI")
	$("#div_oculto").load("ajax_form_agregar.php", {ide_per: MiVariable},  function(){
		$.blockUI({
			message: $('#div_oculto'),
			css:{
				left: '1%'	,top: '1%'	
			}
		}); 
	});
};

function fn_administracion(){
//	MiVariable=prompt("Solo disponible para administracion. Ingresa tu clave:")

	//if (MiVariable=='123'){
	// window.location.href="http://www.aplic.ic.gba.gob.ar/artejoven/adm/index.php"
	 window.location.href="indexadm.php"
//	}
};

function fn_modificar(ide_per){
	$("#div_oculto").load("ajax_form_modificar.php", {ide_per: ide_per},  function(){
		$.blockUI({
			message: $('#div_oculto'),
			css:{
				left: '1%'	,top: '1%'	
			}
		}); 
	});
};

function fn_imprimir(ide_per){
	$("#div_oculto").load("ajax_form_imprimir.php", {ide_per: ide_per},  function(){
		$.blockUI({
			message: $('#div_oculto'),
			css:{
				left: '1%'	,top: '1%'	
			}
		}); 
	});
};


function fn_mostrar_frm_modificar(ide_per){
	$("#div_oculto").load("ajax_form_modificar.php", {ide_per: ide_per}, function(){
		$.blockUI({
			message: $('#div_oculto'),
			css:{
				left: '1%'	,top: '1%'	
			}
		}); 
	});
};

function fn_mostrar_frm_consulta(ide_per){
	$("#div_oculto").load("ajax_form_consulta.php", {ide_per: ide_per}, function(){
		$.blockUI({
			message: $('#div_oculto'),
			css:{
				left: '1%'	,top: '1%'	
			}
		}); 
	});
};
function fn_mostrar_frm_modificarFotos(ide_per){
	$("#div_oculto").load("ajax_form_modificarFotos.php", {ide_per: ide_per}, function(){
		$.blockUI({
			message: $('#div_oculto'),
			css:{
				left: '1%'	,top: '1%'	
			}
		}); 
	});
};
function fn_mostrar_frm_modificarFotos1(ide_per){
	$("#div_oculto").load("fotos_input.php", {ide_per: ide_per}, function(){
		$.blockUI({
			message: $('#div_oculto'),
			css:{
				left: '1%'	,top: '1%'	
			}
		}); 
	});
};


function fn_paginar(var_div, url){
	var div = $("#" + var_div);
	$(div).load(url);
	/*
	div.fadeOut("fast", function(){
		$(div).load(url, function(){
			$(div).fadeIn("fast");
		});
	});
	*/
}

function fn_eliminar(ide_per){
	var respuesta = confirm("Desea eliminar a este registro?");
	if (respuesta){
		$.ajax({
			url: 'ajax_eliminar.php',
			data: 'id=' + ide_per,
			type: 'post',
			success: function(data){
				if(data!="")
					alert(data);
				fn_buscar()
			}
		});
	}
}
function fn_cerrar_form(ide_per){
	var respuesta = confirm("Marca como recibido el formulario ?");
	if (respuesta){
		$.ajax({
			url: 'ajax_cerrar.php',
			data: 'id=' + ide_per,
			type: 'post',
			success: function(data){
				if(data!="")
					alert(data);
				fn_buscar()
			}
		});
	}
}

function fn_buscar(){
	var str = $("#frm_buscar").serialize();
	$.ajax({
		url: 'ajax_listar.php',
		type: 'get',
		data: str,
		success: function(data){
			$("#div_listar").html(data);
		javascript:cerrar();
		}
	});
}

function justNumbers(e)
{
var keynum = window.event ? window.event.keyCode : e.which;
if ((keynum == 8) || (keynum == 46))
return true;
 
return /\d/.test(String.fromCharCode(keynum));
}
