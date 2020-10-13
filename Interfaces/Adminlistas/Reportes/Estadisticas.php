<?php
    if(!isset($_GET['reportar'])){
        echo "<div style='border-style:solid; margin:30px 70px 30px 70px;20px;text-align:center'>
                <svg  style='color:red;'width='6em' height='6em' viewBox='0 0 16 16' class='bi bi-person-x-fill' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
                    <path fill-rule='evenodd' d='M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6.146-2.854a.5.5 0 0 1 .708 0L14 6.293l1.146-1.147a.5.5 0 0 1 .708.708L14.707 7l1.147 1.146a.5.5 0 0 1-.708.708L14 7.707l-1.146 1.147a.5.5 0 0 1-.708-.708L13.293 7l-1.147-1.146a.5.5 0 0 1 0-.708z'/>
                </svg><br>
                <h1 style='color:red'>Acceso denegado</h1>
              </div>"
            ;
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
    $pdf->SetFont('Arial','B',20);
    $pdf->SetXY(10,60);
    $pdf->Cell(90,10,'Estadisticas',1,1,'C');
    $pdf->SetFont('Arial','B',14);
    $pdf->Cell(10,10,'id',1,0,'C');
    $pdf->Cell(50,10,'Nombre de la lista',1,0,'C');
    $pdf->Cell(30,10,'Cant. votos',1,1,'C');
    $pdf->SetFont('Arial','B',12);
    $pdf->SetXY(10,80);
    $archivo=fopen($ruta2,'r');
    while(!feof($archivo)){
        $linea=fgets($archivo);
        $datos=explode("|",$linea);
        $id=trim($datos[0]);
        if(strlen($linea)>0){
            $archivo2=fopen("../../../Archivos/Resultados/Lista$id.txt","r");
            while(!feof($archivo2)){
                $linea2=fgets($archivo2);
                $datos2=explode("|",$linea2);
                $pdf->Cell(10,10,$datos[0],1,0,'C');
                $pdf->Cell(50,10,$datos[1],1,0,'C');
                $pdf->Cell(30,10,$datos2[0],1,1,'C');
            break;
            }
            fclose($archivo2);
        }
    }
    fclose($archivo);
    $pdf->Output();
  

?>