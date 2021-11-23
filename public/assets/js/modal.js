$(document).ready(function(){
    $(".requirment-first ul li").click(function(){
        $(".requirment-first ul li").css("background-color","#2B2727")
        $(this).css("background-color","red");
        $(".requirment-second").css("display","block");
        var val=$(this).text();
        $(".requirment-first-value").attr("value",val);
    })
    $(".requirment-second ul li").click(function(){
        $(".requirment-second ul li").css("background-color","#2B2727")
        $(this).css("background-color","red");
        $(".requirment-third").css("display","block");
        var val=$(this).text();
        $(".requirment-second-value").attr("value",val);
    })
    $(".requirment-third ul li").click(function(){
        $(".requirment-third ul li").css("background-color","#2B2727")
        $(this).css("background-color","red");
        $(".submit-requirment").css("display","block");
        var val=$(this).text();
        $(".requirment-third-value").attr("value",val);
    })
})