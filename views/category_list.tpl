{include file="views/header.tpl" title="listado categorias"}
<a href="category_insert.php" class="boton">nuevo</a>

<table border='1'>
<tr><th>nombre</th><th>descripcion</th><th></th></tr>
{foreach from=$categories item=category}
  <tr><td><a href="section_list.php?cat={$category->id}">{$category->name}</a></td>
      <td>{$category->description}</td>
      <td><a  class="boton" href="category_insert.php?id={$category->id}">editar</a> 
          <a onclick = eliminar('category_del.php?id={$category->id}'); class="boton">eliminar</a>
      </td>
  </tr>
{/foreach}
</table>
{include file="views/paginate.tpl"}
{include file="views/footer.tpl"}