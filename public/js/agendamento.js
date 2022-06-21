$(function() {

  function formatDate(date) {
    var d = new Date(date),
        month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear();

    if (month.length < 2)
        month = '0' + month;
    if (day.length < 2)
        day = '0' + day;

    return [year, month, day].join('-');
  }

  function reformatDate(dateStr)
  {
    dArr = dateStr.split("-");
    return dArr[2]+ "/" +dArr[1]+ "/" +dArr[0];
  }

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
    }).on('changeDate', function(event) {
      let barbeiroId = $('#field-servicos').val();
      let data = formatDate(event.date);

      $('#field-data').val(data);

      $.ajax({
        url: base_url + 'agendamento/horas',
        type: 'POST',
        data: { barbeiro: barbeiroId, data: data },
        error: function(data) {
          console.log('ERRO: não foi poss[ivel buscar os serviços da unidade');
        },
        success: function(data) {
          let $horasLista = $('#selecao-datahora-horas .item-conteudo');
          $horasLista.empty();

          $.each(eval(data), function(i, item) {
            let elemento = `<div class="item-hora" data-id="${item}">${item}</div>`;
            $horasLista.append(elemento);
          });
        }
      });
    });

    _acoesUnidade();
    _acoesServicos();
    _acoesBarbeiro();
    _acoesData();
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
                <label class="item-link" data-id="${item.cod_servico}" data-preco="${item.valor}">
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
        servicosIds.push($(this).attr('data-id'));
        servicoNomes.push($(this).find('.item-title').text());
      });

      $('#field-servicos').val(servicosIds.join(','));

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
            let elemento = `<li data-id="${item.cod_barbeiro}">
                <div class="item-media"><img src="${base_url}public/images/barbeiro/${item.imagem}"></div>
                <div class="item-nome">${item.nome}</div>
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
    $('.selecao-barbeiro').on('click', 'li', function(event) {
      let barbeiroId = $(this).attr('data-id');
      let barbeiroNome =  $(this).find('.item-nome').text();
      let $accordionItem = $(this).closest('.accordion-item');
      let $accordionProximo = $accordionItem.next();

      $('#field-barbeiro').val(barbeiroId);

      $accordionItem.find('.item-media').removeClass('item-selected');
      $(this).find('.item-media').addClass('item-selected');
      $accordionItem.addClass('completed');
      $accordionItem.find('.accordion-collapse').collapse('hide');
      $accordionItem.find('.accordion-button .item-footer').text(barbeiroNome);

      $accordionProximo.removeClass('completed');
      $accordionProximo.removeClass('accordion-item-disabled');
      $accordionProximo.find('.accordion-collapse').collapse('show');

      event.preventDefault();
    });
  }

  function _acoesData() {
    $('#selecao-datahora-horas').on('click', '.item-hora', function(event) {
      let horaId = $(this).attr('data-id');
      let data = $('#field-data').val();
      let $horasContainer = $(this).closest('.item-conteudo');
      let $accordionItem = $(this).closest('.accordion-item');

      $('#field-hora').val(horaId);

      $horasContainer.find('li').removeClass('item-selected');
      $(this).addClass('item-selected');
      $accordionItem.addClass('completed');
      $accordionItem.find('.accordion-collapse').collapse('hide');
      $accordionItem.find('.accordion-button .item-footer .data').text(reformatDate(data));
      $accordionItem.find('.accordion-button .item-footer .hora').text(horaId);

      $('.agendamento-button button').removeClass('disabled');

      event.preventDefault();
    });
  }

  _init();
});