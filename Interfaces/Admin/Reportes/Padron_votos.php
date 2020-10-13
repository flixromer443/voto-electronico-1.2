<?php
    if(!isset($_GET['reportar'])){
        echo "<div style='border-style:solid; margin:30px 70px 30px 70px;20px;text-align:center'>
                <svg  style='color:red;'width='6em' height='6em' viewBox='0 0 16 16' class='bi bi-person-x-fill' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
                    <path fill-rule='evenodd' d='M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6.146-2.854a.5.5 0 0 1 .708 0L14 6.293l1.146-1.147a.5.5 0 0 1 .708.708L14.707 7l1.147 1.146a.5.5 0 0 1-.708.708L14 7.707l-1.146 1.147a.5.5 0 0 1-.708-.708L13.293 7l-1.147-1.146a.5.5 0 0 1 0-.708z'/>
                </svg><br>
                <h1 style='color:red'>Acceso denegado</h1>
              </div>
              <script>
              alert('No nos agrandan los hackers');
              </script>";
        exit;
    }
    date_default_timezone_set("America/Argentina/Buenos_Aires");
    $fecha=date("d-m-y");
    $hora=date("h:m a");
    $ruta1 = "../../../Archivos/Padrones/Padron.csv";
    $ruta2 = "../../../Archivos/Padrones/Registro.csv";   
    

    require("../../../Librerias/fpdf182/fpdf.php");
    $pdf = new FPDF('P','mm','A4');
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',15);
    $pdf->SetXY(25,5);
    $pdf->Cell(32,10,'Fecha: '.$fecha,0,1,'C');
    $pdf->SetFont('Arial','B',15);
    $pdf->SetXY(25,15);
    $pdf->Cell(32,10,'Hora: '.$hora,0,1,'C');
    $pdf->SetXY(10,45);
    $pdf->Cell(160,10,'Padron de votos',1,1,'C');
    $pdf->SetFont('Arial','B',16);
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(10,10,'Id',1,0,'C');
    $pdf->Cell(50,10,'Num doc',1,0,'C');
    $pdf->Cell(50,10,'Fecha',1,0,'C');
    $pdf->Cell(50,10,'Hora',1,1,'C');
    $archivo=fopen($ruta2,'r');
    $archivo=fopen($ruta2,"r");
    while(!feof($archivo)){

        $linea=fgets($archivo);
        $datos=explode("|",$linea);
        if(strlen($linea)>0){
            $pdf->Cell(10,10,trim($datos[0]),1,0,'C');
            $pdf->Cell(50,10,trim($datos[1]),1,0,'C');
            $pdf->Cell(50,10,trim($datos[3]),1,0,'C');
            $pdf->Cell(50,10,trim($datos[4]),1,1,'C');
            
        }
    }
    fclose($archivo);
    $pdf->Output();
  

?>
 