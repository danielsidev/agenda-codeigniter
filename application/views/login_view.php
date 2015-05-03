<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
   <title>Login para Agenda</title>
   <link rel="stylesheet" type="text/css" href="<?=site_url()?>assets/css/contato.css" />
 </head>
 <body>
   <h1>Login para Agenda</h1>
   <?php echo validation_errors(); ?>
   <?php echo form_open('verificalogin'); ?>
     <label for="username">Login:</label>
      &nbsp;<input type="text" size="20" id="login" name="login"/>
     <br/> <br/>
     <label for="password">Senha:</label>
     <input type="password" size="20" id="senha" name="senha"/>
     <br/> <br/>
     <input type="submit" value="Login"/>
   </form>
 </body>
</html>