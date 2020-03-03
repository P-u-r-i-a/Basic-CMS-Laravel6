<script>
    function copyToClipboard(event) {
        event.preventDefault();
        copyText(event.target.href);
        alert("Copied to clipboard");
    }

    function copyText (text) {

        const ELEMENT = document.createElement('textarea');
        ELEMENT.value = text;

        document.body.appendChild(ELEMENT);
        ELEMENT.focus();
        ELEMENT.setSelectionRange(0, ELEMENT.value.length);

        document.execCommand('copy');

        document.body.removeChild(ELEMENT);
    }
</script>