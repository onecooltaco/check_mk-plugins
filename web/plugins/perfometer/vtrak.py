## delete when added to main
def perfometer_temperature(row, check_command, perf_data):
    state = row["service_state"]
    color = { 0: "#39f", 1: "#ff2", 2: "#f22", 3: "#fa2" }[state]
    value = float(perf_data[0][1])
    crit = savefloat(perf_data[0][4])
    return u"%dC" % int(value), perfometer_logarithmic(value, 40, 1.2, color)

def perfometer_blower(row, check_command, perf_data):
    rpm = saveint(perf_data[0][1])
    perc = rpm / 10000.0 * 100.0
    return "%d RPM" % rpm, perfometer_logarithmic(rpm, 2000, 1.5, "#88c")
##
perfometers["check_mk-vtrak_temp"] = perfometer_temperature
perfometers["check_mk-vtrak_fans"]  = perfometer_blower
perfometers["check_mk-vtrak_chassis"] = perfometer_check_mk_diskstat

def perfometer_check_mk_vtrak_battery(row, check_command, perf_data):
    bat = float(perf_data[1][1])
    if row['service_state'] == 2:
        color = '#FF0000'
    else:
        color = '#00FF00'

    return "%.0f%%" % bat, perfometer_linear(bat, color)

perfometers["check_mk-vtrak_battery"] = perfometer_check_mk_vtrak_battery

def perfometer_check_mk_vtrak_volt(row, check_command, perf_data):
    color = { 0: "#68f", 1: "#ff2", 2: "#f22", 3: "#fa2" }[row["service_state"]]
    volts = float(perf_data[0][1])
    return "%.1fV" % volts, perfometer_logarithmic(volts, 4, 2, color)

perfometers["check_mk-vtrak_voltage"] = perfometer_check_mk_vtrak_volt
