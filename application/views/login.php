<section class="site-content-section">
  <div class="site-content-section-inner section-center">
    <div class="login-container">
      <h2>Login do cliente</h2> 
      <div>
        <?php
          if ($this->session->flashdata('message')) {
            echo '
            <div class="error-message">
                '.$this->session->flashdata("message").'
            </div>
            ';
          }
        ?>
        <form method="post" action="<?php echo base_url(); ?>login/validacao" class="form-fields-container">
          <div class="form-group">
            <label>E-mail:</label>
            <input type="email" name="email" class="form-control" value="<?php echo set_value('email'); ?>" required placeholder="Ex. joaodasilva@gmail.com"/>
          </div>
          <div class="form-group">
            <label>Senha:</label>
            <input type="password" name="password" class="form-control" value="<?php echo set_value('password'); ?>" required/>
          </div>
          <div class="form-group">
            <button class="button-link button-link-blue" type="submit">Entrar</button>
          </div>
          <div class="form-group form-group-link">
            <span>Não tem conta?</span>
            <a href="<?php echo base_url(); ?>registro">Cadastre-se.</a>
          </div>
        </form>
      </div>
    </div>
  </div> 
</section>