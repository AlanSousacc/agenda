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
/******/ 	return __webpack_require__(__webpack_require__.s = 4);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/contato/contato.js":
/*!*****************************************!*\
  !*** ./resources/js/contato/contato.js ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// tabela com listagem de clientes
$('#editar').on('show.bs.modal', function (event) {
  console.log('teste');
  var button = $(event.relatedTarget);
  var contid = button.data('contid');
  var nome = button.data('nome');
  var documento = button.data('documento');
  var endereco = button.data('endereco');
  var telefone = button.data('telefone');
  var status = button.data('status');
  var email = button.data('email');
  var tipocontato = button.data('tipocontato');
  var datanascimento = button.data('datanascimento');
  var numero = button.data('numero');
  var cidade = button.data('cidade');
  var modal = $(this);
  modal.find('.modal-body #status').val(status);
  modal.find('.modal-body #nome').val(nome);
  modal.find('.modal-body #documento').val(documento);
  modal.find('.modal-body #telefone').val(telefone);
  modal.find('.modal-body #endereco').val(endereco);
  modal.find('.modal-body #numero').val(numero);
  modal.find('.modal-body #email').val(email);
  modal.find('.modal-body #tipocontato').val(tipocontato);
  modal.find('.modal-body #datanascimento').val(datanascimento);
  modal.find('.modal-body #cidade').val(cidade);
  modal.find('.modal-body #contid').val(contid);
}); // Função delete

$('#delete').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget);
  var contid = button.data('contid');
  var modal = $(this);
  modal.find('.modal-body #contid').val(contid);
});
$(document).ready(function () {
  $('.telefone').mask('(00) 00000-0000');
  $('.documento').mask('000.000.000-00', {
    reverse: true
  });
});

/***/ }),

/***/ 4:
/*!***********************************************!*\
  !*** multi ./resources/js/contato/contato.js ***!
  \***********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\wamp64\www\Laravel 6\agenda\resources\js\contato\contato.js */"./resources/js/contato/contato.js");


/***/ })

/******/ });