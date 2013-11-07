#
#  An installer for check_mk agent xsan plugins
#
#  Author:  Jeremy Leggat
#  Created: 08/26/13
#  Last Modified: 08/26/13
#
#  Description:  This Makefile will install check_mk
#  on os x systems
#
include /usr/local/share/luggage/luggage.make

TITLE=check_mk_agent_xsan
REVERSE_DOMAIN=de.mathias-kettner.check_mk

PAYLOAD = \
	pack-mk-plugins-xsan \
	pack-mk-plugins-xsan_cvlog


# Make sure /usr/lib/check_mk_agent exists
l_usr_lib_check_mk_agent: l_usr_lib
	@sudo mkdir -p ${WORK_D}/usr/lib/check_mk_agent
	@sudo chown -R root:admin ${WORK_D}/usr/lib/check_mk_agent
	@sudo chmod -R 755 ${WORK_D}/usr/lib/check_mk_agent

l_usr_lib_check_mk_agent_plugins: l_usr_lib_check_mk_agent
	@sudo mkdir -p ${WORK_D}/usr/lib/check_mk_agent/plugins
	@sudo chown -R root:admin ${WORK_D}/usr/lib/check_mk_agent/plugins
	@sudo chmod -R 755 ${WORK_D}/usr/lib/check_mk_agent/plugins

# This rule installs any local plugins.
pack-mk-plugins-%: plugins/% l_usr_lib_check_mk_agent_plugins
	@sudo ${INSTALL} -m 755 -g wheel -o root "${<}" ${WORK_D}/usr/lib/check_mk_agent/plugins
