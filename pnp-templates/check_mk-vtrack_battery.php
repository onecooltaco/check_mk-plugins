<?php
######### Battery_Temperature
$opt[1] = "--imgformat=PNG --title \"$hostname / $servicedesc\" --slope-mode ";
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

######### RemainCapacity
$opt[2] = "--imgformat=PNG --title \"$hostname / $servicedesc\" --slope-mode ";
#
$def[2] =  "DEF:ds1=$RRDFILE[2]:$DS[2]:AVERAGE " ;
$def[2] .= "CDEF:var1=ds1 ";

# Draw line
$def[2] .= "LINE1:var1" . "#00555E" . "FF:\"$NAME[2]\t\" ";
# Draw area under line
$def[2] .= "AREA:var1" . "#BAFFF8 ";

$def[2] .= "GPRINT:var1:LAST:\"%3.4lg %s$UNIT[2] LAST \" ";
$def[2] .= "GPRINT:var1:MAX:\"%3.4lg %s$UNIT[2] MAX \" ";
$def[2] .= "GPRINT:var1:AVERAGE:\"%3.4lg %s$UNIT[2] AVERAGE \" ";


# Draw warning and crit
if (isset($WARN[2]) && $WARN[2] != "") {
$def[2] .= "HRULE:$WARN[2]#FFFF00:\"Warning ($NAME[2])\: " . $WARN[2] . " " . $UNIT[2] . " \\n\" " ;
}

if (isset($CRIT[2]) && $CRIT[2] != "") {
$def[2] .= "HRULE:$CRIT[2]#FF0000:\"Critical ($NAME[2])\: " . $CRIT[2] . " " . $UNIT[2] . " \\n\" " ;
}

######### Battery_Voltage
$opt[3] = "--imgformat=PNG --title \"$hostname / $servicedesc\" --slope-mode ";
#
$def[3] =  "DEF:ds1=$RRDFILE[3]:$DS[3]:AVERAGE " ;
$def[3] .= "CDEF:var1=ds1 ";

# Draw line
$def[3] .= "LINE1:var1" . "#00555E" . "FF:\"$NAME[3]\t\" ";
# Draw area under line
$def[3] .= "AREA:var1" . "#BAFFF8 ";

$def[3] .= "GPRINT:var1:LAST:\"%3.4lg %s$UNIT[3] LAST \" ";
$def[3] .= "GPRINT:var1:MAX:\"%3.4lg %s$UNIT[3] MAX \" ";
$def[3] .= "GPRINT:var1:AVERAGE:\"%3.4lg %s$UNIT[3] AVERAGE \" ";


# Draw warning and crit
if (isset($WARN[3]) && $WARN[3] != "") {
$def[3] .= "HRULE:$WARN[1]#FFFF00:\"Warning ($NAME[3])\: " . $WARN[3] . " " . $UNIT[3] . " \\n\" " ;
}

if (isset($CRIT[3]) && $CRIT[3] != "") {
$def[3] .= "HRULE:$CRIT[1]#FF0000:\"Critical ($NAME[3])\: " . $CRIT[3] . " " . $UNIT[3] . " \\n\" " ;
}

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


# Draw warning and crit
if (isset($WARN[4]) && $WARN[4] != "") {
$def[4] .= "HRULE:$WARN[1]#FFFF00:\"Warning ($NAME[4])\: " . $WARN[4] . " " . $UNIT[4] . " \\n\" " ;
}

if (isset($CRIT[4]) && $CRIT[4] != "") {
$def[4] .= "HRULE:$CRIT[1]#FF0000:\"Critical ($NAME[4])\: " . $CRIT[4] . " " . $UNIT[4] . " \\n\" " ;
}

?>