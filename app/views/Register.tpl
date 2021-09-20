{extends file="main.tpl"}


{block name=content}  

    
    <div class="container">
                    <header class="major">
                        <h2>Rejestr transakcji</h2>
                    </header>
                
    
<form class="form" action="{$conf->action_url}register" style="width: 30em">
	<legend>Opcje wyszukiwania</legend>
	<fieldset>
		<input type="text" placeholder="Nazwa użytkownika" name="name" value="{$form->name}" />
                <div class="row">
                    <div class="col-4">
                        <input type="text" placeholder="Rok" name="year" value="{$form->year}" />
                    </div>
                    <div class="col-4">
                        <select name="month" id="month" value="{$form->month}">     
                            <option value="">Miesiąc</option>
                            <option value="01">Styczeń</option>
                            <option value="02">Luty</option>
                            <option value="03">Marzec</option>
                            <option value="04">Kwiecień</option>
                            <option value="05">Maj</option>
                            <option value="06">Czerwiec</option>
                            <option value="07">Lipiec</option>
                            <option value="08">Sierpień</option>
                            <option value="09">Wrzesień</option>
                            <option value="10">Październik</option>
                            <option value="11">Listopad</option>
                            <option value="12">Grudzień</option>
                        </select>
                    </div>
                    <div class="col-4">
                        <input type="text" placeholder="Dzień" name="day" value="{$form->day}" />
                    </div>
                </div>
                    <input  type="submit" value="Filtruj" class="primary" />
                        
     
        </fieldset>
</form>
                    <div class="row" style="justify-content: flex-end">
                    <div class="col">
                           <a class="bbutton primary" href="{$conf->action_url}register/{$p-1}"><</a> 
                        </div>
                        <div class="col" style="padding-left: 0.5em" >
                           <a class="bbutton primary" href="{$conf->action_url}register/{$p+1}">></a> 
                        </div>
                    </div>
                    
    
<div class="table-wrapper" >
    <table id="register" >
<thead>
	<tr>
		<th>ID</th>
                <th>Użytkownik</th>
		<th>Kwota</th>
		<th>Kategoria</th>
                <th>Opis</th>
		<th>Data</th>
                {if $user->role eq "admin"}
                <th>Akcja</th>
                 {/if}
	</tr>
</thead>
<tbody>
{foreach $data as $d}
{strip}
	<tr>
		<td>{$d["idtransaction"]}</td>
		<td>{$d["username"]}</td>
                <td>{$d["amount"]}</td>
                <td>{$d["name"]}</td>
		<td>{$d["description"]}</td>
		<td>{$d["createdate"]}</td>
                <td>
                {if $user->role eq "admin"}
                <a class="abutton primary" href="{$conf->action_url}transactionEdit/{$d['idtransaction']}" >Edytuj</a>
                <a class="abutton primary" href="{$conf->action_url}transactionDelete/{$d['idtransaction']}" >Usuń</a>
                {/if}
</td>
	</tr>
{/strip}
{/foreach}
</tbody>
</table>

<div class="row">
        <div class="col-6 col-12-xsmall">
            {include file='messages.tpl'}
        </div>
        <div class="col-6 col-12-xsmall"  style="padding-left: 28em">
             <a class="button primary" href="{$conf->action_url}transactionNew" >Nowa</a>
        </div>
</div>
    
    </div>
    </div>
{/block}