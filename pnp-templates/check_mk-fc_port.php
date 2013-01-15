<?php
# Performance data from check:
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
# C3InFrames=44.520512;;;;
# C3OutFrames=1845.158429;;;;
# C3InOctets=27161.985972;;;;
# C3OutOctets=3819274.882924;;;;
# C3Discards=0;;;;

# Graph 1: errors and discards

# Determine if Bit or Byte.
# Change multiplier and labels
$ds_name[1] = 'Errors and discards';
$opt[1] = "--imgformat=PNG --title \"Traffic $hostname / $servicedesc\" --base=1000 --slope-mode ";
#
$def[1]  = "";
$def[1] .= "DEF:ds1=$RRDFILE[1]:$DS[1]:MAX " ;
$def[1] .= "CDEF:var1=ds1 ";
# Draw line
$def[1] .= "LINE1:var1" . "#00555E" . "FF:\"$NAME[1]\t\" ";

# Draw area under line
$def[1] .= "AREA:var1" . "#BAFFF8 ";

$def[1] .= "DEF:ds2=$RRDFILE[2]:$DS[2]:MAX " ;
$def[1] .= "CDEF:var2=ds2 ";

$def[1] .= "LINE2:var2" . "##FF0000" . "FF:\"$NAME[2]\t\" ";

$def[1] .= "GPRINT:var1:LAST:\"%3.4lg %s$UNIT[1] LAST \" ";
$def[1] .= "GPRINT:var1:MAX:\"%3.4lg %s$UNIT[1] MAX \" ";
$def[1] .= "GPRINT:var1:AVERAGE:\"%3.4lg %s$UNIT[1] AVERAGE \" ";

# Graph 2: packets

# Graph 3: used bandwidth

?>