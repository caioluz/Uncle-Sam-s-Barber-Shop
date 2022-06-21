<section class="site-content-section">
  <div class="site-content-section-inner section-margin-bottom">
    <div class="servico-texto">
      <h1>Serviços</h1>
      <div>
        <p>Os homens estão cada vez mais preocupados com estética e que mal há nisso? E não é só cabelo não, a procura por serviços personalizados para barba e bigode está maior. Por isso, a Barbearia Seu Elias investe nos melhores profissionais para te oferecer atendimento e serviço de alta qualidade.
        <p>
      </div>
    </div>
    <div class="servico-lista">
      <?php foreach($servicos as $servico) : ?>
        <div class="servico-item">
          <div class="servico-item-inner">
            <div class="servico-imagem">
              <img width="64" height="17" src="<?php echo base_url(); ?>public/images/servicos/<?php echo $servico->imagem ?>" alt="">
            </div>
            <h3 class="servico-titulo"><?php echo $servico->nome ?></h3>
            <p class="servico-duracao"><?php echo $servico->duracao ?> min</p>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>