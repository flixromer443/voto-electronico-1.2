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
    $ruta2 = "../../../Archivos/Listas/Listado.csv";   
    

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
    $pdf->SetFont('Arial','B',16);
    $pdf->SetFont('Arial','B',12);
   
    $pdf->SetFont('Arial','B',10);
    $archivo=fopen($ruta2,"r");
    while(!feof($archivo)){

        $linea=fgets($archivo);
        $datos=explode("|",$linea);
        if(strlen($linea)>0){
            $pdf->Cell(160,10,'Lista '.$datos[0].' - '.$datos[1],1,1,'C');
            $pdf->SetFillColor(20,50,100);
            $pdf->SetTextColor(255,255,255);
            $pdf->Cell(40,10,'Presidente',1,0,'C',1);
            $pdf->Cell(20,10,'Num doc',1,0,'C',1);
            $pdf->Cell(10,10,'Tipo',1,0,'C',1);
            $pdf->Cell(10,10,'Sexo',1,0,'C',1);
            $pdf->Cell(40,10,'Vicepresidente',1,0,'C',1);
            $pdf->Cell(20,10,'Num doc',1,0,'C',1);
            $pdf->Cell(10,10,'Tipo',1,0,'C',1);
            $pdf->Cell(10,10,'Sexo',1,1,'C',1);
            $pdf->SetTextColor(0,0,0);
            $pdf->Cell(40,10,trim($datos[2]),1,0,'C');
            $pdf->Cell(20,10,trim($datos[3]),1,0,'C');
            $pdf->Cell(10,10,trim($datos[4]),1,0,'C');
            $pdf->Cell(10,10,trim($datos[5]),1,0,'C');
            $pdf->Cell(40,10,trim($datos[6]),1,0,'C');
            $pdf->Cell(20,10,trim($datos[7]),1,0,'C');
            $pdf->Cell(10,10,trim($datos[8]),1,0,'C');
            $pdf->Cell(10,10,trim($datos[9]),1,1,'C');
            $pdf->SetFillColor(20,50,100);
            $pdf->SetTextColor(255,255,255);
            $pdf->Cell(40,10,'Secretario',1,0,'C',1);
            $pdf->Cell(20,10,'Num doc',1,0,'C',1);
            $pdf->Cell(10,10,'Tipo',1,0,'C',1);
            $pdf->Cell(10,10,'Sexo',1,0,'C',1);
            $pdf->Cell(40,10,'Vocal',1,0,'C',1);
            $pdf->Cell(20,10,'Num doc',1,0,'C',1);
            $pdf->Cell(10,10,'Tipo',1,0,'C',1);
            $pdf->Cell(10,10,'Sexo',1,1,'C',1);
            $pdf->SetTextColor(0,0,0);
            $pdf->Cell(40,10,trim($datos[10]),1,0,'C');
            $pdf->Cell(20,10,trim($datos[11]),1,0,'C');
            $pdf->Cell(10,10,trim($datos[12]),1,0,'C');
            $pdf->Cell(10,10,trim($datos[13]),1,0,'C');
            $pdf->Cell(40,10,trim($datos[14]),1,0,'C');
            $pdf->Cell(20,10,trim($datos[15]),1,0,'C');
            $pdf->Cell(10,10,trim($datos[16]),1,0,'C');
            $pdf->Cell(10,10,trim($datos[17]),1,1,'C');
            $pdf->Ln(15);
        }
    }
    fclose($archivo);
    $pdf->Output();
  

?>
 