<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get("/signup", function () {
    return view("signup");
});

Route::get("/login", function () {
    return view("login");
});

Route::get("/about", function () {
    return view("about");
});

Route::get("/contact", function () {
    return view("contact");
});

Route::get("/product_edits", function () {
    return view("product_edits");
});
