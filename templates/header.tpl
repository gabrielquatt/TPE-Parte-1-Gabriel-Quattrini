<!DOCTYPE html>
<html lang="en">
    <head>
        <base href="{$url}">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/styless.css">

         <!-- development version, includes helpful console warnings -->
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>

        <title>{$title}</title>
    </head>
    <body>
        <header>
            <a href="home"><img src="img/logo.png"></a>
                {include 'templates/serch.tpl'}
        </header>