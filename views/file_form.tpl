{include file="views/header.tpl" title="formulario file"}
<div id='formulario'>
<form method="post" action="file_insert.php" enctype="multipart/form-data" >
	<label for="seccion">Seccion:</label>
	<select name="seccion">
		{foreach from=$sections item=section}
  			{html_options values=$section->id output=$section->name selected=$seccion}
  		{/foreach}
	</select>
	<br/>
	<label for="title">Titulo:</label>
	<input id="title" name="title" type="text" value="{$title}" />
	<br/>
	<label for="body">Resumen:</label><br/>
	<textarea id="body" name="body">{$body}</textarea>
	<br/>
	<label for="file">Archivo:</label>
	<input id="file" name="file" type="file"/>
	<br/>
	<input type="hidden" id="id" name="id" value="{$id}"/>
	<input type="submit" id="submit" name="submit" class="boton" value="Guardar"/>
</form>
</div>    
{include file="views/footer.tpl"}