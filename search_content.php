<?php 
/*******************************************************
    Ritorna un JSON con i risultati dell'API selezionata
********************************************************/
require_once 'auth.php';

// Se la sessione è scaduta, esco
if (!checkAuth()) exit;

// Imposto l'header della risposta
header('Content-Type: application/json');

spotify();

function spotify() {
    $client_id ='b25127751b9344e29b9ed0004f887f9c';
    $client_secret = '293d6497d4854d57b2567da851aa0b3c';

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://accounts.spotify.com/api/token' );
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, 'grant_type=client_credentials'); 
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Basic '.base64_encode($client_id.':'.$client_secret))); 
    $token=json_decode(curl_exec($ch), true);
    curl_close($ch);    

    $query = urlencode($_GET["q"]);
    $url = 'https://api.spotify.com/v1/search?type=track&q='.$query;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer '.$token['access_token'])); 
    $res=curl_exec($ch);
    curl_close($ch);

    echo $res;
}
?>