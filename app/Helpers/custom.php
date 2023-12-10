<?php

function storage($path): string
{
    return asset('storage/' . $path);
}
function image($path){
    return env('REMOTE_URL').$path;
}
function main($key){
    return config('main_pages.'. $key);
}
function setting($key){
    return config('settings.'.$key);
}
function authUser(){
    if (auth('business')->check()){
        return auth('business')->user();
    }
    elseif (auth('admin')->check()){
        return auth('admin')->user();
    }
    else{
        /*personel olarak değişecek*/
        return auth('admin')->user();
    }
}
function clearPhone($phoneNumber){
    // Özel karakterleri temizle
    $phoneNumber = preg_replace('/[^0-9]/', '', $phoneNumber);

    // Başındaki + işaretini ve ülke kodunu kontrol et
    if (substr($phoneNumber, 0, 1) == '+') {
        $phoneNumber = substr($phoneNumber, 1); // Başındaki + işaretini kaldır
    } elseif (substr($phoneNumber, 0, 2) == '00') {
        $phoneNumber = substr($phoneNumber, 2); // Başındaki 00'yi kaldır
    }
    $phoneNumber = str_replace(' ', '', $phoneNumber);
    // Başındaki sıfırları kaldır
    //$phoneNumber = ltrim($phoneNumber, '0');

    return $phoneNumber;
}