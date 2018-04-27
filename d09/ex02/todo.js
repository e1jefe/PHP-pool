function setCookie(name, value, days) {
    var date = new Date();
    date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
    var expires = "expires=" + date.toUTCString();
    document.cookie = name + "=" + value + "; " + expires;
    document.cookie = "n" + "=" + n + "; expires=Thu, 01 Jan 2020 00:00:01 GMT";
}

function delCookie(name) {
    document.cookie = name + "=" + "" + "; expires=Thu, 01 Jan 1970 00:00:01 GMT";
}

var n = readCookie('n');
if (n != null)
    n = parseInt(n);
else
    n = 0;
document.cookie = "n" + "=" + n + "; expires=Thu, 01 Jan 2020 00:00:01 GMT";

function readCookie(name) {
    var tmp = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(tmp) == 0) return c.substring(tmp.length,c.length);
    }
    return null;
}

function create_div_by_cookie(name, value) {
    var ft_list = document.getElementById('ft_list');
    var new_div = document.createElement("div");
    var text = document.createTextNode(value);
    new_div.appendChild(text);
    new_div.name = name;
    new_div.onclick = function() {
        var c = confirm("Do you really want to delete this todo?");
        if (c === true)
        {
            this.parentNode.removeChild(this);
            delCookie(this.name);
        }
    };
    ft_list.insertBefore(new_div, ft_list.childNodes[0]);
}

function load_cookies() {
    var cookies = document.cookie.split(';');
    console.log(cookies.lenght);
    var i = 0;
    while (cookies[i])
    {
        var c = cookies[i];
        var name = c.substr(0, c.indexOf('='));
        name = name.trim();
        var value = c.substr(c.indexOf('=') + 1);
        if (name != "n")
            create_div_by_cookie(name, value);
        ++i;
    }
}

function todo() {
    var ft_list = document.getElementById('ft_list');
    var todo = prompt("New Todo", "");

    if (todo != null) {
        var new_div = document.createElement("div");
        var text = document.createTextNode(todo);
        var name = 'Todo' + (++n);
        new_div.appendChild(text);
        new_div.name = name;
        new_div.onclick = function() {
            var c = confirm("Do you want to delete this TO DO?");
            if (c === true)
            {
                this.parentNode.removeChild(this);
                delCookie(this.name);
            }
        };
        ft_list.insertBefore(new_div, ft_list.childNodes[0]);
        setCookie(name, new_div.innerHTML, 1);
    }
}