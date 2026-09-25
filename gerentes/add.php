<?php
include "functions.php";
add();
include HEADER_TEMPLATE;
?>

<div class="row justify-content-center">
<div class="col-12 col-xl-8 col-xxl-7">

<h2 class="mb-3 form-title">Novo Gerente</h2>

<form action="add.php" method="post" enctype="multipart/form-data">
  <div class="card shadow-sm form-card">
    <div class="card-body">

      <h5 class="text-muted mb-3">Dados pessoais</h5>
      <div class="row g-3">
        <div class="col-md-3">
          <label for="foto" class="form-label">Foto</label>
          <input type="file" class="form-control" id="foto" name="foto" accept="image/*"
            onchange="previewFoto(this, 'foto-preview')">
          <img id="foto-preview" src="" alt="Pré-visualização" onerror="this.style.display='none'"
            style="display:none; margin-top:10px; max-width:100px; max-height:100px; border-radius:6px; object-fit:cover;">
        </div>

        <div class="col-md-5">
          <label for="nome" class="form-label">Nome</label>
          <input type="text" class="form-control" id="nome" name="gerentes[nome]" maxlength="150">
        </div>

        <div class="col-md-2">
          <label for="cpf" class="form-label">CPF</label>
          <input type="text" class="form-control" id="cpf" name="gerentes[cpf]" maxlength="11">
        </div>

        <div class="col-md-2">
          <label for="datanasc" class="form-label">Nascimento</label>
          <input type="date" class="form-control" id="datanasc" name="gerentes[datanasc]">
        </div>
      </div>

      <hr class="my-4">

      <h5 class="text-muted mb-3">Endereço</h5>
      <div class="row g-3">
        <div class="col-md-6">
          <label for="endereco" class="form-label">Endereço</label>
          <input type="text" class="form-control" id="endereco" name="gerentes[endereco]" maxlength="150">
        </div>

        <div class="col-md-4">
          <label for="bairro" class="form-label">Bairro</label>
          <input type="text" class="form-control" id="bairro" name="gerentes[bairro]" maxlength="150">
        </div>

        <div class="col-md-2">
          <label for="cep" class="form-label">CEP</label>
          <input type="text" class="form-control" id="cep" name="gerentes[cep]" maxlength="9">
        </div>

        <div class="col-md-10">
          <label for="cidade" class="form-label">Município</label>
          <input type="text" class="form-control" id="cidade" name="gerentes[cidade]" maxlength="100">
        </div>

        <div class="col-md-2">
          <label for="estado" class="form-label">UF</label>
          <input type="text" class="form-control" id="estado" name="gerentes[estado]" maxlength="2">
        </div>
      </div>

      <hr class="my-4">

      <h5 class="text-muted mb-3">Contato e trabalho</h5>
      <div class="row g-3">
        <div class="col-md-3">
          <label for="telefone" class="form-label">Telefone</label>
          <input type="text" class="form-control" id="telefone" name="gerentes[telefone]" maxlength="13">
        </div>

        <div class="col-md-3">
          <label for="celular" class="form-label">Celular</label>
          <input type="text" class="form-control" id="celular" name="gerentes[celular]" maxlength="13">
        </div>

        <div class="col-md-3">
          <label for="ie" class="form-label">Inscrição Estadual</label>
          <input type="text" class="form-control" id="ie" name="gerentes[ie]" maxlength="15">
        </div>

        <div class="col-md-3">
          <label for="depto" class="form-label">Departamento</label>
          <input type="text" class="form-control" id="depto" name="gerentes[depto]" maxlength="100">
        </div>
      </div>

    </div>

    <div id="actions" class="card-footer bg-transparent d-flex gap-2">
      <button type="submit" class="btn btn-secondary">
        <i class="fa-solid fa-floppy-disk me-1"></i>Salvar
      </button>
      <a href="index.php" class="btn btn-outline-secondary">
        <i class="fa-solid fa-xmark me-1"></i>Cancelar
      </a>
    </div>
  </div>
</form>

</div>
</div>

<?php include FOOTER_TEMPLATE; ?>