<?php

  define('cadenaMayuscula', 'ABCDEFGHIJKLMNOPQRSTUVWXYZ');
  define('cadenaMinuscula', 'abcdefghijklmnopqrstuvwxyz');
  define('cadenaNumerica', '1234567890');
  define('cadenaEspecial', '*/-+?=)(&%$!@#[]{};:_^');

  if (isset($_POST['generar'])) {
    $longitudPassword = $_POST['longitudMaxima'];
    $cadenas = $_POST['caracteresPermitidos'];
    $cadenaPermitida = "";
    foreach ($cadenas as $cadena) {
      if ($cadena == 'cadenaMayuscula') { $cadenaPermitida .= cadenaMayuscula; }
      if ($cadena == 'cadenaMinuscula') { $cadenaPermitida .= cadenaMinuscula; }
      if ($cadena == 'cadenaNumerica') { $cadenaPermitida .= cadenaNumerica; }
      if ($cadena == 'cadenaEspecial') { $cadenaPermitida .= cadenaEspecial; }
    }
    $password = generador($longitudPassword, $cadenaPermitida);
  }

  function generador($longitudPassword, $cadenaPermitida) {
    $password = "";
    for ($i=0; $i < $longitudPassword; $i++) {
      $indice = rand(0, (strlen($cadenaPermitida)-1));
      $password = $password.$cadenaPermitida[$indice];
    }
    return $password;
  }

?>

<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Generador de contraseña</title>
    <link rel="stylesheet" href="materialize.css">
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col s12 m6 offset-m3">
          <div class="card">
            <div class="card-content">
              <div class="row">
                <form autocomplete="off" method="post" role="form" action="<?php $_SERVER['PHP_SELF']; ?>">
                  <div class="input-field col s12">
                    <input type="text" name="contraseña" value="<?php echo (isset($_POST['generar'])) ? $password : ''; ?>" readonly>
                    <label for="contraseña">Contraseña generada</label>
                  </div>
                  <div class="col s12 m6">
                    <div class="input-field col s6 m12">
                      <input type="number" id="longitudMaxima" name="longitudMaxima" min="0" max="30" value="0" oninput="this.form.rangoMaximo.value=this.value">
                      <label for="longitudMaxima">Longitud</label>
                    </div><br>
                    <p class="range-field col s6 m12">
                      <input type="range" name="rangoMaximo" min="0" max="30" value="0" oninput="this.form.longitudMaxima.value=this.value">
                    </p>
                  </div>
                  <div class="col s12 m6">
                    <p class="col s6 m12">
                      <label>
                        <input type="checkbox" name="caracteresPermitidos[]" onclick="continuar()" value="cadenaMayuscula" class="filled-in">
                        <span>Mayúsculas</span>
                      </label>
                    </p>
                    <p class="col s6 m12">
                      <label>
                        <input type="checkbox" name="caracteresPermitidos[]" onclick="continuar()" value="cadenaMinuscula" class="filled-in">
                        <span>Minúsculas</span>
                      </label>
                    </p>
                    <p class="col s6 m12">
                      <label>
                        <input type="checkbox" name="caracteresPermitidos[]" onclick="continuar()" value="cadenaNumerica" class="filled-in">
                        <span>Números</span>
                      </label>
                    </p>
                    <p class="col s6 m12">
                      <label>
                        <input type="checkbox" name="caracteresPermitidos[]" onclick="continuar()" value="cadenaEspecial" class="filled-in">
                        <span>Especial</span>
                      </label>
                    </p>
                  </div>
                  <div class="col s12 m12">
                    <br><button type="submit" name="generar" id="generar" disabled class="btn btn-large waves-effect waves-light">Generar</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script type="text/javascript" src="materialize.js"></script>
    <script type="text/javascript">
      function continuar() {
        var estado = document.getElementsByTagName("input");
        for (var i = 0; i < estado.length; i++) {
           if(estado[i].checked==true) {
             document.getElementById("generar").disabled = false;
             break;
           }
          else
            document.getElementById("generar").disabled = true;
        }
      }
    </script>
  </body>
</html>
