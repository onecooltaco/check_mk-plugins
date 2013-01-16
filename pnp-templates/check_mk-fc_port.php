<?php
# Performance data from check:
# C3InFrames=44.520512;;;;
# C3OutFrames=1845.158429;;;;
# C3InOctets=27161.985972;;;;
# C3OutOctets=3819274.882924;;;;

# C3Discards=0;;;;
# LinkFailures=0;;;;
# SyncLosses=0;;;;
# PrimSeqProtoErrors=0;;;;
# InvalidTxWords=0;;;;
# InvalidCrcs=0;;;;
# AddressIdErrors=0;;;;
# LinkResetIns=0;;;;
# LinkResetOuts=0;;;;
# OlsIns=0;;;;
# OlsOuts=0;;;;

# Graph 1: frames

# Change multiplier and labels
$ds_name[1] = 'Frames';
$opt[1] = "--imgformat=PNG --title \"Traffic $hostname / $servicedesc\" --base=1000 --slope-mode ";
#
$def[1]  = "";
$def[1] .= "DEF:in_f=$RRDFILE[1]:$DS[1]:AVERAGE " ;
$def[1] .= "DEF:out_f=$RRDFILE[2]:$DS[1]:AVERAGE " ;
$def[1] .= "CDEF:framesin=in_f ";
$def[1] .= "CDEF:framesout=out_f ";

# Draw fill area under line
$def[1] .= "AREA:framesin" . "#33CC33:\"$NAME[1]\t\" ";

# write out averages
$def[1] .= "GPRINT:framesin:LAST:\"%3.4lg %s$UNIT[1] LAST \" ";
$def[1] .= "GPRINT:framesin:AVERAGE:\"%3.4lg %s$UNIT[1] AVERAGE \" ";
$def[1] .= "GPRINT:framesin:MAX:\"%3.4lg %s$UNIT[1] MAX\\n\" ";


$def[1] .= "LINE2:framesout" . "#0000CC:\"$NAME[2]\t\" ";

$def[1] .= "GPRINT:framesout:LAST:\"%3.4lg %s$UNIT[2] LAST \" ";
$def[1] .= "GPRINT:framesout:AVERAGE:\"%3.4lg %s$UNIT[2] AVERAGE \" ";
$def[1] .= "GPRINT:framesout:MAX:\"%3.4lg %s$UNIT[2] MAX\\n\" ";

# Graph 2: used bandwidth
$ds_name[2] = 'Used Bandwidth';
$opt[2] = "--imgformat=PNG --title \"Traffic $hostname / $servicedesc\" --base=1024 --slope-mode ";
#
$def[2]  = "";
$def[2] .= "DEF:in_oct=$RRDFILE[3]:$DS[1]:AVERAGE " ;
$def[2] .= "DEF:out_oct=$RRDFILE[4]:$DS[1]:AVERAGE " ;
$def[2] .= "CDEF:octetsin=in_oct ";
$def[2] .= "CDEF:octetsout=out_oct ";

# Draw fill area under line
$def[2] .= "AREA:octetsin" . "#33CC33:\"$NAME[3]\t\" ";

# write out averages
$def[2] .= "GPRINT:octetsin:LAST:\"%3.4lg %s$UNIT[3] LAST \" ";
$def[2] .= "GPRINT:octetsin:AVERAGE:\"%3.4lg %s$UNIT[3] AVERAGE \" ";
$def[2] .= "GPRINT:octetsin:MAX:\"%3.4lg %s$UNIT[3] MAX\\n\" ";

$def[2] .= "LINE2:octetsout" . "#0000CCFF:\"$NAME[4]\t\" ";

$def[2] .= "GPRINT:octetsout:LAST:\"%3.4lg %s$UNIT[4] LAST \" ";
$def[2] .= "GPRINT:octetsout:AVERAGE:\"%3.4lg %s$UNIT[4] AVERAGE \" ";
$def[2] .= "GPRINT:octetsout:MAX:\"%3.4lg %s$UNIT[4] MAX\\n\" ";

# Graph 3: errors and discards
$ds_name[3] = 'Errors and Discards';
$opt[3] = "--imgformat=PNG --title \"Errors $hostname / $servicedesc\" --base=1024 --slope-mode ";
#
$def[3]  = "";
$def[3] .= "DEF:var1=$RRDFILE[5]:$DS[1]:AVERAGE " ;
$def[3] .= "DEF:var2=$RRDFILE[6]:$DS[1]:AVERAGE " ;
$def[3] .= "DEF:var3=$RRDFILE[7]:$DS[1]:AVERAGE " ;
$def[3] .= "DEF:var4=$RRDFILE[8]:$DS[1]:AVERAGE " ;
$def[3] .= "DEF:var5=$RRDFILE[9]:$DS[1]:AVERAGE " ;
$def[3] .= "DEF:var6=$RRDFILE[10]:$DS[1]:AVERAGE " ;
$def[3] .= "DEF:var7=$RRDFILE[11]:$DS[1]:AVERAGE " ;
$def[3] .= "DEF:var8=$RRDFILE[12]:$DS[1]:AVERAGE " ;
$def[3] .= "DEF:var9=$RRDFILE[13]:$DS[1]:AVERAGE " ;
$def[3] .= "DEF:var10=$RRDFILE[14]:$DS[1]:AVERAGE " ;
$def[3] .= "DEF:var11=$RRDFILE[15]:$DS[1]:AVERAGE " ;

$def[3] .= "CDEF:c3discards=var1 ";
$def[3] .= "CDEF:linkfailures=var2 ";
$def[3] .= "CDEF:synclosses=var3 ";
$def[3] .= "CDEF:primseqprotoerrors=var4 ";
$def[3] .= "CDEF:invalidtxwords=var5 ";
$def[3] .= "CDEF:invalidcrcs=var6 ";
$def[3] .= "CDEF:addressiderrors=var7 ";
$def[3] .= "CDEF:linkresetins=var8 ";
$def[3] .= "CDEF:linkresetouts=var9 ";
$def[3] .= "CDEF:olsins=var10 ";
$def[3] .= "CDEF:olsouts=var11 ";

# Draw fill area under line
$def[3] .= "LINE1:c3discards" . "#33CC33:\"$NAME[5]\t\" ";

# write out averages
$def[3] .= "GPRINT:c3discards:LAST:\"%3.4lg %s$UNIT[5] LAST \" ";
$def[3] .= "GPRINT:c3discards:AVERAGE:\"%3.4lg %s$UNIT[5] AVERAGE \" ";
$def[3] .= "GPRINT:c3discards:MAX:\"%3.4lg %s$UNIT[5] MAX\\n\" ";

##
$def[3] .= "LINE2:linkfailures" . "#0000FF:\"$NAME[6]\t\" ";

$def[3] .= "GPRINT:linkfailures:LAST:\"%3.4lg %s$UNIT[6] LAST \" ";
$def[3] .= "GPRINT:linkfailures:AVERAGE:\"%3.4lg %s$UNIT[6] AVERAGE \" ";
$def[3] .= "GPRINT:linkfailures:MAX:\"%3.4lg %s$UNIT[6] MAX\\n\" ";
##
$def[3] .= "LINE2:synclosses" . "#330066:\"$NAME[7]\t\" ";

$def[3] .= "GPRINT:synclosses:LAST:\"%3.4lg %s$UNIT[7] LAST \" ";
$def[3] .= "GPRINT:synclosses:AVERAGE:\"%3.4lg %s$UNIT[7] AVERAGE \" ";
$def[3] .= "GPRINT:synclosses:MAX:\"%3.4lg %s$UNIT[7] MAX\\n\" ";
##
$def[3] .= "LINE2:primseqprotoerrors" . "#4D0099:\"$NAME[8]\t\" ";

$def[3] .= "GPRINT:primseqprotoerrors:LAST:\"%3.4lg %s$UNIT[8] LAST \" ";
$def[3] .= "GPRINT:primseqprotoerrors:AVERAGE:\"%3.4lg %s$UNIT[8] AVERAGE \" ";
$def[3] .= "GPRINT:primseqprotoerrors:MAX:\"%3.4lg %s$UNIT[8] MAX\\n\" ";
##
$def[3] .= "LINE2:invalidtxwords" . "#99004D:\"$NAME[9]\t\" ";

$def[3] .= "GPRINT:invalidtxwords:LAST:\"%3.4lg %s$UNIT[9] LAST \" ";
$def[3] .= "GPRINT:invalidtxwords:AVERAGE:\"%3.4lg %s$UNIT[9] AVERAGE \" ";
$def[3] .= "GPRINT:invalidtxwords:MAX:\"%3.4lg %s$UNIT[9] MAX\\n\" ";
##
$def[3] .= "LINE2:invalidcrcs" . "#990099:\"$NAME[10]\t\" ";

$def[3] .= "GPRINT:invalidcrcs:LAST:\"%3.4lg %s$UNIT[10] LAST \" ";
$def[3] .= "GPRINT:invalidcrcs:AVERAGE:\"%3.4lg %s$UNIT[10] AVERAGE \" ";
$def[3] .= "GPRINT:invalidcrcs:MAX:\"%3.4lg %s$UNIT[10] MAX\\n\" ";
##
$def[3] .= "LINE2:addressiderrors" . "#FF0066:\"$NAME[11]\t\" ";

$def[3] .= "GPRINT:addressiderrors:LAST:\"%3.4lg %s$UNIT[11] LAST \" ";
$def[3] .= "GPRINT:addressiderrors:AVERAGE:\"%3.4lg %s$UNIT[11] AVERAGE \" ";
$def[3] .= "GPRINT:addressiderrors:MAX:\"%3.4lg %s$UNIT[11] MAX\\n\" ";
##
$def[3] .= "LINE2:linkresetins" . "#D600D6:\"$NAME[12]\t\" ";

$def[3] .= "GPRINT:linkresetins:LAST:\"%3.4lg %s$UNIT[12] LAST \" ";
$def[3] .= "GPRINT:linkresetins:AVERAGE:\"%3.4lg %s$UNIT[12] AVERAGE \" ";
$def[3] .= "GPRINT:linkresetins:MAX:\"%3.4lg %s$UNIT[12] MAX\\n\" ";
##
$def[3] .= "LINE2:linkresetouts" . "#FF1A00:\"$NAME[13]\t\" ";

$def[3] .= "GPRINT:linkresetouts:LAST:\"%3.4lg %s$UNIT[13] LAST \" ";
$def[3] .= "GPRINT:linkresetouts:AVERAGE:\"%3.4lg %s$UNIT[13] AVERAGE \" ";
$def[3] .= "GPRINT:linkresetouts:MAX:\"%3.4lg %s$UNIT[13] MAX\\n\" ";
##
$def[3] .= "LINE2:olsins" . "#009900:\"$NAME[14]\t\" ";

$def[3] .= "GPRINT:olsins:LAST:\"%3.4lg %s$UNIT[14] LAST \" ";
$def[3] .= "GPRINT:olsins:AVERAGE:\"%3.4lg %s$UNIT[14] AVERAGE \" ";
$def[3] .= "GPRINT:olsins:MAX:\"%3.4lg %s$UNIT[14] MAX\\n\" ";
##
$def[3] .= "LINE2:olsouts" . "#FF9900:\"$NAME[15]\t\" ";

$def[3] .= "GPRINT:olsouts:LAST:\"%3.4lg %s$UNIT[15] LAST \" ";
$def[3] .= "GPRINT:olsouts:AVERAGE:\"%3.4lg %s$UNIT[15] AVERAGE \" ";
$def[3] .= "GPRINT:olsouts:MAX:\"%3.4lg %s$UNIT[15] MAX\\n\" ";

?>
