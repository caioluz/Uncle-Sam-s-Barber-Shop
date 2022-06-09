<div class="site-content-inner">
  <section class="site-content-section">
    <div class="site-content-section-inner section-margin-bottom section-two-columns">
      <div class="curso-banner-text">
        <div>
          <h1>We want you!</h1>
            <p>Aqui você pode realizar a marcação do seu atendimento na palma da mão, sem enrolação. Vem cortar com a gente e junte-se ao nosso army!<p>
              <h2>NOSSOS HORÁRIOS</h2>
          <ul>
            <li>Segunda à Sexta - 9:00 às 20:00</li>
            <li>Sábado - 9:00 às 18:00 </li>
            <li>Domingo - Fechado</li>
          </ul>
        </div>
      </div>
      <div>
        <div style="text-align:center;margin-top: 0px;margin-bottom:10px;padding:10px;">
              <p href="" target="_blank" class="button-link button-link-red" role="button">
              <span class="button-link-wrapper">
              <span class="button-link-text" id="bt-agendar">Preencha os dados do seu atendimento</span>
              </span>
            </p>
        </div>
        <div>
          <label for="unidade">Unidade</label>
           <p>
             <select class="form-select" aria-label="Default select example">
             <option selected="">Escolha a unidade que deseja</option>
               <?php foreach($unit as $u) { ?>
                  <option><?php echo $u->cod_unidade . " - " . $u->descricao; ?></option>
               <?php } ?>
              </select>
           </p>
        </div> 
        <div>
          <label for="barber">Barbeiro</label>
           <p>
             <select class="form-select" aria-label="Default select example">
             <option selected="">Escolha o barbeiro</option>
               <?php foreach($unit as $u) { ?>
                  <option><?php echo $u->cod_unidade . " - " . $u->descricao; ?></option>
               <?php } ?>
              </select>
           </p>
        </div>
        <div>
          <label for="service">Serviço</label>
           <p>
             <select class="form-select" aria-label="Default select example">
             <option selected="">Escolha o serviço desejado</option>
               <?php foreach($unit as $u) { ?>
                  <option><?php echo $u->cod_unidade . " - " . $u->descricao; ?></option>
               <?php } ?>
              </select>
           </p>
        </div>
        <div>
          <label for="date">Data</label>
           <p>
             <select class="form-select" aria-label="Default select example">
             <option selected="">Escolha a data</option>
               <?php foreach($unit as $u) { ?>
                  <option><?php echo $u->cod_unidade . " - " . $u->descricao; ?></option>
               <?php } ?>
              </select>
           </p>
        </div>
        <div>
          <label for="time">Horário</label>
           <p>
             <select class="form-select" aria-label="Default select example">
             <option selected="">Escolha o horário disponível</option>
               <?php foreach($unit as $u) { ?>
                  <option><?php echo $u->cod_unidade . " - " . $u->descricao; ?></option>
               <?php } ?>
              </select>
           </p>
        </div>      
            <div class="curso-banner-button">
              <a href="" target="_blank" class="button-link button-link-blue" role="button">
              <span class="button-link-wrapper">
              <span class="button-link-text" id="bt-agendar">Agendar agora</span>
              </span>
              </a>
            </div>
      </div>
    </div> 
  </section>
</div>
