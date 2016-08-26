/// <reference path="jquery.d.ts" />
import App from "./app";
import ViewHelper from "./view-helper";

class Greeter extends App {
    greeting: string;

    constructor(message: string) {
        super();
        this.greeting = message;
    }

    greet() {
        let element = this.getElement();
        let salute = "Hello, " + this.greeting;
        element.html(salute);

    }

    greetInfo() {
        let ajxObj = this.getInfo();
        let dataContainer = this.getDataCointainer();
        ajxObj.done(function(data) {
            ViewHelper.renderBooks(data, dataContainer);
        }).fail(function() {
            alert('This Fail !!!!');
        });
    }
}

var user = "Jane User";
let greeter = new Greeter(user);
greeter.greet();
greeter.greetInfo();