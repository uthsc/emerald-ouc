/* <![CDATA[ */
$(document).ready(function () {

    $(document).on("click", "#from_here_link", function () {
        $("#visible_dir").attr({
            name: "daddr",
            placeholder: "End address"
        });
        $("#hidden_dir").attr({
            name: "saddr"
        });
    });
    $(document).on("click", "#to_here_link", function () {
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