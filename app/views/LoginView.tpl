{extends file="main.tpl"}


 
{block name=content}
    <div id="main" class="container">
    <div class="row">
        <div class="col-6 col-12-xsmall">
            <h2>Budżet domowy</h2>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
             </div>
          <div class="col-6 col-12-xsmall">
             <section>
            <form action="{$conf->action_url}login" method="post">
                <fieldset>
                <div class="form">
                    <input type="text" name="login" id="id_login"  placeholder="Login" />
                    <input type="password"  name="pass" id="id_pass" placeholder="Hasło" />
                    <ul class="actions">
                        <li><input style="margin-top: 1em;" type="submit" value="Zaloguj" class="primary" /></li>
                    </ul>
                     {include file='messages.tpl'}
                </fieldset>
            </form>
             </div>
        
</div>
</div>
    
  

    {/block}