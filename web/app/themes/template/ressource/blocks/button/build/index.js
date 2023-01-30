;(window.webpackJsonp = window.webpackJsonp || []).push([
   [1],
   { 10: function (e, t, r) {} },
]),
   (function (e) {
      function t(t) {
         for (
            var n, i, c = t[0], a = t[1], u = t[2], b = 0, p = [];
            b < c.length;
            b++
         )
            (i = c[b]),
               Object.prototype.hasOwnProperty.call(o, i) &&
                  o[i] &&
                  p.push(o[i][0]),
               (o[i] = 0)
         for (n in a)
            Object.prototype.hasOwnProperty.call(a, n) && (e[n] = a[n])
         for (s && s(t); p.length; ) p.shift()()
         return l.push.apply(l, u || []), r()
      }
      function r() {
         for (var e, t = 0; t < l.length; t++) {
            for (var r = l[t], n = !0, c = 1; c < r.length; c++) {
               var a = r[c]
               0 !== o[a] && (n = !1)
            }
            n && (l.splice(t--, 1), (e = i((i.s = r[0]))))
         }
         return e
      }
      var n = {},
         o = { 0: 0 },
         l = []
      function i(t) {
         if (n[t]) return n[t].exports
         var r = (n[t] = { i: t, l: !1, exports: {} })
         return e[t].call(r.exports, r, r.exports, i), (r.l = !0), r.exports
      }
      ;(i.m = e),
         (i.c = n),
         (i.d = function (e, t, r) {
            i.o(e, t) || Object.defineProperty(e, t, { enumerable: !0, get: r })
         }),
         (i.r = function (e) {
            'undefined' != typeof Symbol &&
               Symbol.toStringTag &&
               Object.defineProperty(e, Symbol.toStringTag, {
                  value: 'Module',
               }),
               Object.defineProperty(e, '__esModule', { value: !0 })
         }),
         (i.t = function (e, t) {
            if ((1 & t && (e = i(e)), 8 & t)) return e
            if (4 & t && 'object' == typeof e && e && e.__esModule) return e
            var r = Object.create(null)
            if (
               (i.r(r),
               Object.defineProperty(r, 'default', {
                  enumerable: !0,
                  value: e,
               }),
               2 & t && 'string' != typeof e)
            )
               for (var n in e)
                  i.d(
                     r,
                     n,
                     function (t) {
                        return e[t]
                     }.bind(null, n),
                  )
            return r
         }),
         (i.n = function (e) {
            var t =
               e && e.__esModule
                  ? function () {
                       return e.default
                    }
                  : function () {
                       return e
                    }
            return i.d(t, 'a', t), t
         }),
         (i.o = function (e, t) {
            return Object.prototype.hasOwnProperty.call(e, t)
         }),
         (i.p = '')
      var c = (window.webpackJsonp = window.webpackJsonp || []),
         a = c.push.bind(c)
      ;(c.push = t), (c = c.slice())
      for (var u = 0; u < c.length; u++) t(c[u])
      var s = a
      l.push([17, 1]), r()
   })([
      function (e, t) {
         !(function () {
            e.exports = this.wp.element
         })()
      },
      function (e, t) {
         !(function () {
            e.exports = this.wp.i18n
         })()
      },
      function (e, t) {
         !(function () {
            e.exports = this.wp.components
         })()
      },
      function (e, t) {
         !(function () {
            e.exports = this.wp.blockEditor
         })()
      },
      function (e, t) {
         e.exports = function (e, t, r) {
            return (
               t in e
                  ? Object.defineProperty(e, t, {
                       value: r,
                       enumerable: !0,
                       configurable: !0,
                       writable: !0,
                    })
                  : (e[t] = r),
               e
            )
         }
      },
      function (e, t, r) {
         var n
         !(function () {
            'use strict'
            var r = {}.hasOwnProperty
            function o() {
               for (var e = [], t = 0; t < arguments.length; t++) {
                  var n = arguments[t]
                  if (n) {
                     var l = typeof n
                     if ('string' === l || 'number' === l) e.push(n)
                     else if (Array.isArray(n) && n.length) {
                        var i = o.apply(null, n)
                        i && e.push(i)
                     } else if ('object' === l)
                        for (var c in n) r.call(n, c) && n[c] && e.push(c)
                  }
               }
               return e.join(' ')
            }
            e.exports
               ? ((o.default = o), (e.exports = o))
               : void 0 ===
                    (n = function () {
                       return o
                    }.apply(t, [])) || (e.exports = n)
         })()
      },
      function (e, t) {
         !(function () {
            e.exports = this.wp.primitives
         })()
      },
      function (e, t) {
         !(function () {
            e.exports = this.wp.keycodes
         })()
      },
      function (e, t) {
         !(function () {
            e.exports = this.wp.blocks
         })()
      },
      function (e, t, r) {
         var n = r(11),
            o = r(12),
            l = r(13),
            i = r(15)
         e.exports = function (e, t) {
            return n(e) || o(e, t) || l(e, t) || i()
         }
      },
      ,
      function (e, t) {
         e.exports = function (e) {
            if (Array.isArray(e)) return e
         }
      },
      function (e, t) {
         e.exports = function (e, t) {
            if ('undefined' != typeof Symbol && Symbol.iterator in Object(e)) {
               var r = [],
                  n = !0,
                  o = !1,
                  l = void 0
               try {
                  for (
                     var i, c = e[Symbol.iterator]();
                     !(n = (i = c.next()).done) &&
                     (r.push(i.value), !t || r.length !== t);
                     n = !0
                  );
               } catch (e) {
                  ;(o = !0), (l = e)
               } finally {
                  try {
                     n || null == c.return || c.return()
                  } finally {
                     if (o) throw l
                  }
               }
               return r
            }
         }
      },
      function (e, t, r) {
         var n = r(14)
         e.exports = function (e, t) {
            if (e) {
               if ('string' == typeof e) return n(e, t)
               var r = Object.prototype.toString.call(e).slice(8, -1)
               return (
                  'Object' === r && e.constructor && (r = e.constructor.name),
                  'Map' === r || 'Set' === r
                     ? Array.from(e)
                     : 'Arguments' === r ||
                       /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(r)
                     ? n(e, t)
                     : void 0
               )
            }
         }
      },
      function (e, t) {
         e.exports = function (e, t) {
            ;(null == t || t > e.length) && (t = e.length)
            for (var r = 0, n = new Array(t); r < t; r++) n[r] = e[r]
            return n
         }
      },
      function (e, t) {
         e.exports = function () {
            throw new TypeError(
               'Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.',
            )
         }
      },
      function (e, t, r) {},
      function (e, t, r) {
         'use strict'
         r.r(t)
         var n = r(8),
            o = r(1),
            l = (r(10), r(4)),
            i = r.n(l),
            c = r(9),
            a = r.n(c),
            u = r(0),
            s = r(5),
            b = r.n(s),
            p = (r(16), r(2)),
            d = r(3),
            f = r(7),
            g = r(6),
            v = Object(u.createElement)(
               g.SVG,
               { xmlns: 'http://www.w3.org/2000/svg', viewBox: '0 0 24 24' },
               Object(u.createElement)(g.Path, {
                  d:
                     'M15.6 7.2H14v1.5h1.6c2 0 3.7 1.7 3.7 3.7s-1.7 3.7-3.7 3.7H14v1.5h1.6c2.8 0 5.2-2.3 5.2-5.2 0-2.9-2.3-5.2-5.2-5.2zM4.7 12.4c0-2 1.7-3.7 3.7-3.7H10V7.2H8.4c-2.9 0-5.2 2.3-5.2 5.2 0 2.9 2.3 5.2 5.2 5.2H10v-1.5H8.4c-2 0-3.7-1.7-3.7-3.7zm4.6.9h5.3v-1.5H9.3v1.5z',
               }),
            ),
            O = Object(u.createElement)(
               g.SVG,
               { xmlns: 'http://www.w3.org/2000/svg', viewBox: '0 0 24 24' },
               Object(u.createElement)(g.Path, {
                  d:
                     'M15.6 7.3h-.7l1.6-3.5-.9-.4-3.9 8.5H9v1.5h2l-1.3 2.8H8.4c-2 0-3.7-1.7-3.7-3.7s1.7-3.7 3.7-3.7H10V7.3H8.4c-2.9 0-5.2 2.3-5.2 5.2 0 2.9 2.3 5.2 5.2 5.2H9l-1.4 3.2.9.4 5.7-12.5h1.4c2 0 3.7 1.7 3.7 3.7s-1.7 3.7-3.7 3.7H14v1.5h1.6c2.9 0 5.2-2.3 5.2-5.2 0-2.9-2.4-5.2-5.2-5.2z',
               }),
            )
         function y(e, t) {
            var r = Object.keys(e)
            if (Object.getOwnPropertySymbols) {
               var n = Object.getOwnPropertySymbols(e)
               t &&
                  (n = n.filter(function (t) {
                     return Object.getOwnPropertyDescriptor(e, t).enumerable
                  })),
                  r.push.apply(r, n)
            }
            return r
         }
         function h(e) {
            for (var t = 1; t < arguments.length; t++) {
               var r = null != arguments[t] ? arguments[t] : {}
               t % 2
                  ? y(Object(r), !0).forEach(function (t) {
                       i()(e, t, r[t])
                    })
                  : Object.getOwnPropertyDescriptors
                  ? Object.defineProperties(
                       e,
                       Object.getOwnPropertyDescriptors(r),
                    )
                  : y(Object(r)).forEach(function (t) {
                       Object.defineProperty(
                          e,
                          t,
                          Object.getOwnPropertyDescriptor(r, t),
                       )
                    })
            }
            return e
         }
         function j(e) {
            var t = e.borderRadius,
               r = void 0 === t ? '' : t,
               n = e.setAttributes,
               l = r,
               i = Object(u.useCallback)(
                  function (e) {
                     n(void 0 === e ? { borderRadius: l } : { borderRadius: e })
                  },
                  [n],
               )
            return Object(u.createElement)(
               p.PanelBody,
               { title: Object(o.__)('Border settings'), opened: !1 },
               Object(u.createElement)(p.RangeControl, {
                  value: r,
                  label: Object(o.__)('Border radius'),
                  min: 0,
                  max: 50,
                  initialPosition: 0,
                  allowReset: !0,
                  onChange: i,
               }),
            )
         }
         function m(e) {
            var t,
               r = e.isSelected,
               n = e.url,
               l = e.setAttributes,
               c = e.opensInNewTab,
               s = e.onToggleOpenInNewTab,
               b = Object(u.useState)(!1),
               g = a()(b, 2),
               y = g[0],
               h = g[1],
               j = !!n,
               m = j && r,
               w = function () {
                  return h(!0), !1
               },
               k = function () {
                  l({ url: void 0, linkTarget: void 0, rel: void 0 }), h(!1)
               },
               x =
                  (y || m) &&
                  Object(u.createElement)(
                     p.Popover,
                     {
                        position: 'bottom center',
                        onClose: function () {
                           return h(!1)
                        },
                     },
                     Object(u.createElement)(d.__experimentalLinkControl, {
                        className:
                           'wp-block-navigation-link__inline-link-input',
                        value: { url: n, opensInNewTab: c },
                        onChange: function (e) {
                           var t = e.url,
                              r = void 0 === t ? '' : t,
                              n = e.opensInNewTab
                           l({ url: r }), c !== n && s(n)
                        },
                     }),
                  )
            return Object(u.createElement)(
               u.Fragment,
               null,
               Object(u.createElement)(
                  d.BlockControls,
                  null,
                  Object(u.createElement)(
                     p.ToolbarGroup,
                     null,
                     !j &&
                        Object(u.createElement)(p.ToolbarButton, {
                           name: 'link',
                           icon: v,
                           title: Object(o.__)('Link'),
                           shortcut: f.displayShortcut.primary('k'),
                           onClick: w,
                        }),
                     m &&
                        Object(u.createElement)(p.ToolbarButton, {
                           name: 'link',
                           icon: O,
                           title: Object(o.__)('Unlink'),
                           shortcut: f.displayShortcut.primaryShift('k'),
                           onClick: k,
                           isActive: !0,
                        }),
                  ),
               ),
               r &&
                  Object(u.createElement)(p.KeyboardShortcuts, {
                     bindGlobal: !0,
                     shortcuts:
                        ((t = {}),
                        i()(t, f.rawShortcut.primary('k'), w),
                        i()(t, f.rawShortcut.primaryShift('k'), k),
                        t),
                  }),
               x,
            )
         }
         function w(e, t) {
            var r = Object.keys(e)
            if (Object.getOwnPropertySymbols) {
               var n = Object.getOwnPropertySymbols(e)
               t &&
                  (n = n.filter(function (t) {
                     return Object.getOwnPropertyDescriptor(e, t).enumerable
                  })),
                  r.push.apply(r, n)
            }
            return r
         }
         Object(n.registerBlockType)('mmoollllee/button', {
            title: Object(o.__)('Button', 'button'),
            description: Object(o.__)(
               'Example block written with ESNext standard and JSX support – build step required.',
               'button',
            ),
            category: 'layout',
            icon: 'button',
            supports: { anchor: !1, align: !0, alignWide: !1, reusable: !1 },
            edit: function (e) {
               var t = e.attributes,
                  r = e.setAttributes,
                  l = e.className,
                  i = e.isSelected,
                  c = e.onReplace,
                  a = e.mergeBlocks,
                  s = t.borderRadius,
                  f = t.linkTarget,
                  g = t.placeholder,
                  v = t.rel,
                  O = t.text,
                  y = t.url,
                  w = t.icon,
                  k = t.iconRight,
                  x = t.iconLeft,
                  _ = Object(u.useCallback)(
                     function (e) {
                        r({ rel: e })
                     },
                     [r],
                  ),
                  C = Object(u.useCallback)(
                     function (e) {
                        var t = e ? '_blank' : void 0,
                           n = v
                        t && !v
                           ? (n = 'noreferrer noopener')
                           : t || 'noreferrer noopener' !== v || (n = void 0),
                           r({ linkTarget: t, rel: n })
                     },
                     [v, r],
                  )
               return Object(u.createElement)(
                  u.Fragment,
                  null,
                  Object(u.createElement)(d.RichText, {
                     placeholder: g || Object(o.__)('Add text…'),
                     value: O,
                     onChange: function (e) {
                        return r({ text: e })
                     },
                     withoutInteractiveFormatting: !0,
                     className: b()(l, 'wp-block-button__link', {
                        'no-border-radius': 0 === s,
                     }),
                     style: { borderRadius: s ? s + 'px' : void 0 },
                     onSplit: function (e) {
                        return Object(n.createBlock)(
                           'mmoollllee/button',
                           h(h({}, t), {}, { text: e }),
                        )
                     },
                     onReplace: c,
                     onMerge: a,
                     identifier: 'text',
                  }),
                  Object(u.createElement)(m, {
                     url: y,
                     setAttributes: r,
                     isSelected: i,
                     opensInNewTab: '_blank' === f,
                     onToggleOpenInNewTab: C,
                  }),
                  Object(u.createElement)(
                     d.InspectorControls,
                     null,
                     Object(u.createElement)(
                        p.PanelBody,
                        { title: Object(o.__)('Link settings') },
                        Object(u.createElement)(p.TextControl, {
                           label: Object(o.__)('Icon davor'),
                           value: x || '',
                           onChange: function (e) {
                              r({ iconLeft: e })
                           },
                        }),
                        Object(u.createElement)(p.TextControl, {
                           label: Object(o.__)('Icon danach'),
                           value: k || '',
                           onChange: function (e) {
                              r({ iconRight: e })
                           },
                        }),
                        Object(u.createElement)(p.TextControl, {
                           label: Object(o.__)('Icon darüber'),
                           value: w || '',
                           onChange: function (e) {
                              r({ icon: e })
                           },
                        }),
                        Object(u.createElement)(p.ToggleControl, {
                           label: Object(o.__)('Open in new tab'),
                           onChange: C,
                           checked: '_blank' === f,
                        }),
                        Object(u.createElement)(p.TextControl, {
                           label: Object(o.__)('Link rel'),
                           value: v || '',
                           onChange: _,
                        }),
                     ),
                     Object(u.createElement)(j, {
                        borderRadius: s,
                        setAttributes: r,
                     }),
                  ),
               )
            },
            save: function (e) {
               var t = e.attributes,
                  r = t.borderRadius,
                  n = t.linkTarget,
                  o = t.rel,
                  l = t.text,
                  c = t.title,
                  a = t.url,
                  s = t.icon,
                  p = t.iconLeft,
                  f = t.iconRight,
                  g = (function (e, t) {
                     var r,
                        n,
                        o,
                        l,
                        c,
                        a,
                        u,
                        s,
                        p,
                        f,
                        g,
                        v =
                           arguments.length > 2 &&
                           void 0 !== arguments[2] &&
                           arguments[2],
                        O = e.backgroundColor,
                        y = e.textColor,
                        h = e.gradient,
                        j = e.style,
                        m = Object(d.getColorClassName)('background-color', O),
                        w = Object(d.__experimentalGetGradientClass)(h),
                        k = Object(d.getColorClassName)('color', y),
                        x = b()(
                           k,
                           w,
                           ((c = {}),
                           i()(
                              c,
                              m,
                              !(null == j ||
                              null === (r = j.color) ||
                              void 0 === r
                                 ? void 0
                                 : r.gradient) && !!m,
                           ),
                           i()(
                              c,
                              'has-text-color',
                              y ||
                                 (null == j ||
                                 null === (n = j.color) ||
                                 void 0 === n
                                    ? void 0
                                    : n.text),
                           ),
                           i()(
                              c,
                              'has-background',
                              O ||
                                 (null == j ||
                                 null === (o = j.color) ||
                                 void 0 === o
                                    ? void 0
                                    : o.background) ||
                                 h ||
                                 (null == j ||
                                 null === (l = j.color) ||
                                 void 0 === l
                                    ? void 0
                                    : l.gradient),
                           ),
                           c),
                        ),
                        _ =
                           (null == j || null === (a = j.color) || void 0 === a
                              ? void 0
                              : a.background) ||
                           (null == j || null === (u = j.color) || void 0 === u
                              ? void 0
                              : u.text) ||
                           (null == j || null === (s = j.color) || void 0 === s
                              ? void 0
                              : s.gradient)
                              ? {
                                   background: (
                                      null == j ||
                                      null === (p = j.color) ||
                                      void 0 === p
                                         ? void 0
                                         : p.gradient
                                   )
                                      ? j.color.gradient
                                      : void 0,
                                   backgroundColor: (
                                      null == j ||
                                      null === (f = j.color) ||
                                      void 0 === f
                                         ? void 0
                                         : f.background
                                   )
                                      ? j.color.background
                                      : void 0,
                                   color: (
                                      null == j ||
                                      null === (g = j.color) ||
                                      void 0 === g
                                         ? void 0
                                         : g.text
                                   )
                                      ? j.color.text
                                      : void 0,
                                }
                              : {}
                     if (v) {
                        if (O) {
                           var C = Object(d.getColorObjectByAttributeValues)(
                              t,
                              O,
                           )
                           _.backgroundColor = C.color
                        }
                        if (y) {
                           var E = Object(d.getColorObjectByAttributeValues)(
                              t,
                              y,
                           )
                           _.color = E.color
                        }
                     }
                     return { className: x || void 0, style: _ }
                  })(t),
                  v = b()('wp-block-button__link', g.className, {
                     'no-border-radius': 0 === r,
                  }),
                  O = (function (e) {
                     for (var t = 1; t < arguments.length; t++) {
                        var r = null != arguments[t] ? arguments[t] : {}
                        t % 2
                           ? w(Object(r), !0).forEach(function (t) {
                                i()(e, t, r[t])
                             })
                           : Object.getOwnPropertyDescriptors
                           ? Object.defineProperties(
                                e,
                                Object.getOwnPropertyDescriptors(r),
                             )
                           : w(Object(r)).forEach(function (t) {
                                Object.defineProperty(
                                   e,
                                   t,
                                   Object.getOwnPropertyDescriptor(r, t),
                                )
                             })
                     }
                     return e
                  })({ borderRadius: r ? r + 'px' : void 0 }, g.style)
               return Object(u.createElement)(
                  'div',
                  null,
                  Object(u.createElement)(d.RichText.Content, {
                     tagName: 'a',
                     className: v,
                     href: a,
                     title: c,
                     style: O,
                     value: l,
                     target: n,
                     rel: o,
                     'data-icon': s,
                     'data-icon-left': p,
                     'data-icon-right': f,
                  }),
               )
            },
            parent: ['mmoollllee/buttons'],
            keywords: [Object(o.__)('link', 'button')],
            attributes: {
               url: {
                  type: 'string',
                  source: 'attribute',
                  selector: 'a',
                  attribute: 'href',
               },
               title: {
                  type: 'string',
                  source: 'attribute',
                  selector: 'a',
                  attribute: 'title',
               },
               text: { type: 'string', source: 'html', selector: 'a' },
               linkTarget: {
                  type: 'string',
                  source: 'attribute',
                  selector: 'a',
                  attribute: 'target',
               },
               rel: {
                  type: 'string',
                  source: 'attribute',
                  selector: 'a',
                  attribute: 'rel',
               },
               icon: {
                  type: 'string',
                  source: 'attribute',
                  selector: 'a',
                  attribute: 'data-icon',
               },
               iconLeft: {
                  type: 'string',
                  source: 'attribute',
                  selector: 'a',
                  attribute: 'data-icon-left',
               },
               iconRight: {
                  type: 'string',
                  source: 'attribute',
                  selector: 'a',
                  attribute: 'data-icon-right',
               },
               placeholder: { type: 'string' },
               borderRadius: { type: 'number', default: 0 },
               style: { type: 'object' },
               backgroundColor: { type: 'string' },
               textColor: { type: 'string' },
               gradient: { type: 'string' },
            },
            example: {
               attributes: {
                  className: 'is-style-outline',
                  borderRadius: 0,
                  backgroundColor: 'white',
                  text: Object(o.__)('Call to Action'),
               },
            },
            styles: [
               { name: 'fill', label: Object(o.__)('Fill') },
               {
                  name: 'outline',
                  label: Object(o.__)('Outline'),
                  isDefault: !0,
               },
            ],
         })
      },
   ])
