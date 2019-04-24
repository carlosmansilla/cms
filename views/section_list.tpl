{include file="views/header.tpl" title="listado secciones"}
{* muestra la lista de secciones *}
<a href="section_insert.php?cat={$category}" class="boton">nuevo</a>

<table border='1'>
<tr><th>nombre</th><th>descripcion</th><th>categoria</th><th></th></tr>
{foreach from=$sections item=section}
  <tr><td><a href='file_list.php?sec={$section->id}'>{$section->name}</a></td>
      <td>{$section->description}</td>
      <td>{$section->category->name}</td>
      <td>
          <a href="section_insert.php?id={$section->id}" class="boton">editar</a> 
          <a class="boton" onclick = eliminar("section_del.php?id={$section->id}")>eliminar</a>
      </td>
</tr>
{/foreach}
</table>
{include file="views/paginate.tpl"}
{include file="views/footer.tpl"}