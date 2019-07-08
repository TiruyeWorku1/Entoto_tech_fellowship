( function( api ) {

	// Extends our custom "ts-photography" section.
	api.sectionConstructor['ts-photography'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );