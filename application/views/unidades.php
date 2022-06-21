<section class="site-content-section">
  <div class="site-content-section-inner">
    <h1>Encontre a unidade <br><span>mais próxima</span></h2>
    <div class="unidade-lista">
      <?php foreach($unidades as $unidade) : ?>
        <div class="unidade-item">
          <div class="unidade-item-inner">
            <div class="unidade-imagem">
              <img src="<?php echo base_url(); ?>public/images/unidades/<?php echo $unidade->imagem ?>" alt="">
            </div>
            <div>
              <div class="unidade-subtitulo">
                <i class="fa fa-square"> </i> &nbsp; UNIDADE</a>
              </div>
              <h3 class="unidade-titulo"><?php echo $unidade->descricao ?></h3>
              <p class="unidade-endereco"><?php echo $unidade->logradouro . ' - ' . $unidade->bairro . ', ' . $unidade->cidade . '/' . $unidade->estado; ?></p>
              <p class="unidade-telefone"><i class="fa fa-phone"></i> &nbsp; <?php echo $unidade->telefone ?></p>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>