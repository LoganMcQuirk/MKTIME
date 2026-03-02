describe('admin/user sessions spec', () => {

  function login(email, password) {
    cy.visit('http://localhost/MKTIME/auth/login.php');
    cy.get('form').should('be.visible');
    cy.get('input[name="email"]').type(email);
    cy.get('input[name="pass"]').type(password);
    cy.get('input[type="submit"]').click();
  }

  it('passes user login', () => {
    cy.visit('http://localhost/MKTIME/auth/login.php');
    cy.get('form').should('be.visible');
    cy.get('input[name="email"]').type('test@test.test');
    cy.get('input[name="pass"]').type('testpassword');
    cy.get('input[type="submit"]').click();
    cy.url().should('include', '/products/home.php');
  })

  it('fails user login successfully', () => {
    cy.visit('http://localhost/MKTIME/auth/login.php');
    cy.get('form').should('be.visible');
    cy.get('input[name="email"]').type('!test@test.test');
    cy.get('input[name="pass"]').type('!testpassword');
    cy.get('input[type="submit"]').click();
    cy.url().should('include', '/auth/login_action.php');
  })

  it('passes registration link', () => {
    cy.visit('http://localhost/MKTIME/auth/login.php');
    cy.get('form').should('be.visible');
    cy.get('input[name="email"]').type('!test@test.test');
    cy.get('input[name="pass"]').type('!testpassword');
    cy.get('input[type="submit"]').click();
    cy.url().should('include', '/auth/login_action.php');
    cy.get('a').contains('Register').click();
    cy.url().should('include', '/auth/register.php');
  })

  it('passes admin login', () => {
    login('admin@admin.admin', 'adminpassword');
    cy.url().should('include', '/products/home.php');
    cy.get('[data-cy="admin-nav"]').should('be.visible');
  })

  it('passes admin navigation', () => {
    login('admin@admin.admin', 'adminpassword');
    cy.get('[data-cy="admin-nav"]').should('be.visible');
    cy.get('[data-cy="create-nav-link"]').click();
    cy.url().should('include', '/admin/create.php');
    cy.get('[data-cy="read-nav-link"]').click();
    cy.url().should('include', '/admin/read.php');
    cy.get('[data-cy="update-nav-link"]').click();
    cy.url().should('include', '/admin/update.php');
    cy.get('[data-cy="delete-nav-link"]').click();
    cy.url().should('include', '/admin/delete.php');
  })

  it('passes user logout', () => {
    login('test@test.test', 'testpassword');
    cy.get('[data-cy="logout-nav-link"]').click();
    cy.url().should('include', '/auth/login.php');
  })

})