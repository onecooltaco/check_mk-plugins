def perfometer_check_mk_lamp(row, check_command, perf_data):
    left = float(perf_data[0][1])
    crit = float(perf_data[0][4])
    warn = crit*0.85
    if left < warn:
        color = "#008000"
    elif left < crit:
        color = "#FFFF00"
    else:
        color = "#FF0000"
    perc = (left / crit) * 100
    return "%.0f%%" % perc, perfometer_linear(perc, color)

perfometers["check_mk-sony_vpl_lamp"] = perfometer_check_mk_lamp
perfometers["check_mk-sony_srx_lamp"] = perfometer_check_mk_lamp

def perfometer_check_mk_sony_power(row, check_command, perf_data):
    state = float(perf_data[0][1])
    statetxt = row["service_plugin_output"]

    if state == 0:
        color = "#FFFFFF"
    elif state == 3:
        color = "#00FF00"
    elif state == 4:
        color = "#00FFFF"
    else:
        color = "#FFA500"

    return "%s" % statetxt, perfometer_linear(100, color)

perfometers["check_mk-sony_vpl_power"] = perfometer_check_mk_sony_power
