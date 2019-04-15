<!DOCTYPE html>
<html lang="es">
<head>
<title>{$title}</title>
<style type="text/css">
#header{
    background-color: #5f5f5f;
}
/* MENU */
#menu {
padding: 0;
overflow: hidden;
}

#menu li {
display: inline;
}

#menu li a {
font-family: Arial;
font-size:16px;
text-decoration: none;
float:left;
padding: 10px;
color: #fff;
}

#menu li a:hover {
background-color: #000;
margin-top:-2px;
padding-bottom:12px;
}

/* MENSAJE */
#mensaje{ 
    display:none; /* Hide the DIV */
    position:fixed;  
    _position:absolute; /* hack for internet explorer 6 */  
    
    height:50px;  
    width:300px;
    
    left: 35%;
    top: 40%;
    
    background:#fff;  
    z-index:100; /* Layering ( on-top of others), if you have lots of layers: I just maximized, you can change it yourself */
    margin-left: 15px;  
    
    /* additional features, can be omitted */
    border:2px solid #bc3211;      
    padding:15px;  
    font-size:15px;
}    

/* TABLA */
table {
  width: auto;
  margin: 10px;
  font: .9em Arial, Helvetica, sans-serif;
  border: 1px solid #333;
  border-collapse: collapse;
  text-align: left;
}

table th {
  background-color: #78b57b;
  padding: 10px;
}

table th, table, td {
  border: 1px solid #333;
}

table tr:hover {
  background: #f0deab !important;
}

/* BOTON */
.boton {
  margin: 5px;
  text-decoration: none;
  background: #EEE;
  color: #222;
  font-size: 15px;
  font-family: Verdana,sans-serif;
  font-weight: bold;
  border: 1px solid #cccccc;
  padding: 6px 16px;
  display: inline-block;
}

.boton:hover {
  background: #CCB;
}

.boton:active {
  border: 1px inset #000;
}
    
/* PAGINATE */
#paginate{
  padding: 10px;
  background-color: #dee0de;
  border: 1px solid #000;
  clear: left;
}

#paginate a{
  color: #000;
  text-decoration: none;    
}    

#paginate a:hover { 
    background-color: #e5c65f;
}

    
.content{
  padding: 10px;
  background-color: #c7dcdc;
  border: 1px solid #000;
}

/* formulario */
#formulario{
    width: 600px;
    padding: 10px;
    background-color: #c0e8c0;
    border: 1px solid #000;
}    

#formulario textarea{
    width: 500px;
    height: 100px;
    margin: 10px;
}

#formulario input, #formulario select{
    width: 450px;
    margin: 10px;
}    
    
#formulario input#submit{
    width: 100px;
}        
    
</style>
<script src="js/jquery.js"></script>    
<script type="text/javascript"> 
    url = "";
    $().ready(function(){
        $("#yes").click(function(){
            $("#mensaje").hide();
            window.location.assign(url);
        });
        $("#no").click(function(){
            $("#mensaje").hide();
        });
		link = $(location).attr('pathname');
		part = link.split("/")[2];
        part = part.split("_")[0];
		$("#menu li a[href*='"+part+"']").css("background-color", "#4CAF50");
    });
    
    function eliminar(x){
        url = x;
        $("#mensaje").show();
    }    
    
</script>
</head>
<body>
<div id='header'>
<ul id='menu'>
	<li><a href="category_list.php">Categorias</a></li>
	<li><a href="section_list.php">Secciones</a></li>
	<li><a href="file_list.php">Documentos</a></li>
	<li><a href="salir.php">Salir</a></li>
</ul>
</div>
<div id='mensaje'>Esta seguro de eliminar?<a id='yes' class='boton'>Si</a><a id='no' class='boton'>No</a></div>    