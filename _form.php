<div class="container">
    <div class="card">
        <div class="carheaderd-">
            <h3>
                <?php if ($user['id']): ?>
                    Update user <b><?php echo $user['name'] ?></b>
                <?php else: ?>
                    Create new User
                <?php endif ?>
            </h3>
        </div>
        <div class="card-body">
        <body style='background-color:lightblue'>


            <form method="POST" enctype="multipart/form-data"
                  action="">
                <div class="form-group">
                    <label>Name</label>
                    <input name="name" value="<?php echo $user['name'] ?>"
                           class="form-control <?php echo $errors['name'] ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?php echo  $errors['name'] ?>
                    </div>
                </div>
                <div class="form-group">
                    <label>Location</label>
                    <input name="location" value="<?php echo $user['location'] ?>"
                           class="form-control <?php echo $errors['location'] ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?php echo  $errors['location'] ?>
                    </div>
                </div>
                <div class="form-group">
                    <label>Latitude</label>
                    <input name="lat" value="<?php echo $user['lat'] ?>"
                           class="form-control  <?php echo $errors['lat'] ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?php echo  $errors['lat'] ?>
                    </div>
                </div>
                <div class="form-group">
                    <label>Longitude</label>
                    <input name="lng" value="<?php echo $user['lng'] ?>"
                           class="form-control  <?php echo $errors['lng'] ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?php echo  $errors['lng'] ?>
                    </div>
                </div>
               
                <button class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>
</div>
