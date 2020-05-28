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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="Description" content="Generador de contraseñas seguras">
    <title>Generador de contraseña</title>
    <style media="screen">
      html {
        line-height: 1.15;
        -ms-text-size-adjust: 100%;
        -webkit-text-size-adjust: 100%;
      }
      body {
        margin: 0;
        background-color: #f1f1f1;
      }
      button,input,optgroup,select,textarea {
        font-family: sans-serif;
        font-size: 100%;
        line-height: 1.15;
        margin: 0
      }
      button,input {
        overflow: visible;
      }
      button,select {
        text-transform: none;
      }
      button,html [type="button"],[type="reset"],[type="submit"] {
        -webkit-appearance: button
      }
      [type="checkbox"],[type="radio"] {
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
        padding: 0
      }
      [type="number"]::-webkit-inner-spin-button,[type="number"]::-webkit-outer-spin-button {
        height: auto
      }
      html {
        -webkit-box-sizing: border-box;
        box-sizing: border-box
      }
      *,*:before,*:after {
        -webkit-box-sizing: inherit;
        box-sizing: inherit
      }
      button,input,optgroup,select,textarea {
        font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen-Sans,Ubuntu,Cantarell,"Helvetica Neue",sans-serif
      }
      .no-select,input[type=range],input[type=range]+.thumb {
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none
      }
      .container {
        margin: 5% auto;
        max-width: 1280px;
        width: 90%
      }
      @media only screen and (min-width: 601px) {
        .container {
          width:85%
        }
      }
      @media only screen and (min-width: 993px) {
        .container {
          width:70%
        }
      }
      .col .row {
        margin-left: -.75rem;
        margin-right: -.75rem;
      }
      .row {
        margin-left: auto;
        margin-right: auto;
        margin-bottom: 20px
      }
      .row:after {
        content: "";
        display: table;
        clear: both
      }
      .row .col {
        float: left;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
        padding: 0 .75rem;
        min-height: 1px
      }
      .row .col.s6 {
        width: 50%;
        margin-left: auto;
        left: auto;
        right: auto;
      }
      .row .col.s12 {
        width: 100%;
        margin-left: auto;
        left: auto;
        right: auto;
      }
      @media only screen and (min-width: 601px) {
        .row .col.m6 {
          width: 50%;
          margin-left: auto;
          left: auto;
          right: auto
        }
        .row .col.m12 {
          width: 100%;
          margin-left: auto;
          left: auto;
          right: auto
        }
        .row .col.offset-m3 {
          margin-left: 25%
        }
      }
      html {
        line-height: 1.5;
        font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen-Sans,Ubuntu,Cantarell,"Helvetica Neue",sans-serif;
        font-weight: normal;
        color: rgba(0,0,0,0.87)
      }
      @media only screen and (min-width: 0) {
        html {
          font-size:14px
        }
      }
      @media only screen and (min-width: 992px) {
        html {
          font-size:14.5px
        }
      }
      @media only screen and (min-width: 1200px) {
        html {
          font-size:15px
        }
      }
      .card {
        position: relative;
        margin: .5rem 0 1rem 0;
        background-color: #fff;
        -webkit-transition: -webkit-box-shadow .25s;
        transition: -webkit-box-shadow .25s;
        transition: box-shadow .25s;
        transition: box-shadow .25s, -webkit-box-shadow .25s;
        border-radius: 5%
      }
      .card .card-content {
        padding: 24px 24px 8px 24px;
        border-radius: 0 0 2px 2px
      }
      .card .card-content p {
        margin: 0
      }
      .card .card-action {
        background-color: inherit;
        border-top: 1px solid rgba(160,160,160,0.2);
        position: relative;
        padding: 15px 5px
      }
      .card .card-action:last-child {
        border-radius: 0 0 2px 2px
      }
      .btn,.btn-large,.btn-small,.btn-flat {
        border: none;
        border-radius: 2px;
        display: inline-block;
        height: 36px;
        line-height: 36px;
        padding: 0 16px;
        text-transform: uppercase;
        vertical-align: middle;
        -webkit-tap-highlight-color: transparent
      }
      .btn.disabled,.disabled.btn-large,.disabled.btn-small,.btn-floating.disabled,.btn-large.disabled,.btn-small.disabled,.btn-flat.disabled,.btn:disabled,.btn-large:disabled,.btn-small:disabled,.btn-floating:disabled,.btn-large:disabled,.btn-small:disabled,.btn-flat:disabled,.btn[disabled],.btn-large[disabled],.btn-small[disabled],.btn-floating[disabled],.btn-large[disabled],.btn-small[disabled],.btn-flat[disabled] {
        pointer-events: none;
        background-color: #DFDFDF !important;
        -webkit-box-shadow: none;
        box-shadow: none;
        color: #9F9F9F !important;
        cursor: default
      }
      .btn,.btn-large,.btn-small,.btn-floating,.btn-large,.btn-small,.btn-flat {
        font-size: 14px;
        outline: 0
      }
      .btn,.btn-large,.btn-small {
        text-decoration: none;
        color: #fff;
        background-color: #ff0000;
        text-align: center;
        letter-spacing: .5px;
        -webkit-transition: background-color .2s ease-out;
        transition: background-color .2s ease-out;
        cursor: pointer
      }
      .btn-large {
        height: 54px;
        line-height: 54px;
        font-size: 15px;
        padding: 0 28px
      }
      .waves-effect {
        position: relative;
        cursor: pointer;
        display: inline-block;
        overflow: hidden;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        -webkit-tap-highlight-color: transparent;
        vertical-align: middle;
        z-index: 1;
        -webkit-transition: .3s ease-out;
        transition: .3s ease-out
      }
      label {
        font-size: .8rem;
        color: #0a0a0a
      }
      input:not([type]),input[type=text]:not(.browser-default),input[type=password]:not(.browser-default),input[type=email]:not(.browser-default),input[type=url]:not(.browser-default),input[type=time]:not(.browser-default),input[type=date]:not(.browser-default),input[type=datetime]:not(.browser-default),input[type=datetime-local]:not(.browser-default),input[type=tel]:not(.browser-default),input[type=number]:not(.browser-default),input[type=search]:not(.browser-default),textarea.materialize-textarea {
        background-color: transparent;
        border: none;
        border-bottom: 1px solid #9e9e9e;
        border-radius: 0;
        outline: none;
        height: 3rem;
        width: 100%;
        font-size: 16px;
        margin: 0 0 8px 0;
        padding: 0;
        -webkit-box-shadow: none;
        box-shadow: none;
        -webkit-box-sizing: content-box;
        box-sizing: content-box;
        -webkit-transition: border .3s, -webkit-box-shadow .3s;
        transition: border .3s, -webkit-box-shadow .3s;
        transition: box-shadow .3s, border .3s;
        transition: box-shadow .3s, border .3s, -webkit-box-shadow .3s
      }
      input:not([type])+label:after,input[type=text]:not(.browser-default)+label:after,input[type=password]:not(.browser-default)+label:after,input[type=email]:not(.browser-default)+label:after,input[type=url]:not(.browser-default)+label:after,input[type=time]:not(.browser-default)+label:after,input[type=date]:not(.browser-default)+label:after,input[type=datetime]:not(.browser-default)+label:after,input[type=datetime-local]:not(.browser-default)+label:after,input[type=tel]:not(.browser-default)+label:after,input[type=number]:not(.browser-default)+label:after,input[type=search]:not(.browser-default)+label:after,textarea.materialize-textarea+label:after,.select-wrapper+label:after {
        display: block;
        content: "";
        position: absolute;
        top: 100%;
        left: 0;
        opacity: 0;
        -webkit-transition: .2s opacity ease-out, .2s color ease-out;
        transition: .2s opacity ease-out, .2s color ease-out
      }
      .input-field {
        position: relative;
        margin-top: 1rem;
        margin-bottom: 1rem
      }
      .input-field.col label {
        left: .75rem
      }
      .input-field>label {
        color: #0a0a0a;
        position: absolute;
        top: 0;
        left: 0;
        font-size: 1rem;
        cursor: text;
        -webkit-transition: color .2s ease-out, -webkit-transform .2s ease-out;
        transition: color .2s ease-out, -webkit-transform .2s ease-out;
        transition: transform .2s ease-out, color .2s ease-out;
        transition: transform .2s ease-out, color .2s ease-out, -webkit-transform .2s ease-out;
        -webkit-transform-origin: 0% 100%;
        transform-origin: 0% 100%;
        text-align: initial;
        -webkit-transform: translateY(12px);
        transform: translateY(12px)
      }
      .input-field>label:not(.label-icon).active {
        -webkit-transform: translateY(-14px) scale(0.8);
        transform: translateY(-14px) scale(0.8);
        -webkit-transform-origin: 0 0;
        transform-origin: 0 0
      }
      [type="checkbox"]:not(:checked),[type="checkbox"]:checked {
        position: absolute;
        opacity: 0;
        pointer-events: none
      }
      [type="checkbox"]+span:not(.lever) {
        position: relative;
        padding-left: 35px;
        cursor: pointer;
        display: inline-block;
        height: 25px;
        line-height: 25px;
        font-size: 1rem;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none
      }
      [type="checkbox"]+span:not(.lever):before,[type="checkbox"]:not(.filled-in)+span:not(.lever):after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 18px;
        height: 18px;
        z-index: 0;
        border: 2px solid #5a5a5a;
        border-radius: 1px;
        margin-top: 3px;
        -webkit-transition: .2s;
        transition: .2s
      }
      [type="checkbox"]:not(.filled-in)+span:not(.lever):after {
        border: 0;
        -webkit-transform: scale(0);
        transform: scale(0)
      }
      [type="checkbox"].filled-in+span:not(.lever):after {
        border-radius: 2px
      }
      [type="checkbox"].filled-in+span:not(.lever):before,[type="checkbox"].filled-in+span:not(.lever):after {
        content: '';
        left: 0;
        position: absolute;
        -webkit-transition: border .25s, background-color .25s, width .20s .1s, height .20s .1s, top .20s .1s, left .20s .1s;
        transition: border .25s, background-color .25s, width .20s .1s, height .20s .1s, top .20s .1s, left .20s .1s;
        z-index: 1
      }
      [type="checkbox"].filled-in:not(:checked)+span:not(.lever):before {
        width: 0;
        height: 0;
        border: 3px solid transparent;
        left: 6px;
        top: 10px;
        -webkit-transform: rotateZ(37deg);
        transform: rotateZ(37deg);
        -webkit-transform-origin: 100% 100%;
        transform-origin: 100% 100%
      }
      [type="checkbox"].filled-in:not(:checked)+span:not(.lever):after {
        height: 20px;
        width: 20px;
        background-color: transparent;
        border: 2px solid #5a5a5a;
        top: 0px;
        z-index: 0
      }
      [type="checkbox"].filled-in:checked+span:not(.lever):before {
        top: 0;
        left: 1px;
        width: 8px;
        height: 13px;
        border-top: 2px solid transparent;
        border-left: 2px solid transparent;
        border-right: 2px solid #fff;
        border-bottom: 2px solid #fff;
        -webkit-transform: rotateZ(37deg);
        transform: rotateZ(37deg);
        -webkit-transform-origin: 100% 100%;
        transform-origin: 100% 100%
      }
      [type="checkbox"].filled-in:checked+span:not(.lever):after {
        top: 0;
        width: 20px;
        height: 20px;
        border: 2px solid #ff0000;
        background-color: #ff0000;
        z-index: 0
      }
      [type="checkbox"]:checked+span:not(.lever):before {
        top: -4px;
        left: -5px;
        width: 12px;
        height: 22px;
        border-top: 2px solid transparent;
        border-left: 2px solid transparent;
        border-right: 2px solid #ff0000;
        border-bottom: 2px solid #ff0000;
        -webkit-transform: rotate(40deg);
        transform: rotate(40deg);
        -webkit-backface-visibility: hidden;
        backface-visibility: hidden;
        -webkit-transform-origin: 100% 100%;
        transform-origin: 100% 100%
      }
      .range-field {
        position: relative
      }
      input[type=range],input[type=range]+.thumb {
        cursor: pointer
      }
      input[type=range] {
        position: relative;
        background-color: transparent;
        border: none;
        outline: none;
        width: 100%;
        margin: 15px 0;
        padding: 0
      }
      input[type=range]:focus {
        outline: none
      }
      input[type=range]+.thumb {
        position: absolute;
        top: 10px;
        left: 0;
        border: none;
        height: 0;
        width: 0;
        border-radius: 50%;
        background-color: #ff0000;
        margin-left: 7px;
        -webkit-transform-origin: 50% 50%;
        transform-origin: 50% 50%;
        -webkit-transform: rotate(-45deg);
        transform: rotate(-45deg)
      }
      input[type=range]+.thumb .value {
        display: block;
        width: 30px;
        text-align: center;
        color: #ff0000;
        font-size: 0;
        -webkit-transform: rotate(45deg);
        transform: rotate(45deg)
      }
      input[type=range]+.thumb.active {
        border-radius: 50% 50% 50% 0
      }
      input[type=range]+.thumb.active .value {
        color: #fff;
        margin-left: -1px;
        margin-top: 8px;
        font-size: 10px
      }
      input[type=range] {
        -webkit-appearance: none
      }
      input[type=range]::-webkit-slider-runnable-track {
        height: 3px;
        background: #c2c0c2;
        border: none
      }
      input[type=range]::-webkit-slider-thumb {
        border: none;
        height: 14px;
        width: 14px;
        border-radius: 50%;
        background: #ff0000;
        -webkit-transition: -webkit-box-shadow .3s;
        transition: -webkit-box-shadow .3s;
        transition: box-shadow .3s;
        transition: box-shadow .3s, -webkit-box-shadow .3s;
        -webkit-appearance: none;
        background-color: #ff0000;
        -webkit-transform-origin: 50% 50%;
        transform-origin: 50% 50%;
        margin: -5px 0 0 0
      }
      input[type=range] {
        border: 1px solid white;
      }
      .z-depth-1,nav,.card-panel,.card,.toast,.btn,.btn-large,.btn-small,.btn-floating,.dropdown-content,.collapsible,.sidenav {
        -webkit-box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14),0 3px 1px -2px rgba(0,0,0,0.12),0 1px 5px 0 rgba(0,0,0,0.2);
        box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14),0 3px 1px -2px rgba(0,0,0,0.12),0 1px 5px 0 rgba(0,0,0,0.2)
      }

    </style>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col s12 m6 offset-m3">
          <form autocomplete="off" method="post" role="form" action="<?php $_SERVER['PHP_SELF']; ?>">
            <div class="card">
              <div class="card-content">
                <div class="row">
                  <div class="input-field col s12">
                    <input type="text" name="contraseña" id="contraseña" value="<?php echo (isset($_POST['generar'])) ? $password : ''; ?>" readonly>
                    <label for="contraseña">Contraseña generada</label>
                  </div>
                  <div class="col s12 m6">
                    <div class="input-field col s6 m12">
                      <input type="number" id="longitudMaxima" name="longitudMaxima" min="0" max="30" value="0" oninput="this.form.rangoMaximo.value=this.value">
                      <label for="longitudMaxima">Longitud</label>
                    </div><br>
                    <p class="range-field col s6 m12">
                      <label>
                        <input type="range" name="rangoMaximo" min="0" max="30" value="0" oninput="this.form.longitudMaxima.value=this.value">
                      </label>
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
                </div>
                <div class="card-action">
                  <button type="submit" name="generar" id="generar" disabled class="btn btn-large waves-effect waves-light">Generar</button>
                </div>
              </div>
            </div>
          </form>
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
