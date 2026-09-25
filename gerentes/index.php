<?php
include "functions.php";
index();
include(HEADER_TEMPLATE);
?>

<div class="container1 row justify-content-center">
    <div class="col-12 col-xl-10">

        <header class="row align-items-center mb-2">
            <div class="col-sm-6">
                <h2 class="mb-0 form-title">Gerentes</h2>
            </div>
            <div class="col-sm-6 text-sm-end mt-2 mt-sm-0">
                <a class="btn btn-secondary" href="add.php"><i class="fa-solid fa-user-plus me-1"></i>Novo Gerente</a>
                <a class="btn btn-outline-secondary" href="index.php"><i
                        class="fa-solid fa-rotate me-1"></i>Atualizar</a>
            </div>
        </header>

        <?php if (!empty($_SESSION['message'])): ?>
            <div class="alert alert-<?php echo $_SESSION['type']; ?> alert-dismissible fade show" role="alert">
                <?php echo $_SESSION['message']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php unset($_SESSION['message'], $_SESSION['type']); ?>
        <?php endif; ?>

        <hr>

        <div class="card shadow-sm form-card">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead>
                        <tr>
                            <th width="60">Foto</th>
                            <th width="60">ID</th>
                            <th width="25%">Nome</th>
                            <th>CPF</th>
                            <th>Telefone</th>
                            <th>Atualizado em</th>
                            <th class="text-end">Opções</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($gerentes): ?>
                            <?php foreach ($gerentes as $gerente): ?>
                                <tr>
                                    <td>
                                        <?php if (!empty($gerente['foto'])): ?>
                                            <img src="<?php echo UPLOAD_URL . $gerente['foto']; ?>"
                                                alt="Foto de <?php echo htmlspecialchars($gerente['nome']); ?>"
                                                style="width:42px;height:42px;object-fit:cover;border-radius:50%;">
                                        <?php else: ?>
                                            <i class="fa-solid fa-circle-user fa-2x text-secondary"></i>
                                        <?php endif; ?>
                                    </td>
                                    <td class="text-muted">#<?php echo $gerente['id']; ?></td>
                                    <td class="fw-semibold"><?php echo htmlspecialchars($gerente['nome']); ?></td>
                                    <td><?php echo htmlspecialchars($gerente['cpf']); ?></td>
                                    <td><?php echo telefone($gerente['telefone']); ?></td>
                                    <td class="text-muted small">
                                        <?php echo formatadata($gerente['modified'], "d/m/Y - H:i:s"); ?></td>
                                    <td class="actions text-end">
                                        <a href="view.php?id=<?php echo $gerente['id']; ?>"
                                            class="btn btn-sm btn-custom" title="Visualizar">
                                            <i class="fa fa-eye"></i> Visualizar
                                        </a>
                                        <a href="edit.php?id=<?php echo $gerente['id']; ?>" class="btn btn-sm btn-custom"
                                            title="Editar">
                                            <i class="fa fa-pencil"></i> Editar
                                        </a>
                                        <a href="#" class="btn btn-sm btn-custom" data-bs-toggle="modal"
                                            data-bs-target="#delete-modal" data-gerente="<?php echo $gerente['id']; ?>"
                                            title="Excluir">
                                            <i class="fa fa-trash"></i> Excluir
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="7" class="text-center text-muted py-5">
                                    <i class="fa-solid fa-users-slash fa-2x mb-2 d-block"></i>
                                    Nenhum registro encontrado.
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

<?php
include "modal.php";
include FOOTER_TEMPLATE;
?>