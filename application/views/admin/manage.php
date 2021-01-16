

<div class="container mt-5">
	<div class="row">
		<div class="col-md-12 text-center mb-5">
			<h1 class="display-4">MEMBERSHIP ACCOUNTS</h1>
		</div>
	</div>

	<div class="row">
		<div class="col-md-10 mx-auto">
			<?php if( $this->session->flashdata('errors')) : ?>
				<div class="alert alert-danger">
					<?=  $this->session->flashdata('errors'); ?>
				</div>
			<?php endif; ?>
			<?php if( $this->session->flashdata('success')) : ?>
				<div class="alert alert-success">
					<?=  $this->session->flashdata('success'); ?>
				</div>
			<?php endif; ?>
			<div class="mb-4">
				<button data-toggle="modal" data-target="#exampleModal" class="btn btn-outline-dark">Add New Member</button>
			</div>
			<table id="table_id" class="table table-hover">
				<thead class="thead-dark">
				<tr>
					<th>Member ID</th>
					<th>Full Name</th>
					<th>Payment Date</th>
					<th>Plan</th>
					<th>Status</th>
					<th>Actions</th>
				</tr>
				</thead>
				<tbody>
				<?php if($users) : ?>
					<?php foreach ($users as $i) : ?>
				<tr>
					<input type="hidden" value="<?= $i->member_id; ?>" id="mem">
					<td><?= $i->member_id; ?></td>
					<td><?= $i->fname; ?></td>
					<td><?= date('m/d/y', strtotime($i->paydue)); ?></td>
					<td><?= $i->plan; ?></td>
					<td><?= $i->status; ?></td>
					<td>
						<a href="updatemem/<?= $i->member_id ?>" class="userid btn btn-primary" data-target="#updateModal" class="btn btn-primary">Update Member</a>
						<a href="deletemember/<?= $i->member_id; ?>" class="btn btn-danger">Delete</a>
					</td>
				</tr>
				<?php endforeach; ?>
				<?php endif; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>



<!--CREATE MODAL -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Add New Member</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<?php echo form_open('accounts/createMember'); ?>
				<div class="form-group">
					<label>Full Name</label>
					<input type="text" name="fname" class="form-control" placeholder="Full Name">
				</div>
				<div class="form-group">
					<label>Payment Due Date</label>
					<input type="date" name="paydue" class="form-control">
				</div>
				<div class="form-group">
					<label>Plan Type</label>
					<select name="plan" id="" class="form-control">
						<option value="Basic">Basic</option>
						<option value="Full Access">Full Access</option>
						<option value="Premium">Premium Access</option>
					</select>
				</div>
				<div class="form-group">
					<label>Account Status</label>
					<select name="status" id="" class="form-control">
						<option value="Active">Active</option>
						<option value="Not Active">Not Active</option>
					</select>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<input type="submit" name="create" class="btn btn-primary" value="Create Member">
				<?php form_close(); ?>
			</div>
		</div>
	</div>
</div>
