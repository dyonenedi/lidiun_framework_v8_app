<?php use Lidiun_Framework_v7\App;?>

<div class="col-lg-12">
  <!-- Default Card Example -->
  <div class="card mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Login</h6>
    </div>
    <div class="card-body">
      <p>
        To have full access to this application you need to have purchased the full course from Dr. Dani Garcia. If you already have comrpu you can enter your Email and password below. If you haven't purchased it, make sure you have your<a href="#">clicking here</a>!!!
      </p>
      <hr>
      <form action="/user/login" method="post">
         <div class="form-group row">
            <div class="col-sm-12 no-padding">
              <div class="col-md-6 col-sm-12 mb-3 mb-sm-2">
                <input class="form-control" type="email" name="email" placeholder="E-mail" value="<?=(!empty($_POST['email'])) ? $_POST['email']: '';?>" required>
              </div>
            </div>

            <div class="col-sm-12 no-padding">
              <div class="col-md-6 col-sm-12 mb-3 mb-sm-2">
                <input class="form-control" type="password" name="senha" placeholder="Password" value="<?=(!empty($_POST['senha'])) ? $_POST['senha']: '';?>" required>
              </div>
            </div>

            <div class="col-sm-12 no-padding">
              <div class="col-md-6 col-sm-12 mb-3 mb-sm-2">
                <button class="btn btn-primary btn-md btn-block" type="submit">Login</button>
              </div>
            </div>

            <div class="col-sm-12 no-padding">
              <div class="col-md-6 col-sm-12 mb-3 mb-sm-2">
                <a href="/recover/index">I forgot my password!</a>
              </div>
            </div>

            <?php if(!empty($view['message'])): ?>
              <div class="col-sm-12 no-padding">
                <div class="col-md-6 col-sm-12 mb-3 mb-sm-2">
                  <div class="card bg-<?=$view['message']['type']?> text-white shadow">
                    <div class="card-body">
                      <?php if($view['message']['type'] == 'danger'):?>
                        <i class="fas fa-exclamation-triangle"></i> 
                      <?php endif;?>
                      <?=$view['message']['text']?>
                    </div>
                  </div>
                </div>
              </div>
            <?php endif; ?>
            
          </div>
      </form>
    </div>
  </div>

  <hr class="clear-10">

</div>