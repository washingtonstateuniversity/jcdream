( function() {
	"use strict";

	document.getElementById( "js-menu-toggle" ).addEventListener( "click", function() {
		var navigation_classes = document.getElementById( "site-navigation" ).classList;

		if ( navigation_classes.contains( "toggled-on" ) ) {
			navigation_classes.remove( "toggled-on" );
			this.setAttribute( "aria-expanded", false );
			this.querySelector( ".screen-reader-text" ).innerHTML = "Open site menu";
		} else {
			navigation_classes.add( "toggled-on" );
			this.setAttribute( "aria-expanded", true );
			this.querySelector( ".screen-reader-text" ).innerHTML = "Close site menu";
		}
	} );
}() );
