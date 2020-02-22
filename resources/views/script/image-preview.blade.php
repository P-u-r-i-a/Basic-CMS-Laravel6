<script>
    const IMG_INPUT = document.querySelector('#img-input');
    const READER = new FileReader();
    const IMG_PREVIEW = document.querySelector('#img-preview');   

    IMG_INPUT.addEventListener('change', e => {
            READER.readAsDataURL(e.target.files[0]);
        })    

    READER.onload = function(event) { 
        IMG_PREVIEW.src = event.target.result;  
        IMG_PREVIEW.classList.remove('d-none');
        }
</script>