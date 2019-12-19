<!-- Modal -->
<div class="modal fade" id="modalCalendar" tabindex="-1" role="dialog" aria-labelledby="titleModal" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content" style="margin-left: -8px;">
			<div class="modal-header">
				<h5 class="modal-title" id="titleModal">Título do Modal</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
        @include('Admin.fullcalendar.formCalendar')
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
				<button type="button" class="btn btn-danger deleteEvent">Excluir</button>
				<button type="button" class="btn btn-primary saveEvent">Salvar</button>
			</div>
		</div>
	</div>
</div>
