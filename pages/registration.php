<form action="http://project/user/regAction" method="post" enctype="multipart/form-data" style="margin: 0 auto; width: 500px">
	  <div class="form-group">
		<label for="exampleInputEmail1">Email address</label>
		<input name="emailReg" type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
	  </div>
	  <div class="form-group">
		<label for="exampleInputEmail1">Name</label>
		<input name="name" type="text" class="form-control" id="exampleInputEmail1" placeholder="Name">
	  </div>
	  <div class="form-group">
		<label for="exampleInputEmail1">Last Name</label>
		<input name="l_name" type="text" class="form-control" id="exampleInputEmail1" placeholder="Last Name">
	  </div>
	  <div class="form-group">
		<label for="exampleInputEmail1">Phone</label>
		<input name="phone" type="phone" class="form-control" id="exampleInputEmail1" placeholder="Phone">
	  </div>
	  <div class="form-group">
		<label for="exampleInputEmail1">Birthdate</label>
		<input name="date" type="date" class="form-control" id="exampleInputEmail1" placeholder="Phone">
	  </div>
	  <div class="form-group">
		<label for="exampleInputEmail1">City</label>
		<select name="city">
			<?php foreach($cities as $city){ ?>
			<option value="<?= $city['id']; ?>"><?= $city['cityName']; ?></option>
			<?php } ?>
		</select>
	  </div>
	  <div class="form-group">
		<label for="exampleInputEmail1">Avatar</label>
		<input name="avatar" type="file" class="form-control" id="exampleInputEmail1" placeholder="Birthdate">
	  </div>
	  <div class="form-group">
		<label for="exampleInputPassword1">Password</label>
		<input name="passReg" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
	  </div>
	  <div class="form-group">
		<label for="exampleInputPassword1">Confirm password</label>
		<input name="confirmPass" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
	  </div>
	  <div class="checkbox">
		<label>
		  <input type="checkbox" name="check"> Check me out
		</label>
	  </div>
	  <button type="submit" class="btn btn-default">Submit</button>
</form>