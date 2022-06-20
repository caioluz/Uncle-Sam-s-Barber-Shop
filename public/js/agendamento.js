$(function() {  

  function _init() {
    $('#datepicker').datepicker({
      startDate: new Date(),
      endDate: "+90d",
      language: "pt-BR",
      keyboardNavigation: false,
      daysOfWeekDisabled: "0",
      todayHighlight: true,
      maxViewMode: 0,
      templates: {
        leftArrow: '<i class="fa fa-chevron-left"></i>',
        rightArrow: '<i class="fa fa-chevron-right"></i>'
      }
    });
    _acoesUnidade();
    _acoesServicos();
    _acoesBarbeiro();
  }

  function _acoesUnidade() {
    $('.selecao-unidade .item-link').on('click', function(event) {
      let unidadeId = $(this).attr('data-id');
      let unidadeNome =  $(this).attr('data-name');
      let $accordionItem = $(this).closest('.accordion-item');
      let $accordionProximo = $accordionItem.next();

      $('#field-unidade').val(unidadeId);

      $accordionItem.addClass('completed');
      $accordionItem.find('.accordion-collapse').collapse('hide');
      $accordionItem.find('.accordion-button .item-footer span').text(unidadeNome);
      $accordionProximo.find('.selecao-servico-total span').text('0,00');
      $accordionProximo.removeClass('completed');

      $.ajax({
        url: base_url + 'agendamento/servicos',
        type: 'POST',
        data: { unidade: unidadeId },
        error: function(data) {
          console.log('ERRO: não foi possivel buscar os serviços da unidade');  
        },
        success: function(data) {
          let $servicosLista = $accordionProximo.find('.selecao-servico ul');
          $servicosLista.empty();

          $.each(eval(data), function(i, item) {
            let elemento = `<li>
                <label class="item-link" data-preco="${item.valor}">
                  <input type="checkbox" class="hide" name="servicos" value="${item.cod_servico}">
                  <div class="item-inner">
                    <div class="item-title">${item.nome}</div>
                    <div>
                      <div class="item-preco">R$${item.valor.replace('.', ',')}</div>
                      <div class="item-duracao">${item.duracao} min</div>
                    </div>
                  </div>
                  <i class="fa fa-square-o"></i>
                  <i class="fa fa-check"></i>
                </label>
              </li>`;

            $accordionProximo.find('.selecao-servico ul').append(elemento);
            $accordionProximo.removeClass('accordion-item-disabled');
            $accordionProximo.find('.accordion-collapse').collapse('show');
          });
        }
      });

      event.preventDefault();
    });
  }

  function _acoesServicos() {
    $('.selecao-servico').on('click', '.item-link', function(event) {
      let precoTotal = 0.0;
      let $servicoItem = $(this);
      $servicoItem.toggleClass('item-checked');

      $servicoItem.closest('ul').find('.item-link.item-checked').each(function() {
        precoTotal += parseFloat($(this).attr('data-preco'));
      });
      $('.selecao-servico-total span').text(precoTotal.toFixed(2).replace('.', ','));
      
      event.preventDefault();
    });

    $('.selecao-servico .button-link').on('click', function(event) {
      let $accordionItem = $(this).closest('.accordion-item');
      let servicosIds = [];
      let servicoNomes = [];
      let unidadeId = $('#field-unidade').val();

      $accordionItem.find('.item-link.item-checked').each(function() {
        servicosIds.push($(this).find('[name="servicos"]').val());
        servicoNomes.push($(this).find('.item-title').text());
      });

      $accordionItem.addClass('completed');
      $accordionItem.find('.accordion-collapse').collapse('hide');
      $accordionItem.find('.accordion-button .item-footer').text(servicoNomes.join(', '));

      $.ajax({
        url: base_url + 'agendamento/barbeiros',
        type: 'POST',
        data: { unidade: unidadeId, servicos: servicosIds },
        error: function(data) {
          console.log('ERRO: não foi poss[ivel buscar os serviços da unidade');  
        },
        success: function(data) {
          let $accordionProximo = $accordionItem.next();
          let $barbeirosLista = $accordionProximo.find('.selecao-barbeiro ul');
          $barbeirosLista.find('li:not(.barbeiro-default)').remove();

          $.each(eval(data), function(i, item) {
            let elemento = `<li>
                <div class="item-media"><img src="${base_url}public/images/barbeiro/${item.imagem}"></div>
                <div class="item-nome">${item.nome}</div>
                <input type="radio" id="barbeiro" class="hide" name="employee" value="${item.cod_barbeiro}">
              </li>`;

            $barbeirosLista.append(elemento);
            $accordionProximo.removeClass('accordion-item-disabled');
            $accordionProximo.find('.accordion-collapse').collapse('show');
          });
        }
      });

      event.preventDefault();
    });
  }

  function _acoesBarbeiro() {
    $('.selecao-barbeiro li').on('click', function(event) {
      let barbeiroId = $(this).attr('data-id');
      let barbeiroNome =  $(this).attr('data-name');
      let $accordionItem = $(this).closest('.accordion-item');
      let $accordionProximo = $accordionItem.next();

      $accordionItem.addClass('completed');
      $accordionItem.find('.accordion-collapse').collapse('hide');
      $accordionItem.find('.accordion-button .item-footer span').text(unidadeNome);
      $accordionProximo.find('.selecao-servico-total span').text('0,00');
      $accordionProximo.removeClass('completed');

      $.ajax({
        url: base_url + 'agendamento/servicos',
        type: 'POST',
        data: { unidade: unidadeId },
        error: function(data) {
          console.log('ERRO: não foi possivel buscar os serviços da unidade');  
        },
        success: function(data) {
          let $servicosLista = $accordionProximo.find('.selecao-servico ul');
          $servicosLista.empty();

          $.each(eval(data), function(i, item) {
            let elemento = `<li>
                <label class="item-link" data-preco="${item.valor}">
                  <input type="checkbox" class="hide" name="servicos" value="${item.cod_servico}">
                  <div class="item-inner">
                    <div class="item-title">${item.nome}</div>
                    <div>
                      <div class="item-preco">R$${item.valor.replace('.', ',')}</div>
                      <div class="item-duracao">${item.duracao} min</div>
                    </div>
                  </div>
                  <i class="fa fa-square-o"></i>
                  <i class="fa fa-check"></i>
                </label>
              </li>`;

            $accordionProximo.find('.selecao-servico ul').append(elemento);
            $accordionProximo.removeClass('accordion-item-disabled');
            $accordionProximo.find('.accordion-collapse').collapse('show');
          });
        }
      });

      event.preventDefault();
    });
  }

  _init();
});