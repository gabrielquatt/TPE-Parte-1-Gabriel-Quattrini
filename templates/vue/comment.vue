{literal}

<section id="comentario">        
        <!--insertar comentarios--> 
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
                    <h4>calificacion</h4>
                </th>
                <th colspan="1">
                    <h4> fecha </h4>
                </th>
               
            </tr>
        </thead>

        <tbody v-if="loading">
            <tr>
                <td>(Vacio)</td>    
                <td>(Vacio)</td>
                <td>(Vacio)</td> 
                <td>(Vacio)</td>    
           </tr>
        </tbody>

        <tbody v-if="!loading">
            <tr v-for="data in comments">
                <td  >{{ data.user }}</td>    
                <td  >{{ data.comentario }}</td>
                <td  >{{ data.calificacion }}</td>
                <td  >{{ data.fecha }}</td>
                <td  v-bind:class="[btn_delete]" v-if="!loading"><input id="eliminar" class="btn2" value="ELIMINAR" type="submit" v-on:click='deletee(data.id)'><td>    
           </tr>
        </tbody>
  
    </table>
</section>

{/literal}
