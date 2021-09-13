<?php
/* Smarty version 3.1.34-dev-7, created on 2021-09-13 21:20:38
  from 'D:\xampp\htdocs\homebud\app\views\LoginView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_613fa4869ce657_49316572',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '025a57bc857b8e8078fd6bdfdaed2c3da4156a76' => 
    array (
      0 => 'D:\\xampp\\htdocs\\homebud\\app\\views\\LoginView.tpl',
      1 => 1631560388,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:messages.tpl' => 1,
  ),
),false)) {
function content_613fa4869ce657_49316572 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>



 
<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1760826458613fa4869c8be7_28498563', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'content'} */
class Block_1760826458613fa4869c8be7_28498563 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_1760826458613fa4869c8be7_28498563',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div id="main" class="container">
    <div class="row">
        <div class="col-6 col-12-xsmall">
            <h2>Budżet domowy</h2>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
             </div>
          <div class="col-6 col-12-xsmall">
             <section>
            <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
login" method="post">
                <fieldset>
                <div class="form">
                    <input type="text" name="login" id="id_login"  placeholder="Login" />
                    <input type="password"  name="pass" id="id_pass" placeholder="Hasło" />
                    <ul class="actions">
                        <li><input style="margin-top: 1em;" type="submit" value="Zaloguj" class="primary" /></li>
                    </ul>
                     <?php $_smarty_tpl->_subTemplateRender('file:messages.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
                </fieldset>
            </form>
             </div>
        
</div>
</div>
    
  

    <?php
}
}
/* {/block 'content'} */
}
