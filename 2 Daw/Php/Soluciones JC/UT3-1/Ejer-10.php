<?php
 
$indicesServer = array('PHP_SELF',
'argv',
'argc',
'GATEWAY_INTERFACE',
'SERVER_ADDR',
'SERVER_NAME',
'SERVER_SOFTWARE',
'SERVER_PROTOCOL',
'REQUEST_METHOD',
'REQUEST_TIME',
'REQUEST_TIME_FLOAT',
'QUERY_STRING',
'DOCUMENT_ROOT',
'HTTP_ACCEPT',
'HTTP_ACCEPT_CHARSET',
'HTTP_ACCEPT_ENCODING',
'HTTP_ACCEPT_LANGUAGE',
'HTTP_CONNECTION',
'HTTP_HOST',
'HTTP_REFERER',
'HTTP_USER_AGENT',
'HTTPS',
'REMOTE_ADDR',
'REMOTE_HOST',
'REMOTE_PORT',
'REMOTE_USER',
'REDIRECT_REMOTE_USER',
'SCRIPT_FILENAME',
'SERVER_ADMIN',
'SERVER_PORT',
'SERVER_SIGNATURE',
'PATH_TRANSLATED',
'SCRIPT_NAME',
'REQUEST_URI',
'PHP_AUTH_DIGEST',
'PHP_AUTH_USER',
'PHP_AUTH_PW',
'AUTH_TYPE',
'PATH_INFO',
'ORIG_PATH_INFO') ;

// La función in_array devuelve true si la cadena coincide con alguno 
// de los elementos del array y false, en caso contrario.
if ( in_array('HTTP_USER_AGENT', $indicesServer) )
   echo "HTTP_USER_AGENT se encuentra en el array <br/>";
else
   echo "HTTP_USER_AGENT no se encuentra en el array <br/>"; 

if ( in_array('TTP_USER_AGENT', $indicesServer) )
   echo "TTP_USER_AGENT se encuentra en el array";
else
   echo "TTP_USER_AGENT no se encuentra en el array"; 

echo "<br/>"; 
echo $_SERVER['HTTP_USER_AGENT'];
echo "<br/>";
echo $_SERVER['REQUEST_TIME'];
echo "<br/>";
echo $_SERVER['SERVER_PORT'];
