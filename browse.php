<?php

// api yang didaftarkan di aplikasi
function registeredApi(): array{
    return ["abcd", "wxyx", "klmn"];
}
// cek input api key
function isInputValid($inputs){
    $apiKey = $inputs['api_key']; //request parameter
    if(in_array($apiKey, registeredApi())){
        return true;
    }else{
        return false;
    }
}
// json output
function jsonOutput($status, $message, $data){
    $response =  ['status'=>$status, 'message' => $message, 'data' => $data];
    header("Content-type: application/json");
    echo json_encode($response);
}

// dummy data
function getNews(){
    $news = [
        ["title" => "api key", "content" => "API_KEY", "writer" => "Ahmad"],
        ["title" => "oauth", "content" => "OAUTH 2.1", "writer" => "Ihsan"],
        ["title" => "Basic Auth", "content" => "BASIC AUTH", "writer" => "Hanif"]
    ];
    return $news;
}

//cek input
if(isInputValid($_GET)){
   jsonOutput("success", "successfully get news data", getNews());
}else{
    jsonOutput("fail", "invalid get data", null);
}