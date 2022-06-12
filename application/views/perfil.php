<section class="site-content-section">
  <div class="site-content-section-inner section-content-flex">
    <div class="perfil-lateral">
      <div class="perfil-lateral-dados perfil-container">
        <div class="perfil-lateral-imagem">
          <img src="<?php echo base_url(); ?>public/images/perfil/perfil_1.jpg" alt="Avatar">
        </div>
        <hr>
        <p><i class="fa fa-pencil fa-fw w3-margin-right w3-text-theme"></i> Designer, UI</p>
        <p><i class="fa fa-home fa-fw w3-margin-right w3-text-theme"></i> London, UK</p>
        <p><i class="fa fa-birthday-cake fa-fw w3-margin-right w3-text-theme"></i> April 1, 1988</p>
      </div>
      <div class="perfil-lateral-botoes">
        <a href="<?php echo base_url(); ?>perfil/logout" class="button-link button-link-blue">
          <i class="fa fa-sign-out "></i> Sair
        </a>
      </div>
    </div>
    <div class="perfil-conteudo perfil-container">
      <h2>Detalhes</h2>
      <form class="form">
        <div class="card-body border-top p-9">
          <div class="row my-3">
            <label class="col-lg-3 col-form-label required">Nome completo</label>
            <div class="col-lg-6 fv-row">
              <input type="text" class="form-control form-control-solid" placeholder="Ex: João Silva" name="nome" value="Fulano de Tal">
            </div>
          </div>
          <div class="row my-3">
            <label class="col-lg-3 col-form-label required">E-mail</label>
            <div class="col-lg-6 fv-row">
              <input type="text" class="form-control form-control-solid" placeholder="Ex: joaosilva@gmail.com" name="email" value="fulanodetal@gmail.com">
            </div>
          </div>
          <div class="row my-3">
            <label class="col-lg-3 col-form-label"><span class="required">Telefone</span></label>
            <div class="col-lg-6 fv-row">
              <input type="tel" class="form-control form-control-solid" placeholder="Ex: (31) 98888-8888" name="telefone" value="(31) 99454-935">
            </div>
          </div>
          <div class="row my-3">
            <label class="col-lg-3 col-form-label"><span class="required">CEP</span></label>
            <div class="col-lg-6 fv-row">
              <input type="text" class="form-control form-control-solid" placeholder="Ex: 30100-100" name="cep" value="30300-300">
            </div>
          </div>
          <div class="row my-3">
            <label class="col-lg-3 col-form-label"><span class="required">Endereço</span></label>
            <div class="col-lg-6 fv-row">
              <input type="text" class="form-control form-control-solid" placeholder="Ex: Avenida Brasil, 1000" name="endereco" value="Rua Pernambuco, 1045">
            </div>
          </div>
          <div class="row my-3">
            <label class="col-lg-3 col-form-label"><span class="required">Bairro</span></label>
            <div class="col-lg-6 fv-row">
              <input type="text" class="form-control form-control-solid" placeholder="Ex: Funcionários" name="endereco" value="Funcionários">
            </div>
          </div>
          <div class="row my-3">
            <label class="col-lg-3 col-form-label"><span class="required">Cidade</span></label>
            <div class="col-lg-6 fv-row">
              <input type="text" class="form-control form-control-solid" placeholder="Ex: Belo Horizonte" name="endereco" value="Belo Horizonte">
            </div>
          </div>
          <div class="row my-3">
            <label class="col-lg-3 col-form-label"><span class="required">Estado</span></label>
            <div class="col-lg-6 fv-row">
              <select class="form-select form-select-solid" name="estado">
                <option value="MG">Minas Gerais</option>
                <option value="AC">Acre</option>
                <option value="AL">Alagoas</option>
                <option value="AP">Amapá</option>
                <option value="AM">Amazonas</option>
                <option value="BA">Bahia</option>
                <option value="CE">Ceará</option>
                <option value="DF">Distrito Federal</option>
                <option value="ES">Espírito Santo</option>
                <option value="GO">Goiás</option>
                <option value="MA">Maranhão</option>
                <option value="MT">Mato Grosso</option>
                <option value="MS">Mato Grosso do Sul</option>
                <option value="PA">Pará</option>
                <option value="PB">Paraíba</option>
                <option value="PR">Paraná</option>
                <option value="PE">Pernambuco</option>
                <option value="PI">Piauí</option>
                <option value="RJ">Rio de Janeiro</option>
                <option value="RN">Rio Grande do Norte</option>
                <option value="RS">Rio Grande do Sul</option>
                <option value="RO">Rondônia</option>
                <option value="RR">Roraima</option>
                <option value="SC">Santa Catarina</option>
                <option value="SP">São Paulo</option>
                <option value="SE">Sergipe</option>
                <option value="TO">Tocantins</option>
              </select>
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
    </div>
  </div>
</section>