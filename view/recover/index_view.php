<?php use Lidiun_Framework_v7\App;?>

<div class="col-lg-12">
  <!-- Default Card Example -->
  <div class="card mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Recover Password</h6>
    </div>
    <div class="card-body">
      <p>
        To recover your password enter your Registration Email and we will send you an Email with a link to reset your password. Remember to look for the Email we will send in your <i>Spam box</i> or <i>Electronic waste</i>.
      </p>
      <hr>
      <form action="/recover/index" method="post">
         <div class="form-group row">
            <div class="col-sm-12 no-padding">
              <div class="col-md-6 col-sm-12 mb-3 mb-sm-2">
                <input class="form-control" type="email" name="email" placeholder="E-mail" value="<?=(!empty($_POST['email'])) ? $_POST['email']: '';?>" required>
              </div>
            </div>

            <div class="col-sm-12 no-padding">
              <div class="col-md-6 col-sm-12 mb-3 mb-sm-2">
                <button class="btn btn-primary btn-md btn-block" type="submit">Send</button>
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