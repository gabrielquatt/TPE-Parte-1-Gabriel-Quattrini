{literal}

<section class="fond-text" id="addComment"> 
      <h4>comentar y calificar </h4>
     <p class="clasificacion">
     <p>{{ star }}</p>
    <input  class="stars" id="radio1" type="radio" v-on:click="one_stars" >
    <label class="stars" for="radio1">★</label>
    <input  class="stars" id="radio2" type="radio" v-on:click="two_stars">
    <label  class="stars" for="radio2">★</label>
    <input class="stars" id="radio3" type="radio" v-on:click="three_stars">
    <label  class="stars" for="radio3">★</label>
    <input class="stars" id="radio4" type="radio" v-on:click="four_stars">
    <label  class="stars" for="radio4">★</label>
    <input class="stars" id="radio5" type="radio" v-on:click="five_stars">
    <label  class="stars" for="radio5">★</label>
  </p>
      <input class="comment" type="text" ref="comment" placeholder="comentario">
   <br>
      <button class="btn2" @click="save">GUARDAR COMENTARIO</button>
</section>
 
{/literal}
