<?php
$url = "https://script.google.com/macros/s/AKfycbzpi1pTioNE7atfbP8DXzRtbRK5oWuJ3dBszqHY9BdI-NRrT7MjRtKUpfDl1PA1hBG4/exec";

$ch = curl_init($url);

curl_setopt_array($ch, [
    CURLOPT_FOLLOWLOCATION => 1, //設置這個選項為一個非零值(象 'Location: ')的頭，服務器會把它當做HTTP頭的一部分發送(注意這是遞歸的，PHP將發送形如 'Location: '的頭)。
    CURLOPT_POSTFIELDS => http_build_query([
        "source_lang" => "en",
        "target_lang" => "zh-TW",
        "text" => $_POST['input'],
    ])
]);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); //CURLOPT_RETURNTRANSFER 設為 true，curl 就只會將結果傳回，不會輸出在畫面上。

$result = curl_exec($ch);
echo json_encode($result, JSON_UNESCAPED_UNICODE); // JSON_UNESCAPED_UNICODE 不要使用unicode
curl_close($ch); //關閉指定的 cURL session，並釋放所有資源。
