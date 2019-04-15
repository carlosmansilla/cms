{include file="views/header.tpl" title="listado documentos"}
<a href="file_insert.php?sec={$section}" class="boton">nuevo</a>

<table border='1'>
<tr><th>title</th><th>body</th><th>link</th><th>section</th><th></th></tr>
{foreach from=$files item=file}
  <tr><td>{$file->title}</td><td>{$file->body}</td><td><a href="{$file->link}" download> descarga</a></td><td>{$file->section->name}</td><td><a href="file_insert.php?id={$file->id}" class="boton">editar</a> <a onclick = eliminar("file_del.php?id={$file->id}") class="boton">eliminar</a></td>
</tr>
{/foreach}
</table>
{include file="views/paginate.tpl"}
{include file="views/footer.tpl"}