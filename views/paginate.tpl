<div id='paginate'>
paginas: 
{for $pag=1 to $total_pag}
    <a href="{$url}{$filtro}pag={$pag}">{$pag}</a>
{/for}
</div>

