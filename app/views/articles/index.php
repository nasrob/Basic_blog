<?php require APPROOT . '/views/partials/header.php'; ?>
    <div class="row mb-5">
        <div class="col-md-6">
            <h1 class="float-left">Articles</h1>
        </div>
        <div class="col-md-6">
            <a href="<?= URL_ROOT?>/articles/add" class="btn btn-success float-right">Add an article
                <i class="far fa-edit"></i>
            </a>
        </div>
    </div>
    <?php foreach($data['articles'] as $article) : ?>
        <div class="card card-body mb-3">
            <h3 class="card-title"><?= $article->title ?></h3>
            <!-- <div class="bg-light p-2 my-2">
                article date
            </div> -->
            <a href="<?= URL_ROOT?>/articles/show/<?= $article->id ?>" 
                class="btn btn-dark col-3 mx-auto">read more</a>
        </div>
    <?php endforeach; ?> 
<?php require APPROOT . '/views/partials/footer.php'; ?>