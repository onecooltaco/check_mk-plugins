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

PAYLOAD=\
	pack-script-preflight \
	pack-usr-bin-check_mk_agent \
	pack-usr-lib-check_mk \
	pack-Library-LaunchDaemons-de.mathias-kettner.check_mk.plist \
	pack-script-postflight

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
