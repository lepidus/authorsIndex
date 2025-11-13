describe('Plugin setup of "Authors Index plugin"', function () {
    it('Enables "Authors Index plugin"', function () {
		cy.login('dbarnes', null, 'publicknowledge');

        cy.get('nav').contains('Settings').click();
        cy.get('nav').contains('Website').click({ force: true });

		cy.waitJQuery();
        cy.get('button[id="plugins-button"]').click();

		cy.get('input[id^=select-cell-authorsindexplugin]').check();
		cy.get('input[id^=select-cell-authorsindexplugin]').should('be.checked');
    });
});