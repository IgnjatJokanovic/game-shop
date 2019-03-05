/* global baseAddress, token */

$(document).ready(function() {
    var qvty = localStorage.getItem('aaa');
    $('#cartSum').html(qvty);
    
//   alert(baseAddress);
//    alert(tokken);
//    
//    $("#register").click(function(e) {
//        if(proveraReg() == false){
//            e.preventDefault();
//        }
//        else{
//            proveraReg();
//        }
//    });
    
    
    $('#price').on('click', function (){
        $('#prices').toggleClass("d-none");
    });
    
     $('#genre').on('click', function (){
        $('#genres').toggleClass("d-none");
    });
    
//    $('.price').on('click', function (){
//       var price = $(this).val();
//       alert(price);
//    });
//    $('.genre').on('click', function (){
//       var genre = $(this).text();
//       alert(genre);
//    });
    
    $('.price').on('click', function(){
 
        
        var price = $(this).val();
        var url = baseAddress + 'sort-by-price/' +  price;
 
        $.get(url, function(data){
            $('.games').html(data);
      
        });
    });
    
    $('.genre').on('click', function(){
 
        
        var genre = $(this).text();
        var url = baseAddress + 'sort-by-genre/' + genre;
 
        $.get(url, function(data){
            $('.games').html(data);
      
        });
    });
    
    
    
    
    $('body').on('click', '.pagination a', function(e){
 
        e.preventDefault();
        $('#prva').hide();
        var url = $(this).attr('href');
        document.getElementById("search").style.display = "none";
        $.get(url, function(data){
            $('.games').html(data);
      
        });
    });
    
    $('#searchBox').one('click', function(){
       var url = baseAddress + 'search';
 
        $.get(url, function(data){
            $('#search').html(data);
      
        });
    });
    
    $("#searchBox").keyup(function() {
        filter();
        document.getElementById("search").style.display = "block";
    });
    
    $('.galery').on('click', function(){
        var slika = $(this).attr('src');
        $('#galeryMain').attr('src' , slika);
    });
    
    $('#ocena').on('click', function(e){
        e.preventDefault();
        var ocena = document.getElementById("ddlOcena").value;
        ///var token = document.getElementsByName('_token').value;
        if(ocena == "0"){
            document.getElementById("grade").innerHTML = 'You must choose a number';
        }
        else{
            $.ajax({
                type: 'POST',
                url: baseAddress + 'rate',
                data: {grade: ocena, _token: token},
                success: function (data, textStatus, jqXHR) {
                    document.getElementById("grade").innerHTML = data;
                    console.log(textStatus);
                    console.log(jqXHR);
                },
                error: function (xhr, status, error) {
                    var greska = "";
                   
                       greska += '<p class="text-danger">' + xhr.responseText + '<p>';
                  
                   
                   $('#errors').html(greska);
                    console.log(status);
                    console.log(error);
                }
                
            });
        }
        
    });
    
    
//    
//    var btn = document.getElementsByClassName('dodaj');
//    
//    for (var i = 0; i < btn.length; i++) {
//        btn[i].addEventListener('click', function() {
//           alert('cao');
//        });
//
//    }
$('#shopcartImg').on('click', function(){
    
    $.ajax({
          type: 'GET',
          url: baseAddress + 'showCart',
          success: function (data, textStatus, jqXHR) {
              //alert(data);
              
              
                $('#checkout').html(data);
          },
          error: function (jqXHR, textStatus, errorThrown) {
                alert(jqXHR + '</br>' + textStatus + '</br>' + errorThrown);
          }
       });
   
});









$(document).on('click', '.brisanjeKorpa', function(){
    var id = (this).value;
    $.ajax({
          type: 'GET',
          url: baseAddress + 'removeCart',
          data: {id: id},
          success: function (data, textStatus, jqXHR) {
              //alert(data);
              
              
                $('#checkout').html(data);
          },
          error: function (jqXHR, textStatus, errorThrown) {
                alert(jqXHR + '</br>' + textStatus + '</br>' + errorThrown);
          }
       });
       
    $.ajax({
          type: 'GET',
          url: baseAddress + 'showItems',
          success: function (data, textStatus, jqXHR) {
              //alert(data);
              
              localStorage.setItem('aaa', data);
              var qvty = localStorage.getItem('aaa');
                $('#cartSum').html(qvty);
          },
          error: function (jqXHR, textStatus, errorThrown) {
                alert(jqXHR + '</br>' + textStatus + '</br>' + errorThrown);
          }
       });
   
});



$(document).on('click', '.dodaj', function(){
    
        var niz = (this).value;
       // alert(niz);
       $.ajax({
          type: 'GET',
          url: baseAddress + 'addCart',
          data: {niz: niz},
          success: function (data, textStatus, jqXHR) {
              //alert(data);
              
              localStorage.setItem('aaa', data);
              var qvty = localStorage.getItem('aaa');
                $('#cartSum').html(qvty);
          },
          error: function (jqXHR, textStatus, errorThrown) {
                alert(jqXHR + '</br>' + textStatus + '</br>' + errorThrown);
          }
       });
      
       // alert(niz);
//        $.ajax({
//
//        });
    
    
    
    //const k = ;
    
        
//    if(click == 1){
////        var p = (this).next();
////        p.html('This product is already in shoping cart')
//        $(this).next(".cart-postoji").removeClass("d-none");
//        //(this).siblings().html('This item is already in shoping cart');
//        //$("this").find('.cart-postoji').val('This item is already in shoping cart');
//    }
//    
});


$('#btnRegister').on('click', function(e){
      // e.preventDefault();
       //e.preventDefault();
       if(regCheck() == false){
           
           e.preventDefault();
//           var uname = document.getElementById('uname').value;
//           var pass = document.getElementById('pass').value;
//           $.ajax({
//               type: 'POST',
//               url: baseAddress + 'login',
//               data: {username: uname, password: pass, _token: tokken},
//               success: function (data, textStatus, jqXHR) {
//                    console.log(data);
//                    //window.location.href = data;
//               },
//               error: function (data) {
//                   console.log(data);
////                    var display = "";
////                    $.each(data, function(key, value){
////                        display += '<p class="text-danger">' + value.errors + '</p>';
////                    });
////                    document.getElementById('#errAjax').innerHTML = display;
//               }
//                
//           });
//       }
       }
       
    });
    
    
   
    
    
    
    $('#loginSub').on('click', function(e){
      // e.preventDefault();
       
       if(loginCheck() == false){
           
           e.preventDefault();
//           var uname = document.getElementById('uname').value;
//           var pass = document.getElementById('pass').value;
//           $.ajax({
//               type: 'POST',
//               url: baseAddress + 'login',
//               data: {username: uname, password: pass, _token: tokken},
//               success: function (data, textStatus, jqXHR) {
//                    console.log(data);
//                    //window.location.href = data;
//               },
//               error: function (data) {
//                   console.log(data);
////                    var display = "";
////                    $.each(data, function(key, value){
////                        display += '<p class="text-danger">' + value.errors + '</p>';
////                    });
////                    document.getElementById('#errAjax').innerHTML = display;
//               }
//                
//           });
//       }
       }
       
    });
//    $("#searchBox").blur(function(e) {
//        
//        document.getElementById("search").style.display = "none";
//    
//    });
//    $('#searchBox a').on('click', function(){
//       window.location = this.href; 
//    });

    
    
    
  
    
    
});
//    function proveraReg(){
//    
//    var uname = document.getElementById('uname').value;
//    var email = document.getElementById('email').value;
//    var pass = document.getElementById('pass').value;
//    var rptPass = document.getElementById('rptPass').value;
//    var error = document.getElementsByName('err');
//    var stringErrorRequiered = "*This field is requiered";
//    var regMail = /$[A-Z]+[a-z]+[0-9]+@(gmail\.com|yahoo\.com|)^/;
//     
//        if(uname == '' && email == '' && pass == '' && rptPass == ''){
//            for(var i = 0; i < error.length; i++){
//                error[i].innerHTML = stringErrorRequiered;
//           
//            }
//            return false;
//        }
//    };
    
     function filter() {
    var input, filter, a, i;
    input = document.getElementById("searchBox");
    filter = input.value.toUpperCase();
    div = document.getElementById("search");
    a = div.getElementsByTagName("a");
    for (i = 0; i < a.length; i++) {
        if (a[i].innerHTML.toUpperCase().indexOf(filter) > -1) {
            a[i].style.display = "";
        } else {
            a[i].style.display = "none";
        }
    }
}

function loginCheck(){
    
    var username = document.getElementById('uname').value;
    var password = document.getElementById('pass').value;
    var error = document.getElementsByName('error');
    var messages = ['This field is required', 'This field must contain leters or numbers only'];
    var reg = /^[0-9a-zA-Z]+$/;
    if(username == "" && password == ""){
        for(var i = 0; i < error.length; i++){
                error[i].innerHTML = messages[0];
           
            }
       return false;
    }
    if(username == ""){
        error[0].innerHTML = messages[0];
        return false;
    }
    if(password == ""){
        error[1].innerHTML = messages[0];
        return false;
    }
    if(!username.match(reg) && !password.match(reg)){
        for(var i = 0; i < error.length; i++){
                error[i].innerHTML = messages[1];
           
            }
    }
    if(!username.match(reg)){
        error[0].innerHTML = messages[1];
        return false;
    }
    if(!password.match(reg)){
        error[1].innerHTML = messages[1];
        return false;
    }
    return true;
    
    
    
    

}

function regCheck(){
    
    var email = document.getElementById('email').value;
    var username = document.getElementById('regUname').value;
    var password = document.getElementById('regPass').value;
    var error = document.getElementsByName('error1');
    var messages = ['This field is required', 'This field must contain leters or numbers only', 'This field must be valied email adress'];
    var reg = /^[0-9a-zA-Z]+$/;
    var regmail = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if(username == "" && password == "" && email == ""){
        for(var i = 0; i < error.length; i++){
                error[i].innerHTML = messages[0];
           
            }
       return false;
    }
    if(username == ""){
        error[1].innerHTML = messages[0];
        return false;
    }
    if(password == ""){
        error[2].innerHTML = messages[0];
        return false;
    }
    
    if(email == ""){
        error[0].innerHTML = messages[0];
        return false;
    }
    
    if(!username.match(reg) && !password.match(reg)){
        for(var i = 1; i < error.length; i++){
                error[i].innerHTML = messages[1];
           
            }
    }
    if(!username.match(reg)){
        error[0].innerHTML = messages[1];
        return false;
    }
    if(!password.match(reg)){
        error[1].innerHTML = messages[1];
        return false;
    }
    
     if(!email.match(regmail)){
        error[0].innerHTML = messages[2];
        return false;
    }
    
    return true;
    
    
    
    

}



//document.addEventListener("click", function(){
//    alert('pozz');
//}); 
//
// var btn = document.getElementsByClassName('dodaj');
// btn.addEventListener("click", function(){
//     alert('cao');
// });


    


