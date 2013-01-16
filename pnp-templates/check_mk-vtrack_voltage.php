<?php

$opt[1] = "--imgformat=PNG --title \"Voltage For $hostname / $servicedesc\" ";

$def[1] =  "DEF:ds1=$RRDFILE[1]:$DS[1]:AVERAGE " ;
$def[1] .= "CDEF:volt=ds1,4,/ ";

# Draw area under line
$def[1] .= "AREA:volt#FF000022::STACK ";
$def[1] .= "AREA:volt#FF000044::STACK ";
$def[1] .= "AREA:volt#FF000066::STACK ";
$def[1] .= "AREA:volt#FF000088::STACK ";

$def[1] .= "GPRINT:volt:LAST:\"%3.4lg %s$UNIT[1] LAST \" ";
$def[1] .= "GPRINT:volt:MAX:\"%3.4lg %s$UNIT[1] MAX \" ";
$def[1] .= "GPRINT:volt:AVERAGE:\"%3.4lg %s$UNIT[1] AVERAGE \" ";

?>