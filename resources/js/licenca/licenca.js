$('#licenca').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget);
	var emprid = button.data('emprid');
  var modal  = $(this);
  modal.find('.modal-body #emprid').val(emprid);
});

$(function() {
	var start = moment().subtract(29, 'days');
	var end = moment();
	
	function cb(start, end) {
		$('#validade span').html(start.format('DD/MM/YYYY') + ' - ' + end.format('DD/MM/YYYY'));
		$('#valstart').val(start.format('YYYY-MM-DD'));
		$('#valend').val(end.format('YYYY-MM-DD'));
	}
	
	$('#validade').daterangepicker({
		"locale": {
			"format": "MM/DD/YYYY",
			"separator": " - ",
			"applyLabel": "Aplicar",
			"cancelLabel": "Cancelar",
			"fromLabel": "De",
			"toLabel": "Para",
			"customRangeLabel": "Customizado",
			"weekLabel": "S",
			"daysOfWeek": [
					"Dom",
					"seg",
					"Ter",
					"qua",
					"qui",
					"Sex",
					"Sab"
			],
			"monthNames": [
					"Janeiro",
					"Fevereiro",
					"Março",
					"Abril",
					"Maio",
					"Junho",
					"Julho",
					"Agosto",
					"Setembro",
					"Outubro",
					"Novembro",
					"Dezembro"
			],
		},
		startDate: start,
		endDate: end,
		ranges: {
			'Hoje': [moment(), moment()],
			'7 Dias': [moment(), moment().add(7, 'days')],
			'1 Mês': [moment(), moment().add(1, 'months')],
			'6 Meses': [moment(), moment().add(6, 'months')],
			'1 Ano': [moment(), moment().add(1, 'years')]
		}
	}, cb);
	cb(start, end);
});

// Gera código md5 ao clicar no botão 
$('.generate').on('click', function (e) {
	e.preventDefault();
	// pega o d/m/y h:m:s e criptografa
	var date = new Date()
	var info = date.getDay() + ' ' + date.getMonth() + ' ' + date.getFullYear() + ' ' + date.getHours() + ":" + date.getMinutes() + ":" + date.getSeconds()
	var hash = CryptoJS.MD5(info);
	$('#hash').val(hash);
});

$(document).ready(function(){
	$("select.status").change(function(){
		var select = $(this).children("option:selected").val();
		if (select == 0) {
			$("#validade").addClass("disableValidade");
			$("#validade").removeClass("enableValidade");
			$('.hash').attr('readonly', true)
			$(".hash").removeAttr("onkeypress");
			$('.generate').prop('disabled', true);
		} else{
			$("#validade").removeClass("disableValidade");
			$("#validade").addClass("enableValidade");
			$('.hash').attr('readonly', false);
			$(".hash").attr("onkeypress", "return false;");
			$('.generate').prop('disabled', false);
		}
	});
});
