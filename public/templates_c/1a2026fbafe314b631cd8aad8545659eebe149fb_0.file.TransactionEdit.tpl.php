<?php
/* Smarty version 3.1.34-dev-7, created on 2021-09-18 16:31:52
  from 'D:\xampp\htdocs\homebud\app\views\TransactionEdit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_6145f858ce0547_73952308',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1a2026fbafe314b631cd8aad8545659eebe149fb' => 
    array (
      0 => 'D:\\xampp\\htdocs\\homebud\\app\\views\\TransactionEdit.tpl',
      1 => 1631975475,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:messages.tpl' => 1,
  ),
),false)) {
function content_6145f858ce0547_73952308 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_18748313636145f858cc9bd5_59701070', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'content'} */
class Block_18748313636145f858cc9bd5_59701070 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_18748313636145f858cc9bd5_59701070',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
  
    
        <div class="container">
                    <header class="major">
                        <h2>Dane transakcji</h2>
                    </header>
                </div>

    <div class="container">
        <section>
            <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
transactionSave" method="post">
                <fieldset>
                <div class="form">
                    <h4>Kwota</h4>
                    <input type="text" name="amount" id="amount" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->amount;?>
" placeholder="Kwota" />
                    
                    <h4>Kategoria</h4>
                    <select name="category" id="category" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->category;?>
">        
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categories']->value, 'c');
$_smarty_tpl->tpl_vars['c']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['c']->value) {
$_smarty_tpl->tpl_vars['c']->do_else = false;
?>
			<option ><?php echo $_smarty_tpl->tpl_vars['c']->value;?>
</option>
                         <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </select>
                    <h4>Opis</h4>
                    <input type="text"  name="description" id="description" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->description;?>
" placeholder="Opis" />
                    <ul class="actions">
                        <li><input style="margin-top: 1em;" type="submit" value="Zapisz" class="primary" /></li>
                    </ul>
          
                </fieldset>
                <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->id;?>
">    
            </form>
                    <?php $_smarty_tpl->_subTemplateRender('file:messages.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</div>

<?php
}
}
/* {/block 'content'} */
}
