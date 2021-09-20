<?php
/* Smarty version 3.1.34-dev-7, created on 2021-09-20 21:42:35
  from 'D:\xampp\htdocs\homebud\app\views\Category.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_6148e42b162089_97714814',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8461edee7ac392afcc0eed879daa38a1007a6fe7' => 
    array (
      0 => 'D:\\xampp\\htdocs\\homebud\\app\\views\\Category.tpl',
      1 => 1632166820,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:messages.tpl' => 1,
  ),
),false)) {
function content_6148e42b162089_97714814 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_10671879816148e42b135ae1_62264385', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'content'} */
class Block_10671879816148e42b135ae1_62264385 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_10671879816148e42b135ae1_62264385',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
  
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
                <?php if ($_smarty_tpl->tpl_vars['user']->value->role == "admin") {?>
                <th>Akcje</th>
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
<tr><td><?php echo $_smarty_tpl->tpl_vars['d']->value["idcategory"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['d']->value["name"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['d']->value["expectedamount"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['d']->value["currentamount"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['d']->value["diffamount"];?>
</td><?php if ($_smarty_tpl->tpl_vars['user']->value->role == "admin") {?><td><a class="abutton primary" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
categoryEdit/<?php echo $_smarty_tpl->tpl_vars['d']->value['idcategory'];?>
" >Edytuj</a><a class="abutton primary" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
categoryDelete/<?php echo $_smarty_tpl->tpl_vars['d']->value['idcategory'];?>
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
categoryNew" >Nowa</a>
        </div>
</div>
    
    </div>
        </div>

<?php
}
}
/* {/block 'content'} */
}
