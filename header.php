<!DOCTYPE html>
<html lang="en-IR">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0, minimum-scale=1.0">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Designex</title>
    <style>
        main.wrapper,header{
            opacity: 0;
        }
        #videoModal{
            display: none;
        }
    </style>
    <link href="<?php ThemeAssets('css/fonts.css');?>" rel="stylesheet" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <link href="<?php ThemeAssets('css/footer.css');?>" rel="stylesheet" type="text/css">
</head>
<div id="loading" class="paddingX">
    <div class="loading-logoContainer">
        <a href="./index.html" aria-label="logo" class="logo-img"><img src="<?php ThemeAssets('img/logo.svg');?>" alt="logo"></a>
        <img src="<?php ThemeAssets('img/logo-text.webp');?>" alt="logo" class="logo-text">
    </div>
    <div class="loading-lineContainer">
        <div class="line"></div>
    </div>
</div>
<body data-pagetype="<?php if (is_front_page()): echo 'home'; elseif (is_singular('projects')): echo 'singleProject';endif;?>">
<header>
    <a href="index.html" class="identity">
        <img src="<?php ThemeAssets('img/logo.svg');?>" alt="">
    </a>
    <div id="menu-container">
        <nav>
            <ul class="angle">
                <li><a href="./about.html">about us</a></li>
                <li><a href="./archive-publications.html">publication</a></li>
                <li><a href="./contact.html">Start a Project?</a></li>
            </ul>
            <ul class="angle">
                <li><a href="./archive-projects.html">Projects</a></li>
                <li><a href="./archive-blog.html">blog</a></li>
                <li><a href="./contact.html">Contact us</a></li>
            </ul>
            <ul class="angle">
                <li><a href="./services.html">Services</a></li>
                <li><a href="./archive-news.html">News</a></li>
                <li><a href="./archive-jobs.html">jop position</a></li>
            </ul>
        </nav>
        <div class="menu-items angle">
            <p><span id="timeZone"></span> [UAE]</p>
            <p>N 25° 11' 31.726''</p>
            <p>N 25° 11' 31.726''</p>
        </div>
    </div>
</header>