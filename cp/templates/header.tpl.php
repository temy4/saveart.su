      <div class="masthead">
        <h3 class="heading-name logo"><a href="<?=$basePath?>"><span class="text-muted">Студия</span> SAVEART</a></h3>
        <ul class="nav nav-justified">
            <?php
                require ('routes.conf.php');
                $routes = getMenu();
                foreach ($routes as $path => $route) {
                    echo '<li'.($path == CURRENT_PAGE ? ' class="active"' : '').'><a href="'.$route['link'].'">'.$route['title'].'</a></li>'."\n";
                }
            ?>
        </ul>
      </div>