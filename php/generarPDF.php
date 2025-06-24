<?php
session_start();
include("./configBD.php");
include("./galardonadoBD.php");
include("./../libs/mpdfV8/vendor/autoload.php");

$curp =$_SESSION["curp"];

// $curp = $_SESSION["curp"];
// $sqlGetAlumno = "SELECT * FROM distinciones2 WHERE CURP = '$curp'";
// $resGetAlumno = mysqli_query($conexion, $sqlGetAlumno);
// $infGetAlumno = mysqli_fetch_row($resGetAlumno);

$estilos = "
  <style>
    img.responsive {width: 100%; max-width: 100%;}
    table {width: 100%;}
    p, h1, h2, h3 {text-align: center;}
  </style>
";

$header = "
  <table>
    <tr><td><img src='./../imgs/header2.jpg' class='responsive'></td></tr>
  </table>
";

$html = $estilos;
$html .= "
  <h1>Felicitaciones, $infGetGalardonado[1]</h1>
  <h2>Usted ha sido galardonado(a) con la presea $infGetGalardonado[3]</h2>
  <strong>Detalles Importantes del Evento:</strong>
  <ul>
      <li><strong>Fecha:</strong> 21 de noviembre de 2023</li>
      <li><strong>Hora de Inicio:</strong> 13:00 hrs (Se sugiere llegar a las 11:30 hrs)</li>
      <li><strong>Lugar:</strong> Auditorio  Alejo Peralta, Centro Cultural Jaime Torres Bodet (El Queso), Av. Luis Enrique Erro s/n, Unidad Profesional Zacatenco.</li>
  </ul>
  <strong>Algunas Recomendaciones:</strong>
            <ul>
                <li>Por favor, lleve consigo esta invitación, ya que será necesaria para su ingreso al evento.</li>
                <li>Le recomendamos llegar con suficiente antelación para facilitar el proceso de ingreso.</li>
                <li>Durante el evento, le pedimos seguir las indicaciones de nuestro personal para asegurar un desarrollo fluido y seguro de la ceremonia.</li>
            </ul>
        </div>

";

if ($infGetGalardonado[7] === "SI") {
  // Agregamos una segunda página para el invitado
  $html .= "<pagebreak/>";
  $html .= "<h1>Invitado</h1>";
  $html .= "<p>Es para nosotros un gran placer darle la bienvenida como acompañante en la ceremonia de entrega de distinciones del Instituto Politécnico Nacional. Su presencia contribuye a hacer de este evento un momento aún más especial y memorable.</p>
  
  <strong>Detalles Importantes del Evento:</strong>
  <ul>
      <li><strong>Fecha:</strong> 21 de noviembre de 2023</li>
      <li><strong>Hora de Inicio:</strong> 13:00 hrs (Se sugiere llegar a las 11:30 hrs)</li>
      <li><strong>Lugar:</strong> Auditorio  Alejo Peralta, Centro Cultural Jaime Torres Bodet (El Queso), Av. Luis Enrique Erro s/n, Unidad Profesional Zacatenco.</li>
  </ul>";

}

$pie = "
  <p>
    Distinciones al merito Politécnico<br>
    
  </p>
";

$mpdf = new \Mpdf\Mpdf([
  "mode" => "c",
  "orientation" => "P",
  "format" => "Letter",
  "default_font_size" => 12,
  "default_font" => "dejavusans",
  "margin_left" => 15,
  "margin_right" => 10,
  "margin_top" => 30,
  "margin_bottom" => 10,
  "margin_header" => 5,
  "margin_footer" => 5
]);

$mpdf->SetWatermarkText("IPN - 2024", 0.1);
$mpdf->showWatermarkText = true;

$mpdf->SetHTMLHeader($header);
$mpdf->WriteHTML($html);
$mpdf->SetHTMLFooter($pie);

$mpdf->output();

?>