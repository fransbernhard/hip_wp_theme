<!DOCTYPE html>
<html <?php language_attributes(); ?> >
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="<?php bloginfo('url'); ?>/wp-content/themes/hip/dist/img/logo2.png" />
        <title> <?php bloginfo('name'); ?> </title>
        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?> id="body" >

      <script type="text/javascript">
        var myFunction = () => {
          var x = document.getElementById("nav-links");
          if (x.className === "nav-links") {
            x.className += " collapse-menu";
          } else {
            x.className = "nav-links";
          }
        }
      </script>

      <header class="nav-wrapper">
        <div class="nav-container goTo">
          <a class="logo" href="<?php bloginfo('url'); ?>">
            <img src="<?php bloginfo('url'); ?>/wp-content/themes/hip2/dist/img/hip_logo_white.png" width="150px">
          </a>

          <div class="menu-icon" onclick="myFunction()">
            <img src="<?php bloginfo('url'); ?>/wp-content/themes/hip2/dist/img/nav.png" width="50px" alt="logo">
          </div>

          <div class="nav-links" id="nav-links">
            <?php
              $args = array(
                'theme_location' => 'primary'
              );
              wp_nav_menu( $args );
            ?>
          </div>
        </div>
      </header>
