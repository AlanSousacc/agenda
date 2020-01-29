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
      plugins: [ 'interaction', 'dayGrid', 'timeGrid', 'list' ],
      // defaultView: 'listWeek',
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

      // eventRender: function(event, element) {
      //   // console.log(event.event.extendedProps.contato_id)
      //   console.log(event.el.querySelectorAll('.fc-title') = 'event.event.extendedProps.description')
      //   // event.el.querySelectorAll('.fc-title').html = 'event.event.extendedProps.description'
      //   // element.find('.fc-content .fc-title').append(event.event.extendedProps.contato_id);
      // },

      drop: function(arg) {
        // is the "remove after drop" checkbox checked?
        if (document.getElementById('drop-remove').checked) {
          // if so, remove the element from the "Draggable Events" list
          arg.draggedEl.parentNode.removeChild(arg.draggedEl);
        }
      },

      eventDrop: function(element){
        // pega a dt e hr inicial quando dropado.
        let start = moment(element.event.start).format("YYYY-MM-DD HH:mm:ss");
        let end   = moment(element.event.end).format("YYYY-MM-DD HH:mm:ss");
        let contato = element.event.extendedProps.contato_id;
        let title = element.event.title;
        let empresa_id = element.event.empresa_id;
        let description = element.event.extendedProps.description;

        let newEvent = {
          _method:'PUT',
          id: element.event.id,
          start: start,
          end: end,
          contato_id: contato,
          title: title,
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

        let description = element.event.extendedProps.description;
        $("#modalCalendar textarea[name='description']").val(description);

        let contato = element.event.extendedProps.contato_id;
        $("#contato_id").val(contato);

        let title = element.event.title;
        $("#title").val(title)

      },
      eventResize: function(element){
        let start = moment(element.event.start).format("YYYY-MM-DD HH:mm:ss");
        let end   = moment(element.event.end).format("YYYY-MM-DD HH:mm:ss");
        let contato = element.event.extendedProps.contato_id;
        // let title = element.event.title;
        let title = element.event.title;
        let empresa_id = element.event.empresa_id;
        let description = element.event.extendedProps.description;

        let newEvent = {
          _method:'PUT',
          id: element.event.id,
          start: start,
          end: end,
          contato_id: contato,
          title: title,
          empresa_id: empresa_id,
          description: description
        };

        sendEvent(routeEvents('routeEventUpdate'), newEvent);
      },
      select: function(element){
        clearMessages('#message');
        resetForm('#formEvent');
        $("#modalCalendar").modal('show');
        $("#modalCalendar #titleModal").text('Adicionar Agendamento');
        $("#modalCalendar button.deleteEvent").css('display', 'none');

        let start = moment(element.start).format("DD/MM/YYYY HH:mm:ss");
        $("#modalCalendar input[name='start']").val(start);

        let end = moment(element.end).format("DD/MM/YYYY HH:mm:ss");
        $("#modalCalendar input[name='end']").val(end);

        $("#modalCalendar input[name='color']").val("#3788D8");

        calendar.unselect();
      },
      events: routeEvents('routeLoadEvents'),
    });

    calendar.render();

  });

