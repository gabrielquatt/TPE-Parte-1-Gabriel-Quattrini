{literal}

<section id="comentario">        
        <!--insertar comentarios--> 
        <div v-bind:class="[btn_delete]" class="fond-text" v-if="!loading">
                 <h1>ordernar comentario por:</h1>
                 <p>fecha:</p>
                 <label> primer dia al ultimo<label> 
                 <button class="btn2" class="btn2" v-on:click='dateOrderASC()'>order</button>
                  <label>desde ultimo al primer dia<label> 
               <button class="btn2"  v-on:click='dateOrderDESC()'>order</button>
               <br>
               <br>
               <p>calificacion:</p>
                  <label> de menor a mayor (comentarios sin voto primero) <label> 
                <button class="btn2"  v-on:click='qualificationOrderASC()'>order</button>
                  <label> mayor a menor<label> 
                <button class="btn2"  v-on:click='qualificationOrderDESC()'>order</button>
        </div>
    <table>
        <thead>
            <tr>
                <th colspan="1">
                    <h4>usuario</h4>
                </th>
                 <th colspan="1">
                    <h4>comentario</h4>
                </th>
                  <th colspan="1">
                    <h4>voto</h4>
                </th>
                <th colspan="1">
                    <h4>año/mes/dia </h4>
                </th> 
            </tr>
        </thead>

        <tbody v-if="loading">
            <tr>
               <td>vacio</td> 
               <td>no se agrego ningun comentario ni puntuacion al juego</td>
                <td>-</td>
                <td>--/--/--</td> 
           </tr>
        </tbody>

        <tbody v-if="!loading">
          
            <tr v-for="data in comments">
                <td  >{{ data.user }}</td>    
                <td  >{{ data.comentario }}</td>
                <td  >{{ data.calificacion }}</td>
                <td  >{{ data.fecha }}</td>
                <td  v-bind:class="[btn_delete]"><input id="eliminar" class="btn2" value="ELIMINAR" type="submit" v-on:click='Delete(data.id)'><td>    
           </tr>
        </tbody>
  
    </table>
</section>

{/literal}
