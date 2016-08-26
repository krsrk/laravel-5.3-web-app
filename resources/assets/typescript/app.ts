/// <reference path="jquery.d.ts" />
import AppService from "./app-service";

export default class App extends AppService {
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