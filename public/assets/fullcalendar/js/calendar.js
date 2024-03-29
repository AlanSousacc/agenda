document.addEventListener('DOMContentLoaded', function() {
	var Calendar = FullCalendar.Calendar;
	var Draggable = FullCalendarInteraction.Draggable
	
	/* initialize the external events
	-----------------------------------------------------------------*/
	
	var containerEl = document.getElementById('external-events-list');
	new Draggable(containerEl, {
		itemSelector: '.fc-event',
		eventData: function(eventEl) {
			return {
				title: eventEl.innerText.trim()
			}
		},
	});
	
	/* initialize the calendar
	-----------------------------------------------------------------*/
	
	var calendarEl = document.getElementById('calendar');
	
	var calendar = new Calendar(calendarEl, {
		plugins: [ 'interaction', 'dayGrid', 'timeGrid', 'list', 'agendaWeek' ],
		defaultView: $(window).width() < 765 ? 'listWeek':'dayGridMonth',
		header: {
			left: 'prev,next today, addEventButton',
			center: 'title',
			right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek',
		},
		customButtons: {
			addEventButton: {
				text: '+',
				click: function(element) {
					$("#modalCalendar input[name='id']").val("");
					element.allDay = false
					clearMessages('#message');
					resetForm('#formEvent');
					$("#modalCalendar").modal('show');
					$("#modalCalendar #titleModal").text('Adicionar Agendamento');
					$("#modalCalendar button.deleteEvent").css('display', 'none');
					
					let start = moment(element.start).format("DD/MM/YYYY HH:mm:ss");
					$("#modalCalendar input[name='start']").val(start);
					
					let end = moment(element.end -1).hours(1).format("DD/MM/YYYY HH:mm:ss");
					$("#modalCalendar input[name='end']").val(end);
					
					$("#modalCalendar input[name='color']").val("#3788D8");
					
					calendar.unselect();
				}
			}
		},
		locale: 'pt-br',
		navLinks: true,
		eventLimit: true,
		selectable: true,
		editable: true,
		droppable: true, // this allows things to be dropped onto the calendar
		
		drop: function(arg) {
			// is the "remove after drop" checkbox checked?
			if (document.getElementById('drop-remove').checked) {
				// if so, remove the element from the "Draggable Events" list
				arg.draggedEl.parentNode.removeChild(arg.draggedEl);
			}
		},
		
		eventDrop: function(element){
			// pega a dt e hr inicial quando dropado.
			let start 				= moment(element.event.start).format("YYYY-MM-DD HH:mm:ss");
			let end   				= moment(element.event.end).format("YYYY-MM-DD HH:mm:ss");
			let contato 			= element.event.extendedProps.contato_id;
			let tipoevento 		= element.event.extendedProps.tipo_evento_id;
			let geracobranca	= element.event.extendedProps.geracobranca;
			let title 				= element.event.title;
			let color 				= element.event.backgroundColor;
			let empresa_id 		= element.event.extendedProps.empresa_id;
			let description 	= element.event.extendedProps.description;
			let valorevento 	= element.event.extendedProps.valorevento;
			
			let newEvent = {
				_method:'PUT',
				id: element.event.id,
				start: start,
				end: end,
				color: color,
				contato_id: contato,
				tipo_evento_id: tipoevento,
				title: title,
				valorevento: valorevento,
				geracobranca: geracobranca,
				empresa_id: empresa_id,
				description: description
			};
			
			// console.log(empresa_id);
			
			sendEvent(routeEvents('routeEventUpdate'), newEvent);
		},
		
		eventClick: function(element){
			clearMessages('#message');
			resetForm('#formEvent');
			
			$("#modalCalendar").modal('show');
			$("#modalCalendar #titleModal").text('Alterar agendamento');
			$("#modalCalendar button.deleteEvent").css('display', 'flex');
			
			let empresa_id = element.event.extendedProps.empresa_id;
			$("#modalCalendar input[name='empresa_id']").val(empresa_id);
			
			let id = element.event.id;
			$("#modalCalendar input[name='id']").val(id);
			
			let start = moment(element.event.start).format("DD/MM/YYYY HH:mm:ss");
			$("#modalCalendar input[name='start']").val(start);
			
			let end = moment(element.event.end).format("DD/MM/YYYY HH:mm:ss");
			$("#modalCalendar input[name='end']").val(end);
			
			let color = element.event.backgroundColor;
			$("#modalCalendar input[name='color']").val(color);
			
			if(element.event.extendedProps.geracobranca == 1){
				$("#geracobranca").prop( "checked", true );
				$('.showvalorevento').show();
				
				var valorevento = element.event.extendedProps.valorevento;
				$("#modalCalendar input[name='valorevento']").val(new Intl.NumberFormat('pt-BR', { minimumSignificantDigits: 2 }).format(valorevento));
			} else{
				$('.showvalorevento').hide();
			}
			
			let description = element.event.extendedProps.description;
			$("#modalCalendar textarea[name='description']").val(description);
			
			let contato = element.event.extendedProps.contato_id;
			$("#contato_id").val(contato);
			
			let tipoevento = element.event.extendedProps.tipo_evento_id;
			$("#tipo_evento_id").val(tipoevento);
			
			let title = element.event.title;
			$("#title").val(title)
		},
		eventResize: function(element){
			let start = moment(element.event.start).format("YYYY-MM-DD HH:mm:ss");
			let end   = moment(element.event.end).format("YYYY-MM-DD HH:mm:ss");
			let contato = element.event.extendedProps.contato_id;
			let tipoevento = element.event.extendedProps.tipo_evento_id;
			let geracobranca = element.event.extendedProps.geracobranca;
			let title = element.event.title;
			let color = element.event.color;
			let empresa_id = element.event.empresa_id;
			let description = element.event.extendedProps.description;
			let valorevento = element.event.extendedProps.valorevento;
			
			let newEvent = {
				_method:'PUT',
				id: element.event.id,
				start: start,
				end: end,
				color: color,
				contato_id: contato,
				geracobranca: geracobranca,
				tipo_evento_id: tipoevento,
				title: title,
				empresa_id: empresa_id,
				description: description,
				valorevento: valorevento
			};
			
			sendEvent(routeEvents('routeEventUpdate'), newEvent);
		},
		select: function(element){
			$("#modalCalendar input[name='id']").val("");
			element.allDay = false
			clearMessages('#message');
			resetForm('#formEvent');
			$("#modalCalendar").modal('show');
			$("#modalCalendar #titleModal").text('Adicionar Agendamento');
			$("#modalCalendar button.deleteEvent").css('display', 'none');
			
			let start = moment(element.start).format("DD/MM/YYYY HH:mm:ss");
			$("#modalCalendar input[name='start']").val(start);
			
			let end = moment(element.end -1).hours(1).format("DD/MM/YYYY HH:mm:ss");
			$("#modalCalendar input[name='end']").val(end);
			
			$("#modalCalendar input[name='color']").val("#3788D8");
			
			calendar.unselect();
		},
		events: routeEvents('routeLoadEvents'),
	});
	
	calendar.render();
});