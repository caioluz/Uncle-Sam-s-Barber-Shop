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
      <?php
        if ($this->session->flashdata('message')) {
          echo '
          <div class="mensagem mensagem-erro">
              ' . $this->session->flashdata('message') . '
          </div>
          ';
        }
      ?>
      <form id="form-agendamento" method="post" action="<?php echo base_url(); ?>agendamento/salvar">
        <input type="hidden" id="field-unidade" name="unidade" />
        <input type="hidden" id="field-servicos" name="servicos" />
        <input type="hidden" id="field-barbeiro" name="barbeiro" />
        <input type="hidden" id="field-data" name="data" />
        <input type="hidden" id="field-hora" name="hora" />
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
                <ul></ul>
                <div class="selecao-servico-footer">
                  <div class="selecao-servico-total">R$ <span>00,00</span></div>
                  <div>
                    <button class="button-link button-link-blue">confirmar</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div id="accordionBarbeiro" class="accordion-item accordion-item-disabled">
            <h2 class="accordion-header" id="headingThree">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                <div class="item-icone"><i class="icon-barber"></i></div>
                <div class="item-inner">
                  <div class="item-titulo">Barbeiro</div>
                  <div class="item-footer"></div>
                </div>
              </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionAgendamento">
              <div class="accordion-body selecao-barbeiro">
                <ul>
                  <li class="barbeiro-default" data-id="0">
                    <div class="item-media">
                      <div class="icon-image">
                        <i class="icon-hairstyle"></i>
                      </div>
                    </div>
                    <div class="item-nome">Sem preferência</div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div id="accordionDataHora" class="accordion-item accordion-item-disabled">
            <h2 class="accordion-header" id="headingFour">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                <div class="item-icone"><i class="icon-calendar"></i></div>
                <div class="item-inner">
                  <div class="item-titulo">Data e Hora</div>
                  <div class="item-footer">
                    <span class="data"></span>
                    <span class="hora"></span>
                  </div>
                </div>
              </button>
            </h2>
            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionAgendamento">
              <div class="accordion-body selecao-datahora">
                <div id="datepicker"></div>
                <div id="selecao-datahora-horas">
                  <div class="item-conteudo">
                    <div class="item-mensagem">Selecione uma data para visualizar os horários</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="agendamento-button">
          <button type="submit" class="button-link button-link-blue disabled">
            <span class="button-link-wrapper">
              <span class="button-link-text" id="bt-agendar">Agendar agora</span>
            </span>
          </button>
        </div>
      </form>
    </div>
  </div>
</section>
