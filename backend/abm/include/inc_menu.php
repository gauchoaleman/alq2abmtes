<?
/*
Código del head que se incluye en todas las páginas
*/
?>
      <!-- The justified navigation menu is meant for single line per list item.
           Multiple lines will require custom code not provided by Bootstrap. -->
           <div class="masthead">
              <h3 class="text-muted"><a href="abm.php">ABM Sea</a></h3>
              <nav>
                <ul class="nav nav-justified">
                  <li
      			<?php
      			if( basename($_SERVER["SCRIPT_FILENAME"], '.php')=="administradores")
      				echo " class='active'";
      				?>><?php
      			if( basename($_SERVER["SCRIPT_FILENAME"], '.php')=="administradores")
      			{
      				echo "<a href='#'>Administradores</a>";
      			}
      			else
      			{
      				echo "<a href='administradores.php'>Administradores</a>";
      			}?>
      			</li>
                  <li<?php
      			if( basename($_SERVER["SCRIPT_FILENAME"], '.php')=="contactos")
      				echo " class='active'";
      				?>><?php
      			if( basename($_SERVER["SCRIPT_FILENAME"], '.php')=="contactos")
      			{
      				echo "<a href='#'>Contactos</a>";
      			}
      			else
      			{
      				echo "<a href='contactos.php'>Contactos</a>";
      			}?>
      			</li>
                  <li<?php
      			if( basename($_SERVER["SCRIPT_FILENAME"], '.php')=="eventos")
      				echo " class='active'";
      				?>><?php
      			if( basename($_SERVER["SCRIPT_FILENAME"], '.php')=="eventos")
      			{
      				echo "<a href='#'>Eventos</a>";
      			}
      			else
      			{
      				echo "<a href='eventos.php'>Eventos</a>";
      			}?>
      			</li>
                  <li<?php
      			if( basename($_SERVER["SCRIPT_FILENAME"], '.php')=="salas")
      				echo " class='active'";
      				?>><?php
      			if( basename($_SERVER["SCRIPT_FILENAME"], '.php')=="salas")
      			{
      				echo "<a href='#'>Salas</a>";
      			}
      			else
      			{
      				echo "<a href='salas.php'>Salas</a>";
      			}?>
      			</li>

                </ul>
              </nav>
            </div>
