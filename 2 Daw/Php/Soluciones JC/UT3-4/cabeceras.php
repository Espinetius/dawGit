<?php

$cabecs = apache_request_headers();

foreach ($cabecs as $c => $v)
    echo "$c: $v <br/>";

