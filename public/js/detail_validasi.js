function openPdfModal(pdfPath) {
    var pdfViewer = document.getElementById('pdfViewer');
    pdfViewer.src = pdfPath;

    var container = document.getElementById('pdfContainer');
    var overlay = document.getElementById('pdfOverlay');

    container.classList.remove('hidden');
    overlay.classList.remove('hidden');
    document.body.classList.add('overflow-hidden');
}

function closePdfModal() {
    var container = document.getElementById('pdfContainer');
    var overlay = document.getElementById('pdfOverlay');

    container.classList.add('hidden');
    overlay.classList.add('hidden');
    document.body.classList.remove('overflow-hidden');
}