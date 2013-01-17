def perfometer_check_mk_vtrack_temps(row, check_command, perf_data):
    if row['service_state'] == 0:
        color = '#00FF00'
    else:
        color = '#FF0000'
    curval = perf_data[0][1]
    perc = 100
    if perf_data[0][4] != "" and savefloat(perf_data[0][4]) != 0:
        perc = float(curval) / savefloat(perf_data[0][4]) * 100.0
    h = '<table><tr>'
    h += perfometer_td(perc, color);
    h += perfometer_td(100 - perc, '#FFF');
    h += '</tr></table>'
    return "%sC" % curval, h

perfometers["check_mk-vtrack_temp"] = perfometer_check_mk_vtrack_temps

def perfometer_check_mk_vtrack_battery(row, check_command, perf_data):
    bat = float(perf_data[1][1])
    if row['service_state'] == 0:
        color = '#00FF00'
    else:
        color = '#FF0000'

    return "%.0f%%" % bat, perfometer_linear(bat, color)

perfometers["check_mk-vtrack_battery"] = perfometer_check_mk_vtrack_battery

def perfometer_check_mk_vtrack_volt(row, check_command, perf_data):
    color = { 0: "#68f", 1: "#ff2", 2: "#f22", 3: "#fa2" }[row["service_state"]]
    volts = float(perf_data[0][1])
    return "%.1fV" % volts, perfometer_logarithmic(volts, 4, 2, color)

perfometers["check_mk-vtrack_voltage"] = perfometer_check_mk_vtrack_volt

def perfometer_check_mk_vtrack_fans(row, check_command, perf_data):
    color = { 0: "#68f", 1: "#ff2", 2: "#f22", 3: "#fa2" }[row["service_state"]]
    rpm = float(perf_data[0][1])
    return "%.1fRPM" % rpm, perfometer_logarithmic(rpm, 40, 20, color)

perfometers["check_mk-vtrack_fans"]  = perfometer_check_mk_vtrack_fans
