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