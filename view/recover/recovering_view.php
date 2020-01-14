<?php use Lidiun_Framework_v7\App;?>

<div class="col-lg-12">
  <!-- Default Card Example -->
  <div class="card mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Reset Password</h6>
    </div>
    <div class="card-body">
      <p>
        Enter a new password and confirm the new password.
      </p>
      <hr>
      <form action="/recover/recovering/<?=$view['token']?>/<?=$view['email']?>" method="post" onsubmit="return validatePassword()">
         <div class="form-group row">
            <div class="col-sm-12 no-padding">
              <div class="col-md-6 col-sm-12 mb-3 mb-sm-2">
                <input class="form-control" type="password" id="senha" name="senha" placeholder="New password" value="<?=(!empty($_POST['senha'])) ? $_POST['senha']: '';?>" required>
              </div>
            </div>

            <div class="col-sm-12 no-padding">
              <div class="col-md-6 col-sm-12 mb-3 mb-sm-2">
                <input class="form-control" type="password" id="senha2" name="senha2" placeholder="Confirm password" required>
              </div>
            </div>

            <div class="col-sm-12 no-padding">
              <div class="col-md-6 col-sm-12 mb-3 mb-sm-2">
                <button class="btn btn-primary btn-md btn-block" type="submit">Salve</button>
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

<script type="text/javascript">
  function validatePassword(){
    if ($('#senha').val() != $('#senha2').val()) {
      alert('Password and confirmation do not match!'); return false;
    }
  }
</script>