<div class="site-content-inner">
  <section class="site-content-section">
    <div class="site-content-section-inner section-margin-bottom section-two-columns">
      <div class="agendamento-texto">
        <div>
          <h1>We want you!</h1>
          <p>Aqui você pode realizar a marcação do seu atendimento na palma da mão, sem enrolação. Vem cortar com a gente e junte-se ao nosso army!</p>
          <h2>Nossos horários:</h2>
          <h4><i class="fa fa-clock-o"></i> <strong>Segunda a Sexta</strong><br>09h – 20h</h4>
          <h4><i class="fa fa-clock-o"></i> <strong>Sábado</strong><br>09h – 18h</h4>
        </div>
      </div>
      <div class="agendamento-marcacao">
        <form id="form-agendamento" method="post" action="<?php echo base_url(); ?>agendamento/salvar">
          <input type="hidden" id="field-unidade" name="unidade" />
          <div class="accordion accordion-flush" id="accordionAgendamento">
            <div id="accordionUnidade" class="accordion-item">
              <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  <div class="item-icone"><i class="icon-barbershop"></i></div>
                  <div class="item-inner">
                    <div class="item-titulo">Unidade</div>
                    <div class="item-footer">Uncle Sam <span></span></div>
                  </div>
                </button>
              </h2>
              <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionAgendamento">
                <div class="accordion-body selecao-unidade">
                  <ul>
                    <?php foreach ($unidades as $unidade) : ?>
                      <li>
                        <a href="#" class="item-link" data-id="<?php echo $unidade->cod_unidade; ?>" data-name="<?php echo $unidade->descricao; ?>">
                          <input class="hide" type="radio" name="unidade" value="<?php echo $unidade->cod_unidade; ?>">
                          <div class="item-inner">
                            <div class="item-title">
                              <div class="item-name">
                                Uncle Sam <span><?php echo $unidade->descricao; ?></span>
                              </div>
                              <div class="item-footer">
                                <div class="item-address"><?php echo $unidade->logradouro . ' - ' . $unidade->bairro . ', ' . $unidade->cidade . '/' . $unidade->estado; ?></div>
                              </div>
                            </div>
                          </div>
                        </a>
                      </li>
                    <?php endforeach; ?>
                  </ul>
                </div>
              </div>
            </div>
            <div id="accordionServico" class="accordion-item accordion-item-disabled">
              <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  <div class="item-icone"><i class="icon-scissors"></i></div>
                  <div class="item-inner">
                    <div class="item-titulo">Serviço</div>
                    <div class="item-footer"></div>
                  </div>
                </button>
              </h2>
              <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionAgendamento">
                <div class="accordion-body selecao-servico">
                  <ul>
                    <?php foreach ($servicos as $servico) : ?>
                      <li>
                        <label class="item-link <?php echo ($servico == 'b') ? 'item-checked' : ''; ?>" data-price="60">
                          <input type="checkbox" class="hide" name="servicos" value="59">
                          <div class="item-inner">
                            <div class="item-title"><?php echo $servico->nome; ?></div>
                            <div>
                              <div class="item-preco">R$60,00</div>
                              <div class="item-duracao"><?php echo $servico->duracao; ?>min</div>
                            </div>
                          </div>
                          <i class="fa fa-square-o"></i>
                          <i class="fa fa-check"></i>
                        </label>
                      </li>
                    <?php endforeach; ?>
                  </ul>
                  <div class="selecao-servico-footer">
                    <div class="selecao-servico-total">R$ <span>00,00</span></div>
                    <div>
                      <button class="button-link button-link-blue">confirmar</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="accordion-item accordion-item-disabled">
              <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  <div class="item-icone"><i class="icon-barber"></i></div>
                  <div class="item-inner">
                    <div class="item-titulo">Barbeiro</div>
                  </div>
                </button>
              </h2>
              <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionAgendamento">
                <div class="accordion-body selecao-barbeiro">
                  <ul>
                    <li class="barbeiro-default">
                      <div class="item-media">
                        <div class="icon-image">
                          <i class="icon-hairstyle"></i>
                        </div>
                      </div>
                      <div class="item-nome">Sem preferência</div>
                      <input class="hide" type="radio" id="field-barbeiro" name="barbeiro" value="0">
                    </li>
                    <?php foreach ($barbeiros as $barbeiro) : ?>
                      <li>
                        <div class="item-media"><img src="<?php echo base_url(); ?>public/images/barbeiro/<?php echo $barbeiro->imagem; ?>"></div>
                        <div class="item-nome"><?php echo $barbeiro->nome; ?></div>
                        <input type="radio" id="field-barbeiro" class="hide" name="barbeiro" value="405">
                      </li>
                    <?php endforeach; ?>
                  </ul>
                </div>
              </div>
            </div>
            <div class="accordion-item accordion-item-disabled">
              <h2 class="accordion-header" id="headingFour">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                  <div class="item-icone"><i class="icon-calendar"></i></div>
                  <div class="item-inner">
                    <div class="item-titulo">Data e Hora</div>
                  </div>
                </button>
              </h2>
              <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionAgendamento">
                <div class="accordion-body selecao-datahora">
                  <div id="datepicker"></div>
                  <div id="selecao-datahora-horas">
                    <div class="item-conteudo">
                      <div class="item-mensagem" style="display: none;">Sem horários disponíveis.</div>
                      <div class="item-hora" data-id="10:00">10:00</div>
                      <div class="item-hora active" data-id="10:20">10:20</div>
                      <div class="item-hora" data-id="14:00">14:00</div>
                      <div class="item-hora" data-id="15:00">15:00</div>
                      <div class="item-hora" data-id="17:00">17:00</div>
                      <div class="item-hora" data-id="18:20">18:20</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="curso-banner-button">
            <a href="" target="_blank" class="button-link button-link-blue" role="button">
              <span class="button-link-wrapper">
                <span class="button-link-text" id="bt-agendar">Agendar agora</span>
              </span>
            </a>
          </div>
        </form>
      </div>
    </div>
  </section>
</div>