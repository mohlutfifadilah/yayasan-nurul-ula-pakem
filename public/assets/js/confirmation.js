/**
 * Minified by jsDelivr using Terser v5.3.5.
 * Original file: /npm/bootstrap-confirmation2@4.2.1/dist/bootstrap-confirmation.js
 *
 * Do NOT use SRI with dynamically generated files! More information: https://www.jsdelivr.com/using-sri-with-dynamic-files
 */
/*!
 * Bootstrap Confirmation (v4.2.1)
 * @copyright 2013 Nimit Suwannagate <ethaizone@hotmail.com>
 * @copyright 2014-2021 Damien "Mistic" Sorel <contact@git.strangeplanet.fr>
 * @licence Apache License, Version 2.0
 */
!(function (t, e) {
    "object" == typeof exports && "undefined" != typeof module
        ? e(require("jquery"), require("bootstrap"))
        : "function" == typeof define && define.amd
          ? define(["jquery", "bootstrap"], e)
          : e(
                (t = "undefined" != typeof globalThis ? globalThis : t || self)
                    .jQuery,
            );
})(this, function (t) {
    "use strict";
    function e(t, e) {
        for (var n = 0; n < e.length; n++) {
            var o = e[n];
            (o.enumerable = o.enumerable || !1),
                (o.configurable = !0),
                "value" in o && (o.writable = !0),
                Object.defineProperty(t, o.key, o);
        }
    }
    function n() {
        return (n =
            Object.assign ||
            function (t) {
                for (var e = 1; e < arguments.length; e++) {
                    var n = arguments[e];
                    for (var o in n)
                        Object.prototype.hasOwnProperty.call(n, o) &&
                            (t[o] = n[o]);
                }
                return t;
            }).apply(this, arguments);
    }
    function o(t, e) {
        return (o =
            Object.setPrototypeOf ||
            function (t, e) {
                return (t.__proto__ = e), t;
            })(t, e);
    }
    if (
        void 0 === t.fn.popover ||
        "4" !== t.fn.popover.Constructor.VERSION.split(".").shift()
    )
        throw new Error(
            "Bootstrap Confirmation 4 requires Bootstrap Popover 4",
        );
    var i = t.fn.popover.Constructor,
        r = "confirmation",
        s = "bs." + r,
        c = "." + s,
        a = t.fn[r],
        l = n({}, i.DefaultType, {
            singleton: "boolean",
            popout: "boolean",
            copyAttributes: "(string|array)",
            onConfirm: "function",
            onCancel: "function",
            btnOkClass: "string",
            btnOkLabel: "string",
            btnOkIconClass: "string",
            btnOkIconContent: "string",
            btnCancelClass: "string",
            btnCancelLabel: "string",
            btnCancelIconClass: "string",
            btnCancelIconContent: "string",
            buttons: "array",
        }),
        f = n({}, i.Default, {
            _attributes: {},
            _selector: null,
            placement: "top",
            title: "Are you sure?",
            trigger: "click",
            confirmationEvent: void 0,
            content: "",
            singleton: !1,
            popout: !1,
            copyAttributes: "href target",
            onConfirm: t.noop,
            onCancel: t.noop,
            btnOkClass: "btn btn-sm btn-primary",
            btnOkLabel: "Yes",
            btnOkIconClass: "",
            btnOkIconContent: "",
            btnCancelClass: "btn btn-sm btn-secondary",
            btnCancelLabel: "No",
            btnCancelIconClass: "",
            btnCancelIconContent: "",
            buttons: [],
            template:
                '\n<div class="popover confirmation">\n  <div class="arrow"></div>\n  <h3 class="popover-header"></h3>\n  <div class="popover-body">\n    <p class="confirmation-content"></p>\n    <div class="confirmation-buttons text-center">\n      <div class="btn-group"></div>\n    </div>\n  </div>\n</div>',
        });
    f.whiteList && f.whiteList["*"].push("data-apply", "data-dismiss");
    var u,
        h = "fade",
        p = "show",
        g = ".popover-header",
        d = ".confirmation-content",
        b = ".confirmation-buttons .btn-group",
        C = { 13: "Enter", 27: "Escape", 39: "ArrowRight", 40: "ArrowDown" },
        v = {
            HIDE: "hide" + c,
            HIDDEN: "hidden" + c,
            SHOW: "show" + c,
            SHOWN: "shown" + c,
            INSERTED: "inserted" + c,
            CLICK: "click" + c,
            FOCUSIN: "focusin" + c,
            FOCUSOUT: "focusout" + c,
            MOUSEENTER: "mouseenter" + c,
            MOUSELEAVE: "mouseleave" + c,
            CONFIRMED: "confirmed" + c,
            CANCELED: "canceled" + c,
            KEYUP: "keyup" + c,
        },
        y = (function (i) {
            var a, y;
            function m(t, e) {
                var n;
                if (
                    ((n = i.call(this, t, e) || this).config.popout ||
                        n.config.singleton) &&
                    !n.config.rootSelector
                )
                    throw new Error(
                        "The rootSelector option is required to use popout and singleton features since jQuery 3.",
                    );
                return (
                    (n._isDelegate = !1),
                    e.selector
                        ? ((e._selector = e.rootSelector + " " + e.selector),
                          (n.config._selector = e._selector))
                        : e._selector
                          ? ((n.config._selector = e._selector),
                            (n._isDelegate = !0))
                          : (n.config._selector = e.rootSelector),
                    void 0 === n.config.confirmationEvent &&
                        (n.config.confirmationEvent = n.config.trigger),
                    n.config.selector || n._copyAttributes(),
                    n._setConfirmationListeners(),
                    n
                );
            }
            (y = i),
                ((a = m).prototype = Object.create(y.prototype)),
                (a.prototype.constructor = a),
                o(a, y);
            var E,
                _,
                O,
                I = m.prototype;
            return (
                (I.isWithContent = function () {
                    return !0;
                }),
                (I.setContent = function () {
                    var e = t(this.getTipElement()),
                        n = this._getContent();
                    "function" == typeof n && (n = n.call(this.element)),
                        this.setElementContent(e.find(g), this.getTitle()),
                        e.find(d).toggle(!!n),
                        n && this.setElementContent(e.find(d), n),
                        this.config.buttons.length > 0
                            ? this._setButtons(e, this.config.buttons)
                            : this._setStandardButtons(e),
                        e.removeClass(h + " " + p),
                        this._setupKeyupEvent();
                }),
                (I.dispose = function () {
                    t("body").off(v.CLICK + "." + this.uid),
                        (this.eventBody = !1),
                        this._cleanKeyupEvent(),
                        i.prototype.dispose.call(this);
                }),
                (I.hide = function (t) {
                    this._cleanKeyupEvent(), i.prototype.hide.call(this, t);
                }),
                (I._getConfig = function (e) {
                    e = i.prototype._getConfig.call(this, e);
                    var o = t(this.element).data();
                    return (
                        Object.keys(o).forEach(function (t) {
                            0 !== t.indexOf("btn") && delete o[t];
                        }),
                        n({}, e, o)
                    );
                }),
                (I._copyAttributes = function () {
                    var e = this;
                    (this.config._attributes = {}),
                        this.config.copyAttributes
                            ? "string" == typeof this.config.copyAttributes &&
                              (this.config.copyAttributes =
                                  this.config.copyAttributes.split(" "))
                            : (this.config.copyAttributes = []),
                        this.config.copyAttributes.forEach(function (n) {
                            e.config._attributes[n] = t(e.element).attr(n);
                        });
                }),
                (I._setConfirmationListeners = function () {
                    var e = this;
                    this.config.selector
                        ? t(this.element).on(
                              this.config.trigger,
                              this.config.selector,
                              function (t, e) {
                                  e ||
                                      (t.preventDefault(),
                                      t.stopPropagation(),
                                      t.stopImmediatePropagation());
                              },
                          )
                        : (t(this.element).on(
                              this.config.trigger,
                              function (t, e) {
                                  e ||
                                      (t.preventDefault(),
                                      t.stopPropagation(),
                                      t.stopImmediatePropagation());
                              },
                          ),
                          t(this.element).on(v.SHOWN, function () {
                              e.config.singleton &&
                                  t(e.config._selector)
                                      .not(t(this))
                                      .filter(function () {
                                          return void 0 !== t(this).data(s);
                                      })
                                      .confirmation("hide");
                          })),
                        this._isDelegate ||
                            ((this.eventBody = !1),
                            (this.uid =
                                this.element.id || m.getUID(r + "_group")),
                            t(this.element).on(v.SHOWN, function () {
                                e.config.popout &&
                                    !e.eventBody &&
                                    (e.eventBody = t("body").on(
                                        v.CLICK + "." + e.uid,
                                        function (n) {
                                            t(e.config._selector).is(
                                                n.target,
                                            ) ||
                                                t(e.config._selector).has(
                                                    n.target,
                                                ).length > 0 ||
                                                (t(e.config._selector)
                                                    .filter(function () {
                                                        return (
                                                            void 0 !==
                                                            t(this).data(s)
                                                        );
                                                    })
                                                    .confirmation("hide"),
                                                t("body").off(
                                                    v.CLICK + "." + e.uid,
                                                ),
                                                (e.eventBody = !1));
                                        },
                                    ));
                            }));
                }),
                (I._setStandardButtons = function (t) {
                    var e = [
                        {
                            class: this.config.btnOkClass,
                            label: this.config.btnOkLabel,
                            iconClass: this.config.btnOkIconClass,
                            iconContent: this.config.btnOkIconContent,
                            attr: this.config._attributes,
                        },
                        {
                            class: this.config.btnCancelClass,
                            label: this.config.btnCancelLabel,
                            iconClass: this.config.btnCancelIconClass,
                            iconContent: this.config.btnCancelIconContent,
                            cancel: !0,
                        },
                    ];
                    this._setButtons(t, e);
                }),
                (I._setButtons = function (e, n) {
                    var o = this,
                        i = e.find(b).empty();
                    n.forEach(function (e) {
                        var n = t('<a href="#"></a>')
                            .addClass("h-100 d-flex align-items-center")
                            .addClass(e.class || "btn btn-sm btn-secondary")
                            .html(e.label || "")
                            .attr(
                                e.attr ||
                                    (e.cancel ? {} : o.config._attributes),
                            );
                        (e.iconClass || e.iconContent) &&
                            n.prepend(
                                t("<i></i>")
                                    .addClass(e.iconClass || "")
                                    .text(e.iconContent || ""),
                            ),
                            n.one("click", function (n) {
                                "#" === t(this).attr("href") &&
                                    n.preventDefault(),
                                    e.onClick && e.onClick.call(t(o.element)),
                                    e.cancel
                                        ? (o.config.onCancel.call(
                                              o.element,
                                              e.value,
                                          ),
                                          t(o.element).trigger(v.CANCELED, [
                                              e.value,
                                          ]))
                                        : (o.config.onConfirm.call(
                                              o.element,
                                              e.value,
                                          ),
                                          t(o.element).trigger(v.CONFIRMED, [
                                              e.value,
                                          ]),
                                          t(o.element).trigger(
                                              o.config.confirmationEvent,
                                              [!0],
                                          )),
                                    o.hide();
                            }),
                            i.append(n);
                    });
                }),
                (I._setupKeyupEvent = function () {
                    (u = this),
                        t(window)
                            .off(v.KEYUP)
                            .on(v.KEYUP, this._onKeyup.bind(this));
                }),
                (I._cleanKeyupEvent = function () {
                    u === this && ((u = void 0), t(window).off(v.KEYUP));
                }),
                (I._onKeyup = function (e) {
                    if (this.tip) {
                        var n,
                            o = t(this.getTipElement()),
                            i = e.key || C[e.keyCode || e.which],
                            r = o.find(b),
                            s = r.find(".active");
                        switch (i) {
                            case "Escape":
                                this.hide();
                                break;
                            case "ArrowRight":
                                (n =
                                    s.length && s.next().length
                                        ? s.next()
                                        : r.children().first()),
                                    s.removeClass("active"),
                                    n.addClass("active").focus();
                                break;
                            case "ArrowLeft":
                                (n =
                                    s.length && s.prev().length
                                        ? s.prev()
                                        : r.children().last()),
                                    s.removeClass("active"),
                                    n.addClass("active").focus();
                        }
                    } else this._cleanKeyupEvent();
                }),
                (m.getUID = function (t) {
                    var e = t;
                    do {
                        e += ~~(1e6 * Math.random());
                    } while (document.getElementById(e));
                    return e;
                }),
                (m._jQueryInterface = function (e) {
                    return this.each(function () {
                        var n = t(this).data(s),
                            o = "object" == typeof e ? e : {};
                        if (
                            ((o.rootSelector =
                                t(this).selector || o.rootSelector),
                            (n || !/destroy|hide/.test(e)) &&
                                (n ||
                                    ((n = new m(this, o)), t(this).data(s, n)),
                                "string" == typeof e))
                        ) {
                            if (void 0 === n[e])
                                throw new TypeError(
                                    'No method named "' + e + '"',
                                );
                            n[e]();
                        }
                    });
                }),
                (E = m),
                (O = [
                    {
                        key: "VERSION",
                        get: function () {
                            return "4.2.1";
                        },
                    },
                    {
                        key: "Default",
                        get: function () {
                            return f;
                        },
                    },
                    {
                        key: "NAME",
                        get: function () {
                            return r;
                        },
                    },
                    {
                        key: "DATA_KEY",
                        get: function () {
                            return s;
                        },
                    },
                    {
                        key: "Event",
                        get: function () {
                            return v;
                        },
                    },
                    {
                        key: "EVENT_KEY",
                        get: function () {
                            return c;
                        },
                    },
                    {
                        key: "DefaultType",
                        get: function () {
                            return l;
                        },
                    },
                ]),
                (_ = null) && e(E.prototype, _),
                O && e(E, O),
                m
            );
        })(i);
    (t.fn[r] = y._jQueryInterface),
        (t.fn[r].Constructor = y),
        (t.fn[r].noConflict = function () {
            return (t.fn[r] = a), y._jQueryInterface;
        });
});
