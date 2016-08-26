/// <reference path="jquery.d.ts" />
 
export default class AppService {
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

