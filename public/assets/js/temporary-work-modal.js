$(document).ready(function () {
    var val, date, otherVal;
    $(".modalDiv input").on("click", function () {
        $(this).addClass("active");
        val = $(this);
        $(".submit-requirment button").attr("disabled", "disabled");
        $(".submit-requirment button").css("opacity", ".5");
    });
    $("#design-requirement .requirment-first ul li").click(function () {
        $(".requirment-first ul li").removeClass("active");
        $(this).addClass("active");
        id = $(this).attr("data-id");
        $(".requirment-second").css("display", "block");
        $("ul.show").hide();
        $("ul." + id + "")
            .removeClass("d-none")
            .addClass("show")
            .css("display", "block");
        var val = $(this).text();
        $(".requirment-first-value").val(val);
    });
    $("#design-requirement .requirment-second ul li").click(function () {
        $(".requirment-second ul li").removeClass("active");
        $("#design-requirement .requirment-second ul li input").removeClass(
            "active"
        );
        $(this).addClass("active");
        var val = $(this).text();
        $(".requirment-second-value").val(val);
        $("#design-requirement .requirment-second ul li.active input").addClass(
            "active"
        );
        $(".submit-requirment button").removeAttr("disabled");
        $(".submit-requirment button").css("opacity", "1");
    });
    $(".otherInput").on("input", function (e) {
        otherVal = $(this).val();
        $(".requirment-second-value").val(otherVal);
    });
    $("#design-requirement .submit-requirment button").click(function () {
        var val_first = $(".requirment-first-value").val();
        var val_second = $(".requirment-second-value").val();
        var full_val = val_first + " - " + val_second;
        val.attr("value", full_val);
    });

    $("#scope-of-design .requirment-first ul li").click(function () {
        $("#scope-of-design .requirment-first ul li").removeClass("active");
        $(this).addClass("active");
        id = $(this).attr("data-id");
        $("#scope-of-design .requirment-second").css("display", "block");
        $("li.invisible." + id + "")
            .removeClass("invisible")
            .css("display", "block");

        var val = $(this).text();
        $("#scope-of-design .requirment-first-value").val(val);
    });
    $("#scope-of-design .requirment-second ul li").click(function () {
        $("#scope-of-design .requirment-second ul li").removeClass("active");
        $("#scope-of-design .requirment-second ul li input").removeClass(
            "active"
        );
        $(this).addClass("active");
        $("#scope-of-design .requirment-second ul li.active input").addClass(
            "active"
        );
        $("#scope-of-design .requirment-second").css("display", "block");
        $("#scope-of-design .submit-requirment button").removeAttr("disabled");
        $("#scope-of-design .submit-requirment button").css("opacity", "1");
    });
    $("#scope-of-design .submit-requirment button").click(function () {
        var val_first = $("#scope-of-design .requirment-first-value").val();
        var val_second = $("#scope-of-design .requirment-second-value").val();
        var full_val = val_first + " - " + val_second;
        console.log($("#scope-of-design .requirment-first-value").val());
        val.val(full_val);
        $(".requirment-first-value").val(null);
        $(".requirment-second-value").val(null);
    });
    $("#scope-of-design .requirment-second ul li input").change(function () {
        date = new Date($(this).val());
        date =
            date.getFullYear() +
            "/" +
            (date.getMonth() + 1) +
            "/" +
            date.getDate();
        $("#scope-of-design .requirment-second-value").val(date);
    });
    $("#attachment-of-design .requirment-first ul li").click(function () {
        $("#attachment-of-design .submit-requirment button").removeAttr(
            "disabled"
        );
        $("#attachment-of-design .requirment-first ul li").removeClass(
            "active"
        );
        $(this).addClass("active");
        id = $(this).attr("data-id");
        $("#attachment-of-design .requirment-second").css("display", "block");
        $("li.invisible." + id + "")
            .removeClass("invisible")
            .css("display", "block");
        var val = $(this).text();
        $("#attachment-of-design .requirment-first-value").val(val);
    });
});
