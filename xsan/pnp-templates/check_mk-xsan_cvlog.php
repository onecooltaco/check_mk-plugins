<?php
# labels
$ds_name[1] = 'Write Latency';

$opt[1] = "--imgformat=PNG --title \"Lag For $hostname / $servicedesc\" --slope-mode ";
# Assign data types and create data sets
$def[1] =  "DEF:ds_trans=$RRDFILE[1]:$DS[1]:AVERAGE " ;
$def[1] .=  "DEF:ds_rtrans=$RRDFILE[2]:$DS[1]:AVERAGE " ;
$def[1] .=  "DEF:ds_wtrans=$RRDFILE[3]:$DS[1]:AVERAGE " ;
$def[1] .= "CDEF:datatransferrd=ds_trans ";
$def[1] .= "CDEF:readdatatransferred=ds_rtrans ";
$def[1] .= "CDEF:writedatatransferrd=ds_wtrans ";

# Draw fill area under line
$def[1] .= "AREA:datatransferrd" . "#DCDCDC:\"$NAME[1]\t\" ";

# write out averages
$def[1] .= "GPRINT:datatransferrd:LAST:\"%3.4lg %s$UNIT[1] LAST \" ";
$def[1] .= "GPRINT:datatransferrd:MAX:\"%3.4lg %s$UNIT[1] MAX \" ";
$def[1] .= "GPRINT:datatransferrd:AVERAGE:\"%3.4lg %s$UNIT[1] AVERAGE\\n\" ";

# Draw lines
$def[1] .= "LINE1:readdatatransferred" . "#0000FF:\"$NAME[2]\t\" ";
$def[1] .= "GPRINT:readdatatransferred:LAST:\"%3.4lg %s$UNIT[2] LAST \" ";
$def[1] .= "GPRINT:readdatatransferred:MAX:\"%3.4lg %s$UNIT[2] MAX \" ";
$def[1] .= "GPRINT:readdatatransferred:AVERAGE:\"%3.4lg %s$UNIT[2] AVERAGE\\n\" ";

$def[1] .= "LINE1:writedatatransferrd" . "#FF00FF:\"$NAME[3]\t\" ";
$def[1] .= "GPRINT:writedatatransferrd:LAST:\"%3.4lg %s$UNIT[3] LAST \" ";
$def[1] .= "GPRINT:writedatatransferrd:MAX:\"%3.4lg %s$UNIT[3] MAX \" ";
$def[1] .= "GPRINT:writedatatransferrd:AVERAGE:\"%3.4lg %s$UNIT[3] AVERAGE\\n\" ";

# Draw warning and crit
if (isset($WARN[1]) && $WARN[1] != "") {
$def[1] .= "HRULE:$WARN[1]#FFFF00:\"Warning ($NAME[1])\: " . $WARN[1] . " " . $UNIT[1] . " \\n\" " ;
}

if (isset($CRIT[1]) && $CRIT[1] != "") {
$def[1] .= "HRULE:$CRIT[1]#FF0000:\"Critical ($NAME[1])\: " . $CRIT[1] . " " . $UNIT[1] . " \\n\" " ;
}

?>
