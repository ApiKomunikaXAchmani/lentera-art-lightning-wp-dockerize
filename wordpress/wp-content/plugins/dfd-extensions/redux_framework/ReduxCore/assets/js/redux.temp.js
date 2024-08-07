function redux_change(a) {
    jQuery("body").trigger("check_dependencies", a), a.hasClass("compiler") && jQuery("#redux-compiler-hook").val(1);
    var b = jQuery(a).parents(".redux-container:first"),
        c = jQuery(a).closest(".redux-group-tab").attr("id"),
        d = c.split("_");
    d = d[0];
    var e = b.find('.redux-group-tab-link-a[data-key="' + d + '"]').parents(".redux-group-tab-link-li:first"),
        f = jQuery("#" + c + "_li").parents(".hasSubSections:first");
    if (jQuery(a).parents("fieldset.redux-field:first").hasClass("redux-field-error")) {
        jQuery(a).parents("fieldset.redux-field:first").removeClass("redux-field-error"), jQuery(a).parent().find(".redux-th-error").slideUp();
        var g = parseInt(b.find(".redux-field-errors span").text()) - 1;
        if (0 >= g) jQuery("#" + c + "_li .redux-menu-error").fadeOut("fast").remove(), jQuery("#" + c + "_li .redux-group-tab-link-a").removeClass("hasError"), jQuery("#" + c + "_li").parents(".inside:first").find(".redux-field-errors").slideUp(), jQuery(a).parents(".redux-container:first").find(".redux-field-errors").slideUp(), jQuery("#redux_metaboxes_errors").slideUp();
        else {
            var h = parseInt(e.find(".redux-menu-error:first").text()) - 1;
            0 >= h ? e.find(".redux-menu-error:first").fadeOut().remove() : e.find(".redux-menu-error:first").text(h), b.find(".redux-field-errors span").text(g)
        }
        0 !== f.length && 0 === f.find(".redux-menu-error").length && f.find(".hasError").removeClass("hasError")
    }
    if (jQuery(a).parents("fieldset.redux-field:first").hasClass("redux-field-warning")) {
        jQuery(a).parents("fieldset.redux-field:first").removeClass("redux-field-warning"), jQuery(a).parent().find(".redux-th-warning").slideUp();
        var i = parseInt(b.find(".redux-field-warnings span").text()) - 1;
        if (0 >= i) jQuery("#" + c + "_li .redux-menu-warning").fadeOut("fast").remove(), jQuery("#" + c + "_li .redux-group-tab-link-a").removeClass("hasWarning"), jQuery("#" + c + "_li").parents(".inside:first").find(".redux-field-warnings").slideUp(), jQuery(a).parents(".redux-container:first").find(".redux-field-warnings").slideUp(), jQuery("#redux_metaboxes_warnings").slideUp();
        else {
            var j = parseInt(e.find(".redux-menu-warning:first").text()) - 1;
            0 >= j ? e.find(".redux-menu-warning:first").fadeOut().remove() : e.find(".redux-menu-warning:first").text(j), b.find(".redux-field-warning span").text(i)
        }
        0 !== f.length && 0 === f.find(".redux-menu-warning").length && f.find(".hasWarning").removeClass("hasWarning")
    }
    return b.find(".saved_notice:visible").length > 0 ? void 0 : redux.customizer ? void redux.customizer.save(a, b, c) : void(redux.args.disable_save_warn || (b.find(".redux-save-warn").slideDown(), window.onbeforeunload = confirmOnPageExit))
}

function colorValidate(a) {
    var b = jQuery(a).val(),
        c = colorNameToHex(b);
    return c !== b.replace("#", "") ? c : b
}

function colorNameToHex(a) {
    var b = a.replace(/^\s\s*/, "").replace(/\s\s*$/, "").replace("#", ""),
        c = {
            aliceblue: "#f0f8ff",
            antiquewhite: "#faebd7",
            aqua: "#00ffff",
            aquamarine: "#7fffd4",
            azure: "#f0ffff",
            beige: "#f5f5dc",
            bisque: "#ffe4c4",
            black: "#000000",
            blanchedalmond: "#ffebcd",
            blue: "#0000ff",
            blueviolet: "#8a2be2",
            brown: "#a52a2a",
            burlywood: "#deb887",
            cadetblue: "#5f9ea0",
            chartreuse: "#7fff00",
            chocolate: "#d2691e",
            coral: "#ff7f50",
            cornflowerblue: "#6495ed",
            cornsilk: "#fff8dc",
            crimson: "#dc143c",
            cyan: "#00ffff",
            darkblue: "#00008b",
            darkcyan: "#008b8b",
            darkgoldenrod: "#b8860b",
            darkgray: "#a9a9a9",
            darkgreen: "#006400",
            darkkhaki: "#bdb76b",
            darkmagenta: "#8b008b",
            darkolivegreen: "#556b2f",
            darkorange: "#ff8c00",
            darkorchid: "#9932cc",
            darkred: "#8b0000",
            darksalmon: "#e9967a",
            darkseagreen: "#8fbc8f",
            darkslateblue: "#483d8b",
            darkslategray: "#2f4f4f",
            darkturquoise: "#00ced1",
            darkviolet: "#9400d3",
            deeppink: "#ff1493",
            deepskyblue: "#00bfff",
            dimgray: "#696969",
            dodgerblue: "#1e90ff",
            firebrick: "#b22222",
            floralwhite: "#fffaf0",
            forestgreen: "#228b22",
            fuchsia: "#ff00ff",
            gainsboro: "#dcdcdc",
            ghostwhite: "#f8f8ff",
            gold: "#ffd700",
            goldenrod: "#daa520",
            gray: "#808080",
            green: "#008000",
            greenyellow: "#adff2f",
            honeydew: "#f0fff0",
            hotpink: "#ff69b4",
            "indianred ": "#cd5c5c",
            "indigo ": "#4b0082",
            ivory: "#fffff0",
            khaki: "#f0e68c",
            lavender: "#e6e6fa",
            lavenderblush: "#fff0f5",
            lawngreen: "#7cfc00",
            lemonchiffon: "#fffacd",
            lightblue: "#add8e6",
            lightcoral: "#f08080",
            lightcyan: "#e0ffff",
            lightgoldenrodyellow: "#fafad2",
            lightgrey: "#d3d3d3",
            lightgreen: "#90ee90",
            lightpink: "#ffb6c1",
            lightsalmon: "#ffa07a",
            lightseagreen: "#20b2aa",
            lightskyblue: "#87cefa",
            lightslategray: "#778899",
            lightsteelblue: "#b0c4de",
            lightyellow: "#ffffe0",
            lime: "#00ff00",
            limegreen: "#32cd32",
            linen: "#faf0e6",
            magenta: "#ff00ff",
            maroon: "#800000",
            mediumaquamarine: "#66cdaa",
            mediumblue: "#0000cd",
            mediumorchid: "#ba55d3",
            mediumpurple: "#9370d8",
            mediumseagreen: "#3cb371",
            mediumslateblue: "#7b68ee",
            mediumspringgreen: "#00fa9a",
            mediumturquoise: "#48d1cc",
            mediumvioletred: "#c71585",
            midnightblue: "#191970",
            mintcream: "#f5fffa",
            mistyrose: "#ffe4e1",
            moccasin: "#ffe4b5",
            navajowhite: "#ffdead",
            navy: "#000080",
            oldlace: "#fdf5e6",
            olive: "#808000",
            olivedrab: "#6b8e23",
            orange: "#ffa500",
            orangered: "#ff4500",
            orchid: "#da70d6",
            palegoldenrod: "#eee8aa",
            palegreen: "#98fb98",
            paleturquoise: "#afeeee",
            palevioletred: "#d87093",
            papayawhip: "#ffefd5",
            peachpuff: "#ffdab9",
            peru: "#cd853f",
            pink: "#ffc0cb",
            plum: "#dda0dd",
            powderblue: "#b0e0e6",
            purple: "#800080",
            red: "#ff0000",
            redux: "#01a3e3",
            rosybrown: "#bc8f8f",
            royalblue: "#4169e1",
            saddlebrown: "#8b4513",
            salmon: "#fa8072",
            sandybrown: "#f4a460",
            seagreen: "#2e8b57",
            seashell: "#fff5ee",
            sienna: "#a0522d",
            silver: "#c0c0c0",
            skyblue: "#87ceeb",
            slateblue: "#6a5acd",
            slategray: "#708090",
            snow: "#fffafa",
            springgreen: "#00ff7f",
            steelblue: "#4682b4",
            tan: "#d2b48c",
            teal: "#008080",
            thistle: "#d8bfd8",
            tomato: "#ff6347",
            turquoise: "#40e0d0",
            violet: "#ee82ee",
            wheat: "#f5deb3",
            white: "#ffffff",
            whitesmoke: "#f5f5f5",
            yellow: "#ffff00",
            yellowgreen: "#9acd32"
        };
    return "undefined" !== c[b.toLowerCase()] ? c[b.toLowerCase()] : a
}

function redux_hook(a, b, c, d) {
    ! function(e) {
        a[b] = function() {
            d === !0 && c.apply(this, [a, e, arguments]);
            var a = e.apply(this, arguments);
            return d !== !0 && c.apply(this, [a, e, arguments]), a
        }
    }(a[b])
}! function(a) {
    "function" == typeof define && define.amd ? jQueryCookie.define(["jquery"], a) : a(jQuery)
}(function(a) {
    function b(a) {
        return a
    }

    function c(a) {
        return decodeURIComponent(a.replace(e, " "))
    }

    function d(a) {
        0 === a.indexOf('"') && (a = a.slice(1, -1).replace(/\\"/g, '"').replace(/\\\\/g, "\\"));
        try {
            return f.json ? JSON.parse(a) : a
        } catch (b) {}
    }
    var e = /\+/g,
        f = a.cookie = function(e, g, h) {
            if (void 0 !== g) {
                if (h = a.extend({}, f.defaults, h), "number" == typeof h.expires) {
                    var i = h.expires,
                        j = h.expires = new Date;
                    j.setDate(j.getDate() + i)
                }
                return g = f.json ? JSON.stringify(g) : String(g), document.cookie = [f.raw ? e : encodeURIComponent(e), "=", f.raw ? g : encodeURIComponent(g), h.expires ? "; expires=" + h.expires.toUTCString() : "", h.path ? "; path=" + h.path : "", h.domain ? "; domain=" + h.domain : "", h.secure ? "; secure" : ""].join("")
            }
            for (var k = f.raw ? b : c, l = document.cookie.split("; "), m = e ? void 0 : {}, n = 0, o = l.length; o > n; n++) {
                var p = l[n].split("="),
                    q = k(p.shift()),
                    r = k(p.join("="));
                if (e && e === q) {
                    m = d(r);
                    break
                }
                e || (m[q] = d(r))
            }
            return m
        };
    f.defaults = {}, a.removeCookie = function(b, c) {
        return void 0 !== a.cookie(b) ? (a.cookie(b, "", a.extend({}, c, {
            expires: -1
        })), !0) : !1
    }
}),
function(a) {
    a.fn.typeWatch = function(b) {
        function c(b, c) {
            var d = a(b.el).val();
            (d.length >= f.captureLength && d.toUpperCase() != b.text || c && d.length >= f.captureLength) && (b.text = d.toUpperCase(), b.cb.call(b.el, d))
        }

        function d(b) {
            var d = b.type.toUpperCase();
            if (a.inArray(d, f.inputTypes) >= 0) {
                var e = {
                    timer: null,
                    text: a(b).val().toUpperCase(),
                    cb: f.callback,
                    el: b,
                    wait: f.wait
                };
                f.highlight && a(b).focus(function() {
                    this.select()
                });
                var g = function(b) {
                    var d = e.wait,
                        g = !1,
                        h = this.type.toUpperCase();
                    "undefined" != typeof b.keyCode && 13 == b.keyCode && "TEXTAREA" != h && a.inArray(h, f.inputTypes) >= 0 && (d = 1, g = !0);
                    var i = function() {
                        c(e, g)
                    };
                    clearTimeout(e.timer), e.timer = setTimeout(i, d)
                };
                a(b).on("keydown paste cut input", g)
            }
        }
        var e = ["TEXT", "TEXTAREA", "PASSWORD", "TEL", "SEARCH", "URL", "EMAIL", "DATETIME", "DATE", "MONTH", "WEEK", "TIME", "DATETIME-LOCAL", "NUMBER", "RANGE"],
            f = a.extend({
                wait: 750,
                callback: function() {},
                highlight: !0,
                captureLength: 2,
                inputTypes: e
            }, b);
        return this.each(function() {
            d(this)
        })
    }
}(jQuery),
function(a) {
    a.fn.serializeForm = function() {
        if (this.length < 1) return !1;
        var b = {},
            c = b,
            d = ':input[type!="checkbox"][type!="radio"], input:checked',
            e = function() {
                if (!this.disabled) {
                    var d = this.name.replace(/\[([^\]]+)?\]/g, ",$1").split(","),
                        e = d.length - 1,
                        f = a(this);
                    if (d[0]) {
                        for (var g = 0; e > g; g++) c = c[d[g]] = c[d[g]] || ("" === d[g + 1] || "0" === d[g + 1] ? [] : {});
                        void 0 !== c.length ? c.push(f.val()) : c[d[e]] = f.val(), c = b
                    }
                }
            };
        return this.filter(d).each(e), this.find(d).each(e), b
    }
}(jQuery),
function(a) {
    function b() {
        var a = "!@#$%^&*()+=[]\\';,/{}|\":<>?~`.-_";
        return a += " "
    }

    function c() {
        var a = "¬€£¦";
        return a
    }

    function d(b, c, d) {
        b.each(function() {
            var b = a(this);
            b.bind("keyup change paste", function(a) {
                var e = "";
                a.originalEvent && a.originalEvent.clipboardData && a.originalEvent.clipboardData.getData && (e = a.originalEvent.clipboardData.getData("text/plain")), setTimeout(function() {
                    h(b, c, d, e)
                }, 0)
            }), b.bind("keypress", function(a) {
                var e = a.charCode ? a.charCode : a.which;
                if (!(g(e) || a.ctrlKey || a.metaKey)) {
                    var f = String.fromCharCode(e),
                        h = b.selection(),
                        i = h.start,
                        j = h.end,
                        k = b.val(),
                        l = k.substring(0, i) + f + k.substring(j),
                        m = c(l, d);
                    m != l && a.preventDefault()
                }
            })
        })
    }

    function e(b, c) {
        var d = parseFloat(a(b).val()),
            e = a(b);
        return isNaN(d) ? void e.val("") : (f(c.min) && d < c.min && e.val(""), void(f(c.max) && d > c.max && e.val("")))
    }

    function f(a) {
        return !isNaN(a)
    }

    function g(a) {
        return a >= 32 ? !1 : 10 == a ? !1 : 13 == a ? !1 : !0
    }

    function h(a, b, c, d) {
        var e = a.val();
        "" == e && d.length > 0 && (e = d);
        var f = b(e, c);
        if (e != f) {
            var g = a.alphanum_caret();
            a.val(f), e.length == f.length + 1 ? a.alphanum_caret(g - 1) : a.alphanum_caret(g)
        }
    }

    function i(b, c) {
        "undefined" == typeof c && (c = D);
        var d, e = {};
        return d = "string" == typeof b ? F[b] : "undefined" == typeof b ? {} : b, a.extend(e, c, d), "undefined" == typeof e.blacklist && (e.blacklistSet = x(e.allow, e.disallow)), e
    }

    function j(b) {
        var c, d = {};
        return c = "string" == typeof b ? G[b] : "undefined" == typeof b ? {} : b, a.extend(d, E, c), d
    }

    function k(a, b, c) {
        return c.maxLength && a.length >= c.maxLength ? !1 : c.allow.indexOf(b) >= 0 ? !0 : c.allowSpace && " " == b ? !0 : c.blacklistSet.contains(b) ? !1 : !c.allowNumeric && K[b] ? !1 : !c.allowUpper && u(b) ? !1 : !c.allowLower && v(b) ? !1 : !c.allowCaseless && w(b) ? !1 : !c.allowLatin && L.contains(b) ? !1 : c.allowOtherCharSets ? !0 : K[b] || L.contains(b) ? !0 : !1
    }

    function l(a, b, c) {
        if (K[b]) return n(a, c) ? !1 : p(a, c) ? !1 : o(a, c) ? !1 : q(a + b, c) ? !1 : r(a + b, c) ? !1 : !0;
        if (c.allowPlus && "+" == b && "" == a) return !0;
        if (c.allowMinus && "-" == b && "" == a) return !0;
        if (b == I && c.allowThouSep && A(a, b)) return !0;
        if (b == J) {
            if (a.indexOf(J) >= 0) return !1;
            if (c.allowDecSep) return !0
        }
        return !1
    }

    function m(a) {
        return a += "", a.replace(/[^0-9]/g, "").length
    }

    function n(a, b) {
        var c = b.maxDigits;
        if ("" == c || isNaN(c)) return !1;
        var d = m(a);
        return d >= c ? !0 : !1
    }

    function o(a, b) {
        var c = b.maxDecimalPlaces;
        if ("" == c || isNaN(c)) return !1;
        var d = a.indexOf(J);
        if (-1 == d) return !1;
        var e = a.substring(d),
            f = m(e);
        return f >= c ? !0 : !1
    }

    function p(a, b) {
        var c = b.maxPreDecimalPlaces;
        if ("" == c || isNaN(c)) return !1;
        var d = a.indexOf(J);
        if (d >= 0) return !1;
        var e = m(a);
        return e >= c ? !0 : !1
    }

    function q(a, b) {
        if (!b.max || b.max < 0) return !1;
        var c = parseFloat(a);
        return c > b.max ? !0 : !1
    }

    function r(a, b) {
        if (!b.min || b.min > 0) return !1;
        var c = parseFloat(a);
        return c < b.min ? !0 : !1
    }

    function s(a, b) {
        if ("string" != typeof a) return a;
        var c, d = a.split(""),
            e = [],
            f = 0;
        for (f = 0; f < d.length; f++) {
            c = d[f];
            var g = e.join("");
            k(g, c, b) && e.push(c)
        }
        return e.join("")
    }

    function t(a, b) {
        if ("string" != typeof a) return a;
        var c, d = a.split(""),
            e = [],
            f = 0;
        for (f = 0; f < d.length; f++) {
            c = d[f];
            var g = e.join("");
            l(g, c, b) && e.push(c)
        }
        return e.join("")
    }

    function u(a) {
        var b = a.toUpperCase(),
            c = a.toLowerCase();
        return a == b && b != c ? !0 : !1
    }

    function v(a) {
        var b = a.toUpperCase(),
            c = a.toLowerCase();
        return a == c && b != c ? !0 : !1
    }

    function w(a) {
        return a.toUpperCase() == a.toLowerCase() ? !0 : !1
    }

    function x(a, b) {
        var c = new B(H + b),
            d = new B(a),
            e = c.subtract(d);
        return e
    }

    function y() {
        var a, b = "0123456789".split(""),
            c = {},
            d = 0;
        for (d = 0; d < b.length; d++) a = b[d], c[a] = !0;
        return c
    }

    function z() {
        var a = "abcdefghijklmnopqrstuvwxyz",
            b = a.toUpperCase(),
            c = new B(a + b);
        return c
    }

    function A(a, b) {
        if (0 == a.length) return !1;
        var c = a.indexOf(J);
        if (c >= 0) return !1;
        var d = a.indexOf(I);
        if (0 > d) return !0;
        var e = a.lastIndexOf(I),
            f = a.length - e - 1;
        if (3 > f) return !1;
        var g = m(a.substring(d));
        return g % 3 > 0 ? !1 : !0
    }

    function B(a) {
        "string" == typeof a ? this.map = C(a) : this.map = {}
    }

    function C(a) {
        var b, c = {},
            d = a.split(""),
            e = 0;
        for (e = 0; e < d.length; e++) b = d[e], c[b] = !0;
        return c
    }
    a.fn.alphanum = function(a) {
        var b = i(a),
            c = this;
        return d(c, s, b), this
    }, a.fn.alpha = function(a) {
        var b = i("alpha"),
            c = i(a, b),
            e = this;
        return d(e, s, c), this
    }, a.fn.numeric = function(a) {
        var b = j(a),
            c = this;
        return d(c, t, b), c.blur(function() {
            e(this, a)
        }), this
    };
    var D = {
            allow: "",
            disallow: "",
            allowSpace: !0,
            allowNumeric: !0,
            allowUpper: !0,
            allowLower: !0,
            allowCaseless: !0,
            allowLatin: !0,
            allowOtherCharSets: !0,
            maxLength: NaN
        },
        E = {
            allowPlus: !1,
            allowMinus: !0,
            allowThouSep: !0,
            allowDecSep: !0,
            allowLeadingSpaces: !1,
            maxDigits: NaN,
            maxDecimalPlaces: NaN,
            maxPreDecimalPlaces: NaN,
            max: NaN,
            min: NaN
        },
        F = {
            alpha: {
                allowNumeric: !1
            },
            upper: {
                allowNumeric: !1,
                allowUpper: !0,
                allowLower: !1,
                allowCaseless: !0
            },
            lower: {
                allowNumeric: !1,
                allowUpper: !1,
                allowLower: !0,
                allowCaseless: !0
            }
        },
        G = {
            integer: {
                allowPlus: !1,
                allowMinus: !0,
                allowThouSep: !1,
                allowDecSep: !1
            },
            positiveInteger: {
                allowPlus: !1,
                allowMinus: !1,
                allowThouSep: !1,
                allowDecSep: !1
            }
        },
        H = b() + c(),
        I = ",",
        J = ".",
        K = y(),
        L = z();
    B.prototype.add = function(a) {
        var b = this.clone();
        for (var c in a.map) b.map[c] = !0;
        return b
    }, B.prototype.subtract = function(a) {
        var b = this.clone();
        for (var c in a.map) delete b.map[c];
        return b
    }, B.prototype.contains = function(a) {
        return this.map[a] ? !0 : !1
    }, B.prototype.clone = function() {
        var a = new B;
        for (var b in this.map) a.map[b] = !0;
        return a
    }, a.fn.alphanum.backdoorAlphaNum = function(a, b) {
        var c = i(b);
        return s(a, c)
    }, a.fn.alphanum.backdoorNumeric = function(a, b) {
        var c = j(b);
        return t(a, c)
    }, a.fn.alphanum.setNumericSeparators = function(a) {
        1 == a.thousandsSeparator.length && 1 == a.decimalSeparator.length && (I = a.thousandsSeparator, J = a.decimalSeparator)
    }
}(jQuery),
function(a) {
    function b(a, b) {
        if (a.createTextRange) {
            var c = a.createTextRange();
            c.move("character", b), c.select()
        } else null != a.selectionStart && (a.focus(), a.setSelectionRange(b, b))
    }

    function c(a) {
        if ("selection" in document) {
            var b = a.createTextRange();
            try {
                b.setEndPoint("EndToStart", document.selection.createRange())
            } catch (c) {
                return 0
            }
            return b.text.length
        }
        return null != a.selectionStart ? a.selectionStart : void 0
    }
    a.fn.alphanum_caret = function(d, e) {
        return "undefined" == typeof d ? c(this.get(0)) : this.queue(function(c) {
            if (isNaN(d)) {
                var f = a(this).val().indexOf(d);
                e === !0 ? f += d.length : "undefined" != typeof e && (f += e), b(this, f)
            } else b(this, d);
            c()
        })
    }
}(jQuery),
function(a) {
    var b = function(a) {
            return a ? a.ownerDocument.defaultView || a.ownerDocument.parentWindow : window
        },
        c = function(b, c) {
            var d = a.Range.current(b).clone(),
                e = a.Range(b).select(b);
            return d.overlaps(e) ? (d.compare("START_TO_START", e) < 1 ? (startPos = 0, d.move("START_TO_START", e)) : (fromElementToCurrent = e.clone(), fromElementToCurrent.move("END_TO_START", d), startPos = fromElementToCurrent.toString().length), d.compare("END_TO_END", e) >= 0 ? endPos = e.toString().length : endPos = startPos + d.toString().length, {
                start: startPos,
                end: endPos
            }) : null
        },
        d = function(d) {
            var e = b(d);
            if (void 0 !== d.selectionStart) return document.activeElement && document.activeElement != d && d.selectionStart == d.selectionEnd && 0 == d.selectionStart ? {
                start: d.value.length,
                end: d.value.length
            } : {
                start: d.selectionStart,
                end: d.selectionEnd
            };
            if (e.getSelection) return c(d, e);
            try {
                if ("input" == d.nodeName.toLowerCase()) {
                    var f = b(d).document.selection.createRange(),
                        g = d.createTextRange();
                    g.setEndPoint("EndToStart", f);
                    var h = g.text.length;
                    return {
                        start: h,
                        end: h + f.text.length
                    }
                }
                var i = c(d, e);
                if (!i) return i;
                var j = a.Range.current().clone(),
                    k = j.clone().collapse().range,
                    l = j.clone().collapse(!1).range;
                return k.moveStart("character", -1), l.moveStart("character", -1), 0 != i.startPos && "" == k.text && (i.startPos += 2), 0 != i.endPos && "" == l.text && (i.endPos += 2), i
            } catch (m) {
                return {
                    start: d.value.length,
                    end: d.value.length
                }
            }
        },
        e = function(a, c, d) {
            var e = b(a);
            if (a.setSelectionRange) void 0 === d ? (a.focus(), a.setSelectionRange(c, c)) : (a.select(), a.selectionStart = c, a.selectionEnd = d);
            else if (a.createTextRange) {
                var f = a.createTextRange();
                f.moveStart("character", c), d = d || c, f.moveEnd("character", d - a.value.length), f.select()
            } else if (e.getSelection) {
                var h = e.document,
                    i = e.getSelection(),
                    j = h.createRange(),
                    k = [c, void 0 !== d ? d : c];
                g([a], k), j.setStart(k[0].el, k[0].count), j.setEnd(k[1].el, k[1].count), i.removeAllRanges(), i.addRange(j)
            } else if (e.document.body.createTextRange) {
                var j = document.body.createTextRange();
                j.moveToElementText(a), j.collapse(), j.moveStart("character", c), j.moveEnd("character", void 0 !== d ? d : c), j.select()
            }
        },
        f = function(a, b, c, d) {
            "number" == typeof c[0] && c[0] < b && (c[0] = {
                el: d,
                count: c[0] - a
            }), "number" == typeof c[1] && c[1] <= b && (c[1] = {
                el: d,
                count: c[1] - a
            })
        },
        g = function(a, b, c) {
            var d, e;
            c = c || 0;
            for (var h = 0; a[h]; h++) d = a[h], 3 === d.nodeType || 4 === d.nodeType ? (e = c, c += d.nodeValue.length, f(e, c, b, d)) : 8 !== d.nodeType && (c = g(d.childNodes, b, c));
            return c
        };
    jQuery.fn.selection = function(a, b) {
        return void 0 !== a ? this.each(function() {
            e(this, a, b)
        }) : d(this[0])
    }, a.fn.selection.getCharElement = g
}(jQuery),
function(a) {
    "use strict";
    a.redux = a.redux || {}, a(document).ready(function() {
        a.fn.isOnScreen = function() {
            if (window) {
                var b = a(window),
                    c = {
                        top: b.scrollTop()
                    };
                c.right = c.left + b.width(), c.bottom = c.top + b.height();
                var d = this.offset();
                return d.right = d.left + this.outerWidth(), d.bottom = d.top + this.outerHeight(), !(c.right < d.left || c.left > d.right || c.bottom < d.top || c.top > d.bottom)
            }
        }, a.redux.hideFields(), a.redux.checkRequired(), a.redux.initEvents(), a.redux.initQtip(), a.redux.tabCheck(), a.redux.notices(), a.redux.tabControl()
    }), a.redux.ajax_save = function(b) {
        var c = a(document.getElementById("redux_ajax_overlay"));
        c.fadeIn(), jQuery(".redux-action_bar .spinner").addClass("is-active"), jQuery(".redux-action_bar input").attr("disabled", "disabled");
        var d = jQuery(document.getElementById("redux_notification_bar"));
        d.slideUp(), jQuery(".redux-save-warn").slideUp(), jQuery(".redux_ajax_save_error").slideUp("medium", function() {
            jQuery(this).remove()
        });
        var e = jQuery(document.getElementById("redux-form-wrapper"));
        redux.fields.hasOwnProperty("editor") && a.each(redux.fields.editor, function(a, b) {
            if ("undefined" != typeof tinyMCE) {
                var c = tinyMCE.get(a);
                c && c.save()
            }
        });
        var f = e.serialize();
        e.find("input[type=checkbox]").each(function() {
            if ("undefined" != typeof a(this).attr("name")) {
                var b = a(this).is(":checked") ? a(this).val() : "0";
                f += "&" + a(this).attr("name") + "=" + b
            }
        }), "redux_save" != b.attr("name") && (f += "&" + b.attr("name") + "=" + b.val());
        var g = e.attr("data-nonce");
        return jQuery.ajax({
            type: "post",
            dataType: "json",
            url: ajaxurl,
            data: {
                action: redux.args.opt_name + "_ajax_save",
                nonce: g,
                opt_name: redux.args.opt_name,
                data: f
            },
            error: function(a) {
                window.console || (console = {}), console.log = console.log || function(a, b) {}, console.log(redux.ajax.console), console.log(a.responseText), jQuery(".redux-action_bar input").removeAttr("disabled"), c.fadeOut("fast"), jQuery(".redux-action_bar .spinner").removeClass("is-active"), alert(redux.ajax.alert)
            },
            success: function(b) {
                if (b.action && "reload" == b.action) location.reload(!0);
                else if ("success" == b.status) {
                    jQuery(".redux-action_bar input").removeAttr("disabled"), c.fadeOut("fast"), jQuery(".redux-action_bar .spinner").removeClass("is-active"), redux.options = b.options, redux.errors = b.errors, redux.warnings = b.warnings, d.html(b.notification_bar).slideDown("fast"), (null !== b.errors || null !== b.warnings) && a.redux.notices();
                    var e = a(document.getElementById("redux_notification_bar")).find(".saved_notice");
                    e.slideDown(), e.delay(4e3).slideUp()
                } else jQuery(".redux-action_bar input").removeAttr("disabled"), jQuery(".redux-action_bar .spinner").removeClass("is-active"), c.fadeOut("fast"), jQuery(".wrap h2:first").parent().append('<div class="error redux_ajax_save_error" style="display:none;"><p>' + b.status + "</p></div>"), jQuery(".redux_ajax_save_error").slideDown(), jQuery("html, body").animate({
                    scrollTop: 0
                }, "slow")
            }
        }), !1
    }, a.redux.initEvents = function() {
        a(".redux-presets-bar").on("click", function() {
            window.onbeforeunload = null
        }), a("#toplevel_page_" + redux.args.slug + " .wp-submenu a, #wp-admin-bar-" + redux.args.slug + " a.ab-item").click(function(b) {
            if ((a("#toplevel_page_" + redux.args.slug).hasClass("wp-menu-open") || a(this).hasClass("ab-item")) && !a(this).parents("ul.ab-submenu:first").hasClass("ab-sub-secondary") && a(this).attr("href").toLowerCase().indexOf(redux.args.slug + "&tab=") >= 0) {
                b.preventDefault();
                var c = a(this).attr("href").split("&tab=");
                return a("#" + c[1] + "_section_group_li_a").click(), a(this).parents("ul:first").find(".current").removeClass("current"), a(this).addClass("current"), a(this).parent().addClass("current"), !1
            }
        }), a(".redux-action_bar input").on("click", function(b) {
            if (a(this).attr("name") == redux.args.opt_name + "[defaults]") {
                if (!confirm(redux.args.reset_confirm)) return !1
            } else if (a(this).attr("name") == redux.args.opt_name + "[defaults-section]" && !confirm(redux.args.reset_section_confirm)) {return !1; } else if( $( this ).attr( 'name' ) == 'redux_save' ) {
					$.redux.getValues();
					$.redux.cleanupNameAtts();
				} else if($(this).hasClass('dfd-reset-button')) {
					$.redux.cleanupNameAtts();
				}
            window.onbeforeunload = null, redux.args.ajax_save === !0 && (a.redux.ajax_save(a(this)), b.preventDefault())
        }), a(".expand_options").click(function(b) {
            b.preventDefault();
            var c = a(".redux-container");
            if (a(c).hasClass("fully-expanded")) {
                a(c).removeClass("fully-expanded");
                var d = a.cookie("redux_current_tab");
                a(".redux-container:first").find("#" + d + "_section_group").fadeIn(200, function() {
                    0 !== a(".redux-container:first").find("#redux-footer").length && a.redux.stickyInfo(), a.redux.initFields()
                })
            }
            return a.redux.expandOptions(a(this).parents(".redux-container:first")), !1
        }), a(".saved_notice").is(":visible") && a(".saved_notice").slideDown(), a(document.body).on("change", ".redux-field input, .redux-field textarea, .redux-field select", function() {
            a(this).hasClass("noUpdate") || (redux_change(a(this)),$.redux.getValues())
        });
        var b = a("#redux-footer").height();
        a("#redux-sticky-padder").css({
            height: b
        }), a("#redux-footer-sticky").removeClass("hide"), 0 !== a("#redux-footer").length && (a(window).scroll(function() {
            a.redux.stickyInfo()
        }), a(window).resize(function() {
            a.redux.stickyInfo()
        })), a(".saved_notice").delay(4e3).slideUp()
    }, a.redux.hideFields = function() {
        a("label[for='redux_hide_field']").each(function(b, c) {
            var d = a(this).parent().parent();
            a(d).addClass("hidden")
        })
    }, a.redux.checkRequired = function() {
        a.redux.required(), a("body").on("change", ".redux-main select, .redux-main radio, .redux-main input[type=checkbox], .redux-main input[type=hidden]", function(b) {
            a.redux.check_dependencies(this)
        }), a("body").on("check_dependencies", function(b, c) {
            a.redux.check_dependencies(c)
        }), a("td > fieldset:empty,td > div:empty").parent().parent().hide()
    }, a.redux.initQtip = function() {
        if (a().qtip) {
            var b = "",
                c = redux.args.hints.tip_style.shadow;
            c === !0 && (b = "qtip-shadow");
            var d = "",
                e = redux.args.hints.tip_style.color;
            "" !== e && (d = "qtip-" + e);
            var f = "",
                g = redux.args.hints.tip_style.rounded;
            g === !0 && (f = "qtip-rounded");
            var h = "",
                i = redux.args.hints.tip_style.style;
            "" !== i && (h = "qtip-" + i);
            var j = b + "," + d + "," + f + "," + h + ",redux-qtip";
            j = j.replace(/,/g, " ");
            var k = redux.args.hints.tip_position.my,
                l = redux.args.hints.tip_position.at;
            k = a.redux.verifyPos(k.toLowerCase(), !0), l = a.redux.verifyPos(l.toLowerCase(), !1);
            var m = redux.args.hints.tip_effect.show.event,
                n = redux.args.hints.tip_effect.hide.event,
                o = redux.args.hints.tip_effect.show.effect,
                p = redux.args.hints.tip_effect.show.duration,
                q = redux.args.hints.tip_effect.hide.effect,
                r = redux.args.hints.tip_effect.hide.duration;
            a("div.redux-dev-qtip").each(function() {
                a(this).qtip({
                    content: {
                        text: a(this).attr("qtip-content"),
                        title: a(this).attr("qtip-title")
                    },
                    show: {
                        effect: function() {
                            a(this).slideDown(500)
                        },
                        event: "mouseover"
                    },
                    hide: {
                        effect: function() {
                            a(this).slideUp(500)
                        },
                        event: "mouseleave"
                    },
                    style: {
                        classes: "qtip-shadow qtip-light"
                    },
                    position: {
                        my: "top center",
                        at: "bottom center"
                    }
                })
            }), a("div.redux-hint-qtip").each(function() {
                a(this).qtip({
                    content: {
                        text: a(this).attr("qtip-content"),
                        title: a(this).attr("qtip-title")
                    },
                    show: {
                        effect: function() {
                            switch (o) {
                                case "slide":
                                    a(this).slideDown(p);
                                    break;
                                case "fade":
                                    a(this).fadeIn(p);
                                    break;
                                default:
                                    a(this).show()
                            }
                        },
                        event: m
                    },
                    hide: {
                        effect: function() {
                            switch (q) {
                                case "slide":
                                    a(this).slideUp(r);
                                    break;
                                case "fade":
                                    a(this).fadeOut(r);
                                    break;
                                default:
                                    a(this).hide(r)
                            }
                        },
                        event: n
                    },
                    style: {
                        classes: j
                    },
                    position: {
                        my: k,
                        at: l
                    }
                })
            }), a("input[qtip-content]").each(function() {
                a(this).qtip({
                    content: {
                        text: a(this).attr("qtip-content"),
                        title: a(this).attr("qtip-title")
                    },
                    show: "focus",
                    hide: "blur",
                    style: j,
                    position: {
                        my: k,
                        at: l
                    }
                })
            })
        }
    }, a.redux.getValues = function() {
		var value = '',
			$input = $('#option-values-collector');
		
		$('.redux-field input[name]:not(#option-values-collector):not([type="radio"]), .redux-field input[name][type="radio"]:checked, .redux-field:not(.redux-container-import_export) textarea[name], .redux-field select[name]').each(function() {
			var $self = $(this),
				name = $self.attr('name'),
				val = $self.val();

			value += name+'~'+val+'~||~';
		});

		$input.val(value);
	}, a.redux.cleanupNameAtts = function() {
		$('.redux-field input:not(#option-values-collector), .redux-field:not(.redux-container-import_export) textarea, .redux-field select').removeAttr('name');
	}, a.redux.tabCheck = function() {
        if (a(".redux-group-tab-link-a").click(function() {
                var b = a(this);
                if (b.parent().hasClass("empty_section") && b.parent().hasClass("hasSubSections")) {
                    var c = a(this).closest("ul").find(".redux-group-tab-link-a"),
                        d = c.index(this);
                    b = c.slice(d + 1, d + 2)
                }
                var e = b.parents(".redux-container:first"),
                    f = b.data("rel"),
                    g = e.find(".redux-group-tab-link-li.active:first .redux-group-tab-link-a").data("rel");
                if (g !== f) {
                    if (a("#currentSection").val(f), b.parents(".postbox-container:first").length || a.cookie("redux_current_tab", f, {
                            expires: 7,
                            path: "/"
                        }), e.find("#" + f + "_section_group_li").parents(".redux-group-tab-link-li").length) {
                        var h = e.find("#" + f + "_section_group_li").parents(".redux-group-tab-link-li").attr("id").split("_");
                        h = h[0]
                    }
                    if (e.find("#toplevel_page_" + redux.args.slug + " .wp-submenu a.current").removeClass("current"), e.find("#toplevel_page_" + redux.args.slug + " .wp-submenu li.current").removeClass("current"), e.find("#toplevel_page_" + redux.args.slug + " .wp-submenu a").each(function() {
                            var b = a(this).attr("href").split("&tab=");
                            (b[1] == f || b[1] == h) && (a(this).addClass("current"), a(this).parent().addClass("current"))
                        }), e.find("#" + g + "_section_group_li").find("#" + g + "_section_group_li").length) e.find("#" + g + "_section_group_li").addClass("activeChild"), e.find("#" + f + "_section_group_li").addClass("active").removeClass("activeChild");
                    else if (e.find("#" + f + "_section_group_li").parents("#" + g + "_section_group_li").length || e.find("#" + g + "_section_group_li").parents("ul.subsection").find("#" + f + "_section_group_li").length) e.find("#" + f + "_section_group_li").parents("#" + g + "_section_group_li").length ? e.find("#" + g + "_section_group_li").addClass("activeChild").removeClass("active") : (e.find("#" + f + "_section_group_li").addClass("active"), e.find("#" + g + "_section_group_li").removeClass("active")), e.find("#" + f + "_section_group_li").removeClass("activeChild").addClass("active");
                    else if (e.find("#" + f + "_section_group_li").addClass("active").removeClass("activeChild").find("ul.subsection").slideDown(), e.find("#" + g + "_section_group_li").find("ul.subsection").length) {
                        e.find("#" + g + "_section_group_li").find("ul.subsection").slideUp("fast", function() {
                            e.find("#" + g + "_section_group_li").removeClass("active").removeClass("activeChild")
                        });
                        var i = e.find("#" + f + "_section_group_li").parents(".hasSubSections:first");
                        i.length > 0 && (e.find("#" + f + "_section_group_li").removeClass("active"), f = i.find(".redux-group-tab-link-a:first").data("rel"), i.hasClass("empty_section") ? (i.find(".subsection li:first").addClass("active"), e.find("#" + f + "_section_group_li").removeClass("active").addClass("activeChild").find("ul.subsection").slideDown(), i = i.find(".subsection li:first"), f = i.find(".redux-group-tab-link-a:first").data("rel")) : e.find("#" + f + "_section_group_li").addClass("active").removeClass("activeChild").find("ul.subsection").slideDown())
                    } else e.find("#" + g + "_section_group_li").parents("ul.subsection").length ? e.find("#" + g + "_section_group_li").parents("#" + f + "_section_group_li").length ? e.find("#" + g + "_section_group_li").removeClass("active") : e.find("#" + g + "_section_group_li").parents("ul.subsection").slideUp("fast", function() {
                        e.find("#" + g + "_section_group_li").removeClass("active"), e.find("#" + g + "_section_group_li").parents(".redux-group-tab-link-li").removeClass("active").removeClass("activeChild"), e.find("#" + f + "_section_group_li").parents(".redux-group-tab-link-li").addClass("activeChild").find("ul.subsection").slideDown(), e.find("#" + f + "_section_group_li").addClass("active")
                    }) : (e.find("#" + g + "_section_group_li").removeClass("active"), e.find("#" + f + "_section_group_li").parents(".redux-group-tab-link-li").length && (e.find("#" + f + "_section_group_li").parents(".redux-group-tab-link-li").addClass("activeChild").find("ul.subsection").slideDown(), e.find("#" + f + "_section_group_li").addClass("active")));
                    e.find("#" + g + "_section_group").hide(), e.find("#" + f + "_section_group").fadeIn(200, function() {
                        0 !== e.find("#redux-footer").length && a.redux.stickyInfo(), a.redux.initFields()
                    }), a("#toplevel_page_" + redux.args.slug).find(".current").removeClass("current")
                }
            }), void 0 !== redux.last_tab) return void a("#" + redux.last_tab + "_section_group_li_a").click();
        var b = decodeURI((new RegExp("tab=(.+?)(&|$)").exec(location.search) || [, ""])[1]);
        "" !== b ? a.cookie("redux_current_tab_get") !== b && (a.cookie("redux_current_tab", b, {
            expires: 7,
            path: "/"
        }), a.cookie("redux_current_tab_get", b, {
            expires: 7,
            path: "/"
        }), a("#" + b + "_section_group_li").click()) : "" !== a.cookie("redux_current_tab_get") && a.removeCookie("redux_current_tab_get");
        var c = a("#" + a.cookie("redux_current_tab") + "_section_group_li_a");
        null === a.cookie("redux_current_tab") || "undefined" == typeof a.cookie("redux_current_tab") || 0 === c.length ? a(".redux-container").find(".redux-group-tab-link-a:first").click() : c.click()
    }, a.redux.initFields = function() {
        a(".redux-group-tab:visible").find(".redux-field-init:visible").each(function() {
            var b = a(this).attr("data-type");
            if ("undefined" != typeof redux.field_objects && redux.field_objects[b] && redux.field_objects[b] && redux.field_objects[b].init(), !redux.customizer && a(this).hasClass("redux_remove_th")) {
                var c = a(this).parents("tr:first"),
                    d = c.find("th:first");
                d.html() && d.html().length > 0 && (a(this).prepend(d.html()), a(this).find(".redux_field_th").css("padding", "0 0 10px 0")), a(this).parent().attr("colspan", "2"), d.remove()
            }
        })
    }, a.redux.notices = function() {
        redux.errors && redux.errors.errors && (a.each(redux.errors.errors, function(b, c) {
            a.each(c.errors, function(b, c) {
                a("#" + redux.args.opt_name + "-" + c.id).addClass("redux-field-error"), 0 === a("#" + redux.args.opt_name + "-" + c.id).parent().find(".redux-th-error").length ? a("#" + redux.args.opt_name + "-" + c.id).append('<div class="redux-th-error">' + c.msg + "</div>") : a("#" + redux.args.opt_name + "-" + c.id).parent().find(".redux-th-error").html(c.msg).css("display", "block")
            })
        }), a(".redux-container").each(function() {
            var b = a(this);
            b.find(".redux-menu-error").remove();
            var c = b.find(".redux-field-error").length;
            c > 0 && (b.find(".redux-field-errors span").text(c), b.find(".redux-field-errors").slideDown(), b.find(".redux-group-tab").each(function() {
                var c = a(this).find(".redux-field-error").length;
                if (c > 0) {
                    var d = a(this).attr("id").split("_");
                    d = d[0], b.find('.redux-group-tab-link-a[data-key="' + d + '"]').prepend('<span class="redux-menu-error">' + c + "</span>"), b.find('.redux-group-tab-link-a[data-key="' + d + '"]').addClass("hasError");
                    var e = b.find('.redux-group-tab-link-a[data-key="' + d + '"]').parents(".hasSubSections:first");
                    e && e.find(".redux-group-tab-link-a:first").addClass("hasError")
                }
            }))
        })), redux.warnings && redux.warnings.warnings && (a.each(redux.warnings.warnings, function(b, c) {
            a.each(c.warnings, function(b, c) {
                a("#" + redux.args.opt_name + "-" + c.id).addClass("redux-field-warning"), 0 === a("#" + redux.args.opt_name + "-" + c.id).parent().find(".redux-th-warning").length ? a("#" + redux.args.opt_name + "-" + c.id).append('<div class="redux-th-warning">' + c.msg + "</div>") : a("#" + redux.args.opt_name + "-" + c.id).parent().find(".redux-th-warning").html(c.msg).css("display", "block")
            })
        }), a(".redux-container").each(function() {
            var b = a(this);
            b.find(".redux-menu-warning").remove();
            var c = b.find(".redux-field-warning").length;
            c > 0 && (b.find(".redux-field-warnings span").text(c), b.find(".redux-field-warnings").slideDown(), b.find(".redux-group-tab").each(function() {
                var c = a(this).find(".redux-field-warning").length;
                if (c > 0) {
                    var d = a(this).attr("id").split("_");
                    d = d[0], b.find('.redux-group-tab-link-a[data-key="' + d + '"]').prepend('<span class="redux-menu-warning">' + c + "</span>"), b.find('.redux-group-tab-link-a[data-key="' + d + '"]').addClass("hasWarning");
                    var e = b.find('.redux-group-tab-link-a[data-key="' + d + '"]').parents(".hasSubSections:first");
                    e && e.find(".redux-group-tab-link-a:first").addClass("hasWarning")
                }
            }))
        }))
    }, a.redux.tabControl = function() {
        a(".redux-section-tabs div").hide(), a(".redux-section-tabs div:first").show(), a(".redux-section-tabs ul li:first").addClass("active"), a(".redux-section-tabs ul li a").click(function() {
            a(".redux-section-tabs ul li").removeClass("active"), a(this).parent().addClass("active");
            var b = a(this).attr("href");
            return a(".redux-section-tabs div").hide(), a(b).fadeIn("medium", function() {
                a.redux.initFields()
            }), !1
        })
    }, a.redux.required = function() {
        a.each(redux.folds, function(b, c) {
            var d = a("#" + redux.args.opt_name + "-" + b);
            if (d.parents("tr:first").addClass("fold"),
                "hide" == c) {
                if (d.parents("tr:first").addClass("hide"), d.hasClass("redux-container-section")) {
                    var e = a("#section-" + b);
                    e.hasClass("redux-section-indent-start") && (a("#section-table-" + b).hide().addClass("hide"), e.hide().addClass("hide"))
                }
                if (d.hasClass("redux-container-info") && a("#info-" + b).hide().addClass("hide"), d.hasClass("redux-container-divide") && a("#divide-" + b).hide().addClass("hide"), d.hasClass("redux-container-raw")) {
                    var f = d.parents().find("table#" + redux.args.opt_name + "-" + b);
                    f.hide().addClass("hide")
                }
            }
        })
    }, a.redux.get_container_value = function(b) {
        var c = a("#" + redux.args.opt_name + "-" + b).serializeForm();
        return null !== c && "object" == typeof c && c.hasOwnProperty(redux.args.opt_name) && (c = c[redux.args.opt_name][b]), a("#" + redux.args.opt_name + "-" + b).hasClass("redux-container-media") && (c = c.url), c
    }, a.redux.check_dependencies = function(b) {
        if (null !== redux.required) {
            var c = a(b),
                d = c.parents(".redux-field:first").data("id");
            if (redux.required.hasOwnProperty(d)) {
                var e = c.parents(".redux-field-container:first"),
                    f = e.parents("tr:first").hasClass(".hide");
                e.parents("tr:first").length || (f = e.parents(".customize-control:first").hasClass(".hide")), a.each(redux.required[d], function(b, c) {
                    var d = a(this),
                        e = !1,
                        g = a("#" + redux.args.opt_name + "-" + b),
                        h = g.parents("tr:first");
                    if (f || (e = a.redux.check_parents_dependencies(b)), e === !0) {
                        if (g.hasClass("redux-container-section")) {
                            var i = a("#section-" + b);
                            i.hasClass("redux-section-indent-start") && i.hasClass("hide") && (a("#section-table-" + b).fadeIn(300).removeClass("hide"), i.fadeIn(300).removeClass("hide"))
                        }
                        if (g.hasClass("redux-container-info") && a("#info-" + b).fadeIn(300).removeClass("hide"), g.hasClass("redux-container-divide") && a("#divide-" + b).fadeIn(300).removeClass("hide"), g.hasClass("redux-container-raw")) {
                            var j = g.parents().find("table#" + redux.args.opt_name + "-" + b);
                            j.fadeIn(300).removeClass("hide")
                        }
                        h.fadeIn(300, function() {
                            a(this).removeClass("hide"), redux.required.hasOwnProperty(b) && a.redux.check_dependencies(a("#" + redux.args.opt_name + "-" + b).children().first()), a.redux.initFields()
                        }), (g.hasClass("redux-container-section") || g.hasClass("redux-container-info")) && h.css({
                            display: "none"
                        })
                    } else e === !1 && h.fadeOut(100, function() {
                        a(this).addClass("hide"), redux.required.hasOwnProperty(b) && a.redux.required_recursive_hide(b)
                    });
                    d.find("select, radio, input[type=checkbox]").trigger("change")
                })
            }
        }
    }, a.redux.required_recursive_hide = function(b) {
        var c = a("#" + redux.args.opt_name + "-" + b).parents("tr:first");
        c.fadeOut(50, function() {
            if (a(this).addClass("hide"), a("#" + redux.args.opt_name + "-" + b).hasClass("redux-container-section")) {
                var c = a("#section-" + b);
                c.hasClass("redux-section-indent-start") && (a("#section-table-" + b).fadeOut(50).addClass("hide"), c.fadeOut(50).addClass("hide"))
            }
            if (a("#" + redux.args.opt_name + "-" + b).hasClass("redux-container-info") && a("#info-" + b).fadeOut(50).addClass("hide"), a("#" + redux.args.opt_name + "-" + b).hasClass("redux-container-divide") && a("#divide-" + b).fadeOut(50).addClass("hide"), a("#" + redux.args.opt_name + "-" + b).hasClass("redux-container-raw")) {
                var d = a("#" + redux.args.opt_name + "-" + b).parents().find("table#" + redux.args.opt_name + "-" + b);
                d.fadeOut(50).addClass("hide")
            }
            redux.required.hasOwnProperty(b) && a.each(redux.required[b], function(b) {
                a.redux.required_recursive_hide(b)
            })
        })
    }, a.redux.check_parents_dependencies = function(b) {
        var c = "";
        return redux.required_child.hasOwnProperty(b) ? a.each(redux.required_child[b], function(b, d) {
            if (a("#" + redux.args.opt_name + "-" + d.parent).parents("tr:first").hasClass(".hide")) c = !1;
            else if (c !== !1) {
                var e = a.redux.get_container_value(d.parent);
                c = a.redux.check_dependencies_visibility(e, d)
            }
        }) : c = !0, c
    }, a.redux.check_dependencies_visibility = function(b, c) {
        var d, e = !1,
            f = c.checkValue,
            g = c.operation;
        switch (g) {
            case "=":
            case "equals":
                a.isArray(b) ? a(b[0]).each(function(b, c) {
                    if (a.isArray(f)) a(f).each(function(a, b) {
                        return c == b ? (e = !0, !0) : void 0
                    });
                    else if (c == f) return e = !0, !0
                }) : a.isArray(f) ? a(f).each(function(a, c) {
                    b == c && (e = !0)
                }) : b == f && (e = !0);
                break;
            case "!=":
            case "not":
                a.isArray(b) ? a(b).each(function(b, c) {
                    if (a.isArray(f)) a(f).each(function(a, b) {
                        return c != b ? (e = !0, !0) : void 0
                    });
                    else if (c != f) return e = !0, !0
                }) : a.isArray(f) ? a(f).each(function(a, c) {
                    b != c && (e = !0)
                }) : b != f && (e = !0);
                break;
            case ">":
            case "greater":
            case "is_larger":
                parseFloat(b) > parseFloat(f) && (e = !0);
                break;
            case ">=":
            case "greater_equal":
            case "is_larger_equal":
                parseFloat(b) >= parseFloat(f) && (e = !0);
                break;
            case "<":
            case "less":
            case "is_smaller":
                parseFloat(b) < parseFloat(f) && (e = !0);
                break;
            case "<=":
            case "less_equal":
            case "is_smaller_equal":
                parseFloat(b) <= parseFloat(f) && (e = !0);
                break;
            case "contains":
                a.isPlainObject(b) && (b = Object.keys(b).map(function(a) {
                    return [a, b[a]]
                })), a.isPlainObject(f) && (f = Object.keys(f).map(function(a) {
                    return [a, f[a]]
                })), a.isArray(f) ? a(f).each(function(c, d) {
                    var f = !1,
                        g = d[0],
                        h = d[1];
                    return a(b).each(function(a, b) {
                        var c = b[0],
                            d = b[1];
                        return g === c && h == d ? (e = !0, f = !0, !1) : void 0
                    }), f === !0 ? !1 : void 0
                }) : -1 !== b.toString().indexOf(f) && (e = !0);
                break;
            case "doesnt_contain":
            case "not_contain":
                a.isPlainObject(b) && (d = Object.keys(b).map(function(a) {
                    return b[a]
                }), b = d), a.isPlainObject(f) && (d = Object.keys(f).map(function(a) {
                    return f[a]
                }), f = d), a.isArray(f) ? a(f).each(function(a, c) {
                    -1 === b.toString().indexOf(c) && (e = !0)
                }) : -1 === b.toString().indexOf(f) && (e = !0);
                break;
            case "is_empty_or":
                ("" === b || b == f) && (e = !0);
                break;
            case "not_empty_and":
                "" !== b && b != f && (e = !0);
                break;
            case "is_empty":
            case "empty":
            case "!isset":
                b && "" !== b && null !== b || (e = !0);
                break;
            case "not_empty":
            case "!empty":
            case "isset":
                b && "" !== b && null !== b && (e = !0)
        }
        return e
    }, a.redux.verifyPos = function(a, b) {
        if (a = a.replace(/^\s+|\s+$/gm, ""), "" === a || -1 == a.search(" ")) return b === !0 ? "top left" : "bottom right";
        var c = a.split(" "),
            d = b ? "top" : "bottom";
        ("top" == c[0] || "center" == c[0] || "bottom" == c[0]) && (d = c[0]);
        var e = b ? "left" : "right";
        return ("left" == c[1] || "center" == c[1] || "right" == c[1]) && (e = c[1]), d + " " + e
    }, a.redux.stickyInfo = function() {
        var b = a(".redux-main").innerWidth() - 20;
        a("#info_bar").isOnScreen() || a("#redux-footer-sticky").isOnScreen() ? (a("#redux-footer").css({
            background: "#eee",
            position: "inherit",
            bottom: "inherit",
            width: "inherit"
        }), a("#redux-sticky-padder").hide(), a("#redux-footer").removeClass("sticky-footer-fixed")) : (a("#redux-footer").css({
            position: "fixed",
            bottom: "0",
            width: b,
            right: 21
        }), a("#redux-footer").addClass("sticky-footer-fixed"), a(".redux-save-warn").css("left", a("#redux-sticky").offset().left), a("#redux-sticky-padder").show()), a("#info_bar").isOnScreen() ? a("#redux-sticky").removeClass("sticky-save-warn") : a("#redux-sticky").addClass("sticky-save-warn")
    }, a.redux.expandOptions = function(b) {
        var c = b.find(".expand_options"),
            d = b.find(".redux-sidebar").width() - 1,
            e = a(".redux-group-menu .active a").data("rel") + "_section_group";
        return c.hasClass("expanded") ? (c.removeClass("expanded"), b.find(".redux-main").removeClass("expand"), b.find(".redux-sidebar").stop().animate({
            "margin-left": "0px"
        }, 500), b.find(".redux-main").stop().animate({
            "margin-left": d
        }, 500, function() {
            b.find(".redux-main").attr("style", "")
        }), b.find(".redux-group-tab").each(function() {
            a(this).attr("id") !== e && a(this).fadeOut("fast")
        })) : (c.addClass("expanded"), b.find(".redux-main").addClass("expand"), b.find(".redux-sidebar").stop().animate({
            "margin-left": -d - 113
        }, 500), b.find(".redux-main").stop().animate({
            "margin-left": "-1px"
        }, 500), b.find(".redux-group-tab").fadeIn("medium", function() {
            a.redux.initFields()
        })), !1
    }, a.redux.scaleToRatio = function(b, c, d) {
        var e = 0,
            f = b.attr("data-width");
        f || (f = b.width(), b.attr("data-width", f));
        var g = b.attr("data-height"),
            h = b.height();
        (!g || h > g) && (g = h, b.attr("data-height", g), b.css("width", "auto"), b.attr("data-width", b.width()), f = b.width()), f > d ? (e = d / f, b.css("width", d), b.css("height", g * e), g *= e, f *= e) : b.css("width", "auto"), g > c ? (e = c / g, b.css("height", c), b.css("width", f * e), f *= e, g *= e) : b.css("height", "auto");
        var i = (a(document.getElementById("redux-header")).height() - b.height()) / 2;
        i > 0 ? b.css("margin-top", i) : b.css("margin-top", 0), a("#redux-header .redux_field_search") && a("#redux-header .redux_field_search").css("right", a(b).width() + 20)
    }, a.redux.resizeAds = function() {
        var b, c = a("#redux-header");
        c.length ? b = c.width() - c.find(".display_header").width() - 30 : (c = a("#customize-info"), b = c.width());
        var d = c.height(),
            e = c.find(".rAds");
        a(e).find("video").each(function() {
            a.redux.scaleToRatio(a(this), d, b)
        }), a(e).find("img").each(function() {
            a.redux.scaleToRatio(a(this), d, b)
        }), a(e).find("div").each(function() {
            a.redux.scaleToRatio(a(this), d, b)
        }), "-99999px" == e.css("left") && e.css("display", "none").css("left", "auto"), e.fadeIn("slow")
    }, a(document).ready(function() {
        redux.rAds && setTimeout(function() {
            var b;
            a("#redux-header").length > 0 ? (a("#redux-header").append('<div class="rAds"></div>'), b = a("#redux-header")) : (a("#customize-theme-controls ul").first().prepend('<li id="redux_rAds" class="accordion-section rAdsContainer" style="position: relative;"><div class="rAds"></div></li>'), b = a("#redux_rAds")), b.css("position", "relative"), b.find(".rAds").attr("style", "position:absolute; top: 6px; right: 6px; display:block !important;overflow:hidden;").css("left", "-99999px"), b.find(".rAds").html(redux.rAds.replace(/<br\s?\/?>/, ""));
            var c = b.find(".rAds");
            b.height(), b.width() - b.find(".display_header").width() - 30;
            c.find("a").css("float", "right").css("line-height", b.height() + "px").css("margin-left", "5px"), a(document).ajaxComplete(function() {
                c.find("a").hide(), setTimeout(function() {
                    a.redux.resizeAds(), c.find("a").fadeIn()
                }, 1400), setTimeout(function() {
                    a.redux.resizeAds()
                }, 1500), a(document).unbind("ajaxComplete")
            }), a(window).resize(function() {
                a.redux.resizeAds()
            })
        }, 400)
    })
}(jQuery), jQuery.noConflict();
var confirmOnPageExit = function(a) {
    a = a || window.event;
    var b = redux.args.save_pending;
    return a && (a.returnValue = b), window.onbeforeunload = null, b
};