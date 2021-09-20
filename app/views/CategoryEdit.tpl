{extends file="main.tpl"}



{block name=content}  
    
        <div class="container">
                    <header class="major">
                        <h2>Dane użytkownika</h2>
                    </header>
                </div>

    <div class="container">
        <section>
            <form action="{$conf->action_root}categorySave" method="post">
                <fieldset>
                <div class="form">
                    <h4>Nazwa</h4>
                    <input type="text" name="name" id="name" value="{$form->name}" placeholder="Nazwa" />
                    
                    <h4>Oczekiwana kwota</h4>
                    <input type="text"  name="expectedamount" id="expectedamount" value="{$form->expectedamount}" placeholder="Oczekiwana kwota" />
                    <ul class="actions">
                        <li><input style="margin-top: 1em;" type="submit" value="Zapisz" class="primary" /></li>
                    </ul>
          
                </fieldset>
                <input type="hidden" name="id" value="{$form->id}">    
            </form>
                    {include file='messages.tpl'}
</div>

{/block}