<div class="col-md-offset-2 col-md-8">
	<p>hier staan alle stageplaatsen</p>
	<a href="<?php base_url()?>internships/create">voeg een nieuwe stageplek toe</a>

	<div class="dataTables_wrapper form-inline dt-bootstrap">
		<div class="row">
			<div class="col-sm-6"></div>
			<div class="col-sm-6"></div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<table class="table table-bordered table-hover dataTable" role="grid">
					<thead>
						<tr role="row">
							<th class="sorting_asc" tabindex="0">opleiding</th>
							<th class="sorting_asc" tabindex="0">start datum</th>
							<th class="sorting_asc" tabindex="0">eind datum</th>
							<th class="sorting_asc" tabindex="0">leerjaar</th>
							<th class="sorting_asc" tabindex="0">locatie</th>
						</tr>
					</thead>
					<tbody>
					<?php foreach ($internships as $r): ?>
						<tr role="row" class="odd">
							<td><?php echo $r->education  ?></td>
							<td><?php echo $r->date_start  ?></td>
							<td><?php echo $r->date_end ?></td>
							<td><?php echo $r->year ?></td>
							<td><?php echo $r->location ?></td>
						</tr>
					<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>