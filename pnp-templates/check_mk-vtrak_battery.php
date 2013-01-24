<?php
######### RemainCapacity
$opt[1] = "--imgformat=PNG --title \"Capacity Remaining $hostname / $servicedesc\" --slope-mode ";

$def[1] =  "DEF:ds1=$RRDFILE[3]:$DS[1]:AVERAGE " ;
$def[1] .= "CDEF:capacity=ds1,4,/ ";

# Draw area under line
$def[1] .= "AREA:capacity#00FF0022::STACK ";
$def[1] .= "AREA:capacity#00FF0044::STACK ";
$def[1] .= "AREA:capacity#00FF0066::STACK ";
$def[1] .= "AREA:capacity#00FF0088::STACK ";

$def[1] .= "GPRINT:capacity:LAST:\"%3.4lg %s$UNIT[3] LAST \" ";
$def[1] .= "GPRINT:capacity:MAX:\"%3.4lg %s$UNIT[3] MAX \" ";
$def[1] .= "GPRINT:capacity:AVERAGE:\"%3.4lg %s$UNIT[3] AVERAGE \" ";

######### HoldTime
$opt[5] = "--imgformat=PNG --title \"HoldTime $hostname / $servicedesc\" --slope-mode ";

$def[5] =  "DEF:ds1=$RRDFILE[5]:$DS[1]:AVERAGE " ;
$def[5] .= "CDEF:capacity=ds1,4,/ ";

# Draw area under line
$def[5] .= "AREA:capacity#00FF0022::STACK ";
$def[5] .= "AREA:capacity#00FF0044::STACK ";
$def[5] .= "AREA:capacity#00FF0066::STACK ";
$def[5] .= "AREA:capacity#00FF0088::STACK ";

$def[5] .= "GPRINT:capacity:LAST:\"%3.4lg %s$UNIT[5] LAST \" ";
$def[5] .= "GPRINT:capacity:MAX:\"%3.4lg %s$UNIT[5] MAX \" ";
$def[5] .= "GPRINT:capacity:AVERAGE:\"%3.4lg %s$UNIT[5] AVERAGE \" ";

######### Battery_Temperature
$opt[2] = "--imgformat=PNG --title \"Temperature $hostname / $servicedesc\" --slope-mode ";

$def[2] =  "DEF:temp=$RRDFILE[1]:$DS[1]:AVERAGE " ;
$def[2] .= "CDEF:cold=temp,20,LE,temp,20,IF ";
$def[2] .= "CDEF:cool=temp,20,GT,temp,40,GT,10,temp,20,-,IF,UNKN,IF ";
$def[2] .= "CDEF:warm=temp,40,GT,temp,60,GT,10,temp,40,-,IF,UNKN,IF ";
$def[2] .= "CDEF:hot=temp,60,GT,temp,60,-,UNKN,IF ";

# Draw area under line
$def[2] .= "AREA:cold#0000FFAA:cold:STACK ";
$def[2] .= "AREA:cool#0000FF44:cool:STACK ";
$def[2] .= "AREA:warm#FF000044:warm:STACK ";
$def[2] .= "AREA:hot#FF0000AA:hot:STACK ";

$def[2] .= "GPRINT:temp:LAST:\"%3.4lg %s$UNIT[1] LAST \" ";
$def[2] .= "GPRINT:temp:MAX:\"%3.4lg %s$UNIT[1] MAX \" ";
$def[2] .= "GPRINT:temp:AVERAGE:\"%3.4lg %s$UNIT[1] AVERAGE \" ";

######### Battery_Voltage
$opt[3] = "--imgformat=PNG --title \"Voltage $hostname / $servicedesc\" --slope-mode ";

$def[3] =  "DEF:ds1=$RRDFILE[3]:$DS[1]:AVERAGE " ;
$def[3] .= "CDEF:volt=ds1,4,/ ";

# Draw area under line
$def[3] .= "AREA:volt#00FFFF22::STACK ";
$def[3] .= "AREA:volt#00FFFF44::STACK ";
$def[3] .= "AREA:volt#00FFFF66::STACK ";
$def[3] .= "AREA:volt#00FFFF88::STACK ";

$def[3] .= "GPRINT:volt:LAST:\"%3.4lg %s$UNIT[3] LAST \" ";
$def[3] .= "GPRINT:volt:MAX:\"%3.4lg %s$UNIT[3] MAX \" ";
$def[3] .= "GPRINT:volt:AVERAGE:\"%3.4lg %s$UNIT[3] AVERAGE \" ";

######### Battery_CycleCount
$opt[4] = "--imgformat=PNG --title \"CycleCount $hostname / $servicedesc\" --slope-mode ";
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