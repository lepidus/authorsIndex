describe('Validatiations in the Authors page', function () {
    const expectedAuthorsCount = 4;
    const expectedAuthorsNames = ["Karbasizaed, Vajiheh", "Mansour, Amina", "Mwandenga, Alan", "Riouf, Nicolas"];
    
    it('Access the authors page', function () {
        cy.visit('publicknowledge/authors');
        cy.contains('h1', 'Authors');
        cy.get('#authorsList').children().should('have.length', expectedAuthorsCount * 2);

        for (let authorName of expectedAuthorsNames) {
            cy.contains('a', authorName);
        }
    });
    it('Go to the search results of the author when clicking on author name', function () {
        cy.visit('publicknowledge/authors');
        cy.contains('a', 'Karbasizaed, Vajiheh').click();
        cy.waitJQuery();
        cy.contains('h1', 'Search');
        cy.contains('Vajiheh Karbasizaed');
        cy.contains('Antimicrobial, heavy metal resistance and plasmid profile of coliforms isolated from nosocomial infections in a hospital in Isfahan, Iran');
    });
});