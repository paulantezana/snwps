
(function(){function r(e,n,t){function o(i,f){if(!n[i]){if(!e[i]){var c="function"==typeof require&&require;if(!f&&c)return c(i,!0);if(u)return u(i,!0);var a=new Error("Cannot find module '"+i+"'");throw a.code="MODULE_NOT_FOUND",a}var p=n[i]={exports:{}};e[i][0].call(p.exports,function(r){var n=e[i][1][r];return o(n||r)},p,p.exports,r,e,n,t)}return n[i].exports}for(var u="function"==typeof require&&require,i=0;i<t.length;i++)o(t[i]);return o}return r})()({1:[function(require,module,exports){"use strict";var _menu=_interopRequireDefault(require("./components/menu"));function _interopRequireDefault(obj){return obj&&obj.__esModule?obj:{default:obj};}
(0,_menu.default)('PrimaryMenu','PrimaryMenu-toggle','Site','PrimaryMenu-is-show');(0,_menu.default)('TopMenu','TopMenu-toggle','TopMenu-container','TopMenu-is-show');},{"./components/menu":2}],2:[function(require,module,exports){"use strict";Object.defineProperty(exports,"__esModule",{value:true});exports.default=void 0;function _toConsumableArray(arr){return _arrayWithoutHoles(arr)||_iterableToArray(arr)||_nonIterableSpread();}
function _nonIterableSpread(){throw new TypeError("Invalid attempt to spread non-iterable instance");}
function _iterableToArray(iter){if(Symbol.iterator in Object(iter)||Object.prototype.toString.call(iter)==="[object Arguments]")return Array.from(iter);}
function _arrayWithoutHoles(arr){if(Array.isArray(arr)){for(var i=0,arr2=new Array(arr.length);i<arr.length;i++){arr2[i]=arr[i];}return arr2;}}
var SNMenu=function SNMenu(menuId,toggleButtonID){var contextId=arguments.length>2&&arguments[2]!==undefined?arguments[2]:'Site';var toggleClass=arguments.length>3&&arguments[3]!==undefined?arguments[3]:"Menu-is-show";var menuEl=document.getElementById(menuId);if(!menuEl)return;var items=menuEl.querySelectorAll('li');var _iteratorNormalCompletion=true;var _didIteratorError=false;var _iteratorError=undefined;try{for(var _iterator=items[Symbol.iterator](),_step;!(_iteratorNormalCompletion=(_step=_iterator.next()).done);_iteratorNormalCompletion=true){var ele=_step.value;if(ele.childElementCount===2){(function(){var toggle=ele.firstElementChild;var content=ele.lastElementChild;var iconToggleEle=document.createElement('i');iconToggleEle.classList.add('icon-down');iconToggleEle.classList.add('Toggle');toggle.appendChild(iconToggleEle);iconToggleEle.addEventListener('click',function(e){e.preventDefault();iconToggleEle.classList.toggle('icon-up');content.classList.toggle('is-show');});})();}}}catch(err){_didIteratorError=true;_iteratorError=err;}finally{try{if(!_iteratorNormalCompletion&&_iterator.return!=null){_iterator.return();}}finally{if(_didIteratorError){throw _iteratorError;}}}
var links=_toConsumableArray(menuEl.querySelectorAll('a'));if(links){links.map(function(link){var url=document.location.href;if(link.href===url||link.href===url.slice(0,-1))link.classList.add('is-active');});}
var button=document.getElementById(toggleButtonID);var context=document.getElementById(contextId);if(button&&context){button.addEventListener('click',function(){context.classList.toggle(toggleClass);});}};var _default=SNMenu;exports.default=_default;},{}]},{},[1]);