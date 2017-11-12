function handleFileSelect(evt) {
    var files = evt.target.files;
    if (files.length > 12)
        c = 12;
    else
        c = files.length;

    document.getElementById('list-images').innerHTML = '';

    for (var i = 0; i < c; i++)
    {
        f = files[i];
        if (!f.type.match('image.*')) {
            continue;
        }
        f.number = i;

        var reader = new FileReader();
        reader.onload = (function (theFile) {
            return function (e) {
                content = '<div class="thumbnail"><img src="' + e.target.result +
                        '" height="200" width="300" alt="' + escape(theFile.name) + '" title="' + escape(theFile.name) + '" />' +
                        '</div>';
                document.getElementById('list-images').innerHTML += content;
            };
        })(f);
        reader.readAsDataURL(f);
    }
    ;
}
document.getElementById('image').addEventListener('change', handleFileSelect, false);