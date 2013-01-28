def perfometer_check_mk_lamp(row, check_command, perf_data):
    left = float(perf_data[0][1])
    crit = float(perf_data[0][4])
    warn = crit*0.85
    if left < warn:
        color = "#00ff00"
    elif left < crit:
        color = "#ffff00"
    else:
        color = "#ff0000"
    perc = (left / crit) * 100
    return "%.0f%%" % perc, perfometer_linear(perc, color)

perfometers["check_mk-sony_vpl_lamp"] = perfometer_check_mk_lamp
perfometers["check_mk-sony_srx_lamp"] = perfometer_check_mk_lamp
