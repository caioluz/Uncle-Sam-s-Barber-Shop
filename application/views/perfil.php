<section class="site-content-section">
  <div class="site-content-section-inner">
    <?php
      if ($this->session->flashdata('message')) {
        echo '
        <div class="mensagem mensagem-sucesso">
            ' . $this->session->flashdata('message') . '
        </div>
        ';
      }
    ?>
    <div class="d-flex">
      <div class="perfil-lateral">
        <div class="perfil-lateral-dados perfil-container">
          <div class="perfil-lateral-imagem">
            <img src="<?php echo base_url(); ?>public/images/perfil/perfil_1.jpg" alt="Avatar">
          </div>
          <hr>
          <p><i class="fa fa-user fa-fw w3-margin-right w3-text-theme"></i> <?php echo $form['nome']; ?></p>
          <p><i class="fa fa-envelope fa-fw w3-margin-right w3-text-theme"></i> <?php echo $form['email']; ?></p>
          <hr>
          <a href="<?php echo base_url(); ?>perfil" class="menu-link">Perfil</a>
          <a href="<?php echo base_url(); ?>perfil/agendamentos" class="menu-link">Agendamentos</a>
        </div>
        <div class="perfil-lateral-botoes">
          <a href="<?php echo base_url(); ?>perfil/logout" class="button-link button-link-blue">
            <i class="fa fa-sign-out "></i> Sair
          </a>
        </div>
      </div>
      <div class="perfil-conteudo perfil-container">
        <?php if (!isset($agendamento)) : ?> 
          <h2>Detalhes</h2>
          <form id="formCliente" class="form" action="<?php echo base_url(); ?>perfil/salvar" method="POST">
            <div class="card-body border-top p-9">
              <div class="row my-3">
                <label class="col-lg-3 col-form-label required">Nome completo</label>
                <div class="col-lg-6 fv-row">
                  <input type="text" class="form-control form-control-solid <?php echo !empty(form_error('nome')) ? 'is-invalid' : ''; ?>" placeholder="Ex: João Silva" name="nome" value="<?php echo set_value('nome', $form['nome']); ?>" required>
                  <div class="invalid-feedback">Preencha um nome válido</div>
                </div>
              </div>
              <div class="row my-3">
                <label class="col-lg-3 col-form-label required">CPF</label>
                <div class="col-lg-6 fv-row">
                  <input type="text" class="form-control form-control-solid <?php echo !empty(form_error('cpf')) ? 'is-invalid' : ''; ?>" placeholder="Ex: 012.345.678-90" name="cpf" value="<?php echo set_value('cpf', $form['cpf']); ?>" required>
                  <div class="invalid-feedback">Preencha um CPF válido</div>
                </div>
              </div>
              <div class="row my-3">
                <label class="col-lg-3 col-form-label required">E-mail</label>
                <div class="col-lg-6 fv-row">
                  <input type="text" class="form-control form-control-solid <?php echo !empty(form_error('email')) ? 'is-invalid' : ''; ?>" placeholder="Ex: joaosilva@gmail.com" name="email" value="<?php echo set_value('email', $form['email']); ?>" disabled>
                </div>
              </div>
              <div class="row my-3">
                <label class="col-lg-3 col-form-label"><span class="required">Telefone</span></label>
                <div class="col-lg-6 fv-row">
                  <input type="tel" class="form-control form-control-solid <?php echo !empty(form_error('telefone')) ? 'is-invalid' : ''; ?>" placeholder="Ex: (31) 98888-8888" name="telefone" value="<?php echo set_value('telefone', $form['telefone']); ?>" required>
                  <div class="invalid-feedback">Preencha um telefone válido</div>
                </div>
              </div>
              <div class="row my-3">
                <label class="col-lg-3 col-form-label"><span class="required">CEP</span></label>
                <div class="col-lg-6 fv-row">
                  <input type="text" class="form-control form-control-solid" placeholder="Ex: 30100-100" name="cep" value="<?php echo set_value('cep', $form['cep']); ?>">
                </div>
              </div>
              <div class="row my-3">
                <label class="col-lg-3 col-form-label"><span class="required">Endereço</span></label>
                <div class="col-lg-6 fv-row">
                  <input type="text" class="form-control form-control-solid" placeholder="Ex: Avenida Brasil, 1000" name="endereco" value="<?php echo set_value('endereco', $form['logradouro']); ?>">
                </div>
              </div>
              <div class="row my-3">
                <label class="col-lg-3 col-form-label"><span class="required">Bairro</span></label>
                <div class="col-lg-6 fv-row">
                  <input type="text" class="form-control form-control-solid" placeholder="Ex: Funcionários" name="bairro" value="<?php echo set_value('bairro', $form['bairro']); ?>">
                </div>
              </div>
              <div class="row my-3">
                <label class="col-lg-3 col-form-label"><span class="required">Cidade</span></label>
                <div class="col-lg-6 fv-row">
                  <input type="text" class="form-control form-control-solid" placeholder="Ex: Belo Horizonte" name="cidade" value="<?php echo set_value('cidade', $form['cidade']); ?>">
                </div>
              </div>
              <div class="row my-3">
                <label class="col-lg-3 col-form-label"><span class="required">Estado</span></label>
                <div class="col-lg-6 fv-row">
                  <?php
                    $options = [
                      ''=> 'Selecione seu estado...',
                      'MG' => 'Minas Gerais',
                      'AC' => 'Acre',
                      'AL' => 'Alagoas',
                      'AP' => 'Amapá',
                      'AM' => 'Amazonas',
                      'BA' => 'Bahia',
                      'CE' => 'Ceará',
                      'DF' => 'Distrito Federal',
                      'ES' => 'Espírito Santo',
                      'GO' => 'Goiás',
                      'MA' => 'Maranhão',
                      'MT' => 'Mato Grosso',
                      'MS' => 'Mato Grosso do Sul',
                      'PA' => 'Pará',
                      'PB' => 'Paraíba',
                      'PR' => 'Paraná',
                      'PE' => 'Pernambuco',
                      'PI' => 'Piauí',
                      'RJ' => 'Rio de Janeiro',
                      'RN' => 'Rio Grande do Norte',
                      'RS' => 'Rio Grande do Sul',
                      'RO' => 'Rondônia',
                      'RR' => 'Roraima',
                      'SC' => 'Santa Catarina',
                      'SP' => 'São Paulo',
                      'SE' => 'Sergipe',
                      'TO' => 'Tocantins',
                    ];
                    echo form_dropdown('estado', $options, set_value('estado', $form['estado']), 'class="form-select form-select-solid"');
                  ?>
                </div>
              </div>
              <div class="row my-3">
                <label class="col-lg-3 col-form-label">Comunicação</label>
                <div class="col-lg-6 fv-row">
                  <div class="d-flex align-items-center mt-2">
                    <label class="form-check form-check-inline form-check-solid me-4">
                      <input class="form-check-input" name="communication[]" type="checkbox">
                      <span class="ps-1 fs-6">E-mail</span>
                    </label>
                    <label class="form-check form-check-inline form-check-solid me-4">
                      <input class="form-check-input" name="communication[]" type="checkbox">
                      <span class="ps-1 fs-6">SMS</span>
                    </label>
                    <label class="form-check form-check-inline form-check-solid">
                      <input class="form-check-input" name="communication[]" type="checkbox">
                      <span class="ps-1 fs-6">Ligação</span>
                    </label>
                  </div>
                </div>
              </div>
              <div class="row">
                <label class="col-lg-3 col-form-label">Permitir Marketing</label>
                <div class="col-lg-6 d-flex align-items-center">
                  <div class="form-check form-check-solid form-switch form-switch-lg">
                    <input class="form-check-input" type="checkbox" id="marketing">
                  </div>
                </div>
              </div>
            </div>
            <div class="d-flex justify-content-end py-6 px-9 mt-4 mx-2">
              <button type="submit" class="button-link button-link-blue">Salvar</button>
            </div>
          </form>
        <?php else : ?>
          <h2>Agendamentos</h2>
          <div class="card-body border-top p-9">
          <table id="kt_widget_table_3" class="table table-row-dashed align-middle fs-6 gy-4 my-0 pb-3 dataTable no-footer" data-kt-table-widget-3="all">
            <tbody>
            <?php
              foreach ($agendamento as $a) :
                $data_formatada = date('d/m/Y H:i', strtotime($a->data_hora));
            ?>
              <tr>
                <td class="min-w-175px">
                  <div class="position-relative ps-6 px-3 py-2">
                    <div class="position-absolute start-0 top-0 w-4px h-100 rounded-2 bg-<?php echo $a->status; ?>"></div>
                    <a href="#" class="mb-1 text-dark text-hover-primary fw-bolder"><?php echo $a->nome; ?></a>
                    <div class="fs-6 text-muted fw-bolder"><?php echo $a->nome_barbeiro; ?></div>
                  </div>
                </td>
                <td>
                  <div class="fs-6 text-muted fw-bolder"><?php echo $data_formatada; ?></div>
                  <div class="fs-6 text-muted fw-bolder">R$ <?php echo str_replace('.', ',', $a->valor); ?></div>
                </td>
                <td>
                  <span class="badge badge-<?php echo $a->status; ?>"><?php echo $a->status; ?></span>
                </td>
              </tr>
            <?php endforeach; ?>
            </tbody>
          </table>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>