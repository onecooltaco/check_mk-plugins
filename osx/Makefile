# +------------------------------------------------------------------+
# |             ____ _               _        __  __ _  __           |
# |            / ___| |__   ___  ___| | __   |  \/  | |/ /           |
# |           | |   | '_ \ / _ \/ __| |/ /   | |\/| | ' /            |
# |           | |___| | | |  __/ (__|   <    | |  | | . \            |
# |            \____|_| |_|\___|\___|_|\_\___|_|  |_|_|\_\           |
# |                                                                  |
# | Copyright Mathias Kettner 2014             mk@mathias-kettner.de |
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
#
#  An installer for check_mk agent
#
#  Author:  Jeremy Leggat
#  Created: 10/01/12
#  Last Modified: 08/26/13
#
#  Description:  This Makefile will install check_mk
#  on os x systems
#
include /usr/local/share/luggage/luggage.make

TITLE=check_mk_agent
REVERSE_DOMAIN=de.mathias-kettner.check_mk

PACKAGE_VERSION=1.2.7i4

PAYLOAD=\
	pack-script-preinstall \
	pack-usr-bin-check_mk_agent \
	pack-usr-bin-waitmax \
	pack-usr-lib-check_mk \
	pack-Library-LaunchDaemons-de.mathias-kettner.check_mk.plist \
	pack-script-postinstall

l_etc_check_mk: l_private_etc
	@sudo mkdir -p ${WORK_D}/private/etc/check_mk
	@sudo chown -R root:wheel ${WORK_D}/private/etc/check_mk
	@sudo chmod -R 755 ${WORK_D}/private/etc/check_mk

# Make sure /usr/lib/check_mk_agent exists
l_usr_lib_check_mk_agent: l_usr_lib
	@sudo mkdir -p ${WORK_D}/usr/lib/check_mk_agent
	@sudo chown -R root:admin ${WORK_D}/usr/lib/check_mk_agent
	@sudo chmod -R 755 ${WORK_D}/usr/lib/check_mk_agent

l_usr_lib_check_mk_agent_local: l_usr_lib_check_mk_agent
	@sudo mkdir -p ${WORK_D}/usr/lib/check_mk_agent/local
	@sudo chown -R root:admin ${WORK_D}/usr/lib/check_mk_agent/local
	@sudo chmod -R 755 ${WORK_D}/usr/lib/check_mk_agent/local

l_usr_lib_check_mk_agent_plugins: l_usr_lib_check_mk_agent
	@sudo mkdir -p ${WORK_D}/usr/lib/check_mk_agent/plugins
	@sudo chown -R root:admin ${WORK_D}/usr/lib/check_mk_agent/plugins
	@sudo chmod -R 755 ${WORK_D}/usr/lib/check_mk_agent/plugins

# This rule installs the config directory /etc/check_mk
pack-mk-config-%: % l_etc_check_mk
	@sudo ${INSTALL} -m 644 -g wheel -o root "${<}" ${WORK_D}/private/etc/check_mk

pack-usr-lib-check_mk: l_usr_lib_check_mk_agent_local l_usr_lib_check_mk_agent_plugins

waitmax: waitmax.c
	echo "Compiling with gcc..." ; \
	gcc -o waitmax waitmax.c ;

waitmax_clean:
	rm -rf *~ waitmax
