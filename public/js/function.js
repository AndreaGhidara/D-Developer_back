
document.addEventListener("DOMContentLoaded", function() {
    // La funzione changeColor() verrà chiamata solo quando il DOM è completamente caricato.
    function changeColor() {
        let fileInput = document.getElementById('cv');
        const svgUploadFile = document.getElementById('SVGRepo_iconCarrier');
        const customUpload = document.querySelector('.custum-file-upload');
        
        fileInput.addEventListener('change', function() {
            if (fileInput.files.length > 0) {
                // Se è stato caricato un file, impostare lo stile desiderato
                svgUploadFile.style.fill = 'green';
                customUpload.style.border = 'none';
            } else {
                // Se nessun file è stato caricato, reimpostare lo stile predefinito
                svgUploadFile.style.fill = ''; // Reimposta il colore fill all'originale
                customUpload.style.border = ''; // Reimposta il bordo all'originale
            }
        });
    }
    
    // Chiamata iniziale a changeColor()
    changeColor();
});


