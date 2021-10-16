/*
 * ATTENTION: An "eval-source-map" devtool has been used.
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file with attached SourceMaps in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/searchAlbums.js":
/*!**************************************!*\
  !*** ./resources/js/searchAlbums.js ***!
  \**************************************/
/***/ (() => {

eval("var albumsContainer = document.querySelector('.items');\nvar searchInput = document.querySelector('.searchInput');\nsearchInput.addEventListener('keyup', function (e) {\n  axios({\n    method: 'post',\n    url: '/search-albums',\n    data: {\n      'phrase': e.target.value\n    }\n  }).then(function (res) {\n    albumsContainer.innerHTML = '';\n    res.data.forEach(function (item) {\n      var route = '/album=' + item.id;\n      albumsContainer.innerHTML += \"<div class=\\\"item col-md-2\\\">\\n                <a href=\\\"\".concat(route, \"\\\"><img src=\\\"\").concat(item.photo, \"\\\"></a>\\n                <p class=\\\"mt-2\\\">\").concat(item.title, \"</p>\\n            </div>\");\n    });\n  });\n});\nsearchInput.value = '';//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvc2VhcmNoQWxidW1zLmpzP2Y0MDIiXSwibmFtZXMiOlsiYWxidW1zQ29udGFpbmVyIiwiZG9jdW1lbnQiLCJxdWVyeVNlbGVjdG9yIiwic2VhcmNoSW5wdXQiLCJhZGRFdmVudExpc3RlbmVyIiwiZSIsImF4aW9zIiwibWV0aG9kIiwidXJsIiwiZGF0YSIsInRhcmdldCIsInZhbHVlIiwidGhlbiIsInJlcyIsImlubmVySFRNTCIsImZvckVhY2giLCJpdGVtIiwicm91dGUiLCJpZCIsInBob3RvIiwidGl0bGUiXSwibWFwcGluZ3MiOiJBQUFBLElBQU1BLGVBQWUsR0FBR0MsUUFBUSxDQUFDQyxhQUFULENBQXVCLFFBQXZCLENBQXhCO0FBQ0EsSUFBTUMsV0FBVyxHQUFHRixRQUFRLENBQUNDLGFBQVQsQ0FBdUIsY0FBdkIsQ0FBcEI7QUFFQUMsV0FBVyxDQUFDQyxnQkFBWixDQUE2QixPQUE3QixFQUFzQyxVQUFBQyxDQUFDLEVBQUk7QUFDdkNDLEVBQUFBLEtBQUssQ0FBQztBQUNGQyxJQUFBQSxNQUFNLEVBQUUsTUFETjtBQUVGQyxJQUFBQSxHQUFHLEVBQUUsZ0JBRkg7QUFHRkMsSUFBQUEsSUFBSSxFQUFFO0FBQ0YsZ0JBQVVKLENBQUMsQ0FBQ0ssTUFBRixDQUFTQztBQURqQjtBQUhKLEdBQUQsQ0FBTCxDQU9LQyxJQVBMLENBT1UsVUFBQUMsR0FBRyxFQUFJO0FBQ1RiLElBQUFBLGVBQWUsQ0FBQ2MsU0FBaEIsR0FBNEIsRUFBNUI7QUFDQUQsSUFBQUEsR0FBRyxDQUFDSixJQUFKLENBQVNNLE9BQVQsQ0FBaUIsVUFBQUMsSUFBSSxFQUFJO0FBQ3JCLFVBQU1DLEtBQUssR0FBRyxZQUFZRCxJQUFJLENBQUNFLEVBQS9CO0FBQ0FsQixNQUFBQSxlQUFlLENBQUNjLFNBQWhCLHVFQUVXRyxLQUZYLDJCQUUrQkQsSUFBSSxDQUFDRyxLQUZwQyx3REFHa0JILElBQUksQ0FBQ0ksS0FIdkI7QUFLSCxLQVBEO0FBUUgsR0FqQkw7QUFrQkgsQ0FuQkQ7QUFvQkFqQixXQUFXLENBQUNRLEtBQVosR0FBb0IsRUFBcEIiLCJzb3VyY2VzQ29udGVudCI6WyJjb25zdCBhbGJ1bXNDb250YWluZXIgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKCcuaXRlbXMnKVxuY29uc3Qgc2VhcmNoSW5wdXQgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKCcuc2VhcmNoSW5wdXQnKVxuXG5zZWFyY2hJbnB1dC5hZGRFdmVudExpc3RlbmVyKCdrZXl1cCcsIGUgPT4ge1xuICAgIGF4aW9zKHtcbiAgICAgICAgbWV0aG9kOiAncG9zdCcsXG4gICAgICAgIHVybDogJy9zZWFyY2gtYWxidW1zJyxcbiAgICAgICAgZGF0YToge1xuICAgICAgICAgICAgJ3BocmFzZSc6IGUudGFyZ2V0LnZhbHVlXG4gICAgICAgIH0sXG4gICAgfSlcbiAgICAgICAgLnRoZW4ocmVzID0+IHtcbiAgICAgICAgICAgIGFsYnVtc0NvbnRhaW5lci5pbm5lckhUTUwgPSAnJ1xuICAgICAgICAgICAgcmVzLmRhdGEuZm9yRWFjaChpdGVtID0+IHtcbiAgICAgICAgICAgICAgICBjb25zdCByb3V0ZSA9ICcvYWxidW09JyArIGl0ZW0uaWRcbiAgICAgICAgICAgICAgICBhbGJ1bXNDb250YWluZXIuaW5uZXJIVE1MICs9XG4gICAgICAgICAgICAgICAgICAgIGA8ZGl2IGNsYXNzPVwiaXRlbSBjb2wtbWQtMlwiPlxuICAgICAgICAgICAgICAgIDxhIGhyZWY9XCIke3JvdXRlfVwiPjxpbWcgc3JjPVwiJHtpdGVtLnBob3RvfVwiPjwvYT5cbiAgICAgICAgICAgICAgICA8cCBjbGFzcz1cIm10LTJcIj4ke2l0ZW0udGl0bGV9PC9wPlxuICAgICAgICAgICAgPC9kaXY+YFxuICAgICAgICAgICAgfSlcbiAgICAgICAgfSlcbn0pXG5zZWFyY2hJbnB1dC52YWx1ZSA9ICcnXG4iXSwiZmlsZSI6Ii4vcmVzb3VyY2VzL2pzL3NlYXJjaEFsYnVtcy5qcy5qcyIsInNvdXJjZVJvb3QiOiIifQ==\n//# sourceURL=webpack-internal:///./resources/js/searchAlbums.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/js/searchAlbums.js"]();
/******/ 	
/******/ })()
;