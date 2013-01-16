<?php
######### Battery_Temperature
$opt[1] = "--imgformat=PNG --title \"$hostname / $servicedesc\" --slope-mode ";

$def[1] =  "DEF:temp=$RRDFILE[1]:$DS[1]:AVERAGE " ;
$def[1] .= "CDEF:cold=temp,20,LE,temp,20,IF ";
$def[1] .= "CDEF:cool=temp,20,GT,temp,40,GT,10,temp,20,-,IF,UNKN,IF ";
$def[1] .= "CDEF:warm=temp,40,GT,temp,60,GT,10,temp,40,-,IF,UNKN,IF ";
$def[1] .= "CDEF:hot=temp,60,GT,temp,60,-,UNKN,IF ";

# Draw area under line
$def[1] .= "AREA:cold#0000FFAA:cold:STACK ";
$def[1] .= "AREA:cool#0000FF44:cool:STACK ";
$def[1] .= "AREA:warm#FF000044:warm:STACK ";
$def[1] .= "AREA:hot#FF0000AA:hot:STACK ";

$def[1] .= "GPRINT:temp:LAST:\"%3.4lg %s$UNIT[1] LAST \" ";
$def[1] .= "GPRINT:temp:MAX:\"%3.4lg %s$UNIT[1] MAX \" ";
$def[1] .= "GPRINT:temp:AVERAGE:\"%3.4lg %s$UNIT[1] AVERAGE \" ";

######### RemainCapacity
$opt[2] = "--imgformat=PNG --title \"$hostname / $servicedesc\" --slope-mode ";

$def[2] =  "DEF:ds1=$RRDFILE[3]:$DS[1]:AVERAGE " ;
$def[2] .= "CDEF:capacity=ds1,4,/ ";

# Draw area under line
$def[2] .= "AREA:capacity#33CC3322::STACK ";
$def[2] .= "AREA:capacity#33CC3344::STACK ";
$def[2] .= "AREA:capacity#33CC3366::STACK ";
$def[2] .= "AREA:capacity#33CC3388::STACK ";

$def[2] .= "GPRINT:capacity:LAST:\"%3.4lg %s$UNIT[2] LAST \" ";
$def[2] .= "GPRINT:capacity:MAX:\"%3.4lg %s$UNIT[2] MAX \" ";
$def[2] .= "GPRINT:capacity:AVERAGE:\"%3.4lg %s$UNIT[2] AVERAGE \" ";

######### Battery_Voltage
$opt[3] = "--imgformat=PNG --title \"$hostname / $servicedesc\" --slope-mode ";

$def[3] =  "DEF:ds1=$RRDFILE[3]:$DS[1]:AVERAGE " ;
$def[3] .= "CDEF:volt=ds1,4,/ ";

# Draw area under line
$def[3] .= "AREA:volt#00555E22::STACK ";
$def[3] .= "AREA:volt#00555E44::STACK ";
$def[3] .= "AREA:volt#00555E66::STACK ";
$def[3] .= "AREA:volt#00555E88::STACK ";

$def[3] .= "GPRINT:volt:LAST:\"%3.4lg %s$UNIT[3] LAST \" ";
$def[3] .= "GPRINT:volt:MAX:\"%3.4lg %s$UNIT[3] MAX \" ";
$def[3] .= "GPRINT:volt:AVERAGE:\"%3.4lg %s$UNIT[3] AVERAGE \" ";

######### Battery_CycleCount
$opt[4] = "--imgformat=PNG --title \"$hostname / $servicedesc\" --slope-mode ";
#
$def[4] =  "DEF:ds1=$RRDFILE[4]:$DS[4]:AVERAGE " ;
$def[4] .= "CDEF:var1=ds1 ";

# Draw line
$def[4] .= "LINE1:var1" . "#00555E" . "FF:\"$NAME[4]\t\" ";
# Draw area under line
$def[4] .= "AREA:var1" . "#BAFFF8 ";

$def[4] .= "GPRINT:var1:LAST:\"%3.4lg %s$UNIT[4] LAST \" ";
$def[4] .= "GPRINT:var1:MAX:\"%3.4lg %s$UNIT[4] MAX \" ";
$def[4] .= "GPRINT:var1:AVERAGE:\"%3.4lg %s$UNIT[4] AVERAGE \" ";

?>