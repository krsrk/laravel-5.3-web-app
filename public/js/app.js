"use strict";
var __extends = (this && this.__extends) || function (d, b) {
    for (var p in b) if (b.hasOwnProperty(p)) d[p] = b[p];
    function __() { this.constructor = d; }
    d.prototype = b === null ? Object.create(b) : (__.prototype = b.prototype, new __());
};
/// <reference path="jquery.d.ts" />
var app_service_1 = require("./app-service");
var App = (function (_super) {
    __extends(App, _super);
    function App() {
        _super.call(this);
        this._element = $('#salute');
        this._dataContainer = $('#dataContainer');
    }
    App.prototype.getElement = function () {
        return this._element;
    };
    App.prototype.getDataCointainer = function () {
        return this._dataContainer;
    };
    App.prototype.getInfo = function () {
        this.requestData();
        var dataObj = this.getData();
        return dataObj;
    };
    return App;
}(app_service_1["default"]));
exports.__esModule = true;
exports["default"] = App;

//# sourceMappingURL=app.js.map
