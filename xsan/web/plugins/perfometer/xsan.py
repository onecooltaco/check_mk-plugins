perfometers["check_mk-xsan_stat.df"] = perfometer_check_mk_df

def perfometer_check_mk_xsan_lag(row, check_command, perf_data):
    lag = float(perf_data[0][1])
    return "%d" % int(lag), perfometer_logarithmic(lag, 2000, 1.5, "#88c")

perfometers["check_mk-xsan.lag"] = perfometer_check_mk_xsan_lag
