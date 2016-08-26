/// <reference path="jquery.d.ts" />
"use strict";
var AppService = (function () {
    function AppService() {
        this.url = 'http://localhost:8888/blog/public/info';
    }
    AppService.prototype.requestData = function () {
        var dataAjx = $.ajax({
            type: 'GET',
            url: this.url
        });
        this.setData(dataAjx);
    };
    AppService.prototype.setData = function (data) {
        this.data = data;
    };
    AppService.prototype.getData = function () {
        return this.data;
    };
    return AppService;
}());
exports.__esModule = true;
exports["default"] = AppService;

//# sourceMappingURL=app-service.js.map
