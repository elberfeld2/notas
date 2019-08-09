
<?php

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////Comprovaciones de session y get
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

session_start();//Iniciamos secion

/*
//Visualizar los datos
var_dump($_SESSION);
var_dump($_GET);
*/

if(isset($_SESSION["comentarios"])==false){//Preguntamos si no hay comentarios
    $_SESSION["comentarios"]=[];//Si no hay se crea un array vacio
}

if(isset($_GET["com"])){//Preguntamos si hay un comentario a agregar
//Si lo hay
    $idT=$_GET["tabla"];//Octenemos el id a que tabla va

    if(isset($_SESSION["comentarios"][$idT])){//Preguntamos si esa tabla existe
        //si existe
        $tamañoDeLaTabla=sizeof($_SESSION["comentarios"][$idT]);//Preguntamos el tamaño

        $_SESSION["comentarios"][$idT][$tamañoDeLaTabla]=$_GET["com"];//y agregamos el comentario / Recordar q el tamaño es el ultimo digito no existente [0=>1,1=>2] tamaño=2 pos lo tanto [2=>lo nuevo]

    }else{
        $_SESSION["comentarios"][$idT]=[$_GET["com"]];//Si no exite creamos el array con el comentario
    }

}

$tablas=isset($_GET["numero"]) ? $_GET["numero"] : 12; //PReguntamso el numero de tablas


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////Funciones para comentarios
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        function escribir($idTabla)//Menu que recibe el id de la tabla
        {
         global $tablas;
            ?>
            <div>
                <form action="index.php">
                    <div class="form-group">
                        <label for="com ">Agregar comentario :</label>
                        <input type="text" class="form-control" id="com" placeholder="Ingresa comentario" name="com"><!-- Comentario -->
                    </div>
                    <input type="hidden" class="form-control" id="tabla"  name="tabla" value="<?=$idTabla?>"><!-- Valor oculto del id de la tabla -->
                    <input type="hidden" class="form-control" id="numero"  name="numero" value="<?=$tablas?>"><!-- Valor oculto del numeor de tablas a crear-->
                    <button type="submit" class="btn btn-default">enviar</button>
                </form>
            </div>
        <?php
        }

        function comentarios($idTabla){//Comentarios recibe el id de la tabla a mostar sus comentarios

            echo "<div>";

            $comentarios=$_SESSION["comentarios"][$idTabla];//Octenemos los comentarios de esa tabla con su id
            $tamañoDeLaTabla=sizeof($comentarios);//Tomamos el tamaño o cantida de comentarios

            echo "<br>";
            echo "<h4>Comentarios</h4>";//Agragamos un titulo

            for($i=0;$i<$tamañoDeLaTabla;$i++){//Imprimimos los comentarios
                echo $comentarios[$i];
                echo "<br>";
            }
            echo "</div>";
        }


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////Funciones para crear las tablas
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        function tablaMultiplicar($n){ //Solicitamos el n de la tbal de multiplicacion

            echo "<div class=\"col-sm-3\">";//Div
            echo "<h3>Tabla del $n </h3>";//Titulo

            for($i=0;$i<10;$i++){//Creacion de la tabla asta 10
                echo  "$i x $n = ".($i*$n);
                echo "<br>";
            }

            if(isset($_SESSION["comentarios"][$n])){
                comentarios($n);//Se muestran los comentarios solo si existen
            }

            escribir($n);//Creacion del menu para crear mensaje

            echo "</div>";
        }
?>

<!--
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////Html comienza
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
-->

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Tablas</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>


<div class="container">

    <div class="row"><!-- Nuemro de tablas -->
    <br>
        <form action="index.php">
            <div class="form-group">
                <label for="numero">Numero :</label>
                <input type="text" class="form-control" id="numero" placeholder="Ingresa numero" name="numero">
            </div>
            <button type="submit" class="btn btn-default">enviar</button>
        </form>
    </div>
        <?php
        for($i=1;$i<=$tablas;$i++){ //Creacion delas tablas con un total propuesto por el usuario en la variable $tablas

            if($i%4==1){             //Para ordenar mejor cada fila se agraga un row  al cominzo ej : 1%4=1 5%4=1
                echo "<div class=\"row\"> ";
            }

            tablaMultiplicar($i);       //Creacion de las tablas por nuemro correspondiente ($i)

            if($i%4==0){            //Finaliza el row   ej : 4%4=0 8%4=0   recordemos que el for comienza en 1
                echo "</div>";
            }
        }

        if($tablas%4!=0){ //Si al finalizar no se completa la fila agraga cerramos
            echo "</div>";
        }

        ?>
</div>

</body>
</html>
