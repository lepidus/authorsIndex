describe('Plugin setup of "Authors Index plugin"', function () {
    it('Enables "Authors Index plugin"', function () {
		cy.login('dbarnes', null, 'publicknowledge');

		cy.contains('a', 'Website').click();

		cy.waitJQuery();
		cy.get('#plugins-button').click();

		cy.get('input[id^=select-cell-authorsindexplugin]').check();
		cy.get('input[id^=select-cell-authorsindexplugin]').should('be.checked');
    });
});