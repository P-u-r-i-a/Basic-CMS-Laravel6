<script>
    const DELETE_FORM = document.querySelector("#delete-form");
    DELETE_FORM.addEventListener('submit', function(event) {
        event.preventDefault();
        doubleCheck(DELETE_FORM);
    });

    function doubleCheck(form) {
        if(confirm("Are you sure ?")) {
            form.submit();
        }
    }
</script>   