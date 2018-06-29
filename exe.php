<?php

$rede = $_GET['rede'];
$mask = $_GET['mask'];

        $quantredes = pow(2,$mask-24);
        $host = 256/$quantredes;
        $rede = floor($rede/$host) ;
        $iprede = $rede*$host;
        $broadcast = ($iprede+$host)-1;
        $privalido = $iprede+1;
        $ultvalido = $broadcast-1;

$data = array(
    'host'=>$host,
    'enderecos'=>$host-2,
    'quant_redes'=>$quantredes,
    'iprede'=>$iprede,
    'broadcast'=>$broadcast,
    'primeiro_valido'=>$privalido,
    'ultimo_valido'=>$ultvalido);

header('Content-type: application/json');
echo json_encode($data);

