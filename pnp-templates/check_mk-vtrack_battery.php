<?php
#
$opt[1] = "--imgformat=PNG --title \"$hostname / $servicedesc\" --base=1024 --slope-mode ";
#
$def[1] =  "DEF:ds1=$RRDFILE[1]:$DS[1]:AVERAGE " ;
$def[1] .= "CDEF:var1=ds1 ";

# Draw line
$def[1] .= "LINE1:var1" . "#00555E" . "FF:\"$NAME[1]\t\" ";
# Draw area under line
$def[1] .= "AREA:var1" . "#BAFFF8 ";

$def[1] .= "GPRINT:var1:LAST:\"%3.4lg %s$UNIT[1] LAST \" ";
$def[1] .= "GPRINT:var1:MAX:\"%3.4lg %s$UNIT[1] MAX \" ";
$def[1] .= "GPRINT:var1:AVERAGE:\"%3.4lg %s$UNIT[1] AVERAGE \" ";


# Draw warning and crit
if (isset($WARN[1]) && $WARN[1] != "") {
$def[1] .= "HRULE:$WARN[1]#FFFF00:\"Warning ($NAME[1])\: " . $WARN[1] . " " . $UNIT[1] . " \\n\" " ;
}

if (isset($CRIT[1]) && $CRIT[1] != "") {
$def[1] .= "HRULE:$CRIT[1]#FF0000:\"Critical ($NAME[1])\: " . $CRIT[1] . " " . $UNIT[1] . " \\n\" " ;
}
?>