describe('Validatiations in the Authors Index page', function () {
    const expectedAuthorsCount = 4;
    const expectedAuthorsNames = ["Karbasizaed, Vajiheh", "Mansour, Amina", "Mwandenga, Alan", "Riouf, Nicolas"];
    
    it('Access the authors index', function () {
        cy.visit('index.php/publicknowledge/en/authors');
        cy.contains('h1', 'Authors Index');
        cy.get('#authorsList').children().should('have.length', expectedAuthorsCount * 2);

        for (let authorName of expectedAuthorsNames) {
            cy.contains('a', authorName);
        }
    });
    it('Go to the search results of the author when clicking on author name', function () {
        cy.visit('index.php/publicknowledge/en/authors');
        cy.contains('a', 'Karbasizaed, Vajiheh').click();
        cy.waitJQuery();
        cy.contains('h1', 'Search');
        cy.contains('Vajiheh Karbasizaed');
        cy.contains('Antimicrobial, heavy metal resistance and plasmid profile of coliforms isolated from nosocomial infections in a hospital in Isfahan, Iran');
    });
});