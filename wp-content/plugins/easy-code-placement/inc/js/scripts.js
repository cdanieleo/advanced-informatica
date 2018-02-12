// *********
// Clipboard
// *********
var clipboard = new Clipboard('.clipboard');
clipboard.on('success', function(e) {
    console.log(e);
});
clipboard.on('error', function(e) {
    console.log(e);
});