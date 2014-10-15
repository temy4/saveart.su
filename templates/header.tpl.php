      <div class="masthead">
        <h3 class="heading-name logo"><a href="<?=$basePath?>"><img src="<?=$basePath?>resources/img/logo.png"><span class="text-muted">Студия</span> SAVEART</a></h3>
        <ul class="nav nav-justified">
            <?php
                require ('routes.conf.php');
                $routes = getMenu();
                foreach ($routes as $path => $route) {
                    echo '<li'.($path == CURRENT_PAGE ? ' class="active"' : '').'><a href="'.$route['link'].'">'.( isset($route['icon']) ? '<i class="'.$route['icon'].'"></i>&nbsp;' : '' ).$route['title'].'</a></li>'."\n";
                }
            ?>
        </ul>
      </div>