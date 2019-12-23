/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 8);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/simple.money.format.js":
/*!*********************************************!*\
  !*** ./resources/js/simple.money.format.js ***!
  \*********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function ($) {
  $.fn.simpleMoneyFormat = function () {
    this.each(function (index, el) {
      var elType = null; // input or other

      var value = null; // get value

      if ($(el).is('input') || $(el).is('textarea')) {
        value = $(el).val().replace(/,/g, '');
        elType = 'input';
      } else {
        value = $(el).text().replace(/,/g, '');
        elType = 'other';
      } // if value changes


      $(el).on('paste keyup', function () {
        value = $(el).val().replace(/,/g, '');
        formatElement(el, elType, value); // format element
      });
      formatElement(el, elType, value); // format element
    });

    function formatElement(el, elType, value) {
      var result = '';
      var valueArray = value.split('');
      var resultArray = [];
      var counter = 0;
      var temp = '';

      for (var i = valueArray.length - 1; i >= 0; i--) {
        temp += valueArray[i];
        counter++;

        if (counter == 3) {
          resultArray.push(temp);
          counter = 0;
          temp = '';
        }
      }

      ;

      if (counter > 0) {
        resultArray.push(temp);
      }

      for (var i = resultArray.length - 1; i >= 0; i--) {
        var resTemp = resultArray[i].split('');

        for (var j = resTemp.length - 1; j >= 0; j--) {
          result += resTemp[j];
        }

        ;

        if (i > 0) {
          result += ',';
        }
      }

      ;

      if (elType == 'input') {
        $(el).val(result);
      } else {
        $(el).empty().text(result);
      }
    }
  };
})(jQuery);

/***/ }),

/***/ 8:
/*!***************************************************!*\
  !*** multi ./resources/js/simple.money.format.js ***!
  \***************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\wamp64\www\Laravel 6\agenda\resources\js\simple.money.format.js */"./resources/js/simple.money.format.js");


/***/ })

/******/ });