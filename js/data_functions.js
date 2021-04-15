function doRequest(url,arg1,arg2){
    xhttp = new XMLHttpRequest;
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            res = this.responseText
            callback(res);
        }
    };
    var post;
    if(!!arg2){
        var method = "POST";
        var callback = arg2;
        post = JSON.stringify(arg1);
    }else{
        var method = "GET";
        var callback = arg1;
    }
    xhttp.open(method, url, true);
    xhttp.setRequestHeader('Content-Type', 'application/JSON');
    xhttp.send(post);
}