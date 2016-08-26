"use strict";
var __extends = (this && this.__extends) || function (d, b) {
    for (var p in b) if (b.hasOwnProperty(p)) d[p] = b[p];
    function __() { this.constructor = d; }
    d.prototype = b === null ? Object.create(b) : (__.prototype = b.prototype, new __());
};
/// <reference path="jquery.d.ts" />
var app_1 = require("./app");
var view_helper_1 = require("./view-helper");
var Greeter = (function (_super) {
    __extends(Greeter, _super);
    function Greeter(message) {
        _super.call(this);
        this.greeting = message;
    }
    Greeter.prototype.greet = function () {
        var element = this.getElement();
        var salute = "Hello, " + this.greeting;
        element.html(salute);
    };
    Greeter.prototype.greetInfo = function () {
        var ajxObj = this.getInfo();
        var dataContainer = this.getDataCointainer();
        ajxObj.done(function (data) {
            view_helper_1["default"].renderBooks(data, dataContainer);
        }).fail(function () {
            alert('This Fail !!!!');
        });
    };
    return Greeter;
}(app_1["default"]));
var user = "Jane User";
var greeter = new Greeter(user);
greeter.greet();
greeter.greetInfo();

//# sourceMappingURL=greeter.js.map
