describe('Validatiations in the Authors page', function () {
    it('Access the authors page', function () {
        cy.visit('publicknowledge/authors');
        cy.get('h1').should('contain', 'Authors');
    });
});