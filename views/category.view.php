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
                    
                <?php if($rowsCount > 0): ?>
                    <?php while($row = $result->fetch_assoc()): ?>
                    <section class="section--center mdl-grid mdl-grid--no-spacing mdl-shadow--2dp">
                        <div class="mdl-card mdl-cell mdl-cell--12-col">
                            <div class="mdl-card__supporting-text">
                                <h4><?php echo $row['nameEnterprise'] ?></h4>
                                <p><?php echo $row['descEnterprise'] ?></p>
                            </div>
                            <div class="mdl-card__actions">
                                <a class="mdl-button" href="/enterprise/<?php echo $row['nameEnterprise'] ?>">Ver Más</a>
                            </div>
                        </div>
                    </section>        
                    <?php endwhile; ?>

                <?php else: ?>
                    <section class="section--center mdl-grid">
                        <div class="mdl-card mdl-cell mdl-cell--12-col">
                            <div class="mdl-card__supporting-text">
                                <p style="text-align: center"><?php echo 'No hay compañias que mostrar' ?></p>
                            </div>
                        </div>
                    </section>   
                <?php endif ?>
                </div>
            </main> 
        </div>
    </div>
    
    <div id="demo-toast-example" class="mdl-js-snackbar mdl-snackbar">
        <div class="mdl-snackbar__text"></div>
        <button class="mdl-snackbar__action" type="button"></button>
    </div>  

    <div class="floating-button">
        <button class="mdl-button mdl-js-button mdl-button--fab mdl-button--colored" >
            <i class="material-icons" id="nuevo">add</i>
        </button>
    </div>
              
    <script src="js/libs/material.min.js"></script>
    <script src="js/funciones.js"></script>
    <script src="js/index.js"></script>
</body>
</html>