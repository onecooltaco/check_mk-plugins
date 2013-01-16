<?php
# labels
$ds_name[1] = 'Data Transferred';

$opt[1] = "--imgformat=PNG --title \"Data Transferred For $hostname / $servicedesc\" --slope-mode ";
# Assign data types and create data sets
$def[1] =  "DEF:ds_trans=$RRDFILE[1]:$DS[1]:AVERAGE " ;
$def[1] .=  "DEF:ds_rtrans=$RRDFILE[2]:$DS[1]:AVERAGE " ;
$def[1] .=  "DEF:ds_wtrans=$RRDFILE[3]:$DS[1]:AVERAGE " ;
$def[1] .= "CDEF:datatransferrd=ds_trans ";
$def[1] .= "CDEF:readdatatransferred=ds_rtrans ";
$def[1] .= "CDEF:writedatatransferrd=ds_wtrans ";

# Draw fill area under line
$def[1] .= "AREA:datatransferrd" . "#33CC33:\"$NAME[1]\t\" ";

# write out averages
$def[1] .= "GPRINT:datatransferrd:LAST:\"%3.4lg %s$UNIT[1] LAST \" ";
$def[1] .= "GPRINT:datatransferrd:MAX:\"%3.4lg %s$UNIT[1] MAX \" ";
$def[1] .= "GPRINT:datatransferrd:AVERAGE:\"%3.4lg %s$UNIT[1] AVERAGE\\n\" ";

# Draw lines
$def[1] .= "LINE2:readdatatransferred" . "#0000CC:\"$NAME[2]\t\" ";
$def[1] .= "GPRINT:readdatatransferred:LAST:\"%3.4lg %s$UNIT[2] LAST \" ";
$def[1] .= "GPRINT:readdatatransferred:MAX:\"%3.4lg %s$UNIT[2] MAX \" ";
$def[1] .= "GPRINT:readdatatransferred:AVERAGE:\"%3.4lg %s$UNIT[2] AVERAGE\\n\" ";

$def[1] .= "LINE3:writedatatransferrd" . "#FF8000:\"$NAME[3]\t\" ";
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

# Requests
$ds_name[2] = 'Requests';
$opt[2] = "--imgformat=PNG --title \"Requests For $hostname / $servicedesc\" --slope-mode ";
# Assign data types and create data sets
$def[2] =  "DEF:ds_io=$RRDFILE[8]:$DS[1]:AVERAGE " ;
$def[2] .=  "DEF:ds_nonrw=$RRDFILE[9]:$DS[1]:AVERAGE " ;
$def[2] .=  "DEF:ds_r=$RRDFILE[10]:$DS[1]:AVERAGE " ;
$def[2] .=  "DEF:ds_w=$RRDFILE[11]:$DS[1]:AVERAGE " ;
$def[2] .= "CDEF:io_requests=ds_io ";
$def[2] .= "CDEF:non_requests=ds_nonrw ";
$def[2] .= "CDEF:r_requests=ds_r ";
$def[2] .= "CDEF:w_requests=ds_w ";

# Draw fill area under line
$def[2] .= "AREA:io_requests" . "#33CC33:\"$NAME[8]\t\" ";

# write out averages
$def[2] .= "GPRINT:io_requests:LAST:\"%3.4lg %s$UNIT[8] LAST \" ";
$def[2] .= "GPRINT:io_requests:MAX:\"%3.4lg %s$UNIT[8] MAX \" ";
$def[2] .= "GPRINT:io_requests:AVERAGE:\"%3.4lg %s$UNIT[8] AVERAGE\\n\" ";

# Draw lines
$def[2] .= "LINE2:non_requests" . "#0000CC:\"$NAME[9]\t\" ";
$def[2] .= "GPRINT:non_requests:LAST:\"%3.4lg %s$UNIT[9] LAST \" ";
$def[2] .= "GPRINT:non_requests:MAX:\"%3.4lg %s$UNIT[9] MAX \" ";
$def[2] .= "GPRINT:non_requests:AVERAGE:\"%3.4lg %s$UNIT[9] AVERAGE\\n\" ";

$def[2] .= "LINE3:r_requests" . "#FF8000:\"$NAME[10]\t\" ";
$def[2] .= "GPRINT:r_requests:LAST:\"%3.4lg %s$UNIT[10] LAST \" ";
$def[2] .= "GPRINT:r_requests:MAX:\"%3.4lg %s$UNIT[10] MAX \" ";
$def[2] .= "GPRINT:r_requests:AVERAGE:\"%3.4lg %s$UNIT[10] AVERAGE\\n\" ";

$def[2] .= "LINE3:w_requests" . "#FF8000:\"$NAME[11]\t\" ";
$def[2] .= "GPRINT:w_requests:LAST:\"%3.4lg %s$UNIT[11] LAST \" ";
$def[2] .= "GPRINT:w_requests:MAX:\"%3.4lg %s$UNIT[11] MAX \" ";
$def[2] .= "GPRINT:w_requests:AVERAGE:\"%3.4lg %s$UNIT[11] AVERAGE\\n\" ";

# Errors
$ds_name[3] = 'Errors';
$opt[3] = "--imgformat=PNG --title \"Errors For $hostname / $servicedesc\" --slope-mode ";
# Assign data types and create data sets
$def[3] =  "DEF:ds_e=$RRDFILE[4]:$DS[1]:AVERAGE " ;
$def[3] .=  "DEF:ds_nonrwe=$RRDFILE[5]:$DS[1]:AVERAGE " ;
$def[3] .=  "DEF:ds_re=$RRDFILE[6]:$DS[1]:AVERAGE " ;
$def[3] .=  "DEF:ds_we=$RRDFILE[7]:$DS[1]:AVERAGE " ;
$def[3] .= "CDEF:numerrors=ds_e ";
$def[3] .= "CDEF:nonrwerrors=ds_nonrwe ";
$def[3] .= "CDEF:rerrors=ds_re ";
$def[3] .= "CDEF:werrors=ds_we ";

# Draw fill area under line
$def[3] .= "AREA:numerrors" . "#33CC33:\"$NAME[4]\t\" ";

# write out averages
$def[3] .= "GPRINT:numerrors:LAST:\"%3.4lg %s$UNIT[4] LAST \" ";
$def[3] .= "GPRINT:numerrors:MAX:\"%3.4lg %s$UNIT[4] MAX \" ";
$def[3] .= "GPRINT:numerrors:AVERAGE:\"%3.4lg %s$UNIT[4] AVERAGE\\n\" ";

# Draw lines
$def[3] .= "LINE2:nonrwerrors" . "#0000CC:\"$NAME[5]\t\" ";
$def[3] .= "GPRINT:nonrwerrors:LAST:\"%3.4lg %s$UNIT[5] LAST \" ";
$def[3] .= "GPRINT:nonrwerrors:MAX:\"%3.4lg %s$UNIT[5] MAX \" ";
$def[3] .= "GPRINT:nonrwerrors:AVERAGE:\"%3.4lg %s$UNIT[5] AVERAGE\\n\" ";

$def[3] .= "LINE3:rerrors" . "#FF8000:\"$NAME[6]\t\" ";
$def[3] .= "GPRINT:rerrors:LAST:\"%3.4lg %s$UNIT[6] LAST \" ";
$def[3] .= "GPRINT:rerrors:MAX:\"%3.4lg %s$UNIT[6] MAX \" ";
$def[3] .= "GPRINT:rerrors:AVERAGE:\"%3.4lg %s$UNIT[6] AVERAGE\\n\" ";

$def[3] .= "LINE3:werrors" . "#FF8000:\"$NAME[7]\t\" ";
$def[3] .= "GPRINT:werrors:LAST:\"%3.4lg %s$UNIT[7] LAST \" ";
$def[3] .= "GPRINT:werrors:MAX:\"%3.4lg %s$UNIT[7] MAX \" ";
$def[3] .= "GPRINT:werrors:AVERAGE:\"%3.4lg %s$UNIT[7] AVERAGE\\n\" ";

# Graph 4: Cache

$ds_name[4] = 'Cache';
$opt[4] = "--imgformat=PNG --title \"Cache $hostname / $servicedesc\" --base=1000 --slope-mode ";
#
$def[4]  = "";
$def[4] .= "DEF:cused=$RRDFILE[14]:$DS[1]:AVERAGE " ;
$def[4] .= "DEF:cdirty=$RRDFILE[15]:$DS[1]:AVERAGE " ;
$def[4] .= "CDEF:cacheused=cused ";
$def[4] .= "CDEF:cachedirty=cdirty ";

# Draw fill area under line
$def[4] .= "AREA:cacheused" . "#33CC33:\"$NAME[14]\t\" ";

# write out averages
$def[4] .= "GPRINT:cacheused:LAST:\"%3.4lg %s$UNIT[14] LAST \" ";
$def[4] .= "GPRINT:cacheused:AVERAGE:\"%3.4lg %s$UNIT[14] AVERAGE \" ";
$def[4] .= "GPRINT:cacheused:MAX:\"%3.4lg %s$UNIT[14] MAX\\n\" ";

$def[4] .= "LINE2:cachedirty" . "#0000CC:\"$NAME[15]\t\" ";

$def[4] .= "GPRINT:cachedirty:LAST:\"%3.4lg %s$UNIT[15] LAST \" ";
$def[4] .= "GPRINT:cachedirty:AVERAGE:\"%3.4lg %s$UNIT[15] AVERAGE \" ";
$def[4] .= "GPRINT:cachedirty:MAX:\"%3.4lg %s$UNIT[15] MAX\\n\" ";

# Graph 5: Stats Time

# Change multiplier and labels
$ds_name[5] = 'Stats Collection Time';
$opt[5] = "--imgformat=PNG --title \"Collection Times $hostname / $servicedesc\" --base=1000 --slope-mode ";
#
$def[5]  = "";
$def[5] .= "DEF:stime=$RRDFILE[12]:$DS[1]:AVERAGE " ;
$def[5] .= "DEF:sctime=$RRDFILE[13]:$DS[1]:AVERAGE " ;
$def[5] .= "CDEF:statstime=stime ";
$def[5] .= "CDEF:statscollection=sctime ";

# Draw fill area under line
$def[5] .= "AREA:statstime" . "#33CC33:\"$NAME[12]\t\" ";

# write out averages
$def[5] .= "GPRINT:statstime:LAST:\"%3.4lg %s$UNIT[12] LAST \" ";
$def[5] .= "GPRINT:statstime:AVERAGE:\"%3.4lg %s$UNIT[12] AVERAGE \" ";
$def[5] .= "GPRINT:statstime:MAX:\"%3.4lg %s$UNIT[12] MAX\\n\" ";

$def[5] .= "LINE2:statscollection" . "#0000CC:\"$NAME[13]\t\" ";

$def[5] .= "GPRINT:statscollection:LAST:\"%3.4lg %s$UNIT[13] LAST \" ";
$def[5] .= "GPRINT:statscollection:AVERAGE:\"%3.4lg %s$UNIT[13] AVERAGE \" ";
$def[5] .= "GPRINT:statscollection:MAX:\"%3.4lg %s$UNIT[13] MAX\\n\" ";

# Graph 6: up time

# Change multiplier and labels
$ds_name[6] = 'Power on Hours';
$opt[6] = "--imgformat=PNG --title \"Uptime $hostname / $servicedesc\" --base=1000 --slope-mode ";
#
$def[6]  = "";
$def[6] .= "DEF:up=$RRDFILE[16]:$DS[1]:AVERAGE " ;
$def[6] .= "CDEF:uptime=up ";

# Draw fill area under line
$def[6] .= "AREA:uptime" . "#33CC33:\"$NAME[16]\t\" ";

?>
