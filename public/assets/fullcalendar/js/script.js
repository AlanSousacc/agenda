
$(function(){
  $('.date-time').mask('00/00/0000 00:00:00');

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $(".deleteEvent").click(function(){

    let id = $("#modalCalendar input[name='id']").val();

    let title = $("#title").val();

    let Event = {
      id: id,
      title: title,
      _method: 'DELETE'
    };

    let route = routeEvents('routeEventDelete');
    sendEvent(route, Event);

  });

  $(".saveEvent").click(function(){

    let empresa_id = $("#modalCalendar input[name='empresa_id']").val();

    let id = $("#modalCalendar input[name='id']").val();

    let start = moment($("#modalCalendar input[name='start']").val(), "DD/MM/YYYY HH:mm:ss").format("YYYY-MM-DD HH:mm:ss");

    let end = moment($("#modalCalendar input[name='end']").val(), "DD/MM/YYYY HH:mm:ss").format("YYYY-MM-DD HH:mm:ss");

    let color = $("#modalCalendar input[name='color']").val();

    let description = $("#modalCalendar textarea[name='description']").val();

    let contato = $("#contato_id").val();

    let title = $("#title :selected").text()


    let Event = {
      title: title,
      empresa_id: empresa_id,
      start: start,
      end: end,
      color: color,
      description: description,
      contato_id: contato,
    };

    let route;

    if(id == ''){
      route = routeEvents('routeEventStore');
    } else{
      route = routeEvents('routeEventUpdate');
      Event.id = id;
      Event._method = 'PUT'
    }

    sendEvent(route, Event)

  });
});

function sendEvent(route, data_){
  $.ajax({
    url: route,
    data: data_,
    method: 'POST',
    dataType: 'json',
    success:function(json){
      if(json){
				// console.log(data_._method)
				$( "#sucesso").modal('show');
				$( '.btn-success' ).click(function() {
					location.reload();
			 });

      }
    },
    error:function(json){
      // console.log(json.responseJSON);
      let responseJSON = json.responseJSON.errors;

      $("#message").html(loadErrors(responseJSON));
    }
  });
}

function loadErrors(response){
  let boxAlert = `<div class="alert alert-danger">`;

  for(let fields in response){
    boxAlert += `<span>${response[fields]}</span><br/>`;
  }

  boxAlert += `</div>`;
  return boxAlert.replace(/\,/g, "<br/>")
}

function routeEvents(route) {
  return document.getElementById('calendar').dataset[route];
}

function clearMessages(element){
  $(element).text('');
}

function resetForm(form){
  $(form)[0].reset();
}
