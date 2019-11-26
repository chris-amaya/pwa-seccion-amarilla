<body class="mdl-demo" >
    <div id="app">
        <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
            <header class="mdl-layout__header">
                <div class="mdl-layout__header-row">
                    <span class="mdl-layout-title">PWA</span>
                <div class="mdl-layout-spacer"></div>
                    <nav class="mdl-navigation ">
                        <?php include_once('views/navigation.php'); ?>
                    </nav>
                </div>
            </header>
            <?php require_once('views/menu.php'); ?>  <!-- MENÚ QUE ESE ENCUENTRA EN EL ICONO DE HAMBURGUESA -->
            <main class="mdl-layout__content">
                <div class="mdl-layout__tab-panel is-active cantainerEnterprises" id="overview">
                    <?php while($row = $enterprises->fetch_assoc()): ?>
                        <section class="section--center mdl-grid mdl-grid--no-spacing mdl-shadow--2dp">
                            <div class="mdl-card mdl-cell mdl-cell--9-col-desktop mdl-cell--6-col-tablet mdl-cell--4-col-phone">
                                <div class="mdl-card__supporting-text">
                                    <h4><?php echo $row['nameEnterprise'] ?></h4>
                                    <p><?php echo $row['descEnterprise'] ?></p>
                                </div>
                                <div class="mdl-card__actions">
                                    <a class="mdl-button" href="enterprise/edit-enterprise/<?php echo $row['nameEnterprise']?>">Editar</a>
                                    <a class="mdl-button" href="enterprise/<?php echo $row['nameEnterprise']?>">Visualizar</a>
                                    <a class="mdl-button" href="#" id="delete" data-enterpriseID="<?php echo $row['enterpriseID'] ?>">Borrar</a>

                                </div>
                            </div>
                        </section>
                    <?php endwhile; ?>
                </div>
                <div class="floating-button" id="nuevo">
                    <button class="mdl-button mdl-js-button mdl-button--fab mdl-button--colored" id="nuevo" >
                        <i class="material-icons" id="nuevo">add</i>
                    </button>
                </div>

                <div id="demo-toast-example" class="mdl-js-snackbar mdl-snackbar">
                    <div class="mdl-snackbar__text"></div>
                    <button class="mdl-snackbar__action" type="button"></button>
                </div>

                <dialog class="mdl-dialog">
                    <h4 class="mdl-dialog__title">Allow data collection?</h4>
                    <div class="mdl-dialog__content">
                        <p>Allowing us to collect data will let us get you the information you want faster.</p>
                    </div>
                    <div class="mdl-dialog__actions">
                        <button type="button" class="mdl-button agree">Agree</button>
                        <button type="button" class="mdl-button close">Disagree</button>
                    </div>
                </dialog>
            </main> 
        </div>
    </div>
              
    <script src="js/libs/material.min.js"></script>
    <script src="js/panel.js"></script>
    <script src="js/index.js"></script>
</body>
</html>