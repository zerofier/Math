from matplotlib import pyplot, gridspec, animation
import math
import numpy as np
import datetime


def draw(frame):
    print(datetime.datetime.now(), frame)


if __name__ == '__main__':
    G = 9.80665    # m/s²
    r = 0.05       # m
    rho = 1.293    # kg/m³
    Fe = 7870.0    # kg/m³
    C = 0.34       #
    v0 = 213.0     # m/s
    angle = 45.0   #
    v0_y = math.sin(math.pi * angle / 180.0) * v0

    S = 2.0 * math.pi * (r ** 2.0)
    m = (4.0 * math.pi * (r ** 3.0) / 3.0) * Fe
    P = rho * S * C / 2.0 / m

    sqrt_g_p = math.sqrt(G / P)
    sqrt_p_g = math.sqrt(P / G)
    sqrt_gp = math.sqrt(G * P)

    c0 = math.atan(sqrt_p_g * v0_y)
    top = c0 / sqrt_gp

    t1 = np.arange(0, top + 0.0001, 0.0001)
    t2 = np.arange(t1[-1:], 100, 0.0001)

    print(t1[-1:])

    y1_0 = [-sqrt_g_p * math.tan(sqrt_gp * x - c0) for x in t1]
    y2_0 = [math.log(math.cos(sqrt_gp * x) + sqrt_p_g * v0_y * math.sin(sqrt_gp * x)) / P for x in t1]

    fig = pyplot.figure(constrained_layout=True)
    gs = gridspec.GridSpec(2, 1, figure=fig)
    ax1 = fig.add_subplot(gs[0, 0])
    ax1.plot(t1, y1_0, color="#0000FF", linewidth=0.5)
    ax1.set_xlabel('time [s]')
    ax1.set_ylabel('velocity [m/s]')
    ax1.set_xlim(0, max(t1) * 1.1)
    ax1.set_ylim(min(y1_0) * 1.1, max(y1_0) * 1.1)

    ax2 = fig.add_subplot(gs[1, 0])
    ax2.plot(t1, y2_0, color="#FF0000", linewidth=0.5)
    ax2.set_xlabel('time [s]')
    ax2.set_ylabel('distance [m]')
    ax2.set_xlim(0, max(t1) * 1.1)
    ax2.set_ylim(0, max(y2_0) * 1.1)

    pyplot.show()

