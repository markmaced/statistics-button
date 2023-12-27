jQuery(document).ready(function($) {
    $('.statistics-create').on('click', function() {
        var nonce = $(this).data('nonce');
        $.ajax({
          url: wpurl.ajax,
          type: 'POST',
          dataType: 'json',
          data: {
            action: 'register_button_click',
            nonce: nonce
          },
          success: function(data) {
            console.log('Estatística salva com sucesso:', data);
          },
          error: function(error) {
            console.error('Erro ao salvar a estatística:', error);
          }
        });
    });
});