<?php
/* Smarty version 3.1.34-dev-7, created on 2021-09-20 19:43:12
  from 'D:\xampp\htdocs\homebud\app\views\Register.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_6148c830d2fd97_24020628',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '693b3946f30097ad5b27845690ac9edadb76db22' => 
    array (
      0 => 'D:\\xampp\\htdocs\\homebud\\app\\views\\Register.tpl',
      1 => 1632159782,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:messages.tpl' => 1,
  ),
),false)) {
function content_6148c830d2fd97_24020628 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_8453194306148c830cebc51_46898352', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'content'} */
class Block_8453194306148c830cebc51_46898352 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_8453194306148c830cebc51_46898352',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
  

    
    <div class="container">
                    <header class="major">
                        <h2>Rejestr transakcji</h2>
                    </header>
                
    
<form class="form" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
register" style="width: 30em">
	<legend>Opcje wyszukiwania</legend>
	<fieldset>
		<input type="text" placeholder="Nazwa użytkownika" name="name" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->name;?>
" />
                <div class="row">
                    <div class="col-4">
                        <input type="text" placeholder="Rok" name="year" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->year;?>
" />
                    </div>
                    <div class="col-4">
                        <select name="month" id="month" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->month;?>
">     
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
                        <input type="text" placeholder="Dzień" name="day" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->day;?>
" />
                    </div>
                </div>
                    <input  type="submit" value="Filtruj" class="primary" />
                        
     
        </fieldset>
</form>
                    <div class="row" style="justify-content: flex-end">
                    <div class="col">
                           <a class="bbutton primary" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
register/<?php echo $_smarty_tpl->tpl_vars['p']->value-1;?>
"><</a> 
                        </div>
                        <div class="col" style="padding-left: 0.5em" >
                           <a class="bbutton primary" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
register/<?php echo $_smarty_tpl->tpl_vars['p']->value+1;?>
">></a> 
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
                <?php if ($_smarty_tpl->tpl_vars['user']->value->role == "admin") {?>
                <th>Akcja</th>
                 <?php }?>
	</tr>
</thead>
<tbody>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, 'd');
$_smarty_tpl->tpl_vars['d']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['d']->value) {
$_smarty_tpl->tpl_vars['d']->do_else = false;
?>
<tr><td><?php echo $_smarty_tpl->tpl_vars['d']->value["idtransaction"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['d']->value["username"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['d']->value["amount"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['d']->value["name"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['d']->value["description"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['d']->value["createdate"];?>
</td><td><?php if ($_smarty_tpl->tpl_vars['user']->value->role == "admin") {?><a class="abutton primary" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
transactionEdit/<?php echo $_smarty_tpl->tpl_vars['d']->value['idtransaction'];?>
" >Edytuj</a><a class="abutton primary" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
transactionDelete/<?php echo $_smarty_tpl->tpl_vars['d']->value['idtransaction'];?>
" >Usuń</a><?php }?></td></tr>
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</tbody>
</table>

<div class="row">
        <div class="col-6 col-12-xsmall">
            <?php $_smarty_tpl->_subTemplateRender('file:messages.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        </div>
        <div class="col-6 col-12-xsmall"  style="padding-left: 28em">
             <a class="button primary" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
transactionNew" >Nowa</a>
        </div>
</div>
    
    </div>
    </div>
<?php
}
}
/* {/block 'content'} */
}
