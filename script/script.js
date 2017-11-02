$('.ui.dropdown').dropdown();

function sendActive()
{
	var link = window.location.href;
	link = link.substr( link.lastIndexOf( "/" ) );

	var linkFinally = "";
	if( link.indexOf( "?" ) >= 0 ) {
		linkFinally = link.substr( link.lastIndexOf( "/" ), link.indexOf( "?" ) );
	} else {
		linkFinally = link.substr( link.lastIndexOf( "/" ) );
	}

    var elementsA = $( ".ui.menu .ui.container a" );
	for( var i = 0; i < elementsA.length; i++ )
	{
		if( elementsA[i].hasAttribute( "href" ) )
		{
			var attr = elementsA[i].getAttribute( "href" );
			if( attr === linkFinally ) {
				elementsA[i].classList.add( "active" );
			} else {
				elementsA[i].classList.remove( "active" );
			}
		}
	}
}