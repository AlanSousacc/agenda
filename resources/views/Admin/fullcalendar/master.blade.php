@extends('layouts.master-admin')

@section('master')
<div id='wrap'>
  @include('Admin.fullcalendar.modal-calendar')
  <div id='external-events' style="width: 0; display:none; float: none;">
    <div id='external-events-list'>
    </div>
  </div>

  <div id='calendar' style="width: 100%"
  data-route-load-events="{{ route('routeLoadEvents') }}"
  data-route-event-update="{{ route('routeEventUpdate') }}"
  data-route-event-store="{{ route('routeEventStore') }}"
  data-route-event-delete="{{ route('routeEventDelete') }}"
  ></div>

  <div style='clear:both'></div>

  <div id="sucesso" class="modal fade text-success" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header bg-success" style="text-align: center; display: inline;">
          <button type="button" class="close" data-dismiss="modal" style="color:#fff">&times;</button>
          <h4 class="modal-title text-center">Sucesso!!!</h4>
        </div>
        <div class="modal-body">
          <p class="text-center">Operação realizada com sucesso!</p>
        </div>
        <div class="modal-footer">
          <center>
            <button type="button" class="btn btn-success" data-dismiss="modal">OK!</button>
          </center>
        </div>
      </div>
    </div>
  </div>

</div>
@push('scripts')
<script>
  $('#start').daterangepicker();
  $('#end').daterangepicker();
  $('#start').on('apply.daterangepicker', function(ev, picker) {
    console.log(picker.startDate.format('YYYY-MM-DD HH:mm'));
  });
  $('#end').on('apply.daterangepicker', function(ev, picker) {
    console.log(picker.endDate.format('YYYY-MM-DD HH:mm'));
  });
</script>
<script>
  $('#start').daterangepicker({
    "singleDatePicker": true,
    "showDropdowns": true,
    "timePicker": true,
    "timePicker24Hour": true,
    "timePickerIncrement": 10,
    "autoApply": true,
    "maxSpan": {
      "days": 7
    },
    "locale": {
      "format": "MM/DD/YYYY hh:mm A",
      "separator": " - ",
      "applyLabel": "Aplicar",
      "cancelLabel": "Cancelar",
      "fromLabel": "From",
      "toLabel": "To",
      "customRangeLabel": "Custom",
      "weekLabel": "W",
      "daysOfWeek": [
      "Dom",
      "Seg",
      "Ter",
      "Qua",
      "Qui",
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
      "firstDay": 1
    },
    "linkedCalendars": false,
    "autoUpdateInput": false,
    "startDate": "12/10/2019",
    "endDate": "12/16/2019",
    "opens": "center",
    "applyButtonClasses": "btn-success"
  }, function(start, end, label) {
    $("#modalCalendar input[name='start']").val(start.format('DD/MM/YYYY HH:mm:00'));
    console.log('New date range selected: ' + start.format('YYYY-MM-DD HH:mm:00'));
    console.log(label);
  });

  $('#end').daterangepicker({
    "singleDatePicker": true,
    "showDropdowns": true,
    "timePicker": true,
    "timePicker24Hour": true,
    "timePickerIncrement": 10,
    "autoApply": true,
    "maxSpan": {
      "days": 7
    },
    "locale": {
      "format": "MM/DD/YYYY hh:mm A",
      "separator": " - ",
      "applyLabel": "Aplicar",
      "cancelLabel": "Cancelar",
      "fromLabel": "From",
      "toLabel": "To",
      "customRangeLabel": "Custom",
      "weekLabel": "W",
      "daysOfWeek": [
      "Dom",
      "Seg",
      "Ter",
      "Qua",
      "Qui",
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
      "firstDay": 1
    },
    "linkedCalendars": false,
    "autoUpdateInput": false,
    "startDate": "12/10/2019",
    "endDate": "12/16/2019",
    "opens": "center",
    "applyButtonClasses": "btn-success"
  }, function(start, end, label) {
    $("#modalCalendar input[name='end']").val(end.format('DD/MM/YYYY HH:mm:00'));
    console.log('New date range selected: ' + end.format('YYYY-MM-DD HH:mm:00'));
    console.log(label);
  });
</script>
@endpush
@endsection
