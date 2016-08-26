export default class ViewHelper {
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


