describe('Plugin setup of "Authors page plugin"', function () {
    it('Enables "Authors page plugin"', function () {
		cy.login('dbarnes', null, 'publicknowledge');

		cy.contains('a', 'Website').click();

		cy.waitJQuery();
		cy.get('#plugins-button').click();

		cy.get('input[id^=select-cell-authorspageplugin]').check();
		cy.get('input[id^=select-cell-authorspageplugin]').should('be.checked');
    });
});