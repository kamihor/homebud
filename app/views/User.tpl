{extends file="main.tpl"}


{block name=content}  

    
    <div class="container">
                    <header class="major">
                        <h2>Rejestr użytkowników</h2>
                    </header>
               
    
<div class="table-wrapper">
    <table id="user" class="pure-table pure-table-bordered">
<thead>
	<tr>
		<th>ID</th>
                <th>Nazwa</th>
		<th>Rola</th>
                <th>Data utworzenia</th>
                <th>Akcje</th>
	</tr>
</thead>
<tbody>
{foreach $data as $d}
{strip}
	<tr>
		<td>{$d["iduser"]}</td>
		<td>{$d["username"]}</td>
                <td>{$d["role"]}</td>
                <td>{$d["create_time"]}</td>
                <td>
                <a class="abutton primary" href="{$conf->action_url}userEdit/{$d['iduser']}" >Edytuj</a>
                <a class="abutton primary" href="{$conf->action_url}userDelete/{$d['iduser']}" >Usuń</a>
          
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
             <a class="button primary" href="{$conf->action_url}userNew" >Nowy</a>
        </div>
</div>
    
    </div>
 </div>
{/block}