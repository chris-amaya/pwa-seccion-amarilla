<body class="mdl-demo">
    <div id="app">
        <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header demo-layout is-small-screen">
            <header class="mdl-layout__header">
                <div class="mdl-layout__header-row">
                    <span class="mdl-layout-title">PWA</span>
                    <div class="mdl-layout-spacer"></div>
                    <nav class="mdl-navigation ">
                    <?php include_once('views/navigation.php'); ?>
                    </nav>
                </div>
            </header>
            <?php require_once('views/menu.php'); ?>
            <div class="ribbon"></div>
            <main class="mdl-layout__content main">
                <div class="main-container mdl-grid">
                    <div class="content mdl-color--white mdl-shadow--4dp content mdl-color-text--grey-800 mdl-cell mdl-cell--12-col">
                        <form action="#" class="form mdl-grid ">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--12-col">
                                <input class="mdl-textfield__input" type="text" id="titulo" name="enterpriseName">
                                <label class="mdl-textfield__label" for="titulo" >Titulo</label>
                            </div>
                            <div class="mdl-textfield mdl-js-textfield mdl-cell mdl-cell--12-col">
                                <textarea class="mdl-textfield__input" type="text" rows="5" name="desc" id="descripcion"></textarea>
                                <label class="mdl-textfield__label" for="descripcion" >Descripción</label>
                            </div>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--4-col mdl-cell--12-col-phone mdl-cell--12-col-tablet">
                                <input class="mdl-textfield__input" type="text" id="coordenadas">
                                <label class="mdl-textfield__label" for="coordenadas" name="coordinates" >Coordenadas</label>
                            </div>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--4-col mdl-cell--6-col-phone mdl-cell--4-col-tablet">
                                <input class="mdl-textfield__input" type="text" id="facebook" name="facebook">
                                <label class="mdl-textfield__label" for="titulo" >Facebook</label>
                            </div>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--4-col mdl-cell--6-col-phone mdl-cell--4-col-tablet">
                                <input class="mdl-textfield__input" type="text" id="twitter" name="twitter">
                                <label class="mdl-textfield__label" for="coordenadas">Twitter</label>
                            </div>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--4-col mdl-cell--6-col-phone mdl-cell--4-col-tablet">
                                <input class="mdl-textfield__input" type="email" id="email" name="email">
                                <label class="mdl-textfield__label" for="coordenadas">Email</label>
                            </div>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--4-col mdl-cell--6-col-phone mdl-cell--4-col-tablet">
                                <input class="mdl-textfield__input" type="number" id="telephone" name="telephone">
                                <label class="mdl-textfield__label" for="coordenadas">Teléfono</label>
                            </div>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-selectfield mdl-js-selectfield mdl-selectfield--floating-label">
                                <select class="mdl-selectfield__select" id="type" name="type">
                                <option value=""></option>
                                <?php while($category = $categories->fetch_assoc()): ?> 
                                    <option value="<?php echo $category['idCategory'] ?>"><?php echo $category['categoryName'] ?></option>
                                <?php  endwhile; ?>
                                </select>
                                <label class="mdl-selectfield__label" for="type">Giro</label>
                            </div>
                        
                        </form>
                                                
                        <ul class="mdc-image-list my-image-list">
                            <li class="mdc-image-list__item">
                                <div class="mdc-image-list__image-aspect-container">
                                    <i class="material-icons mdc-image-list__image take-photo" id="iconCamera">photo_camera</i>
                                </div>
                            </li>
                            
                        </ul>
                        <div class="mdl-grid mdl-cell mdl-cell--12-col">
                            <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent mdl-cell mdl-cell--4-col mdl-cell--4-col-tablet mdl-cell--4-col-phone" id="subirFotosHTML"  >
                                Subir Información
                            </button>
                        </div>
                        
                    </div>
                </div>
            </main>

        </div>
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

    <div id="demo-toast-example" class="mdl-js-snackbar mdl-snackbar">
        <div class="mdl-snackbar__text"></div>
        <button class="mdl-snackbar__action" type="button"></button>
    </div>

    <div class="photo-container oculto">
        <video autoplay></video>
        <i class="material-icons cerrar">close</i>
        <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" id="button-photo">
            <i class="material-icons">photo_camera</i>
        </button>
    </div>

    <script src="js/libs/material.min.js"></script>
    <script src="https://cdn.rawgit.com/kybarg/mdl-selectfield/mdl-menu-implementation/mdl-selectfield.min.js"></script>
    <script src="js/camara-class.js"></script>
    <script src="js/enterprise.js"></script>
    <!--     <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCxwvErSLxnShSHl0R8qv2RErkuwQ68dJQ&callback=initMap"></script>
 -->

</body> 