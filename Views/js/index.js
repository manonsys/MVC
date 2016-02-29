/* Simple VanillaJS to toggle class */


function validateUserName(){
    var username = document.getElementById("fieldUser").value;
    if((username === null) || (username === "")){
        document.getElementById("result").innerHTML = '<br />عفواً يوجد خطأ في إسم المستخدم <img src = "views/img/redex.ico" width = "20px;" height = "20px;" alt = "خطأ في إسم المستخدم" />';
        return false;
    }else{
        document.getElementById("result").innerHTML = '';
        return true;
    }
}
function validatePassWord(){
    var password = document.getElementById("fieldPassword").value;
    if((password === null) || (password === "")){
        document.getElementById("result").innerHTML = '<br />عفواً يوجد خطأ في كلمة المرور <img src = "views/img/redex.ico" width = "20px;" height = "20px;" alt = "خطأ في إسم المستخدم" />';
        return false;
    }else{
        document.getElementById("result").innerHTML = '';
        return true;
    }
}

function validateEmail(){
    var email = document.getElementById("email").value;
    if((email === null) || (email === "")){
        document.getElementById("result").innerHTML = '<br />عفواً يوجد خطأ في البريد الإلكتروني  <img src = "views/img/redex.ico" width = "20px;" height = "20px;" alt = "خطأ في البريد الإلكتروني "/>';
        return false;
    }
}

function validateBoth(){
    var username = document.getElementById("fieldUser").value;
    var password = document.getElementById("fieldPassword").value;
    var identity = document.getElementById("identity").value;
    if((validateUserName) && (validatePassWord)){
        document.getElementById("result").innerHTML = 'جاري تسجيل الدخول  <img src = "views/img/greentick.ico" width = "20px;" height = "20px;" />';
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (xhttp.readyState == 4 && xhttp.status == 200) {
                document.getElementById("result").innerHTML = xhttp.responseText;
                if(xhttp.responseText === 'loginfirsttime'){
                    document.getElementById("result").innerHTML = "تم تسجيل الدخول بنجاح، يتم التحويل الآن";
                    window.location = "/Dashboard";
                    return true;
                }else{
                    document.getElementById("result").innerHTML = "عفواً هناك مشكله في تسجيل الدخول، نرجوا إدخال إسم مستخدم و كلمة مرور صحيحين";
                    return false;
                }
            }
        }
        b64 = new Base64();
        var userNameEnc = b64.encode(username);
        var passWordEnc = b64.encode(password);
        xhttp.open("POST", "/loginStart", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("username=" + userNameEnc + "&password=" + passWordEnc + "&identity=" + identity);
        return true;
    }else{
        return false;
    }
    
}


$(window, document, undefined).ready(function() {

  $('input').blur(function() {
    var $this = $(this);
    if ($this.val())
      $this.addClass('used');
    else
      $this.removeClass('used');
  });

  var $ripples = $('.ripples');

  $ripples.on('click.Ripples', function(e) {

    var $this = $(this);
    var $offset = $this.parent().offset();
    var $circle = $this.find('.ripplesCircle');

    var x = e.pageX - $offset.left;
    var y = e.pageY - $offset.top;

    $circle.css({
      top: y + 'px',
      left: x + 'px'
    });

    $this.addClass('is-active');

  });

  $ripples.on('animationend webkitAnimationEnd mozAnimationEnd oanimationend MSAnimationEnd', function(e) {
  	$(this).removeClass('is-active');
  });

});


function reg(){
    var email = document.getElementById("email").value;
    if((email === null) || (email === "")){
        document.getElementById("result").innerHTML = '<br />عفواً يوجد خطأ في البريد الإلكتروني  <img src = "views/img/redex.ico" width = "20px;" height = "20px;" alt = "خطأ في البريد الإلكتروني "/>';
    }else{
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (xhttp.readyState == 4 && xhttp.status == 200) {
            document.getElementById("result").innerHTML = xhttp.responseText;
          }
        }
        b64 = new Base64();
        var emailEnc = b64.encode(email);
        xhttp.open("POST", "/reg", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("email=" + emailEnc);
    }
}

var Base64 = function () {
    this.encode = function(data){
      var b64 = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=';
      var o1, o2, o3, h1, h2, h3, h4, bits, i = 0,
        ac = 0,
        enc = '',
        tmp_arr = [];

      if (!data) {
        return data;
      }

      do { // pack three octets into four hexets
        o1 = data.charCodeAt(i++);
        o2 = data.charCodeAt(i++);
        o3 = data.charCodeAt(i++);

        bits = o1 << 16 | o2 << 8 | o3;

        h1 = bits >> 18 & 0x3f;
        h2 = bits >> 12 & 0x3f;
        h3 = bits >> 6 & 0x3f;
        h4 = bits & 0x3f;

        // use hexets to index into b64, and append result to encoded string
        tmp_arr[ac++] = b64.charAt(h1) + b64.charAt(h2) + b64.charAt(h3) + b64.charAt(h4);
      } while (i < data.length);

      enc = tmp_arr.join('');

      var r = data.length % 3;

      return (r ? enc.slice(0, r - 3) : enc) + '==='.slice(r || 3);
    }
}