</main>

    <footer class="site-footer">
        <?php $dt = new DateTime("now", new DateTimeZone("America/Sao_Paulo")); ?>
        <div class="container-fluid">
            <div class="row footer-content gy-4">

                <div class="col-12 col-md-5">
                    <h2 class="footer-brand"><i class="fa-solid fa-house-laptop me-2"></i>TECH AERO</h2>
                    <p class="footer-text">
                        Plataforma interna de gestão e administração de gerentes, desenvolvida para
                        centralizar cadastros, otimizar processos e dar mais agilidade ao dia a dia da equipe.
                    </p>
                </div>

                <div class="col-6 col-md-3">
                    <h3 class="footer-heading">Links Rápidos</h3>
                    <ul class="footer-links">
                        <li><a href="<?php echo BASEURL; ?>index.php"><i class="fa-solid fa-chevron-right"></i> Dashboard</a></li>
                        <li><a href="<?php echo BASEURL; ?>gerentes"><i class="fa-solid fa-chevron-right"></i> Gerentes</a></li>
                        <li><a href="<?php echo BASEURL; ?>gerentes/add.php"><i class="fa-solid fa-chevron-right"></i> Novo Gerente</a></li>
                    </ul>
                </div>

                <div class="col-6 col-md-4">
                    <h3 class="footer-heading">Redes Sociais</h3>
                    <p class="footer-text">Acompanhe a TECH AERO e fale com a gente:</p>
                    <div class="footer-social">
                        <a href="#" class="social-icon" title="Instagram" target="_blank" rel="noopener"><i class="fa-brands fa-instagram"></i></a>
                        <a href="#" class="social-icon" title="Facebook" target="_blank" rel="noopener"><i class="fa-brands fa-youtube"></i></a>
                        <a href="#" class="social-icon" title="LinkedIn" target="_blank" rel="noopener"><i class="fa-brands fa-linkedin-in"></i></a>
                        <a href="https://github.com/gustavnerisfx/projeto_3bim_gerentecrud" class="social-icon" title="GitHub" target="_blank" rel="noopener"><i class="fa-brands fa-github"></i></a>
                        <a href="mailto:gustavonerissilva0gmail.com" class="social-icon" title="E-mail"><i class="fa-solid fa-envelope"></i></a>
                    </div>
                </div>

            </div>

            <hr class="footer-divider">

            <div class="footer-bottom">
                <p class="mb-0">© <?= $dt->format("Y"); ?> TECH AERO. Todos os direitos reservados.</p>
                <p class="mb-0"><a href="https://github.com/gustavnerisfx/projeto_3bim_gerentecrud" class="mb-0" title="GitHub" target="_blank" rel="noopener">Criado por Gustavo Neris Silva e Lucas Lozano Marsola.</a></p>
            </div>
        </div>
    </footer>
</div>

<script src="<?php echo BASEURL; ?>js/jquery-4.0.0.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<script src="<?php echo BASEURL; ?>js/bootstrap.bundle.min.js"></script>
<script src="<?php echo BASEURL; ?>js/all.min.js"></script>
<script src="<?php echo BASEURL; ?>js/main.js"></script>

</body>

</html>