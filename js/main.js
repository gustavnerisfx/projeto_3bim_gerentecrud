
$(document).ready(function () {

    $("#delete-modal").on("show.bs.modal", function (event) {

        var button = $(event.relatedTarget);
        var id = button.data("gerente");

        var modal = $(this);

        modal.find(".modal-title").text("Excluir Gerente: " + id);
        modal.find(".modal-body").text("Deseja mesmo excluir esse gerente: " + id);
        modal.find("#confirm").attr("href", "delete.php?id=" + id);

    });

    $("#cep").mask("00000-000");
    $("#telefone").mask("(00) 0000-0000");
    $("#celular").mask("(00) 00000-0000");
    $("#cpf").mask("000.000.000-00", { reverse: true });

});

function previewFoto(input, previewId) {
  var preview = document.getElementById(previewId);
  if (!preview) return;

  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      preview.src = e.target.result;
      preview.style.display = "block";
    };
    reader.readAsDataURL(input.files[0]);
  } else {
    preview.src = "";
    preview.style.display = "none";
  }
}

