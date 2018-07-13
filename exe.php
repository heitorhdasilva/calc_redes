<?php

$rede = $_GET['rede'];
$mask = $_GET['mask'];
$prim = $_GET['prim'];
$segun = $_GET['segun'];

        $quantredes = pow(2,$mask-24);
        $host = 256/$quantredes;
        $rede = floor($rede/$host) ;
        $iprede = $rede*$host;
        $broadcast = ($iprede+$host)-1;
        $privalido = $iprede+1;
        $ultvalido = $broadcast-1;
        $maskdec = 256-$host;
        if ($prim >= 224 and $prim <= 239){
            $classe = 'D';
        }elseif ($prim <=  223 and $prim >= 192){
            $classe = 'C';
        }elseif ($prim <= 191 and $prim >= 128){
            $classe = 'B';
        }elseif ($prim <= 126 and $prim >=  1){
            $classe = 'A';
        }else{
            $classe = 'E';
        };
        if ($prim == 10 and $mask == 8){
            $ipval = 'privado';
        }elseif ($prim == 172 and $mask == 12 and $segun >= 16 and $segun <=31){
                $ipval = 'privado';
        }elseif ($prim == 192 and $segun == 168){
            $ipval = 'privado';
        }else{
            $ipval = 'publico';
        };

$data = array(
    'host'=>$host,
    'enderecos'=>$host-2,
    'quant_redes'=>$quantredes,
    'iprede'=>$iprede,
    'broadcast'=>$broadcast,
    'primeiro_valido'=>$privalido,
    'ultimo_valido'=>$ultvalido,
    'maskdec'=>$maskdec,
    'classe'=>$classe,
    'ipval'=>$ipval);

header('Content-type: application/json');
echo json_encode($data);

