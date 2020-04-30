function errors(error,text){
    return '<div class="'+error+'">'+text+'</div>';
}
function enable(first,sec){
        console.log(first+';'+sec);
        var arr =[];
        expression = new RegExp($('#login').attr('pattern'));
        arr.push(expression.test($('#login').val()))
        expression = new RegExp($('#pass').attr('pattern'));
        arr.push(expression.test($('#pass').val()))
        arr.push($('#re_pass').val()==$('#pass').val());
        expression = new RegExp($('#name').attr('pattern'));
        arr.push(expression.test($('#name').val()));
        expression = new RegExp("/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/")
        arr.push(expression.test($('#mail').val()));
        arr.push($('#pers'));
        
        console.log(arr);
        arr.forEach(element => {
            if(element!=true)return;
        });
        if(arr.every(true)){
            $('#sub').attr('disabled',true);
        }
}
$(document).ready(function () {
    
    var repassword=false;
    var numpassword=false;
    //#region Проверка одинаковые ли пароли
    $('#re_pass').on('change', function () {
        if($("#re_pass").val()!=$("#pass").val()){
            if($('.repassError').length==0){
            $('.errors').append(errors("repasserror","Пароли не совпадают"));
            repassword=false;
            }
        }
        else{
            $('.repassError').remove();
            repassword=true;
        }
        enable(repassword,numpassword);
    });
    $('#pass').on('change', function () {
        if($("#re_pass").val()!=$("#pass").val()&&$('#re_pass').val()!=""){
            if($('.repassError').length==0){
            $('.errors').append(errors("repassError","Пароли не совпадают"));
            repassword=false;
            }
        }
        else{
            $('.repassError').remove();
            repassword=true;
        }
        enable(repassword,numpassword);
    });
    //пароль содержит не только символы
    $('#pass').on('change',function(){
        if(!isNaN($('#pass').val())){
            if($('.onlyNumbersError').length==0){
            $('.errors').append( errors("onlyNumbersError","Пароль не должен содержать только цифры"));
            numpassword=false;
            }
        }
        else{
            $('.onlyNumbersError').remove();
            numpassword=true;
        }
        enable(repassword,numpassword);
    })
    $('#login').on('change', function () {
        enable();
    });
    $('#name').on('change', function () {
        enable();
    });
    $('#mail').on('change', function () {
        enable();
    });
    $('#pers').on('change', function () {
        enable();
    });

});