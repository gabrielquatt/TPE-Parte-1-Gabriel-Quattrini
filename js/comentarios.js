"use strict";

let admin = document.getElementById("permiso").value;
let id = document.getElementById("gameid").value;
let user = document.getElementById("user").value;

// definido la apps Vue

if(user){

let formComment = new Vue({
  el: "#addComment",
  data: {
    star: " su calificacion es 0",
    connected_user: false,
    form: {
      calificacion: 0,
      comentario: "",
    },
  },
  methods: {
    five_stars() {
      this.form.calificacion = 5;
      this.star = "su calificacion es de 5 estrellas";
    },
    four_stars() {
      this.form.calificacion = 4;
      this.star = "su calificacion es de 4 estrellas";
    },
    three_stars() {
      this.form.calificacion = 3;
      this.star = "su calificacion es de 3 estrellas";
    },
    two_stars() {
      this.form.calificacion = 2;
      this.star = "su calificacion es de 2 estrellas";
    },
    one_stars() {
      this.form.calificacion = 1;
      this.star = "su calificacion es de 1 estrellas";
    },
    save() {
      alert("Comentario Guardado");
      this.form.comentario = this.$refs["comment"].value;
      let comment = this.form.comentario;
      let score = this.form.calificacion;
      guardar(score, comment);
    },
  },
});
};

let tableCommentComponent = new Vue({
  //Vue para mostrar comentarios
  el: "#comentario",
  data: {
    btn_delete: "oculto",
    loading: true,
    comments: [],
  },
  methods: {
    deletee: function (id_comment) {
      eliminar(id_comment, id);
    },
  },
});

let totalPorcentaje = new Vue({
  //Vue para ver porcentage de votos por comentario
  el: "#divDat",
  data: {
    cero: "0",
    one: "0",
    two: "0",
    three: "0",
    four: "0",
    five: "0",
  },
});

load(id);

function load(id) {
  // carga inicial de los commentarios
  tableCommentComponent.loading = true;
  fetch("api/comment/" + id)
    .then((response) => response.json())
    .then((allComments) => {
      // asigno los elementos que me devuelve la API
      if (allComments != "no existe ningun comentario") {
        calculo(allComments);
        if (admin == 1) {
          tableCommentComponent.btn_delete = ""; //elimino oculto, clase que se le asigna al boton eliminar
        }
        tableCommentComponent.comments = allComments; // es como el $this->smarty->assign("comments", allComments);
        tableCommentComponent.loading = false;
      } else {
        tableCommentComponent.loading = true;
        totalPorcentaje.two = 0;
        totalPorcentaje.one = 0;
        totalPorcentaje.three = 0;
        totalPorcentaje.four = 0;
        totalPorcentaje.five = 0;
        totalPorcentaje.cero = 0;
      }
    });
}

function calculo(allComments) {
  let contador = 0;
  let cero = 0;
  let one = 0;
  let two = 0;
  let three = 0;
  let four = 0;
  let five = 0;

  allComments.forEach((comment) => {
    if (comment.calificacion == 0) {
      cero++;
      contador++;
    } else if (comment.calificacion == 1) {
      one++;
      contador++;
    } else if (comment.calificacion == 2) {
      two++;
      contador++;
    } else if (comment.calificacion == 3) {
      three++;
      contador++;
    } else if (comment.calificacion == 4) {
      four++;
      contador++;
    } else if (comment.calificacion == 5) {
      five++;
      contador++;
    }
  });
  totalPorcentaje.one = porcentaje(contador, one);
  totalPorcentaje.two = porcentaje(contador, two);
  totalPorcentaje.three = porcentaje(contador, three);
  totalPorcentaje.four = porcentaje(contador, four);
  totalPorcentaje.five = porcentaje(contador, five);
  totalPorcentaje.cero = porcentaje(contador, cero);
}

/**
 *  guardar comentario
 */
function guardar(calificacion, comentario) {
  let fecha = new Date();
  let comment = {
    id_game: id,
    user: user,
    comentario: comentario,
    fecha: fecha,
    calificacion: calificacion,
  };

  fetch("api/comment", {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify(comment),
  })
    .then((respuesta) => {
      if (!respuesta.ok) {
        alert("no guardado");
      } else {
        load(id);
      }
    })
    .catch((error) => {
      console.log(error);
    });
}

/**
 *  eliminar comentario
 */

function eliminar(idComment, id) {
  fetch("api/comment/" + idComment, {
    method: "DELETE",
  })
    .then((respuesta) => {
      if (respuesta.ok) {
        alert("comentario eliminado");
        load(id);
      } else {
        alert("error al borrar comentario");
      }
    })
    .catch((error) => {
      console.log(error);
    });
}

function porcentaje(total, num) {
  let division = num / total;

  let resultado = division * 100;
  return resultado.toFixed(1); //para redondear
}
