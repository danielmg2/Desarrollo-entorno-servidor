<?

    function get(){
        $ch = curl_init();
        $url = 'http://192.168.2.205/ServidorClase/Terma7/api/conciertos.php';
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        $resultado = curl_exec($ch);
        curl_close($ch);
        return $resultado;
    }


    function post($grupo,$fecha,$precio,$lugar){
        $json = '{
            "grupo": "'.$grupo.'",
            "fecha": "'.$fecha.'",
            "precio": "'.$precio.'",
            "lugar": "'.$lugar.'"

        }';
        $ch = curl_init();
        $url = 'http://192.168.2.205/ServidorClase/Terma7/api/conciertos.php';
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_HTTPHEADER,
            array('Content-Type:application/json'));
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch,CURLOPT_POST,1);
        curl_exec($ch);
        curl_close($ch);
        
    }



    function put($grupo,$fecha,$precio,$lugar){
        $json = '{
            "grupo": "'.$grupo.'",
            "fecha": "'.$fecha.'",
            "precio": "'.$precio.'",
            "lugar": "'.$lugar.'"
        }';
        $ch = curl_init();
        $url = 'http://192.168.2.205/ServidorClase/Terma7/api/conciertos.php/conciertos/';
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_HTTPHEADER,
            array('Content-Type:application/json'));
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch,CURLOPT_POST,1);
        curl_exec($ch);
        curl_close($ch);
        
    }



    function delete($id){
        $url='http://192.168.2.205/ServidorClase/Terma7/api/conciertos.php/conciertos/'.$id;
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        curl_exec($ch);
        curl_close($ch);
        return 1;
    }

?>