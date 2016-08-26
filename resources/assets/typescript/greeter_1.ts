/// <reference path="jquery.d.ts" />

class ViewHelper {
    public static renderBooks(data: any, element: any) {
        let html: string = '';
        for (let dat of data) {
            html += '<div style="background-color:#CCC; color:#000; padding:15px; font-family:Sans-Serif;">'
            html += '<p>Author: ' + dat.author + '</p>';
            html += '<p>Title: ' + dat.title + '</p>';
            html += '<p>Description: ' + dat.description + '</p>';
            html += '</div><br>';
        }
        element.html(html);
    }
}

class AppService {
    protected url = 'http://localhost:8888/blog/public/info';
    protected data: any;

    constructor() { }

    requestData() {
        let dataAjx: any = $.ajax({
            type: 'GET',
            url: this.url
        });
        this.setData(dataAjx);
    }

    setData(data: any) {
        this.data = data;
    }

    getData() {
        return this.data;
    }
}

class App extends AppService {
    private _element = $('#salute');
    private _dataContainer = $('#dataContainer');

    constructor() { super() }

    getElement() {
        return this._element;
    }

    getDataCointainer() {
        return this._dataContainer;
    }

    getInfo() {
        this.requestData();
        var dataObj = this.getData();
        return dataObj;
    }
}

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