!function(n){function t(e){if(o[e])return o[e].exports;var r=o[e]={exports:{},id:e,loaded:!1};return n[e].call(r.exports,r,r.exports,t),r.loaded=!0,r.exports}var o={};t.m=n,t.c=o,t.p="",t(0)}([function(n,t,o){n.exports=o(1)},function(n,t,o){"use strict";function e(n){return n&&n.__esModule?n:{default:n}}var r=o(2),i=e(r),a=o(5),u=e(a),c=o(57),s=e(c);window.dpiPPF=function(){function n(n,t){document.body.insertAdjacentHTML("beforeend",'\n            <div class="dpi-forms__user-message dpi-forms__slide-in">\n                <div class="dpi-forms__user-message_content dpi-forms__user-message_'+n+'">\n                    <p class="dpi-forms__user-message_text">'+t+'</p>\n                    <button onclick="(function() {document.body.removeChild(document.querySelector(\'.dpi-forms__user-message\'))}())" class="dpi-forms__user-message_control">\n                        <svg class="dpi-forms__user-message_control-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 62.4 62.4"><path d="M39.7 31.2l21-21c2.3-2.3 2.3-6.1 0-8.5 -2.3-2.3-6.1-2.3-8.5 0L31.2 22.7 10.2 1.8C7.9-0.6 4.1-0.6 1.8 1.8c-2.3 2.3-2.3 6.1 0 8.5L22.7 31.2 1.8 52.2c-2.3 2.3-2.3 6.1 0 8.5C2.9 61.8 4.5 62.4 6 62.4s3.1-0.6 4.2-1.8L31.2 39.7l21 21c1.2 1.2 2.7 1.8 4.2 1.8s3.1-0.6 4.2-1.8c2.3-2.3 2.3-6.1 0-8.5L39.7 31.2z"/></svg>\n                    </button>\n                </div>\n            </div>\n        ')}function t(){var n=_.querySelector('input[name="donationAmount"]').value,t=window.location.href+"?paymentSuccess=1&donationID="+y;b.insertAdjacentHTML("beforeend",'\n            <input type="hidden" name="amount" value="'+n+'">\n            <input type="hidden" name="return" value="'+t+'">\n        ')}function o(n){return[].concat((0,s.default)(n.querySelectorAll(h+"input")),(0,s.default)(n.querySelectorAll(h+"select")),(0,s.default)(n.querySelectorAll(h+"checkbox"))).reduce(function(n,t){var o=t.getAttribute("name");switch(t.tagName){case"INPUT":case"SELECT":n[o]=t.value;break;case"CHECKBOX":n[o]=t.checked}return n},{})}function e(){var n=_.querySelector('div[data-formsection="1"]'),t=_.querySelector('div[data-formsection="2"]'),e=_.querySelector('div[data-formsection="3"]'),r=(0,u.default)(t.querySelectorAll(h+"dynamic-modal_wrapper")),a={1:o(n),2:r.map(function(n){return o(n)}),3:o(e)};window.localStorage.setItem(y,(0,i.default)(a))}function r(){var n=!0;return _.querySelectorAll(h+"input").forEach(function(t){t.hasAttribute("required")&&""===t.value&&(n=!1,t.classList.add(h.replace(/[.|#]/g,"")+"invalid-field"),t.placeholder="this field is required",t.addEventListener("focus",function(){t.classList.remove(h.replace(/[.|#]/g,"")+"invalid-field"),t.placeholder=""}))}),n}function a(){r()?(e(),t(),b.submit()):n("danger","Some fields are invalid. Please check over the form and try re-submitting.")}function c(n){n.parentNode.removeChild(n)}function l(n){n.querySelector(h+"fields-wrapper").insertAdjacentHTML("beforeend",'\n            <div class="dpi-forms__dynamic-modal_wrapper">\n                <button class="dpi-forms__dynamic-modal_control dpi-forms__dynamic-modal_control-danger" data-action="remove_person">\n                    <svg class="dpi-forms__dynamic-modal_control-icon" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 80.7 85.7"><path d="M66.8 23.2c-2.2 0-4 1.8-4 4v50.5H17.9V27.2c0-2.2-1.8-4-4-4s-4 1.8-4 4v54.5c0 2.2 1.8 4 4 4h52.9c2.2 0 4-1.8 4-4V27.2C70.8 25 69 23.2 66.8 23.2z"/><path d="M76.7 10.4H52.9V2.5c0-1.4-1.1-2.5-2.5-2.5H30.3c-1.4 0-2.5 1.1-2.5 2.5v7.9H4c-2.2 0-4 1.8-4 4s1.8 4 4 4h72.7c2.2 0 4-1.8 4-4S78.9 10.4 76.7 10.4zM32.8 5h15.1v5.4H32.8V5z"/><path d="M30.8 69.3V29.9c0-1.4-1.1-2.5-2.5-2.5s-2.5 1.1-2.5 2.5v39.4c0 1.4 1.1 2.5 2.5 2.5S30.8 70.7 30.8 69.3z"/><path d="M42.9 69.4V30c0-1.4-1.1-2.5-2.5-2.5s-2.5 1.1-2.5 2.5v39.4c0 1.4 1.1 2.5 2.5 2.5S42.9 70.8 42.9 69.4z"/><path d="M54.7 69.5V30.1c0-1.4-1.1-2.5-2.5-2.5s-2.5 1.1-2.5 2.5v39.4c0 1.4 1.1 2.5 2.5 2.5S54.7 70.9 54.7 69.5z"/></svg>\n                </button>\n                <label class="dpi-forms__label dpi-forms__label-full_width">\n                    <p class="dpi-forms__label-title">Full Name</p>\n                    <input type="text" class="dpi-forms__input" name="name" />\n                </label>\n                <label class="dpi-forms__label dpi-forms__label-full_width">\n                    <p class="dpi-forms__label-title">Zip</p>\n                    <input type="number" min="0" step="1" class="dpi-forms__input" name="zipCode" />\n                </label>\n                <label class="dpi-forms__label dpi-forms__label-full_width">\n                    <p class="dpi-forms__label-title">City</p>\n                    <input type="text" class="dpi-forms__input" name="city" />\n                </label>\n                <label class="dpi-forms__label dpi-forms__label-full_width">\n                    <p class="dpi-forms__label-title">State</p>\n                    <select class="dpi-forms__input dpi-forms__select" name="state" required >\n                        <option disabled selected value=""></option>\n                        <option value="Alabama">Alabama</option>\n                        <option value="Alaska">Alaska</option>\n                        <option value="Arizonia">Arizonia</option>\n                        <option value="Arkansas">Arkansas</option>\n                        <option value="California">California</option>\n                        <option value="Colorado">Colorado</option>\n                        <option value="Connecticut">Connecticut</option>\n                        <option value="Delaware">Delaware</option>\n                        <option value="Dist. of Columbia">Dist. of Columbia</option>\n                        <option value="Florida">Florida</option>\n                        <option value="Georgia">Georgia</option>\n                        <option value="Hawaii">Hawaii</option>\n                        <option value="Idaho">Idaho</option>\n                        <option value="Illinois">Illinois</option>\n                        <option value="Indiana">Indiana</option>\n                        <option value="Iowa">Iowa</option>\n                        <option value="Kansas">Kansas</option>\n                        <option value="Kentucky">Kentucky</option>\n                        <option value="Louisiana">Louisiana</option>\n                        <option value="Maine">Maine</option>\n                        <option value="Maryland">Maryland</option>\n                        <option value="Massachusetts">Massachusetts</option>\n                        <option value="Michigan">Michigan</option>\n                        <option value="Minnesota">Minnesota</option>\n                        <option value="Mississippi">Mississippi</option>\n                        <option value="Missouri">Missouri</option>\n                        <option value="Montana">Montana</option>\n                        <option value="Nebraska">Nebraska</option>\n                        <option value="Nevada">Nevada</option>\n                        <option value="New Hampshire">New Hampshire</option>\n                        <option value="New Jersey">New Jersey</option>\n                        <option value="New Mexico">New Mexico</option>\n                        <option value="New York">New York</option>\n                        <option value="North Carolina">North Carolina</option>\n                        <option value="North Dakota">North Dakota</option>\n                        <option value="Ohio">Ohio</option>\n                        <option value="Oklahoma">Oklahoma</option>\n                        <option value="Oregon">Oregon</option>\n                        <option value="Pennsylvania">Pennsylvania</option>\n                        <option value="Rhode Island">Rhode Island</option>\n                        <option value="South Carolina">South Carolina</option>\n                        <option value="South Dakota">South Dakota</option>\n                        <option value="Tennessee">Tennessee</option>\n                        <option value="Texas">Texas</option>\n                        <option value="Utah">Utah</option>\n                        <option value="Vermont">Vermont</option>\n                        <option value="Virginia">Virginia</option>\n                        <option value="Washington">Washington</option>\n                        <option value="West Virginia">West Virginia</option>\n                        <option value="Wisconsin">Wisconsin</option>\n                        <option value="Wyoming">Wyoming</option>\n                    </select>\n                </label>\n                <label class="dpi-forms__label dpi-forms__label-full_width">\n                    <p class="dpi-forms__label-title">Address</p>\n                    <input type="text" class="dpi-forms__input" name="address" />\n                </label>\n            </div>\n        ')}function p(n){if(n.target.dataset.action)switch(n.target.dataset.action){case"add_person":l(this);break;case"remove_person":c(n.target.parentNode)}}function f(){try{g.addEventListener("click",p),x.addEventListener("click",a)}catch(n){console.error("DPI PPF: Unable to bind events!")}}function d(){_=document.getElementById("dpi-forms__root"),b=_.querySelector(h+"paypal-submit"),g=_.querySelector(h+"dynamic-modals"),x=_.querySelector(h+"submit")}function v(){d(),f()}function m(n){"loading"!=document.readyState?n():document.addEventListener("DOMContentLoaded",n)}var y=void 0,h=void 0,_=void 0,b=void 0,g=void 0,x=void 0;return{init:function(n){h=n.namespace||".dpi-forms__",y=n.id||1,m(v)}}}()},function(n,t,o){n.exports={default:o(3),__esModule:!0}},function(n,t,o){var e=o(4),r=e.JSON||(e.JSON={stringify:JSON.stringify});n.exports=function(n){return r.stringify.apply(r,arguments)}},function(n,t){var o=n.exports={version:"2.4.0"};"number"==typeof __e&&(__e=o)},function(n,t,o){n.exports={default:o(6),__esModule:!0}},function(n,t,o){o(7),o(50),n.exports=o(4).Array.from},function(n,t,o){"use strict";var e=o(8)(!0);o(11)(String,"String",function(n){this._t=String(n),this._i=0},function(){var n,t=this._t,o=this._i;return o>=t.length?{value:void 0,done:!0}:(n=e(t,o),this._i+=n.length,{value:n,done:!1})})},function(n,t,o){var e=o(9),r=o(10);n.exports=function(n){return function(t,o){var i,a,u=String(r(t)),c=e(o),s=u.length;return c<0||c>=s?n?"":void 0:(i=u.charCodeAt(c),i<55296||i>56319||c+1===s||(a=u.charCodeAt(c+1))<56320||a>57343?n?u.charAt(c):i:n?u.slice(c,c+2):a-56320+(i-55296<<10)+65536)}}},function(n,t){var o=Math.ceil,e=Math.floor;n.exports=function(n){return isNaN(n=+n)?0:(n>0?e:o)(n)}},function(n,t){n.exports=function(n){if(void 0==n)throw TypeError("Can't call method on  "+n);return n}},function(n,t,o){"use strict";var e=o(12),r=o(13),i=o(27),a=o(17),u=o(28),c=o(29),s=o(30),l=o(46),p=o(48),f=o(47)("iterator"),d=!([].keys&&"next"in[].keys()),v=function(){return this};n.exports=function(n,t,o,m,y,h,_){s(o,t,m);var b,g,x,w=function(n){if(!d&&n in A)return A[n];switch(n){case"keys":case"values":return function(){return new o(this,n)}}return function(){return new o(this,n)}},S=t+" Iterator",M="values"==y,O=!1,A=n.prototype,k=A[f]||A["@@iterator"]||y&&A[y],C=k||w(y),j=y?M?w("entries"):C:void 0,N="Array"==t?A.entries||k:k;if(N&&(x=p(N.call(new n)))!==Object.prototype&&(l(x,S,!0),e||u(x,f)||a(x,f,v)),M&&k&&"values"!==k.name&&(O=!0,C=function(){return k.call(this)}),e&&!_||!d&&!O&&A[f]||a(A,f,C),c[t]=C,c[S]=v,y)if(b={values:M?C:w("values"),keys:h?C:w("keys"),entries:j},_)for(g in b)g in A||i(A,g,b[g]);else r(r.P+r.F*(d||O),t,b);return b}},function(n,t){n.exports=!0},function(n,t,o){var e=o(14),r=o(4),i=o(15),a=o(17),u=function(n,t,o){var c,s,l,p=n&u.F,f=n&u.G,d=n&u.S,v=n&u.P,m=n&u.B,y=n&u.W,h=f?r:r[t]||(r[t]={}),_=h.prototype,b=f?e:d?e[t]:(e[t]||{}).prototype;f&&(o=t);for(c in o)(s=!p&&b&&void 0!==b[c])&&c in h||(l=s?b[c]:o[c],h[c]=f&&"function"!=typeof b[c]?o[c]:m&&s?i(l,e):y&&b[c]==l?function(n){var t=function(t,o,e){if(this instanceof n){switch(arguments.length){case 0:return new n;case 1:return new n(t);case 2:return new n(t,o)}return new n(t,o,e)}return n.apply(this,arguments)};return t.prototype=n.prototype,t}(l):v&&"function"==typeof l?i(Function.call,l):l,v&&((h.virtual||(h.virtual={}))[c]=l,n&u.R&&_&&!_[c]&&a(_,c,l)))};u.F=1,u.G=2,u.S=4,u.P=8,u.B=16,u.W=32,u.U=64,u.R=128,n.exports=u},function(n,t){var o=n.exports="undefined"!=typeof window&&window.Math==Math?window:"undefined"!=typeof self&&self.Math==Math?self:Function("return this")();"number"==typeof __g&&(__g=o)},function(n,t,o){var e=o(16);n.exports=function(n,t,o){if(e(n),void 0===t)return n;switch(o){case 1:return function(o){return n.call(t,o)};case 2:return function(o,e){return n.call(t,o,e)};case 3:return function(o,e,r){return n.call(t,o,e,r)}}return function(){return n.apply(t,arguments)}}},function(n,t){n.exports=function(n){if("function"!=typeof n)throw TypeError(n+" is not a function!");return n}},function(n,t,o){var e=o(18),r=o(26);n.exports=o(22)?function(n,t,o){return e.f(n,t,r(1,o))}:function(n,t,o){return n[t]=o,n}},function(n,t,o){var e=o(19),r=o(21),i=o(25),a=Object.defineProperty;t.f=o(22)?Object.defineProperty:function(n,t,o){if(e(n),t=i(t,!0),e(o),r)try{return a(n,t,o)}catch(n){}if("get"in o||"set"in o)throw TypeError("Accessors not supported!");return"value"in o&&(n[t]=o.value),n}},function(n,t,o){var e=o(20);n.exports=function(n){if(!e(n))throw TypeError(n+" is not an object!");return n}},function(n,t){n.exports=function(n){return"object"==typeof n?null!==n:"function"==typeof n}},function(n,t,o){n.exports=!o(22)&&!o(23)(function(){return 7!=Object.defineProperty(o(24)("div"),"a",{get:function(){return 7}}).a})},function(n,t,o){n.exports=!o(23)(function(){return 7!=Object.defineProperty({},"a",{get:function(){return 7}}).a})},function(n,t){n.exports=function(n){try{return!!n()}catch(n){return!0}}},function(n,t,o){var e=o(20),r=o(14).document,i=e(r)&&e(r.createElement);n.exports=function(n){return i?r.createElement(n):{}}},function(n,t,o){var e=o(20);n.exports=function(n,t){if(!e(n))return n;var o,r;if(t&&"function"==typeof(o=n.toString)&&!e(r=o.call(n)))return r;if("function"==typeof(o=n.valueOf)&&!e(r=o.call(n)))return r;if(!t&&"function"==typeof(o=n.toString)&&!e(r=o.call(n)))return r;throw TypeError("Can't convert object to primitive value")}},function(n,t){n.exports=function(n,t){return{enumerable:!(1&n),configurable:!(2&n),writable:!(4&n),value:t}}},function(n,t,o){n.exports=o(17)},function(n,t){var o={}.hasOwnProperty;n.exports=function(n,t){return o.call(n,t)}},function(n,t){n.exports={}},function(n,t,o){"use strict";var e=o(31),r=o(26),i=o(46),a={};o(17)(a,o(47)("iterator"),function(){return this}),n.exports=function(n,t,o){n.prototype=e(a,{next:r(1,o)}),i(n,t+" Iterator")}},function(n,t,o){var e=o(19),r=o(32),i=o(44),a=o(41)("IE_PROTO"),u=function(){},c=function(){var n,t=o(24)("iframe"),e=i.length;for(t.style.display="none",o(45).appendChild(t),t.src="javascript:",n=t.contentWindow.document,n.open(),n.write("<script>document.F=Object<\/script>"),n.close(),c=n.F;e--;)delete c.prototype[i[e]];return c()};n.exports=Object.create||function(n,t){var o;return null!==n?(u.prototype=e(n),o=new u,u.prototype=null,o[a]=n):o=c(),void 0===t?o:r(o,t)}},function(n,t,o){var e=o(18),r=o(19),i=o(33);n.exports=o(22)?Object.defineProperties:function(n,t){r(n);for(var o,a=i(t),u=a.length,c=0;u>c;)e.f(n,o=a[c++],t[o]);return n}},function(n,t,o){var e=o(34),r=o(44);n.exports=Object.keys||function(n){return e(n,r)}},function(n,t,o){var e=o(28),r=o(35),i=o(38)(!1),a=o(41)("IE_PROTO");n.exports=function(n,t){var o,u=r(n),c=0,s=[];for(o in u)o!=a&&e(u,o)&&s.push(o);for(;t.length>c;)e(u,o=t[c++])&&(~i(s,o)||s.push(o));return s}},function(n,t,o){var e=o(36),r=o(10);n.exports=function(n){return e(r(n))}},function(n,t,o){var e=o(37);n.exports=Object("z").propertyIsEnumerable(0)?Object:function(n){return"String"==e(n)?n.split(""):Object(n)}},function(n,t){var o={}.toString;n.exports=function(n){return o.call(n).slice(8,-1)}},function(n,t,o){var e=o(35),r=o(39),i=o(40);n.exports=function(n){return function(t,o,a){var u,c=e(t),s=r(c.length),l=i(a,s);if(n&&o!=o){for(;s>l;)if((u=c[l++])!=u)return!0}else for(;s>l;l++)if((n||l in c)&&c[l]===o)return n||l||0;return!n&&-1}}},function(n,t,o){var e=o(9),r=Math.min;n.exports=function(n){return n>0?r(e(n),9007199254740991):0}},function(n,t,o){var e=o(9),r=Math.max,i=Math.min;n.exports=function(n,t){return n=e(n),n<0?r(n+t,0):i(n,t)}},function(n,t,o){var e=o(42)("keys"),r=o(43);n.exports=function(n){return e[n]||(e[n]=r(n))}},function(n,t,o){var e=o(14),r=e["__core-js_shared__"]||(e["__core-js_shared__"]={});n.exports=function(n){return r[n]||(r[n]={})}},function(n,t){var o=0,e=Math.random();n.exports=function(n){return"Symbol(".concat(void 0===n?"":n,")_",(++o+e).toString(36))}},function(n,t){n.exports="constructor,hasOwnProperty,isPrototypeOf,propertyIsEnumerable,toLocaleString,toString,valueOf".split(",")},function(n,t,o){n.exports=o(14).document&&document.documentElement},function(n,t,o){var e=o(18).f,r=o(28),i=o(47)("toStringTag");n.exports=function(n,t,o){n&&!r(n=o?n:n.prototype,i)&&e(n,i,{configurable:!0,value:t})}},function(n,t,o){var e=o(42)("wks"),r=o(43),i=o(14).Symbol,a="function"==typeof i;(n.exports=function(n){return e[n]||(e[n]=a&&i[n]||(a?i:r)("Symbol."+n))}).store=e},function(n,t,o){var e=o(28),r=o(49),i=o(41)("IE_PROTO"),a=Object.prototype;n.exports=Object.getPrototypeOf||function(n){return n=r(n),e(n,i)?n[i]:"function"==typeof n.constructor&&n instanceof n.constructor?n.constructor.prototype:n instanceof Object?a:null}},function(n,t,o){var e=o(10);n.exports=function(n){return Object(e(n))}},function(n,t,o){"use strict";var e=o(15),r=o(13),i=o(49),a=o(51),u=o(52),c=o(39),s=o(53),l=o(54);r(r.S+r.F*!o(56)(function(n){Array.from(n)}),"Array",{from:function(n){var t,o,r,p,f=i(n),d="function"==typeof this?this:Array,v=arguments.length,m=v>1?arguments[1]:void 0,y=void 0!==m,h=0,_=l(f);if(y&&(m=e(m,v>2?arguments[2]:void 0,2)),void 0==_||d==Array&&u(_))for(t=c(f.length),o=new d(t);t>h;h++)s(o,h,y?m(f[h],h):f[h]);else for(p=_.call(f),o=new d;!(r=p.next()).done;h++)s(o,h,y?a(p,m,[r.value,h],!0):r.value);return o.length=h,o}})},function(n,t,o){var e=o(19);n.exports=function(n,t,o,r){try{return r?t(e(o)[0],o[1]):t(o)}catch(t){var i=n.return;throw void 0!==i&&e(i.call(n)),t}}},function(n,t,o){var e=o(29),r=o(47)("iterator"),i=Array.prototype;n.exports=function(n){return void 0!==n&&(e.Array===n||i[r]===n)}},function(n,t,o){"use strict";var e=o(18),r=o(26);n.exports=function(n,t,o){t in n?e.f(n,t,r(0,o)):n[t]=o}},function(n,t,o){var e=o(55),r=o(47)("iterator"),i=o(29);n.exports=o(4).getIteratorMethod=function(n){if(void 0!=n)return n[r]||n["@@iterator"]||i[e(n)]}},function(n,t,o){var e=o(37),r=o(47)("toStringTag"),i="Arguments"==e(function(){return arguments}()),a=function(n,t){try{return n[t]}catch(n){}};n.exports=function(n){var t,o,u;return void 0===n?"Undefined":null===n?"Null":"string"==typeof(o=a(t=Object(n),r))?o:i?e(t):"Object"==(u=e(t))&&"function"==typeof t.callee?"Arguments":u}},function(n,t,o){var e=o(47)("iterator"),r=!1;try{var i=[7][e]();i.return=function(){r=!0},Array.from(i,function(){throw 2})}catch(n){}n.exports=function(n,t){if(!t&&!r)return!1;var o=!1;try{var i=[7],a=i[e]();a.next=function(){return{done:o=!0}},i[e]=function(){return a},n(i)}catch(n){}return o}},function(n,t,o){"use strict";t.__esModule=!0;var e=o(5),r=function(n){return n&&n.__esModule?n:{default:n}}(e);t.default=function(n){if(Array.isArray(n)){for(var t=0,o=Array(n.length);t<n.length;t++)o[t]=n[t];return o}return(0,r.default)(n)}}]);