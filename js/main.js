$('#delete-modal').on('show.bs.modal', function (event) {
  
  var button = $(event.relatedTarget);
  var id = button.data('gerente');
  
  var modal = $(this);
  modal.find('.modal-title').text('Excluir Cliente: ' + id);
  modal.find('.modal-body').text('Deseja mesmo excluir esse cliente: ' + id);
  modal.find('#confirm').attr('href', 'delete.php?id=' + id);
  
});
