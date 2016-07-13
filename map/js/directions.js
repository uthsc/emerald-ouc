/* <![CDATA[ */
$(document).ready(function () {

    $("#from_here_link").live("click", function () {
        $("#visible_dir").attr({
            name: "daddr",
            placeholder: "End address"
        });
        $("#hidden_dir").attr({
            name: "saddr"
        });
    });
    $("#to_here_link").live("click", function () {
        $("#visible_dir").attr({
            name: "saddr",
            placeholder: "Start address"
        });
        $("#hidden_dir").attr({
            name: "daddr"
        });
    });
});
/* ]]> */