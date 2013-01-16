<?php
#
$opt[1] = "--imgformat=PNG --title \"Temperature Data For $hostname / $servicedesc\" --slope-mode ";
#
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


# Draw warning and crit
if (isset($WARN[1]) && $WARN[1] != "") {
$def[1] .= "HRULE:$WARN[1]#FFFF00:\"Warning ($NAME[1])\: " . $WARN[1] . " " . $UNIT[1] . " \\n\" " ;
}

if (isset($CRIT[1]) && $CRIT[1] != "") {
$def[1] .= "HRULE:$CRIT[1]#FF0000:\"Critical ($NAME[1])\: " . $CRIT[1] . " " . $UNIT[1] . " \\n\" " ;
}
?>