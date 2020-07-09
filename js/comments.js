"use strict";

let user = document.querySelector("#data_user").getAttribute("data-user");
let id = document.querySelector("#data_user").getAttribute("data-game");

let order = "DESC";
let data = "fecha";


/**--------------------------------------- Definido la apps Vue ---------------------------------------*/
let tableCommentComponent = new Vue({
  //Vue para mostrar comentarios y mostrarlos en una tabla
  el: "#comentario",
  data: {
    btn_delete: "oculto",
    loading: true,
    comments: [],
  },
  methods: {
    Delete: function (id_comment) {
      eliminar(id_comment, id);
    },
    dateOrderASC() {
      order = "ASC";
      data="fecha";
      load(id,data,order);
    },
    dateOrderDESC() {
      order = "DESC";
      data="fecha";
      load(id,data,order);
    },
    qualificationOrderASC() {
      order = "ASC";
      data="calificacion";
      load(id,data,order);
    },
    qualificationOrderDESC() {
      order = "DESC";
      data="calificacion";
      load(id,data,order);
    },
  },
});

if (user) {
  //si un usuario esta loggueado se mostrara la opcion de añadir comentario
  let addComment = new Vue({
    //Vue para añadir nuevo comentario
    el: "#addComment",
    data: {
      star: "sin calificar",
      connected_user: false,
      form: {
        calificacion: null,
        comentario: "",
      },
    },
    methods: {
      // metodos para cambiar el valor de la puntuacion
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
        //metodo qe guarda via api el comentario
        this.form.comentario = this.$refs["comment"].value;
        let comment = this.form.comentario;
        let score = this.form.calificacion;
        guardar(score, comment);
      },
    },
  });
} //---Fin de Verificacion de User---//

let assessment = new Vue({
  //Vue para mostrar el Rating de los ususarios segun calificaciones
  el: "#assessment",
  data: {
    users_rating: null,
  },
});

let totalPorcentaje = new Vue({
  //Vue para ver porcentage de votos por comentario
  el: "#divDat",
  data: {
    one: "0",
    two: "0",
    three: "0",
    four: "0",
    five: "0",
  },
});

/** --------------------------------------------------------- Fin Definiciones Vue ----------------------------------------------*/

 load(id);

function load(id,data,order) {
  // carga inicial de los commentarios
  tableCommentComponent.loading = true;
  fetch("api/game/" + id + "/comments/" + data + "/" + order)
    .then((response) => response.json())
    .then((allComments) => {
      if (allComments == null) {
        tableCommentComponent.loading = true;
      } else {
        // asigno los elementos que me devuelve la API
        if (user) {
          let admin = document
            .querySelector("#data_user")
            .getAttribute("data-admin");
          if (admin == 1) {
            tableCommentComponent.btn_delete = ""; //elimino oculto, clase que se le asigna al boton eliminar
          }
        }
        calculo(allComments);
        assessment.users_rating = getRating(allComments);
        tableCommentComponent.comments = allComments; // es como el $this->smarty->assign("comments", allComments);
        tableCommentComponent.loading = false;
      }
    });
}

function calculo(allComments) {
  let contador = 0;
  let one = 0;
  let two = 0;
  let three = 0;
  let four = 0;
  let five = 0;

  allComments.forEach((comment) => {
    if (comment.calificacion == 1) {
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
}

/**
 *  Obtener Rating de puntajes.
 */
function getRating(allComments) {
  let count = 0;
  let countTotal=0;
  for (let i = 0; i < allComments.length; i++) {
    if(allComments[i].calificacion!=null){
      count += parseInt(allComments[i].calificacion);
      countTotal++;
    };
  }

  countTotal=countTotal*5;
  let percent = parseFloat(count / countTotal*100);
  return percent.toFixed(0);
}
/**
 *  Obtener Porcentaje de puntajes por estrella.
 */
function porcentaje(total, num) {
  if (total == 0) {
    return 0.0;
  } else {
    let division = num / total;
    let resultado = division * 100;
    return resultado.toFixed(1); //para redondear
  }
}

//------------------------------------------- Funciones para Guardar y Eliminar comentario -------------------------------------------//

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
  fetch("api/add-comment", {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify(comment),
  })
    .then((respuesta) => {
      if (!respuesta.ok) {
        alert("ERROR Comentario no guardado");
      } else {
        alert("Comentario Guardado");
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
  fetch("api/delete-comment/" + idComment, {
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
