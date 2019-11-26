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
            <?php include_once('views/menu.php') ?>
            <main class="mdl-layout__content">
                <div class="mdl-grid mdl-grid--no-spacing login">
                    <div class="mdl-cell mdl-cell--4-col-desktop mdl-cell--4-col-tablet mdl-cell--3-col-phone">
                        <form action="#" method="POST" class="form formPersonalizado" id="formLogin">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label is-upgraded mdl-cell--12-col">
                                <input class="mdl-textfield__input" type="text" id="usuario" name="usuario">
                                <label class="mdl-textfield__label" for="usuario">Usuario</label>
                            </div>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label is-upgraded mdl-cell--12-col">
                                <input class="mdl-textfield__input" type="password" id="password" name="password">
                                <label class="mdl-textfield__label" for="password">Password</label>
                            </div>

                            <div class="mdl-cell mdl-cell--4-col mdl-cell--stretch mdl-grid--no-spacing mdl-grid">
                                <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent mdl-cell mdl-cell--3-col mdl-cell--3-col-tablet mdl-cell--3-col-phone" id="login">
                                login
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </main> 
        </div>
    </div>
    
    <div id="demo-toast-example" class="mdl-js-snackbar mdl-snackbar">
        <div class="mdl-snackbar__text"></div>
        <button class="mdl-snackbar__action" type="button"></button>
    </div>
    
    <script src="js/libs/material.min.js"></script>
    <script src="js/funciones.js"></script>
    <script src="js/login.js"></script>
    
</body>
</html>