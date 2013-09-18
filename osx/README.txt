#===================================================================================
# check_mk os x
#
# A agent script for check_mk on os x systems.
# Includes Launchd item to listen on port 6556.
#
#===================================================================================

#----------------------------------------------------------------------
# Enable launchd item.
#----------------------------------------------------------------------
# sudo launchctl load -w "/Library/LaunchDaemons/de.mathias-kettner.checkmk.plist"
