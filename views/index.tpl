{include file="views/login.tpl" title="categorias"}
<div id='content'>
    <div id="navigation">
    <ul class="top-level">    
    {foreach from=$categories item=categoria}
        <li><a href="#">{$categoria->name}</a>
            <ul class="sub-level">
            {foreach from=$categoria->sections item=section}
             <li><a href='index.php?sec={$section->id}'>{$section->name}</a></li>
            {/foreach}
            </ul>
        </li>
    {/foreach} 
    </ul>    
    </div>  
    <div id='document'>
	{if $titulo eq ""}
		<span id='titulo'>REPOSITORIO</span>
		<p id='descripcion'>Elija una categoria del menu.</p> 
		<br/>
	{else}
	    <span id='titulo'>{$titulo}</span>
		<p id='descripcion'>{$descripcion}</p> 
		<hr/>
        {foreach from=$files item=file}
          <div class='item'><a href='{$file->link}' title='{$file->body}' class='icon' download> <img src="images/document.png" height="42" width="42"/><br/>{$file->title}</a></div>
        {/foreach}
    {/if}
    </div>
{include file="views/paginate.tpl"}    
</div>
{include file="views/footer.tpl"}