#
#  An installer for check_mk agent logwatch plugin
#
#  Author:  Jeremy Leggat
#  Created: 08/26/13
#  Last Modified: 08/26/13
#
#  Description:  This Makefile will install check_mk
#  on os x systems
#
include /usr/local/share/luggage/luggage.make

TITLE=check_mk_agent_logwatch
REVERSE_DOMAIN=de.mathias-kettner.check_mk

PAYLOAD = \
	pack-mk-plugins-mk_logwatch \
	pack-mk-config-logwatch.cfg

l_etc_check_mk: l_private_etc
	@sudo mkdir -p ${WORK_D}/private/etc/check_mk
	@sudo chown -R root:wheel ${WORK_D}/private/etc/check_mk
	@sudo chmod -R 755 ${WORK_D}/private/etc/check_mk

# Make sure /usr/lib/check_mk_agent exists
l_usr_lib_check_mk_agent: l_usr_lib
	@sudo mkdir -p ${WORK_D}/usr/lib/check_mk_agent
	@sudo chown -R root:admin ${WORK_D}/usr/lib/check_mk_agent
	@sudo chmod -R 755 ${WORK_D}/usr/lib/check_mk_agent

l_usr_lib_check_mk_agent_plugins: l_usr_lib_check_mk_agent
	@sudo mkdir -p ${WORK_D}/usr/lib/check_mk_agent/plugins
	@sudo chown -R root:admin ${WORK_D}/usr/lib/check_mk_agent/plugins
	@sudo chmod -R 755 ${WORK_D}/usr/lib/check_mk_agent/plugins

# This rule installs the config directory /etc/check_mk
pack-mk-config-%: % l_etc_check_mk
	@sudo ${INSTALL} -m 644 -g wheel -o root "${<}" ${WORK_D}/private/etc/check_mk

# This rule installs any local plugins.
pack-mk-plugins-%: % l_usr_lib_check_mk_agent_plugins
	@sudo ${INSTALL} -m 755 -g wheel -o root "${<}" ${WORK_D}/usr/lib/check_mk_agent/plugins
