
    $(document).ready(function() {
        $("#productType").on('change', function() {
        $(".data").hide(); /* hide all the forms with class(data) */
        $("#" + $(this).val()).fadeIn(200); /* get the value of the selected type then add it to # to form an id */
        }).change();
    });

    function onClickSave() {
        document.getElementById("submit_data").click();
    
    }

    function onClickDelete() {
        document.getElementById("delete-btn").click();
    
    }





