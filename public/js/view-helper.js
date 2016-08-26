"use strict";
var ViewHelper = (function () {
    function ViewHelper() {
    }
    ViewHelper.renderBooks = function (data, element) {
        var html = '';
        for (var _i = 0, data_1 = data; _i < data_1.length; _i++) {
            var dat = data_1[_i];
            html += '<div style="background-color:#CCC; color:#000; padding:15px; font-family:Sans-Serif;">';
            html += '<p>Author: ' + dat.author + '</p>';
            html += '<p>Title: ' + dat.title + '</p>';
            html += '<p>Description: ' + dat.description + '</p>';
            html += '</div><br>';
        }
        element.html(html);
    };
    return ViewHelper;
}());
exports.__esModule = true;
exports["default"] = ViewHelper;

//# sourceMappingURL=view-helper.js.map
