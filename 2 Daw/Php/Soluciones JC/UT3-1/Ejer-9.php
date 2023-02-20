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

foreach($indicesServer as $v) {
   echo "$v <br/>"; 
}   

// Ordena el array recibido como parámetro (modifica el valor del parámetro)
// Distingue entre mayúsculas y minúsculas. El orden es ASCII, por lo que las
// mayúsculas irán antes que las minúsculas.
sort($indicesServer);
echo '<h4>Array ordenado ascendentemente. sort</h4>';
foreach($indicesServer as $v)
   echo "$v <br/>"; 

// Ordena el array en orden natural (no uppercase-sensitive), es decir,
// la 'a' y la 'A' están en el mismo orden. 
natcasesort($indicesServer);
echo '<h4>Array ordenado ascendentemente de forma natural. natcasesort</h4>';
foreach($indicesServer as $v)
   echo "$v <br/>"; 