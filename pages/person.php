<div class="row">
    <?php foreach($authorsArr as $users){ ?>
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <div class="thumbnail">
                <a href="http://project/user/avatarAction?id=<?= $users['id'] ?>">
                    <img src="<?= $users['avatar'] ?>" width="300" height="300">
                </a>
            </div>
            <div class="thumbnail">
                <h2 style="text-align: center"><?= $users['name']." ".$users['lastName'] ?></h2>
                <p><a href="http://project/user/nameAction?id=<?= $users['id'] ?>" class="btn btn-danger btn-lg btn-block" role="button">Change</a></p>
            </div>
            <div class="thumbnail">
                <p style="text-align: center"><b>Phone: </b><?= $users['phone'] ?></p>
                <p><a href="http://project/user/phoneAction?id=<?= $users['id'] ?>" class="btn btn-danger btn-lg btn-block" role="button">Change</a></p>
            </div>
            <div class="thumbnail">
                <p style="text-align: center"><b>Date of birth: </b><?= $users['birthDate'] ?></p>
                <p><a href="http://project/user/birthdayAction?id=<?= $users['id'] ?>" class="btn btn-danger btn-lg btn-block" role="button">Change</a></p>
            </div>
        </div>
    <?php } ?>

</div>