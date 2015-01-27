<html>

	<head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title> Próximamente </title>
		<!--para el favicon-->
        <link rel="icon" type="image/png" href="../images/favicon.png" />
		<link rel="stylesheet" href="../css/listaPelis.css" /> <!-- El diseño está en un archivo externo -->

		<!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script> 
		
		<!--CSS bootstrap-->
        <link rel="stylesheet" type="text/css" href="../css/dist/css/bootstrap.css">
        <!-- jQuery para menu respontive -->
        <script type="text/javascript" src="../js/menu.js"></script> 
        <!-- Tipografia de google, para el mouseover -->
        <link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'> 
	</head>

	<body>
		<!-- Engloba todas las etiquetas -->
		<div id="container"> 

		<!-- Encabezado de toda la página -->
		<?php include("../includes/headerListaPelis.html"); ?>

		<!-- Representa el apartado de Próximamente -->
        <section id="proximamente">

			<h3> Próximamente </h3>

			<?php

				// Importamos el fichero database.php para la conexión a la base de datos en la nube
				include_once("../config/database.php");

				include_once("../funciones/peliculas.php"); 

				echo "<link href=\"../css/listaPelis.css\" rel=\"stylesheet\" type=\"text/css\" >";

				// Establecemos la colección
				$collection=$bd->peliculas;

				$proximamente=$collection->find(array("upcoming" => "upcoming"));

				//var_dump(iterator_to_array($proximamente));

				foreach ($proximamente as $campo => $valor) {

					echo "<div class='peli'>";

					foreach ($valor as $movie => $dato) {

						$titulo;
						$id_pelicula;
						$year;
						$runtime;
						$poster;

						if($movie=="_id"){

                            $id_pelicula=$dato;

                        }

                        if($movie=="title"){

                            $titulo=$dato;
                        }

                        

                        if($movie=="poster"){
                        	echo "<div class='descrip'>";
                            $poster=$dato;
                            
                            // Cuando el usuario haga clic en la imágen o en el título irá al perfil de la película
                            echo "<a href='perfil-peli.php?peli=$titulo'><span class='text'>";
                            // Establecemos la colección
                            $collection=$bd->valoracion;

                            $media=mediaValoracion("$id_pelicula");

                            $media=$media*2;

                            $media=round($media,2);

                            echo "<span style='font-size:20px;'
                            class='glyphicon glyphicon-star'></span><br/>";

                            echo $media;

                            echo "</span><img src=$poster></a><h4><a href='perfil-peli.php?peli=$titulo'>" . $titulo. "</a></h4>";                      

                        }

						if($movie=="year"){

							$year=$dato;
							echo $year. "<br>";

						}

						if($movie=="runtime"){

							$runtime=$dato;
							echo $runtime. " mins <br>";
							echo "</div>";
						}

						

					}

					echo "</div>";				      
				}

			?>

		</section> <!-- Cierre de la Próximamente -->

        <!-- Pie de toda la página -->
        <?php include("../includes/footer.html"); ?>

		<!--Ventana Modal del Log In-->
        <?php include("../includes/ventanaModalLogin.html"); ?>

        <!--Ventana Modal del Sign In-->
        <?php include("../includes/ventanaModalSignin.html"); ?>

		</div> <!-- div de Container -->

		<!-- Para las ventanas modales -->
		<script type="text/javascript" src="https://code.jquery.com/jquery.js"></script> <!-- jQuery -->
        <script type="text/javascript" src="../css/dist/js/bootstrap.min.js"></script>

	</body>

</html>