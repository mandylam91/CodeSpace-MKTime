describe('MK Time Website runthrough', () => {

  it('has a correctly displaying NAV Bar and login page', () => {
    cy.visit('http://localhost/codespace-MKtime/MKTime/home.php');
    // Click on the Login link and check that the URL is correct
    cy.contains('Login').click();
    cy.url().should('include', 'login');

    // check that when you type an email address in, thhe field has that value
    cy.get('input[name="email"]').type('test.test@hotmail.com');
    cy.get('input[name="email"]').should('have.value', 'test.test@hotmail.com'); 

    // Input password and submit email and password

    cy.get('input[name="pass"]').type('123');
    cy.get('.btn').click()

    // Check that page you are taken to should be products page
    cy.url().should('include', 'products');

    // Check that there are product items on the page with images, price, add to cart button
    cy.get('.card');
    cy.contains('Add to Cart').click();

    // Check that there is a button to View your cart and click
    cy.contains('View Your Cart').click();
    
    cy.url().should('include', 'cart');

    // Check Cart Page is correct and contains check out now button
    
    cy.contains('Checkout Now').click();
    
    // Check you are taken to Checkout page
    cy.url().should('include', 'checkout');


  });


});
  


