{literal}
<section  id="assessment">
    </br>
        <div v-if="!users_rating" >
            <p>no hay calificacion</p>
        </div>

        <div v-if="users_rating" >
            <div>
            <p>calificacion</p>
                <h1 class="porcentaje">{{users_rating}}%</h1>
            </div>
        </div>
</section>
{/literal}