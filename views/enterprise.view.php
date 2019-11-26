

<body class="mdl-demo" >
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
            <?php require_once('views/menu.php'); ?>  <!-- MENÚ QUE ESE ENCUENTRA EN EL ICONO DE HAMBURGUESA -->
            <div class="ribbon"></div>
            <main class="mdl-layout__content main">
                <div class="main-container mdl-grid">
                <!-- <div class="mdl-cell mdl-cell--2-col mdl-cell--hide-tablet mdl-cell--hide-phone"></div> -->
                    <div class="content mdl-color--white mdl-shadow--4dp content mdl-color-text--grey-800 mdl-cell mdl-cell--12-col container-view-enterprise">   
                        <!-- <div class="demo-crumbs mdl-color-text--grey-500">
                            Google &gt; Material Design Lite &gt; How to install MDL
                        </div> -->
                        <?php if($enterprise): ?>
                            <h3 id="enterpriseName"><?php echo $enterprise['nameEnterprise'] ?></h3>
                            <p id="enterpriseDesc"><?php echo $enterprise['descEnterprise'] ?></p>
                            <?php if($enterprise['coordinatesEnterprise']): ?>
                            <div id="mapa"> 
                                <iframe src="<?php echo $enterprise['coordinatesEnterprise'] ?>" frameborder="0" style="border:0" allowfullscreen></iframe>
                            </div>
                            <?php endif; ?>
                            
                        <div class="mdl-grid">
                            <div class="mdl-cell mdl-cell--6-col">
                                <p>Facebook:</p>
                                <a href="<?php echo !isset($enterprise['facebook']) || !$enterprise['facebook'] ? '' : $enterprise['facebook']?>"><?php echo !$enterprise['facebook'] ? 'no especificado' : $enterprise['facebook']?></a>
                            </div>
                            <div class="mdl-cell mdl-cell--6-col">
                                <p>Twitter</p>
                                <a href="<?php echo $enterprise['twitter'] ? '#' : $enterprise['twitter'] ?>"><?php echo !$enterprise['twitter'] ? 'no especificado' : $enterprise['twitter']?></a>
                            </div>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--6-col">
                                <input class="mdl-textfield__input" type="text" id="email" name="email" disabled value="<?php echo !isset($enterprise['email']) || !$enterprise['email'] ? 'no especificado' : $enterprise['email'] ?>">
                                <label class="mdl-textfield__label" for="email" >Email</label>
                            </div>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--6-col">
                                <input class="mdl-textfield__input" type="text" id="telephone" name="telephone" disabled value="<?php echo !isset($enterprise['telephone']) || !$enterprise['telephone'] ? 'no especificado' : $enterprise['telephone'] ?>">
                                <label class="mdl-textfield__label" for="telephone" >Telefono</label>
                            </div>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--6-col">
                                <input class="mdl-textfield__input" type="text" id="telephone" name="telephone" disabled value="<?php echo !isset($giro['categoryName']) || !$giro['categoryName'] ? 'Aún sin clasificar' : $giro['categoryName'] ?>">
                                <label class="mdl-textfield__label" for="telephone" >Giro</label>
                            </div>

                        </div>

                        <ul class="mdc-image-list my-image-list">
                            <?php if($photos): ?> 
                                <?php while($photo = $photos->fetch_assoc()): ?>
                                <li class="mdc-image-list__item">
                                    <div class="mdc-image-list__image-aspect-container">
                                        <img class="mdc-image-list__image" data-name="<?php echo $photo['name'] ?>" src="<?php echo $photo['route'] ?>">
                                    </div>
                                </li>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        <?php endif; ?>
                        </ul>
                    </div>
                </div>                
                
            </main> 
            
        </div>
    </div>

    
              
    <script src="js/libs/material.min.js"></script>  
    
</body>
</html>