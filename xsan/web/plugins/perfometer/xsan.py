perfometers["check_mk-xsan_stat.df"] = perfometer_check_mk_df

def perfometer_check_mk_xsan_stat_info(row, check_command, perf_data):
	color = { 0: "#6fc", 1: "#ffc", 2: "#f66", 3: "#fc0" }[row["service_state"]]
	return "%d" % int(perf_data[0][1]), perfometer_logarithmic(perf_data[0][1], 20, 2, color)

perfometers["check_mk-xsan_stat.info"] = perfometer_check_mk_xsan_stat_info

def perfometer_check_mk_xsan_cvlog(row, check_command, perf_data):
    lag = float(perf_data[0][1])
    return "%d" % int(lag), perfometer_logarithmic(lag, 2000, 1.5, "#88c")

perfometers["check_mk-xsan_cvlog"] = perfometer_check_mk_xsan_cvlog
