<div class="container">
	<div class="row">
		<div class="col-md-12  text-center">
			<h1 class="display-3 text-center">UPDATE USER</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6 mx-auto">
			<?php echo form_open('accounts/updatemember/' . $user->member_id); ?>

			<input type="hidden" value="<?= $user->member_id?>" name="id">
			<div class="form-group">
				<label>Full Name</label>
				<input type="text" name="fname" class="form-control" value="<?= $user->fname ?>" placeholder="Full Name">
			</div>
			<div class="form-group">
				<label>Payment Due Date</label>
				<input type="date" name="paydue" value="<?= $user->paydue ?>" class="form-control">
			</div>
			<div class="form-group">
				<label>Plan Type</label>
				<select name="plan" id="" value="<?= $user->plan ?>" class="form-control">
					<option value="Basic">Basic</option>
					<option value="Full Access">Full Access</option>
					<option value="Premium">Premium Access</option>
				</select>
			</div>
			<div class="form-group">
				<label>Account Status</label>
				<select name="status" id="" value="<?= $user->status ?>" class="form-control">
					<option value="Active">Active</option>
					<option value="Not Active">Not Active</option>
				</select>
			</div>
			<div class="form-group">
				<input type="submit" name="create" class="btn btn-primary" value="Create Member">
			</div>
		</div>

		<?php form_close(); ?>

	</div>
	</div>
</div>
