{extends file="main.tpl"}

{block name=content}  
    <div class="container">
        <header class="major">
            <h2>Rejestr kategorii</h2>
        </header>
                
    
<div class="table-wrapper" >
    <table id="category" class="pure-table pure-table-bordered">
<thead>
	<tr>
		<th>ID</th>
                <th>Nazwa</th>
		<th>Przewidywana kwota</th>
                <th>Wydano</th>
                <th>Pozostało</th>
                {if $user->role eq "admin"}
                <th>Akcje</th>
                {/if}
	</tr>
</thead>


<tbody>
{foreach $data as $d}
{strip}
	<tr>
		<td>{$d["idcategory"]}</td>
		<td>{$d["name"]}</td>
                <td>{$d["expectedamount"]}</td>
                <td>{$d["currentamount"]}</td>
                <td>{$d["diffamount"]}</td>
                    {if $user->role eq "admin"}
                        <td>
                <a class="abutton primary" href="{$conf->action_url}categoryEdit/{$d['idcategory']}" >Edytuj</a>
                <a class="abutton primary" href="{$conf->action_url}categoryDelete/{$d['idcategory']}" >Usuń</a>
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
             <a class="button primary" href="{$conf->action_url}categoryNew" >Nowa</a>
        </div>
</div>
    
    </div>
        </div>

{/block}