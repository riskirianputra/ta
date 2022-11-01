<div class="table-responsive">
	<table class="table table-bordered" id="tableSidang">
		<thead>
			<tr>
				<th>NO</th>
				<th>NAMA MAHASISWA</th>
				<th>PENGUJI 1</th>
				<th>PENGUJI 2</th>
				<th>JADWAL SIDANG</th>
			</tr>
		</thead>
		<tbody>
		<?php $no=0; foreach ($sidang as $key): ?>
			<?php $no++ ?>
			<tr>
				<td><?php echo $no++ ?></td>
				<td><?php echo $key['nama_mahasiswa'] ?></td>
				<td><?php echo $key['penguji1'] ?></td>
				<td><?php echo $key['penguji2'] ?></td>
				<td><?php echo date('d F Y', strtotime($key['jadwal_sidang'])) ?></td>
			</tr>
		<?php endforeach; ?>	
		</tbody>
	</table>
</div>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
<script>
$(document).ready(function() {
    $('#tableSidang').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'print',
                customize: function ( win ) {
                    $(win.document.body)
                        .css( 'font-size', '10pt' );
 
                    $(win.document.body).find( 'table' )
                        .addClass( 'compact' )
                        .css( 'font-size', 'inherit' );
                }
            }
        ]
    } );

	var test = $('.buttons-print > span').addClass("btn btn-success btn-lg");
	// console.log(test);
} );
</script>