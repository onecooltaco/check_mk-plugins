<?php
# +------------------------------------------------------------------+
# |             ____ _               _        __  __ _  __           |
# |            / ___| |__   ___  ___| | __   |  \/  | |/ /           |
# |           | |   | '_ \ / _ \/ __| |/ /   | |\/| | ' /            |
# |           | |___| | | |  __/ (__|   <    | |  | | . \            |
# |            \____|_| |_|\___|\___|_|\_\___|_|  |_|_|\_\           |
# |                                                                  |
# | Copyright Mathias Kettner 2012             mk@mathias-kettner.de |
# +------------------------------------------------------------------+
#
# This file is part of Check_MK.
# The official homepage is at http://mathias-kettner.de/check_mk.
#
# check_mk is free software;  you can redistribute it and/or modify it
# under the  terms of the  GNU General Public License  as published by
# the Free Software Foundation in version 2.  check_mk is  distributed
# in the hope that it will be useful, but WITHOUT ANY WARRANTY;  with-
# out even the implied warranty of  MERCHANTABILITY  or  FITNESS FOR A
# PARTICULAR PURPOSE. See the  GNU General Public License for more de-
# ails.  You should have  received  a copy of the  GNU  General Public
# License along with GNU Make; see the file  COPYING.  If  not,  write
# to the Free Software Foundation, Inc., 51 Franklin St,  Fifth Floor,
# Boston, MA 02110-1301 USA.


# The number of data source various due to different
# settings (such as averaging). We rather work with names
# than with numbers.
$RRD = array();
foreach ($NAME as $i => $n) {
    $RRD[$n] = "$RRDFILE[$i]:$DS[$i]:MAX";
    $WARN[$n] = $WARN[$i];
    $CRIT[$n] = $CRIT[$i];
    $MIN[$n] = $MIN[$i];
    $MAX[$n] = $MAX[$i];
}


# 1. GRAPH: THROUGHPUT IN MB/s

$ds_name[1] = 'Traffic';
$opt[1] = "--vertical-label \"MByte/sec\" -X0 -b 1024 --title \"Traffic for $hostname / $servicedesc\" ";

$def[1] = ""
  . "HRULE:0#c0c0c0 "
  . "DEF:in=$RRD[In] "
  . "DEF:out=$RRD[Out] "
  . "CDEF:inmb=in,1048576,/ "
  . "CDEF:outmb=out,1048576,/ "
  . "AREA:inmb#60a020:\"in \" "
  . "GPRINT:inmb:LAST:\"%5.1lf MB/s last\" "
  . "GPRINT:inmb:AVERAGE:\"%5.1lf MB/s avg\" "
  . "GPRINT:inmb:MAX:\"%5.1lf MB/s max\\n\" "
  . "CDEF:out_draw=outmb,-1,* "
  . "AREA:out_draw#2060a0:\"out \" "
  . "GPRINT:outmb:LAST:\"%5.1lf MB/s last\" "
  . "GPRINT:outmb:AVERAGE:\"%5.1lf MB/s avg\" "
  . "GPRINT:outmb:MAX:\"%5.1lf MB/s max\\n\" "
  ;

if (isset($RRD['in_avg'])) {
$def[1] .= ""
  . "DEF:inavg=$RRD[in_avg] "
  . "DEF:outavg=$RRD[out_avg] "
  . "CDEF:inavgmb=inavg,1048576,/ "
  . "CDEF:outavgmb=outavg,1048576,/ "
  . "CDEF:outavgmbdraw=outavg,-1048576,/ "
  . "LINE:inavgmb#a0d040:\"in (avg) \" "
  . "GPRINT:inavgmb:LAST:\"%5.1lf MB/s last\" "
  . "GPRINT:inavgmb:AVERAGE:\"%5.1lf MB/s avg\" "
  . "GPRINT:inavgmb:MAX:\"%5.1lf MB/s max\\n\" "
  . "LINE:outavgmbdraw#40a0d0:\"out (avg)\" "
  . "GPRINT:outavgmb:LAST:\"%5.1lf MB/s last\" "
  . "GPRINT:outavgmb:AVERAGE:\"%5.1lf MB/s avg\" "
  . "GPRINT:outavgmb:MAX:\"%5.1lf MB/s max\\n\" "
  ;
}

if ($WARN['In']) {
   $def[1] .= "HRULE:$WARN[In]#ffff00:\"Warning (In)\" ";
   $def[1] .= "HRULE:-$WARN[Out]#ffff00:\"Warning (out)\" ";
}
if ($CRIT['In']) {
   $def[1] .= "HRULE:$CRIT[In]#ff0000:\"Critical (In)\" ";
   $def[1] .= "HRULE:-$CRIT[Out]#ff0000:\"Critical (Out)\" ";
}
if ($MAX['In']) {
   $speedmb = $MAX['In'] / 1048576.0;
   $speedtxt = sprintf("%.1f MB/s", $speedmb);
   $def[1] .= "HRULE:$speedmb#ff80c0:\"Portspeed\: $speedtxt\" ";
   $def[1] .= "HRULE:-$speedmb#ff80c0 ";
   # $opt[1] .= " -u $speedmb -l -$speedmb";
}

# 2. GRAPH: FRAMES
$ds_name[2] = 'Frames';
$opt[2] = "--vertical-label \"Frames/sec\" -b 1024 --title \"Frames per second\" ";
$def[2] = ""
  . "HRULE:0#c0c0c0 "
  . "DEF:in=$RRD[inframes] "
  . "DEF:out=$RRD[outframes] "
  . "AREA:in#a0d040:\"in \" "
  . "GPRINT:in:LAST:\"%5.1lf/s last\" "
  . "GPRINT:in:AVERAGE:\"%5.1lf/s avg\" "
  . "GPRINT:in:MAX:\"%5.1lf/s max\\n\" "
  . "CDEF:out_draw=out,-1,* "
  . "AREA:out_draw#40a0d0:\"out \" "
  . "GPRINT:out:LAST:\"%5.1lf/s last\" "
  . "GPRINT:out:AVERAGE:\"%5.1lf/s avg\" "
  . "GPRINT:out:MAX:\"%5.1lf/s max\\n\" "
  ;

# 3. GRAPH: ERRORS

$ds_name[3] = 'Error counter';
$opt[3] = "--vertical-label \"Error counter\" --title \"Problems\" ";
$def[3] = ""
  . "DEF:c3discards=$RRD[C3Discards] "
  . "DEF:linkfailures=$RRD[LinkFailures] "
  . "DEF:synclosses=$RRD[SyncLosses] "
  . "DEF:primseqprotoerrors=$RRD[PrimSeqProtoErrors] "
  . "DEF:invalidtxwords=$RRD[InvalidTxWords] "
  . "DEF:invalidcrcs=$RRD[InvalidCrcs] "
  . "DEF:addressiderrors=$RRD[AddressIdErrors] "
  . "DEF:linkresetins=$RRD[LinkResetIns] "
  . "DEF:linkresetouts=$RRD[LinkResetOuts] "
  . "DEF:olsins=$RRD[OlsIns] "
  . "DEF:olsouts=$RRD[OlsOuts] "
  . "LINE1:c3discards#c00000:\"C3 Discards \" "
  . "GPRINT:c3discards:LAST:\"last\: %4.0lf/s \" "
  . "LINE1:linkfailures#ff8000:\"Link Failures \" "
  . "GPRINT:linkfailures:LAST:\"last\: %4.0lf/s\\n\" "
  . "LINE1:synclosses#ff0080:\"Sync Losses \" "
  . "GPRINT:synclosses:LAST:\"last\: %4.0lf/s \" "
  . "LINE1:primseqprotoerrors#ffa0a0:\"Prime Sequence Protocol Errors \" "
  . "GPRINT:primseqprotoerrors:LAST:\"last\: %4.0lf/s\\n\" "
  . "LINE1:invalidtxwords#33CC33:\"Invalid Text Words \" "
  . "GPRINT:invalidtxwords:LAST:\"last\: %4.0lf/s \" "
  . "LINE1:invalidcrcs#0000FF:\"Invalid CRCs \" "
  . "GPRINT:invalidcrcs:LAST:\"last\: %4.0lf/s\\n\" "
  . "LINE1:addressiderrors#330066:\"Address Id Errors \" "
  . "GPRINT:addressiderrors:LAST:\"last\: %4.0lf/s \" "
  . "LINE1:linkresetins#4D0099:\"Link Reset Ins \" "
  . "GPRINT:linkresetins:LAST:\"last\: %4.0lf/s\\n\" "
  . "LINE1:linkresetouts#99004D:\"Ols Ins \" "
  . "GPRINT:linkresetouts:LAST:\"last\: %4.0lf/s \" "
  . "LINE1:olsins#990099:\"Ols Outs\" "
  . "GPRINT:olsins:LAST:\"last\: %4.0lf/s\\n\" "
  ;
?>