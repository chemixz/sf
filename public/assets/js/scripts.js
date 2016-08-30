$(document).ready(function($) {
	$('.eliminar').click(function() {
		if(!confirm('¿Realmente desea eliminar el registro?'))
		{
			return false;
		}
	});
	$('.cclave').click(function() {
		if(!confirm('¿Realmente desea reinicializar la clave de este usuario?'))
		{
			return false;
		}
	});
	$('#fecha').datepicker({
		dateFormat: 'dd/mm/yy',
		monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ],
		monthNamesShort: [ "Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic" ],
		changeYear: true,
		changeMonth: true,
		minDate: '0d',
		yearRange: "+0:+20"
	});
	
	$.post('/getData', null, function(datos) {
		var data = [
		  ['Ingresos', datos.Ingresos],['Egresos', datos.Egresos], ['Patrimonio', datos.Patrimonio]
		];
		  var plot1 = jQuery.jqplot ('chart1', [data],
		    {
		    	seriesColors:['#42B647', '#FF4545', '#DBE267'],
		      seriesDefaults: {
		        renderer: jQuery.jqplot.PieRenderer,
		        rendererOptions: {
		          showDataLabels: true
		        }
		      },
		      legend: { show:true, location: 'e' }
		    }
		  );
	});
});	