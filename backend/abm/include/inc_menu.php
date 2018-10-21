<?
/*
Código del head que se incluye en todas las páginas
*/
?>
      <!-- The justified navigation menu is meant for single line per list item.
           Multiple lines will require custom code not provided by Bootstrap. -->
      <div class="masthead">
        <h3 class="text-muted"><a href="index.php">Alquiler CAPACITAS</a></h3>
		<?php if( $_SESSION["loginId"])
				echo "<a href='index.php?accion=logout'>Logout</a> / <a href='index.php?accion=cambiarclave'>Cambiar clave</a>";
				?>
        <nav>
          <ul class="nav nav-justified">
            <li 
			<?php
			if( basename($_SERVER["SCRIPT_FILENAME"], '.php')=="alquileres")
				echo " class='active'";
				?>><?php
			if( basename($_SERVER["SCRIPT_FILENAME"], '.php')=="alquileres") 
			{
				echo "<a href='alquileres.php'>Alquileres</a>";
			}
			else 
			{
				echo "<a href='alquileres.php'>Alquileres</a>";
			}?>
			</li>
            
            <li<?php
			if( basename($_SERVER["SCRIPT_FILENAME"], '.php')=="recursos")
				echo " class='active'";
				?>><?php
			if( basename($_SERVER["SCRIPT_FILENAME"], '.php')=="recursos") 
			{
				echo "<a href='recursos.php'>Recursos</a>";
			}
			else 
			{
				echo "<a href='recursos.php'>Recursos</a>";
			}?>
			</li>
            <li<?php
			if( basename($_SERVER["SCRIPT_FILENAME"], '.php')=="clientes")
				echo " class='active'";
				?>><?php
			if( basename($_SERVER["SCRIPT_FILENAME"], '.php')=="clientes") 
			{
				echo "<a href='clientes.php'>Clientes</a>";
			}
			else 
			{
				echo "<a href='clientes.php'>Clientes</a>";
			}?>
			</li>
   
          </ul>
        </nav>
      </div>