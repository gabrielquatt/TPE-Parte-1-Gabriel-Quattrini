<!DOCTYPE html>
<html lang="en">
<head>
    <base href="{$url}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>{$title}</title>
</head>
    <body> 
        <header>
           <img src="img/logo.png">
           {if {$activeSearch}==0}
            {include 'templates/serch.tpl'}
           {/if}
        </header>




  