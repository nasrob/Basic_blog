<?php require APPROOT . '/views/partials/header.php'; ?>
    <a href="<?php echo URL_ROOT; ?>/articles" class="btn btn-light"><i class="fa fa-backward"></i> Back</a>
    <div class="card card-body bg-light mt-5">
        <h2>Add an Article</h2>
        <p>Create an article with this form</p>
        <form action="<?php echo URL_ROOT; ?>/articles/add" method="post">
            <div class="form-group">
                <label for="title">Title: <sup>*</sup></label>
                <input type="text" name="title" class="form-control form-control-lg 
                    <?php echo (!empty($data['title_err'])) ? 'is-invalid' : ''; ?>" 
                    value="<?php echo $data['title']; ?>">
                <span class="invalid-feedback"><?php echo $data['title_err']; ?></span>
            </div>
            <div class="form-group">
                <label for="body">Body: <sup>*</sup></label>
                <textarea name="body" class="form-control form-control-lg 
                    <?php echo (!empty($data['body_err'])) ? 'is-invalid' : ''; ?>">
                    <?php echo $data['body']; ?>
                </textarea>
                <span class="invalid-feedback"><?php echo $data['body_err']; ?></span>            
            </div>
            <div class="form-group">
                <label for="category">Category</label>
                <select name="category" class="form-control">
                    <option value="">-- Select a Category --</option>
                    <!-- <?php
                        $categories = $app['config']['categories'];
                    ?>
                    <?php foreach ($categories as $category)?>
                    <option value="<?= $category ?>"><?= $category ?></option> -->
                </select>
                
                <div class="my-3">
                    <h4>Do you Want to publish your article right now?</h4>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status" id="inlineRadio1" value="1">
                        <label class="form-check-label" for="inlineRadio1">Yes</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status" id="inlineRadio2" value="0" checked>
                        <label class="form-check-label" for="inlineRadio2">No</label>
                    </div>
                </div>
                
            </div>

            <input type="submit" class="btn btn-success" value="Submit">
        </form>
    </div>
<?php require APPROOT . '/views/partials/footer.php'; ?>