<?php
require_once 'auth.php';
if (!$userid = checkAuth()) exit;

$client_id = 'b25127751b9344e29b9ed0004f887f9c';
$client_secret = '293d6497d4854d57b2567da851aa0b3c';

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://accounts.spotify.com/api/token');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'grant_type=client_credentials');
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Authorization: Basic ' . base64_encode($client_id . ':' . $client_secret)
));
$res = curl_exec($ch);
curl_close($ch);

$data = json_decode($res, true);
$token = $data['access_token'];

function spotifyApiCall($url, $token) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $token));
    $res = curl_exec($ch);
    curl_close($ch);
    return json_decode($res, true);
}

$albums = spotifyApiCall('https://api.spotify.com/v1/browse/new-releases?country=IT&limit=6', $token);
$artists = spotifyApiCall('https://api.spotify.com/v1/search?q=genre%3Apop&type=artist&limit=6', $token);
$playlists = spotifyApiCall('https://api.spotify.com/v1/browse/categories/toplists/playlists?country=IT&limit=6', $token);

$result = array();

if (isset($albums['albums']['items'])) {
    foreach ($albums['albums']['items'] as $item) {
        $result['albums'][] = array(
            'title' => $item['name'],
            'artist' => $item['artists'][0]['name'],
            'image' => $item['images'][0]['url']
        );
    }
}

if (isset($artists['artists']['items'])) {
    foreach ($artists['artists']['items'] as $item) {
        $result['artists'][] = array(
            'title' => $item['name'],
            'artist' => 'Artista',
            'image' => isset($item['images'][0]['url']) ? $item['images'][0]['url'] : 'placeholder.jpg'
        );
    }
}

if (isset($playlists['playlists']['items'])) {
    foreach ($playlists['playlists']['items'] as $item) {
        $result['tracks'][] = array(
            'title' => $item['name'],
            'artist' => $item['owner']['display_name'],
            'image' => $item['images'][0]['url']
        );
    }
} else {
    $result['tracks'] = [];
}

header('Content-Type: application/json');
echo json_encode($result);
?>
