"use strict"
document.addEventListener('DOMContentLoaded', iniciar);

function iniciar(){
    document.querySelector('#select').addEventListener('change', event => {
        game_data(event);
        clase();
    });    
}

function clase(){
    let barra = document.getElementById("option");
    barra.classList.remove("view");
    barra.classList.add("oculto");
}


function game_data(event) {
    console.log(event);
    let id = event.target.value;

    fetch('api/game/' + id).then((respuesta) => {
    console.log(id);
        if (respuesta.ok)
            return respuesta.text();
        else
            console.log("nada encontrado");
    }).then((game_info) => {
        let info = JSON.parse(game_info);
        console.log(game_info);
        let game = info[0];     
        let name = document.querySelector('#title');
        let details = document.querySelector('#descripcion'); 
        name.value = game.name;
        details.value = game.detail; 
    });
}
 