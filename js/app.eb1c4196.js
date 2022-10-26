(() => {
    "use strict";
    var e = {
            4647: (e, t, r) => {
                r(8964), r(702);
                var o = r(1957),
                    n = r(2774),
                    a = r(499),
                    i = r(9835);

                function l(e, t, r, o, n, a) {
                    const l = (0, i.up)("router-view");
                    return (0, i.wg)(), (0, i.j4)(l)
                }
                const s = (0, i.aZ)({
                    name: "App"
                });
                var u = r(1639);
                const c = (0, u.Z)(s, [
                        ["render", l]
                    ]),
                    d = c;
                var p = r(1502),
                    f = r(3340),
                    h = r(8339);
                const v = [{
                        path: "/",
                        component: () => Promise.all([r.e(736), r.e(745)]).then(r.bind(r, 2745)),
                        children: [{
                            path: "",
                            component: () => Promise.all([r.e(736), r.e(944)]).then(r.bind(r, 1944))
                        }]
                    }, {
                        path: "/first_quasar",
                        component: () => Promise.all([r.e(736), r.e(846)]).then(r.bind(r, 8846)),
                        children: [{
                            path: "",
                            component: () => Promise.all([r.e(736), r.e(944)]).then(r.bind(r, 1944))
                        }]
                    }, {
                        path: "/playground/live_chat/live_chat/client/dist/spa/:catchAll(.*)*",
                        component: () => Promise.all([r.e(736), r.e(862)]).then(r.bind(r, 1862))
                    }],
                    m = v,
                    b = (0, f.BC)((function() {
                        const e = h.PO,
                            t = (0, h.p7)({
                                scrollBehavior: () => ({
                                    left: 0,
                                    top: 0
                                }),
                                routes: m,
                                history: e("/")
                            });
                        return t
                    }));
                async function g(e, t) {
                    const o = e(d);
                    o.use(n.Z, t);
                    const i = "function" === typeof p["default"] ? await (0, p["default"])({}) : p["default"],
                        {
                            storeKey: l
                        } = await Promise.resolve().then(r.bind(r, 1502)),
                        s = (0, a.Xl)("function" === typeof b ? await b({
                            store: i
                        }) : b);
                    return i.$router = s, {
                        app: o,
                        store: i,
                        storeKey: l,
                        router: s
                    }
                }
                const y = {
                        config: {}
                    },
                    w = "/";
                async function P({
                    app: e,
                    router: t,
                    store: r,
                    storeKey: o
                }, n) {
                    let a = !1;
                    const i = e => {
                            try {
                                return t.resolve(e).href
                            } catch (r) {}
                            return Object(e) === e ? null : e
                        },
                        l = e => {
                            if (a = !0, "string" === typeof e && /^https?:\/\//.test(e)) return void(window.location.href = e);
                            const t = i(e);
                            null !== t && (window.location.href = t)
                        },
                        s = window.location.href.replace(window.location.origin, "");
                    for (let c = 0; !1 === a && c < n.length; c++) try {
                        await n[c]({
                            app: e,
                            router: t,
                            store: r,
                            ssrContext: null,
                            redirect: l,
                            urlPath: s,
                            publicPath: w
                        })
                    } catch (u) {
                        return u && u.url ? void l(u.url) : void console.error("[Quasar] boot error:", u)
                    }!0 !== a && (e.use(t), e.use(r, o), e.mount("#q-app"))
                }
                g(o.ri, y).then((e => Promise.allSettled([Promise.resolve().then(r.bind(r, 1569))]).then((t => {
                    const r = t.map((e => {
                        if ("rejected" !== e.status) return e.value.default;
                        console.error("[Quasar] boot error:", e.reason)
                    })).filter((e => "function" === typeof e));
                    P(e, r)
                }))))
            },
            1569: (e, t, r) => {
                r.r(t), r.d(t, {
                    api: () => i,
                    default: () => l
                });
                var o = r(3340),
                    n = r(9981),
                    a = r.n(n);
                const i = a().create({
                        baseURL: "https://api.example.com"
                    }),
                    l = (0, o.xr)((({
                        app: e
                    }) => {
                        e.config.globalProperties.$axios = a(), e.config.globalProperties.$api = i
                    }))
            },
            1502: (e, t, r) => {
                r.r(t), r.d(t, {
                    default: () => a
                });
                var o = r(3340),
                    n = r(3100);
                const a = (0, o.h)((function() {
                    const e = (0, n.MT)({
                        modules: {},
                        strict: !1
                    });
                    return e
                }))
            }
        },
        t = {};

    function r(o) {
        var n = t[o];
        if (void 0 !== n) return n.exports;
        var a = t[o] = {
            exports: {}
        };
        return e[o](a, a.exports, r), a.exports
    }
    r.m = e, (() => {
        var e = [];
        r.O = (t, o, n, a) => {
            if (!o) {
                var i = 1 / 0;
                for (c = 0; c < e.length; c++) {
                    for (var [o, n, a] = e[c], l = !0, s = 0; s < o.length; s++)(!1 & a || i >= a) && Object.keys(r.O).every((e => r.O[e](o[s]))) ? o.splice(s--, 1) : (l = !1, a < i && (i = a));
                    if (l) {
                        e.splice(c--, 1);
                        var u = n();
                        void 0 !== u && (t = u)
                    }
                }
                return t
            }
            a = a || 0;
            for (var c = e.length; c > 0 && e[c - 1][2] > a; c--) e[c] = e[c - 1];
            e[c] = [o, n, a]
        }
    })(), (() => {
        r.n = e => {
            var t = e && e.__esModule ? () => e["default"] : () => e;
            return r.d(t, {
                a: t
            }), t
        }
    })(), (() => {
        r.d = (e, t) => {
            for (var o in t) r.o(t, o) && !r.o(e, o) && Object.defineProperty(e, o, {
                enumerable: !0,
                get: t[o]
            })
        }
    })(), (() => {
        r.f = {}, r.e = e => Promise.all(Object.keys(r.f).reduce(((t, o) => (r.f[o](e, t), t)), []))
    })(), (() => {
        r.u = e => "/playground/live_chat/live_chat/client/dist/spa/js/" + e + "." + {
            745: "7a56884d",
            846: "ece835a7",
            862: "677a452c",
            944: "e3ea0816"
        } [e] + ".js"
    })(), (() => {
        r.miniCssF = e => "css/" + ({
            143: "app",
            736: "vendor"
        } [e] || e) + "." + {
            143: "31d6cfe0",
            736: "3ddf440b",
            745: "745dde11"
        } [e] + ".css"
    })(), (() => {
        r.g = function() {
            if ("object" === typeof globalThis) return globalThis;
            try {
                return this || new Function("return this")()
            } catch (e) {
                if ("object" === typeof window) return window
            }
        }()
    })(), (() => {
        r.o = (e, t) => Object.prototype.hasOwnProperty.call(e, t)
    })(), (() => {
        var e = {},
            t = "client:";
        r.l = (o, n, a, i) => {
            if (e[o]) e[o].push(n);
            else {
                var l, s;
                if (void 0 !== a)
                    for (var u = document.getElementsByTagName("script"), c = 0; c < u.length; c++) {
                        var d = u[c];
                        if (d.getAttribute("src") == o || d.getAttribute("data-webpack") == t + a) {
                            l = d;
                            break
                        }
                    }
                l || (s = !0, l = document.createElement("script"), l.charset = "utf-8", l.timeout = 120, r.nc && l.setAttribute("nonce", r.nc), l.setAttribute("data-webpack", t + a), l.src = o), e[o] = [n];
                var p = (t, r) => {
                        l.onerror = l.onload = null, clearTimeout(f);
                        var n = e[o];
                        if (delete e[o], l.parentNode && l.parentNode.removeChild(l), n && n.forEach((e => e(r))), t) return t(r)
                    },
                    f = setTimeout(p.bind(null, void 0, {
                        type: "timeout",
                        target: l
                    }), 12e4);
                l.onerror = p.bind(null, l.onerror), l.onload = p.bind(null, l.onload), s && document.head.appendChild(l)
            }
        }
    })(), (() => {
        r.r = e => {
            "undefined" !== typeof Symbol && Symbol.toStringTag && Object.defineProperty(e, Symbol.toStringTag, {
                value: "Module"
            }), Object.defineProperty(e, "__esModule", {
                value: !0
            })
        }
    })(), (() => {
        r.p = "/"
    })(), (() => {
        var e = (e, t, r, o) => {
                var n = document.createElement("link");
                n.rel = "stylesheet", n.type = "text/css";
                var a = a => {
                    if (n.onerror = n.onload = null, "load" === a.type) r();
                    else {
                        var i = a && ("load" === a.type ? "missing" : a.type),
                            l = a && a.target && a.target.href || t,
                            s = new Error("Loading CSS chunk " + e + " failed.\n(" + l + ")");
                        s.code = "CSS_CHUNK_LOAD_FAILED", s.type = i, s.request = l, n.parentNode.removeChild(n), o(s)
                    }
                };
                return n.onerror = n.onload = a, n.href = t, document.head.appendChild(n), n
            },
            t = (e, t) => {
                for (var r = document.getElementsByTagName("link"), o = 0; o < r.length; o++) {
                    var n = r[o],
                        a = n.getAttribute("data-href") || n.getAttribute("href");
                    if ("stylesheet" === n.rel && (a === e || a === t)) return n
                }
                var i = document.getElementsByTagName("style");
                for (o = 0; o < i.length; o++) {
                    n = i[o], a = n.getAttribute("data-href");
                    if (a === e || a === t) return n
                }
            },
            o = o => new Promise(((n, a) => {
                var i = r.miniCssF(o),
                    l = r.p + i;
                if (t(i, l)) return n();
                e(o, l, n, a)
            })),
            n = {
                143: 0
            };
        r.f.miniCss = (e, t) => {
            var r = {
                745: 1
            };
            n[e] ? t.push(n[e]) : 0 !== n[e] && r[e] && t.push(n[e] = o(e).then((() => {
                n[e] = 0
            }), (t => {
                throw delete n[e], t
            })))
        }
    })(), (() => {
        var e = {
            143: 0
        };
        r.f.j = (t, o) => {
            var n = r.o(e, t) ? e[t] : void 0;
            if (0 !== n)
                if (n) o.push(n[2]);
                else {
                    var a = new Promise(((r, o) => n = e[t] = [r, o]));
                    o.push(n[2] = a);
                    var i = r.p + r.u(t),
                        l = new Error,
                        s = o => {
                            if (r.o(e, t) && (n = e[t], 0 !== n && (e[t] = void 0), n)) {
                                var a = o && ("load" === o.type ? "missing" : o.type),
                                    i = o && o.target && o.target.src;
                                l.message = "Loading chunk " + t + " failed.\n(" + a + ": " + i + ")", l.name = "ChunkLoadError", l.type = a, l.request = i, n[1](l)
                            }
                        };
                    r.l(i, s, "chunk-" + t, t)
                }
        }, r.O.j = t => 0 === e[t];
        var t = (t, o) => {
                var n, a, [i, l, s] = o,
                    u = 0;
                if (i.some((t => 0 !== e[t]))) {
                    for (n in l) r.o(l, n) && (r.m[n] = l[n]);
                    if (s) var c = s(r)
                }
                for (t && t(o); u < i.length; u++) a = i[u], r.o(e, a) && e[a] && e[a][0](), e[a] = 0;
                return r.O(c)
            },
            o = globalThis["webpackChunkclient"] = globalThis["webpackChunkclient"] || [];
        o.forEach(t.bind(null, 0)), o.push = t.bind(null, o.push.bind(o))
    })();
    var o = r.O(void 0, [736], (() => r(4647)));
    o = r.O(o)
})();