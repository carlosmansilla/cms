<!DOCTYPE html>
<html lang="es">
<head>
<title>{$title}</title>
<style type="text/css">
    /* MENSAJE */
    #mensaje{ 
        position:fixed;  
        _position:absolute; /* hack for internet explorer 6 */  
        
        width:30%;
        
        left: 35%;
        top: 40%;
        
        background:#fff;  
        z-index:100; /* Layering ( on-top of others), if you have lots of layers: I just maximized, you can change it yourself */
        margin-left: 15px;  
        
        /* additional features, can be omitted */
        border:2px solid #bc3211;      
        padding:15px;  
        font-size:15px;
        text-align: center;
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
        
</style>

<script src="js/jquery.js"></script>    
<script type="text/javascript"> 
   
</script>
</head>
<body>

<div id='mensaje'>
  {$message} <br>
  <a href='{$back}' class='boton'>volver</a>
</div>
</body>
</html>    