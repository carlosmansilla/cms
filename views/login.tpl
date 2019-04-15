<!DOCTYPE html>
<html lang="es">
<head>
<title>Repositorio</title>
<style type="text/css">
#login{
	padding: 20px;
	background-color: #014783;
    border: 1px solid #000;
	font-family: Arial;
	font-size:16px;
	color: #fff;
}

.icon{
	margin: 40px;
	text-decoration: none;
}
    
#content{
  background-color: #fff;
  border-left: 1px solid #000;    
  border-right: 1px solid #000;  
  border-bottom: 1px solid #000;
}

#document{   
  width: 600px;
  float: left;  
  padding: 10px;    
}

.item{ 
    width: 250px;
    height: 100px;
    display: inline-block;
    padding: 20px;
}

.item a{
    color: #000;
    font-family: monospace;
    font-size: 16px;
    font-weight: bolder;
    text-align: center;
} 

#titulo{
color: #000;
font-family: monospace;
font-size: 16px;
font-weight: bolder; 
}

#descripcion{
color: gray;
font-family: monospace;
font-size: 12px; 
}
    
#paginate{
  padding: 10px;
  background-color: #dee0de;
  border-top: 1px solid #000;
  clear: left;
}

#paginate a{
  color: #000;
  text-decoration: none;    
}    

#paginate a:hover { 
    background-color: #e5c65f;
}
    
#navigation { 
width:200px; 
float: left; 
border: 1px solid black;    
}
    
#navigation ul { margin:0px; padding:0px; }
    
#navigation li { list-style: none; } 
 
ul.top-level { 
     
}
    
ul.top-level li {    
 border-bottom: #000 solid;
 border-top: #000 solid;
 border-width: 1px;
}
 
#navigation a {
 background-image:url(images/boton.png);    
 color: #000;
 cursor: pointer;
 display:block;
 height:30px;
 line-height: 30px;
 font-family: monospace;    
 font-size: 14px; 
 font-weight: bold;
 text-indent: 10px;
 text-decoration:none;
 width:100%;      
}
 
#navigation a:hover{
 background-image: none;  
 background-color: #5bc0de;    
 color: black;
}
 
#navigation li:hover {
 position: relative;
}
    
ul.sub-level {
    display: none;
}

ul.sub-level {
    display: none;
}
 
li:hover .sub-level {
    background-color: #799bb7;
    border: #000 solid;
    border-width: 1px;
    display: block;
    position: absolute;
    left: 190px;
    top: 5px;
}
    
ul.sub-level li {
    border: none;
    float:left;
    width:480px;
}
    
</style>
</head>
<body>
<div id="login">
    <form method='post' action='index.php'>
	usuario: <input type='text' name='nick'/>
	clave: <input type='password' name='pass'/>
	<input type='submit' value='Login'/>
	</form>
</div>