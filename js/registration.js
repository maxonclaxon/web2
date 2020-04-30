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
        
        console.log(arr);
        for(var i=0;i<arr.length;i++){
            if(!arr[i]==true){
                $('#sub').prop('disabled',true);
                return;
            }
        }
       if($('#pers').is(':checked')){
        $('#sub').prop('disabled',false);
        }
        else{
            $('#sub').prop('disabled',true);
        }
        
    }
$(document).ready(function () {
    
    var repassword=false;
    var numpassword=false;
    //#region Проверка одинаковые ли пароли
    $('#re_pass').on('keydown', function () {
        if($("#re_pass").val()!=$("#pass").val()){
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
    $('#pass').on('keydown', function () {
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
    $('#pass').on('keydown',function(){
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
    $('#login').on('keydown', function () {
        enable();
    });
    $('#name').on('keydown', function () {
        enable();
    });
    $('#mail').on('keydown', function () {
        enable();
    });
    $('#pers').on('change', function () {
        enable();
    });

});