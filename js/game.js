"use strict";
document.addEventListener("DOMContentLoaded", iniciar);

function iniciar() {
  document.querySelector("#select").addEventListener("change", (event) => {
    game_data(event);
    clase();
  });
  document
    .querySelector("#selectPortada")
    .addEventListener("change", (event2) => {
      game_img(event2);
    });
}

function clase() {
  let barra = document.getElementById("option");
  barra.classList.remove("view");
  barra.classList.add("oculto");
}

function game_data(event) {
  let id = event.target.value;

  fetch("api/game/" + id)
    .then((respuesta) => {
      if (respuesta.ok) return respuesta.text();
      else console.log("nada encontrado");
    })
    .then((game_info) => {
      let info = JSON.parse(game_info);
      let game = info[0];
      let name = document.querySelector("#title");
      let details = document.querySelector("#descripcion");
      name.value = game.name;
      details.value = game.detail;
    });
}
function game_img(event2) {
  let id = event2.target.value;
  fetch("api/game/" + id)
    .then((respuesta) => {
      if (respuesta.ok) return respuesta.text();
      else console.log("nada encontrado");
    })
    .then((game_info) => {
      let info = JSON.parse(game_info);
      let game = info[0];
      let div = document.getElementById("divImg");
      div.innerHTML = "";
      let img = document.createElement("img");
      img.setAttribute("src", game.image);
      img.setAttribute("width", "200");
      img.setAttribute("height", "300");
      console.log("imagen traida");
      div.appendChild(img);
      console.log(game.image);
    });
}

