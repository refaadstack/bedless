<div class="modal fade" id="modalHapus" tabindex="-1" role="dialog" aria-labelledby="prosesHapus" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<form action="" id="deleteForm" method="post">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabelX">Hapus Data</h5>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<p>Yakin ingin menghapus data ini ?</p>

					{{ csrf_field() }}
					{{ method_field("DELETE") }}
				</div>
				<div class="modal-footer">
					<button class="btn btn-secondary" type=button data-dismiss="modal">Tidak</button>
					<button class="btn btn-primary" type=submit name="" data-dismiss="modal" onclick="formSubmit()">Ya</button>
				</div>
			</div>
		</form>
	</div>
</div>
<!-- modal -->
