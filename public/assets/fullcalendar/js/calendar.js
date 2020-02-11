
// window.mobilecheck = function() {
//   var check = false;
//   (function(a){if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4))) check = true;})(navigator.userAgent||navigator.vendor||window.opera);
//   return check;
// };
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
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek',
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
        let empresa_id 		= element.event.empresa_id;
        let description 	= element.event.extendedProps.description;
        let valorevento 	= element.event.extendedProps.valorevento;

        let newEvent = {
          _method:'PUT',
          id: element.event.id,
          start: start,
          end: end,
          contato_id: contato,
          tipo_evento_id: tipoevento,
          title: title,
          valorevento: valorevento,
          geracobranca: geracobranca,
          empresa_id: empresa_id,
          description: description
        };

        sendEvent(routeEvents('routeEventUpdate'), newEvent);
      },

      eventClick: function(element){
        clearMessages('#message');
        resetForm('#formEvent');

        $("#modalCalendar").modal('show');
        $("#modalCalendar #titleModal").text('Alterar Evento');
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
        let empresa_id = element.event.empresa_id;
        let description = element.event.extendedProps.description;
        let valorevento = element.event.extendedProps.valorevento;

        let newEvent = {
          _method:'PUT',
          id: element.event.id,
          start: start,
          end: end,
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