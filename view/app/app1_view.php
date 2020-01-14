<?php use Lidiun_Framework_v7\App;?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">App 1</h1>
</div>

<div class="row no-padding">
  <div class="col-lg-6 col-sm-12 mb-4">
    <div class="card shadow">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Warning</h6>
      </div>
      <div class="card-body">
        <p class="m-0"><?= $view['message'] ?></p>
      </div>
    </div>
  </div>
</div>