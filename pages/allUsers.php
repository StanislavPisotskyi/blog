<div class="row">

	<?php foreach($authorsArr as $users){ ?>
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img src="<?= $users['avatar'] ?>" width="150" height="150">
      <div class="caption">
        <h2><?= $users['name']." ".$users['lastName'] ?></h2>
        <p><b>Phone: </b><?= $users['phone'] ?></p>
        <p><b>Date of birth: </b><?= $users['birthDate'] ?></p>
        <p><b>Time of registration: </b><?= $users['regTime'] ?></p>
        <p><a href="http://project/user/addSub?id=<?= $users['id'] ?>" class="btn btn-primary" role="button">Subscribe</a></p>
      </div>
    </div>
  </div>
  <?php } ?>

</div>