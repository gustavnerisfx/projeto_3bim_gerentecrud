<?php
include "functions.php";
index();
include(HEADER_TEMPLATE);
?>

<div class="container1 row justify-content-center">
    <div class="col-12 col-xl-10">
        <h2 class="mb-0 form-title">Gerentes</h2>
        <hr class="mt-4 mb-4">
        <header class="d-flex flex-wrap justify-content-between align-items-center gap-3 mt-2 mb-4">
            

            <form action="index.php" method="get" class="flex-grow-1" style="max-width: 480px; min-width: 240px;">
                <div class="input-group">
                
                    <input type="text" name="q" class="form-control"
                        placeholder="Pesquisar por nome, CPF, departamento, cidade..."
                        value="<?php echo htmlspecialchars($termo_pesquisa ?? ''); ?>">
                    <button type="submit" class="btn btn-secondary">Pesquisar</button>
                    <?php if (!empty($termo_pesquisa)): ?>
                        <a href="index.php" class="btn btn-outline-secondary" title="Limpar pesquisa">
                            <i class="fa-solid fa-xmark"></i>
                        </a>
                    <?php endif; ?>
                </div>
            </form>

            <div class="d-flex gap-2">
                <a class="btn btn-secondary mt-2" href="add.php"><i class="fa-solid fa-user-plus me-1"></i>Novo Gerente</a>
                <a class="btn btn-outline-secondary mt-2" href="index.php"><i
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

        

        <div class="card shadow-sm form-card mb-5">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead>
                        <tr>
                            <th width="60">Foto</th>
                            <th width="60">ID</th>
                            <th width="25%">Nome</th>
                            <th>Departamento</th>
                            <th>Contato</th>
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
                                                style="width:49px;height:49px;object-fit:cover;border-radius:50%;">
                                        <?php else: ?>
                                            <i class="fa-solid fa-circle-user fa-2x text-secondary"></i>
                                        <?php endif; ?>
                                    </td>
                                    <td class="text-muted">#<?php echo $gerente['id']; ?></td>
                                    <td class="fw-semibold"><?php echo htmlspecialchars($gerente['nome']); ?></td>
                                    <td><?php echo htmlspecialchars($gerente['depto']); ?></td>
                                    <td><?php echo telefone($gerente['celular']); ?></td>
                                    <td class="text-muted small">
                                        <?php echo formatadata($gerente['modified'], "d/m/Y - H:i:s"); ?></td>
                                    <td class="actions text-end">
                                        <a href="view.php?id=<?php echo $gerente['id']; ?>"
                                            class="btn btn-sm btn-custom mt-2 mb-2" title="Visualizar">
                                            <i class="fa fa-eye"></i> Visualizar
                                        </a>
                                        <a href="edit.php?id=<?php echo $gerente['id']; ?>" class="btn btn-sm btn-custom mt-2 mb-2"
                                            title="Editar">
                                            <i class="fa fa-pencil"></i> Editar
                                        </a>
                                        <a href="#" class="btn btn-sm btn-custom mt-2 mb-2" data-bs-toggle="modal"
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
                                    <?php if (!empty($termo_pesquisa)): ?>
                                        Nenhum gerente encontrado para "<?php echo htmlspecialchars($termo_pesquisa); ?>".
                                    <?php else: ?>
                                        Nenhum registro encontrado.
                                    <?php endif; ?>
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