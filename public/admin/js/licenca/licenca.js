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
/******/ 	return __webpack_require__(__webpack_require__.s = 16);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/licenca/licenca.js":
/*!*****************************************!*\
  !*** ./resources/js/licenca/licenca.js ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports) {

$('#licenca').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget);
  var emprid = button.data('emprid');
  var modal = $(this);
  modal.find('.modal-body #emprid').val(emprid);
});
$(function () {
  var start = moment().subtract(29, 'days');
  var end = moment();

  function cb(start, end) {
    $('#validade span').html(start.format('DD/MM/YYYY') + ' - ' + end.format('DD/MM/YYYY'));
    $('#valstart').val(start.format('YYYY-MM-DD'));
    $('#valend').val(end.format('YYYY-MM-DD'));
  }

  $('#validade').daterangepicker({
    "locale": {
      "format": "MM/DD/YYYY",
      "separator": " - ",
      "applyLabel": "Aplicar",
      "cancelLabel": "Cancelar",
      "fromLabel": "De",
      "toLabel": "Para",
      "customRangeLabel": "Customizado",
      "weekLabel": "S",
      "daysOfWeek": ["Dom", "seg", "Ter", "qua", "qui", "Sex", "Sab"],
      "monthNames": ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"]
    },
    startDate: start,
    endDate: end,
    ranges: {
      'Hoje': [moment(), moment()],
      '7 Dias': [moment(), moment().add(7, 'days')],
      '1 Mês': [moment(), moment().add(1, 'months')],
      '6 Meses': [moment(), moment().add(6, 'months')],
      '1 Ano': [moment(), moment().add(1, 'years')]
    }
  }, cb);
  cb(start, end);
}); // Gera código md5 ao clicar no botão 

$('.generate').on('click', function (e) {
  e.preventDefault(); // pega o d/m/y h:m:s e criptografa

  var date = new Date();
  var info = date.getDay() + ' ' + date.getMonth() + ' ' + date.getFullYear() + ' ' + date.getHours() + ":" + date.getMinutes() + ":" + date.getSeconds();
  var hash = CryptoJS.MD5(info);
  $('#hash').val(hash);
});
$(document).ready(function () {
  $("select.status").change(function () {
    var select = $(this).children("option:selected").val();

    if (select == 0) {
      $("#validade").addClass("disableValidade");
      $("#validade").removeClass("enableValidade");
      $('.hash').attr('readonly', true);
      $(".hash").removeAttr("onkeypress");
      $('.generate').prop('disabled', true);
    } else {
      $("#validade").removeClass("disableValidade");
      $("#validade").addClass("enableValidade");
      $('.hash').attr('readonly', false);
      $(".hash").attr("onkeypress", "return false;");
      $('.generate').prop('disabled', false);
    }
  });
});

/***/ }),

/***/ 16:
/*!***********************************************!*\
  !*** multi ./resources/js/licenca/licenca.js ***!
  \***********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\wamp64\www\Laravel 6\agenda\resources\js\licenca\licenca.js */"./resources/js/licenca/licenca.js");


/***/ })

/******/ });