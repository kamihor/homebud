{extends file="main.tpl"}


{block name=content}  
    
        <div class="container">
                    <header class="major">
                        <h2>Dane użytkownika</h2>
                    </header>
                </div>

    <div class="container">
        <section>
            <form action="{$conf->action_root}userSave" method="post">
                <fieldset>
                <div class="form">
                    <h4>Nazwa</h4>
                    <input type="text" name="username" id="username" value="{$form->username}" placeholder="Nazwa użytkownika" />
                    
                    <h4>Hasło</h4>
                    <input type="password"  name="password" id="password" value="{$form->password}" placeholder="Hasło" />
                    
                    <h4>Rola</h4>
                    <select name="role" id="role" value="{$form->role}">        
                    {foreach $roles as $r}
			<option >{$r}</option>
                         {/foreach}
                    </select>
                    <ul class="actions">
                        <li><input style="margin-top: 1em;" type="submit" value="Zapisz" class="primary" /></li>
                    </ul>
          
                </fieldset>
                <input type="hidden" name="id" value="{$form->id}">    
            </form>
                    {include file='messages.tpl'}
</div>

{/block}