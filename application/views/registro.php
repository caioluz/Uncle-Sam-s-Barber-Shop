<section class="site-content-section">
  <div class="site-content-section-inner section-center">
    <div class="login-container">
      <h2>Crie seu cadastro</h2> 
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
        <form method="post" action="<?php echo base_url(); ?>registro/registro" class="form-fields-container">
        <div class="form-group">
            <label>Nome:</label>
            <input type="text" name="nome" class="form-control" value="<?php echo set_value('nome'); ?>" required placeholder="Ex. João da Silva"/>
            <span class="text-danger"><?php echo form_error('nome'); ?></span>
          </div>
          <div class="form-group">
            <label>E-mail:</label>
            <input type="email" name="email" class="form-control" value="<?php echo set_value('email'); ?>" required placeholder="Ex. joaodasilva@gmail.com"/>
            <span class="text-danger"><?php echo form_error('email'); ?></span>
          </div>
          <div class="form-group">
            <label>Senha:</label>
            <input type="password" name="password" class="form-control" value="<?php echo set_value('password'); ?>" required/>
            <span class="text-danger"><?php echo form_error('password'); ?></span>
          </div>
          <div class="form-group">
            <button class="button-link button-link-blue" type="submit">Cadastrar</button>
          </div>
          <div class="form-group form-group-link">
            <span>Já tem uma conta?</span>
            <a href="<?php echo base_url(); ?>login">Entre.</a>
          </div>
        </form>
      </div>
    </div>
  </div> 
</section>