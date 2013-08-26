<?php

#
# 2012-07-09 FLX f@qsol.ro
# 	- Adapted from Apache.CPU Usage: rq=1, idle=2, total
#
#

# -b1024 : base unit, use to scale memory. For traffic measurement, 1 kb/s is 1000 b/s.
# -X6    : sets the 10**exponent scaling of the y-axis values
# -l0    : lower-limit value
#$opt[$idx] = "--vertical-label MBytes/s -b1024 -X6 -l0 --title \"Apache Traffic\" ";


$idx = 1;
$opt[$idx] = "--vertical-label 'Connections' -b1000 -l0 --title \"Nginx Connections for $hostname\" ";
$def[$idx]  =  "DEF:crt_reading=$RRDFILE[1]:$DS[1]:AVERAGE " ;
$def[$idx] .=  "DEF:crt_writing=$RRDFILE[2]:$DS[2]:AVERAGE " ;
$def[$idx] .=  "DEF:crt_waiting=$RRDFILE[3]:$DS[3]:AVERAGE " ;
$def[$idx] .=  "CDEF:total=crt_reading,crt_writing,crt_waiting,+,+ ";

$def[$idx] .= "AREA:crt_writing#ff6000:\"Writing\" " ;
$def[$idx] .= "GPRINT:crt_writing:LAST:\"%9.0lf%S last\" " ;
$def[$idx] .= "GPRINT:crt_writing:AVERAGE:\"%9.0lf%S avg\" " ;
$def[$idx] .= "GPRINT:crt_writing:MAX:\"%9.0lf%S max\\n\" ";

$def[$idx] .= "AREA:crt_reading#60f020:\"Reading\":STACK " ;
$def[$idx] .= "GPRINT:crt_reading:LAST:\"%9.0lf%S last\" " ;
$def[$idx] .= "GPRINT:crt_reading:AVERAGE:\"%9.0lf%S avg\" " ;
$def[$idx] .= "GPRINT:crt_reading:MAX:\"%9.0lf%S max\\n\" ";

$def[$idx] .= "AREA:crt_waiting#00b0c0:\"Waiting\":STACK " ;
$def[$idx] .= "GPRINT:crt_waiting:LAST:\"%9.0lf%S last\" " ;
$def[$idx] .= "GPRINT:crt_waiting:AVERAGE:\"%9.0lf%S avg\" " ;
$def[$idx] .= "GPRINT:crt_waiting:MAX:\"%9.0lf%S max\\n\" ";


$def[$idx] .= "LINE:total#004080:\"Active \" " ;
$def[$idx] .= "GPRINT:total:LAST:\"%9.0lf%S last\" " ;
$def[$idx] .= "GPRINT:total:AVERAGE:\"%9.0lf%S avg\" " ;
$def[$idx] .= "GPRINT:total:MAX:\"%9.0lf%S max\\n\" ";



?>
