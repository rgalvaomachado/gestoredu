
function loadSRC(){
    document.body.style.display = 'none';

    document.querySelectorAll("link[data-href]").forEach(function (el) {
        el.href = basePath + el.getAttribute("data-href");
    });

    document.querySelectorAll("script[data-src]").forEach(function (el) {
        el.src = basePath + el.getAttribute("data-src");
    });

    document.querySelectorAll("img[data-src]").forEach(function (el) {
        el.src = basePath + el.getAttribute("data-src");
    });

    document.querySelectorAll("a[data-href]").forEach(function (el) {
        el.href = basePath + el.getAttribute("data-href");
    });

    setTimeout(function() {
        document.body.style.display = 'block';
    }, 200);
}

function getUrlParameters() {
    const url = window.location.href;

    const queryString = url.split('?')[1];
    if (!queryString) {
        return {};
    }

    const params = queryString.split('&');
    const result = {};

    params.forEach(param => {
        const [key, value] = param.split('=');
        result[decodeURIComponent(key)] = decodeURIComponent(value || '');
    });

    return result;
}

function getFormData(form){      
    var formData = new FormData(form);
    var jsonData = {};

    formData.forEach((value, key) => {
        jsonData[key] = value.trim() ? value : null;
    });

    return jsonData;
}