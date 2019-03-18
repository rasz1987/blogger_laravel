function requestComponet() {
    this.ajaxRequest = function(url, method, data, options) {
        $.ajax({
            url:url,
            method:method,
            data:data,
            dataType:'json',
            success: function (data) {
                if (typeof options.succescalback == 'function') {
                    options.succescalback(data);
                }
            },error: function(data) {
                if (typeof options.errorCallback == 'function') {
                    options.errorCallback(data);
                }
            }
        });
    };

    this.get = function(url, data, succescalback, errorCallback ) {
        request.ajaxRequest(url, 'GET', data, 
        {succescalback: succescalback,
        errorCallback: errorCallback})
    };

    this.post = function(url, data, succescalback, errorCallback ) {
        request.ajaxRequest(url, 'POST', data, 
        {succescalback: succescalback,
        errorCallback: errorCallback})
    };
};

window.request = new requestComponet();