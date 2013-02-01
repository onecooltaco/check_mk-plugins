<?php
######### usage rate
$opt[1] = "--imgformat=PNG --title \"Lamp Usage Rate $hostname / $servicedesc\" --slope-mode ";

$def[1] =  "DEF:ds1=$RRDFILE[2]:$DS[1]:AVERAGE " ;
$def[1] .= "CDEF:rate=ds1,4,/ ";

# Draw area under line
$def[1] .= "AREA:rate#00FF0022::STACK ";
$def[1] .= "AREA:rate#00FF0044::STACK ";
$def[1] .= "AREA:rate#00FF0066::STACK ";
$def[1] .= "AREA:rate#00FF0088::STACK ";

$def[1] .= "GPRINT:rate:LAST:\"%3.4lg %s$UNIT[2] LAST \" ";
$def[1] .= "GPRINT:rate:MAX:\"%3.4lg %s$UNIT[2] MAX \" ";
$def[1] .= "GPRINT:rate:AVERAGE:\"%3.4lg %s$UNIT[2] AVERAGE \" ";

######### lamp hours
$crithrs = $CRIT[1];

$opt[2] = "--imgformat=PNG --title \"Lamp Hours $hostname / $servicedesc\" --slope-mode ";
$opt[2] .= "--upper-limit $crithrs --lower-limit 0 --units-exponent 0 ";

$def[2] =  "DEF:hours=$RRDFILE[1]:$DS[1]:AVERAGE " ;
$def[2] .= "CDEF:normal=hours,$crithrs,LE,hours,UNKN,IF ";
$def[2] .= "CDEF:over=hours,$crithrs,GT,hours,UNKN,IF ";

# Draw area under line
$def[2] .= "AREA:normal#DD880044:normal ";
$def[2] .= "AREA:over#FF0000AA:over ";

$def[2] .= "GPRINT:hours:LAST:\"%3.4lg %s$UNIT[1] LAST \" ";
$def[2] .= "GPRINT:hours:MAX:\"%3.4lg %s$UNIT[1] MAX \" ";
$def[2] .= "GPRINT:hours:AVERAGE:\"%3.4lg %s$UNIT[1] AVERAGE \" ";

?>
