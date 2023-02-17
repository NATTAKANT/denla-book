// เพิ่มลบรายการ
$(".addService").click(function () {
    if ($(this).prev().attr("max") == $(this).prev().val()) {
        return false;
    }

    $(this)
        .prev()
        .val(+$(this).prev().val() + 1);
});
$(".removeService").click(function () {
    if ($(this).next().attr("min") == $(this).next().val()) {
        return false;
    }
    $(this)
        .next()
        .val(+$(this).next().val() - 1);
});
