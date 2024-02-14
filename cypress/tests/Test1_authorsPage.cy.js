describe('Validatiations in the Authors page', function () {
    const expectedAuthorsCount = 4;
    const expectedAuthorsNames = ["Karbasizaed, Vajiheh", "Mansour, Amina", "Mwandenga, Alan", "Riouf, Nicolas"];
    
    it('Access the authors page', function () {
        cy.visit('publicknowledge/authors');
        cy.get('h1').should('contain', 'Authors');
        cy.get('#authorsList').children().should('have.length', expectedAuthorsCount);

        for (authorName in expectedAuthorsNames) {
            cy.contains('a', authorName);
        }
    });
});