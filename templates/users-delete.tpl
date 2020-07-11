<div class="wraped">
    <ul>
        <h5>usuarios</h5>
        {foreach from=$users item=user}
            <li>
                <h5>user-name: "{$user->username}" email: "{$user->email}" </h5>
                {if {$user->priority}==1}
                    <label>is admin</label>
                {else if}
                    <label> not is admin</label>
                {/if}
                <button class="btn2">
                {$user->username}:
                    <a href="deleteUser/{$user->id}"> Delete user </a>
                </button>
                <br>
                <br>
            </li>
        {/foreach}
        <ul>
</div>