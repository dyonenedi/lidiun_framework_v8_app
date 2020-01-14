<?php use Lidiun_Framework_v7\App;?>

<div class="col-lg-12">
  <!-- Default Card Example -->
  <div class="card mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Register</h6>
    </div>
    <div class="card-body">
      <p>
        To register just enter the Email, name and password. All fields are mandatory.
      </p>
      <hr>
      <form action="/user/register" method="post" onsubmit="return validatePassword()">
         <div class="form-group row">
            <div class="col-sm-12 no-padding">
              <div class="col-md-6 col-sm-12 mb-3 mb-sm-2">
                <input class="form-control" type="email" name="email" placeholder="E-mail" value="<?=(!empty($_POST['email'])) ? $_POST['email']: '';?>" required>
              </div>
            </div>

            <div class="col-sm-12 no-padding">
              <div class="col-md-6 col-sm-12 mb-3 mb-sm-2">
                <input class="form-control" type="text" name="name" placeholder="Name" value="<?=(!empty($_POST['nome'])) ? $_POST['nome']: '';?>" required>
              </div>
            </div>

            <div class="col-sm-12 no-padding">
              <div class="col-md-6 col-sm-12 mb-3 mb-sm-2">
                <input class="form-control" type="password" id="senha" name="senha" placeholder="Password" value="" required>
              </div>
            </div>

            <div class="col-sm-12 no-padding">
              <div class="col-md-6 col-sm-12 mb-3 mb-sm-2">
                <input class="form-control" type="password" id="senha2" name="senha2" placeholder="Confirm password" required>
              </div>
            </div>

            <div class="col-sm-12 no-padding">
              <div class="col-md-6 col-sm-12 mb-3 mb-sm-2">
                <button class="btn btn-primary btn-md btn-block" type="submit">Register</button>
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
      alert('The password and confirmation are not the same!'); return false;
    }
  }
</script>