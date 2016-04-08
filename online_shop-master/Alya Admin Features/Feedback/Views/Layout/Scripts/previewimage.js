/**
 * Created by alyatalat on 2016-04-05.
 */

function PreviewImage() {
    var oFReader = new FileReader();
    oFReader.readAsDataURL(document.getElementById("fileToUpload").files[0]);

    oFReader.onload = function (oFREvent) {
        document.getElementById("previewimg").src = oFREvent.target.result;
    };
};
