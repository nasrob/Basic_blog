<?php require APPROOT . '/views/partials/header.php'; ?>
    
    <div>
        <a href="<?= URL_ROOT ?>/articles" class="btn btn-light">
            <i class="fa fa-backward"></i> Back
        </a>
        <br>
    </div>
    
    <div>
        <span class="badge badge-secondary"></span>
        <h1 class="mb-3"><?= $data['article']->title ?></h1>
        <p class="bg-light p-2"><?= $data['article']->article_text ?></p>
    </div>

    <div class="col-md-6 my-5 card card-body">
        <form action="<?php echo URL_ROOT; ?>/comments/add" method="post">
            <input type="hidden" name="article_id" 
                    value="<?= $data['article']->id ?>">
            <div class="form-group">
                <label for="name">Your Name: <sup>*</sup></label>
                <input type="text" name="name" class="form-control form-control-lg 
                    <?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>" 
                    value="<?php echo $data['name']; ?>" required>
                <span class="invalid-feedback"><?php echo $data['name_err']; ?></span>
            </div>
            <div class="form-group">
                <label for="body">Your Comment: <sup>*</sup></label>
                <textarea name="message" class="form-control form-control-lg 
                    <?php echo (!empty($data['message_err'])) ? 'is-invalid' : ''; ?>" 
                    minlength="7" maxlength="1000" required>
                    <?php echo $data['message']; ?>
                </textarea>
                <span class="invalid-feedback"><?php echo $data['message_err']; ?></span>
            </div>
                    

            <input type="submit" class="btn btn-success" value="Add Your Comment">
        </form>
    </div>
    <br>
    
    <div class="mt-3">
        <?php foreach($data['comments'] as $comment) : ?>
            <div class="media mx-3 my-3 p-2 bg-info">
                <img class="mb-3 mr-3 rounded-circle" src="../../public/img/user-placeholder-squae.png" 
                    alt="placeholder" height="40" width="40">
                <div class="media-body">
                    <h5 class="mt-0"><?= $comment->name ?></h5>
                    <p><?= $comment->message ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    
<?php require APPROOT . '/views/partials/footer.php'; ?>
