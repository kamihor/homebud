{extends file="main.tpl"}

{block name=header}  
    <header id="header">
            <h1 style="white-space: nowrap;">
                
            </h1>
            
            <nav id="nav">
        <ul>
            <li style="white-space: nowrap;">
                <span style="white-space: nowrap;">Zalogowano: {$user->login}</span>
                
            </li>
         {*    <li style="white-space: nowrap;">
                <a href="{$conf->action_url}calcShow" >Oblicz</a>
            </li>
            <li style="white-space: nowrap;">
                <a href="{$conf->action_url}history" >Historia</a>
            </li>*}
                        <li style="white-space: nowrap;">
                <a class="button primary" href="{$conf->action_url}logout" >wyloguj</a>
            </li>
        </ul>
        
    </nav>
            
    </header>
{/block}

{block name=content}  

<div class="table-wrapper" style="margin: 10em">
    <table id="register" class="pure-table pure-table-bordered">
<thead>
	<tr>
		<th>L.p.</th>
                <th>Użytkownik</th>
		<th>Kwota</th>
		<th>Kategoria</th>
                <th>Opis</th>
		<th>Data</th>
                <th>Akcja</th>
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
                <a class="abutton primary" href="{$conf->action_url}logout" >Edytuj</a>
                <a class="abutton primary" href="{$conf->action_url}logout" >Usuń</a>
          
</td>
	</tr>
{/strip}
{/foreach}
</tbody>
</table>
    </div>

{/block}