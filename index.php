<?php
require("core/conn.php");

$arreglo = array("succes"=>false,"status"=>400,"data"=>"","message"=>"","cant"=>0)

if($_SERVER["REQUEST_METHOD"] === "GET"){
    if(isset($_GET["type"]) $$ $_GET["type"]!=""){
        $conexion = new conexion;
        $conn = $Conexion->conectar()
        $datos = $conn->query('SELECT * FROM empleado');
        $resultados = $datos->fetchAll();
        $cantidad = sizeof($resultados)

        switch($_GET["type"]){
            case "json":
                result_json($resultados);
            break;

            case "xml":
                result_xml($resultados);
            break;
            default:
                echo("POR FAVOR DEFINA EL FORMATO");
            break;
        }
    }else{
        //NO SE HA ENVIADO EL PARAMETRO ESPERADO
        $contenttype = "Content-Type: application/json"
        $arreglo = array("succes"=>false,"status"=>array("status_code"=>412, "status_text"=>"Precondition Failed"),"data"=>"",
        "message"=>"SE ESPERABA EL PARAMETRO 'type', CON EL TIPO DE RESULTADO ESPERADO","cant"=>0);
        
    }
}else{
    $contenttype = "Content-Type: application/json"
    $arreglo = array("succes"=>false,"status"=>array("status_code"=>405, "status_text"=>"Method Not Allowed"),"data"=>"",
        "message"=>"NO SE ACEPTA UN METODO DIFRENTE DE GET","cant"=>0);
}

header($contenttype);
header("HTTP/1.1 ".$arreglo["status"]["status_code"]." ".$arreglo["status"]["status_text"])
eco(json_encode($arreglo));

function result_json($resultados){
    $contenttype = "Content-Type: application/json"
    $arreglo = array(
    "succes"=>tur,
    "status"=>array(
        "status_code"=>200,
        "status_text"=>"OK"),
        "data"=>$resultados,
        "message"=>"",
        "cant"=>sizeof($resultados)
    ); 
    
    header($contenttype);
    header("HTTP/1.1 ".$arreglo["status"]["status_code"]." ".$arreglo["status"]["status_text"]);
    eco(json_encode($arreglo));
}


function result_xml(){
    $xml = SimpleXMLElement('<empleados/>');
    foreach($resultados as $i => $v){
        $subnodo = $xml->addChild("empleado");
        $a = array_flip($v);
        array_walk_recursive($a,array($subnodo, 'addChild'));
    }

    header($contenttype);
    echo($xml->asXML)
}

?>