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
});