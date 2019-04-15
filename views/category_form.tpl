{include file="views/header.tpl" title="formulario categoria"}
<div id='formulario'>
<form method="post" action="category_insert.php">
	<label for="name">Nombre:</label>
	<input id="name" name="name" type="text" value="{$name}" >
	<br/>
	<label for="nick">Descripcion:</label><br/>
	<textarea id="description" name="description">{$description}</textarea>
	<br/>
	<input type="hidden" id="id" name="id" value="{$id}">
    <input type="submit" id="submit" name="submit"  class="boton" value="Guardar"/>
</form>
</div>    
{include file="views/footer.tpl"}