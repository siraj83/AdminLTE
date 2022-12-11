<script type="text/javascript">
$(document).ready(function() {
    $("#transfer_station").on('change', function() {
        // alert($(this).val());
        var transfer_T = $(this).val();
        if (transfer_T == "لا يوجد") {
            document.getElementById("equi_station").style.display = "none";
            //elem.data.hide;
            // $("$_equi_station").hide();
        } else {
            document.getElementById("equi_station").style.display = "block";
        }
    }).change();
});
</script>