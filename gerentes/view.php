<?php

include "functions.php";
view($_GET["id"]);
include(HEADER_TEMPLATE);

?>


<div class="container1 row justify-content-center mb-5">
	<div class="col-12 col-xl-8 col-xxl-7">

		<?php if (!empty($_SESSION["message"])): ?>
			<div class="alert alert-<?php echo $_SESSION["type"]; ?> alert-dismissible fade show" role="alert">
				<?php echo $_SESSION["message"]; ?>
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
			<?php unset($_SESSION["message"], $_SESSION["type"]); ?>
		<?php endif; ?>

		<div class="card shadow-sm form-card">
			<div class="card-body">

				<div class="view-header text-center">
					<?php if (!empty($gerente["foto"])): ?>
						<img src="<?php echo UPLOAD_URL . $gerente['foto']; ?>"
							alt="Foto de <?php echo htmlspecialchars($gerente['nome']); ?>" class="view-avatar">
					<?php else: ?>
						<i class="fa-solid fa-circle-user view-avatar-placeholder"></i>
					<?php endif; ?>

					<h2 class="view-nome"><?php echo htmlspecialchars($gerente["nome"]); ?></h2>
					<span class="view-id">Gerente #<?php echo $gerente["id"]; ?></span>
				</div>

				<hr class="my-4">

				<h5 class="text-muted mb-3">Dados pessoais</h5>
				<div class="row g-3 mb-1">
					<div class="col-md-4 view-field">
						<span class="view-label">CPF</span>
						<span class="view-value"><?php echo htmlspecialchars($gerente["cpf"]); ?></span>
					</div>
					<div class="col-md-4 view-field">
						<span class="view-label">Data de Nascimento</span>
						<span class="view-value"><?php echo formatadata($gerente["datanasc"], "d/m/Y"); ?></span>
					</div>
					<div class="col-md-4 view-field">
						<span class="view-label">Departamento</span>
						<span class="view-value"><?php echo htmlspecialchars($gerente["depto"]); ?></span>
					</div>
				</div>

				<hr class="my-4">

				<h5 class="text-muted mb-3">Endereço</h5>
				<div class="row g-3 mb-1">
					<div class="col-md-6 view-field">
						<span class="view-label">Endereço</span>
						<span class="view-value"><?php echo htmlspecialchars($gerente["endereco"]); ?></span>
					</div>
					<div class="col-md-4 view-field">
						<span class="view-label">Bairro</span>
						<span class="view-value"><?php echo htmlspecialchars($gerente["bairro"]); ?></span>
					</div>
					<div class="col-md-2 view-field">
						<span class="view-label">CEP</span>
						<span class="view-value"><?php echo ($gerente["cep"]); ?></span>
					</div>
					<div class="col-md-6 view-field">
						<span class="view-label">Município</span>
						<span class="view-value"><?php echo htmlspecialchars($gerente["cidade"]); ?></span>
					</div>
					<div class="col-md-2 view-field">
						<span class="view-label">UF</span>
						<span class="view-value"><?php echo htmlspecialchars($gerente["estado"]); ?></span>
					</div>
				</div>

				<hr class="my-4">

				<h5 class="text-muted mb-3">Contato e trabalho</h5>
				<div class="row g-3 mb-1">
					<div class="col-md-6 view-field">
						<span class="view-label">Telefone</span>
						<span class="view-value"><?php echo telefone($gerente["telefone"]); ?></span>
					</div>
					<div class="col-md-3 view-field">
						<span class="view-label">Celular</span>
						<span class="view-value"><?php echo telefone($gerente["celular"]); ?></span>
					</div>
				</div>

				<hr class="my-4">

				<h5 class="text-muted mb-3">Sistema</h5>
				<div class="row g-3">
					<div class="col-md-6 view-field">
						<span class="view-label">Data de Cadastro</span>
						<span class="view-value"><?php echo formatadata($gerente["created"], "d/m/Y H:i:s"); ?></span>
					</div>
					<div class="col-md-6 view-field">
						<span class="view-label">Última modificação</span>
						<span class="view-value"><?php echo formatadata($gerente["modified"], "d/m/Y H:i:s"); ?></span>
					</div>
				</div>

			</div>

			<div id="actions" class="card-footer bg-transparent d-flex justify-content-center gap-2">
				<a href="edit.php?id=<?php echo $gerente["id"]; ?>" class="btn btn-secondary">
					<i class="fa-solid fa-pen-to-square me-1"></i>Editar
				</a>
				<a href="index.php" class="btn btn-outline-secondary">
					<i class="fa-solid fa-arrow-rotate-left me-1"></i>Voltar
				</a>
			</div>
		</div>

	</div>
</div>

<?php include FOOTER_TEMPLATE; ?>