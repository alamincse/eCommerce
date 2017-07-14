/**
 * CSS files Loaded by JS method
 */
// document.write(window.location.href);
var path = 'assets/dist/css';
var fontPath = 'assets/dist/font-awesome/css';
var fileName = [ 'bootstrap.min.css', 'style.css', 'sidebar.css', 'animate.css', 'font-awesome.css' ];
var i, link; 
for( i = 0; i < fileName.length; i++ ) {
	link = document.createElement( 'link' );
	link.type = 'text/css';
	link.rel = 'stylesheet';
	link.media = 'all';

	if( fileName[i] == 'font-awesome.css' ) {
		link.href = fontPath + '/' + fileName[i];
	} else {
		link.href = path + '/' + fileName[i];
	}

	document.getElementsByTagName( 'head' )[0].appendChild( link );
}