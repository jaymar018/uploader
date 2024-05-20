Echo.channel('file-exported')
.listen('FileExported', (event) => {
    console.log('dadad');
    window.location.href = '/download/exported-file-url';
});

Echo.channel('export')
        .listen('ExportProgress', (event) => {
            // Update progress bar width
            $('#progressBar').css('width', event.progress + '%').attr('aria-valuenow', event.progress);
        });

