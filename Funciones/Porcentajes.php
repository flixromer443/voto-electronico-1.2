<?php
    $ruta1="../Archivos/Resultados/Lista_A.csv";
    $ruta2="../Archivos/Resultados/Lista_B.csv";
    $ruta3="../Archivos/Resultados/Lista_C.csv";
    $ruta4="../Archivos/Resultados/Lista_D.csv";
    
    
   function lista_A(){
            $cont1=0;
            $ruta1="../../Archivos/Resultados/Lista_A.csv";    
            $archivo1=fopen($ruta1,'r') or die("errror");
            while($campos=fgetcsv($archivo1,999)){
                $cont1++;
            }
            $archivo=fopen("../../Archivos/Descargas/Estadisticas_A.txt","w")or die("error");
            fwrite($archivo,$cont1);
            return $cont1;
   }
   lista_A();



   function lista_B(){
            $cont1=0;
            $ruta1="../../Archivos/Resultados/Lista_B.csv";    
            $archivo1=fopen($ruta1,'r') or die("errror");
            while($campos=fgetcsv($archivo1,999)){
                $cont1++;
            }
            $archivo=fopen("../../Archivos/Descargas/Estadisticas_B.txt","w")or die("error");
            fwrite($archivo,$cont1);
            return $cont1;
    }
    lista_B();

    function lista_C(){
        $cont1=0;
        $ruta1="../../Archivos/Resultados/Lista_C.csv";    
        $archivo1=fopen($ruta1,'r') or die("errror");
        while($campos=fgetcsv($archivo1,999)){
            $cont1++;
        }
        $archivo=fopen("../../Archivos/Descargas/Estadisticas_C.txt","w")or die("error");
        fwrite($archivo,$cont1);
       return $cont1;
    }
   $res=lista_C();



    function lista_D(){
        $cont1=0;
        $ruta1="../../Archivos/Resultados/Lista_D.csv";    
        $archivo1=fopen($ruta1,'r') or die("errror");
        while($campos=fgetcsv($archivo1,999)){
            $cont1++;
        }
        $archivo=fopen("../../Archivos/Descargas/Estadisticas_D.txt","w")or die("error");
        fwrite($archivo,$cont1);
         return $cont1;
    }
    lista_D();





    // $archiv2=fopen($ruta2,'r') or die("errror");
   // $archivo3=fopen($ruta3,'r') or die("errror");
   // $archivo4=fopen($ruta4,'r') or die("errror");

?>