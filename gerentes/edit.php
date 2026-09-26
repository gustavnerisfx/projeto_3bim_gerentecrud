<?php
include "functions.php";
edit();
include HEADER_TEMPLATE;
?>

<div class="row justify-content-center mb-5">
  <div class="col-12 col-xl-8 col-xxl-7">

    <h2 class="mb-3 form-title">Atualizar Gerente</h2>

    <form action="edit.php?id=<?= $gerente['id']; ?>" method="post" enctype="multipart/form-data">
      <div class="card shadow-sm form-card">
        <div class="card-body">

          <h5 class="text-muted mb-3">Dados pessoais</h5>
          <div class="row g-3">
            <div class="col-md-3">
              <label for="foto" class="form-label">Foto</label>
              <input type="file" class="form-control" id="foto" name="foto" accept="image/*"
                onchange="previewFoto(this, 'foto-preview')">
              <img id="foto-preview" src="<?php echo !empty($gerente['foto']) ? UPLOAD_URL . $gerente['foto'] : ''; ?>"
                alt="Pré-visualização" onerror="this.style.display='none'"
                style="<?php echo !empty($gerente['foto']) ? '' : 'display:none;'; ?> margin-top:10px; max-width:100px; max-height:100px; border-radius:6px; object-fit:cover;">
            </div>

            <div class="col-md-5">
              <label for="nome" class="form-label">Nome</label>
              <input type="text" class="form-control" id="nome" name="gerentes[nome]" maxlength="255"
                value="<?= htmlspecialchars($gerente['nome'] ?? ''); ?>" required>
            </div>

            <div class="col-md-2">
              <label for="cpf" class="form-label">CPF</label>
              <input type="text" class="form-control" id="cpf" name="gerentes[cpf]" maxlength="15"
                pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" title="Formato: 000.000.000-00"
                value="<?= htmlspecialchars($gerente['cpf'] ?? ''); ?>" required>
            </div>

            <div class="col-md-2">
              <label for="datanasc" class="form-label">Nascimento</label>
              <input type="date" class="form-control" id="datanasc" name="gerentes[datanasc]"
                value="<?= !empty($gerente['datanasc']) ? date('Y-m-d', strtotime($gerente['datanasc'])) : ''; ?>"
                required>
            </div>
          </div>

          <hr class="my-4">

          <h5 class="text-muted mb-3">Endereço</h5>
          <div class="row g-3">
            <div class="col-md-6">
              <label for="endereco" class="form-label">Endereço</label>
              <input type="text" class="form-control" id="endereco" name="gerentes[endereco]" maxlength="255"
                value="<?= htmlspecialchars($gerente['endereco'] ?? ''); ?>" required>
            </div>

            <div class="col-md-4">
              <label for="bairro" class="form-label">Bairro</label>
              <input type="text" class="form-control" id="bairro" name="gerentes[bairro]" maxlength="100"
                value="<?= htmlspecialchars($gerente['bairro'] ?? ''); ?>" required>
            </div>

            <div class="col-md-2">
              <label for="cep" class="form-label">CEP</label>
              <input type="text" class="form-control" id="cep" name="gerentes[cep]" maxlength="9"
                value="<?= htmlspecialchars($gerente['cep'] ?? ''); ?>" required>
            </div>

            <div class="col-md-10">
              <label for="cidade" class="form-label">Município</label>
              <input type="text" class="form-control" id="cidade" name="gerentes[cidade]" maxlength="100"
                value="<?= htmlspecialchars($gerente['cidade'] ?? ''); ?>" required>
            </div>

            <div class="col-md-2">
              <label for="estado" class="form-label">UF</label>
              <input type="text" class="form-control" id="estado" name="gerentes[estado]" maxlength="2"
                pattern="[A-Za-z]{2}" title="Sigla do estado com 2 letras"
                value="<?= htmlspecialchars($gerente['estado'] ?? ''); ?>" required>
            </div>
          </div>

          <hr class="my-4">

          <h5 class="text-muted mb-3">Contato e trabalho</h5>
          <div class="row g-3">
            <div class="col-md-3">
              <label for="telefone" class="form-label">Telefone</label>
              <input type="text" class="form-control" id="telefone" name="gerentes[telefone]" maxlength="14"
                value="<?= htmlspecialchars($gerente['telefone'] ?? ''); ?>">
            </div>

            <div class="col-md-3">
              <label for="celular" class="form-label">Celular</label>
              <input type="text" class="form-control" id="celular" name="gerentes[celular]" maxlength="15"
                value="<?= htmlspecialchars($gerente['celular'] ?? ''); ?>" required>
            </div>

            <div class="col-md-3">
              <label for="depto" class="form-label">Departamento</label>
              <input type="text" class="form-control" id="depto" name="gerentes[depto]" maxlength="100"
                value="<?= htmlspecialchars($gerente['depto'] ?? ''); ?>" required>
            </div>

            <div class="col-md-3">
              <label for="created" class="form-label">Data de Cadastro</label>
              <input type="text" class="form-control" id="created" disabled
                value="<?= formatadata($gerente['created'], 'd/m/Y H:i:s'); ?>">
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