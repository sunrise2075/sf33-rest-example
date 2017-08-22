<?php

use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Behat\Tester\Exception\PendingException;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context, SnippetAcceptingContext
{
	private $doctrine;
	private $manager;
	private $schemaTool;
	private $classes;
	
    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
	public function __construct(\Doctrine\Common\Persistence\ManagerRegistry $doctrine)
    {
    	$this->doctrine = $doctrine;
    	$this->manager = $doctrine->getManager();
    	
    	$this->schemaTool = new \Doctrine\ORM\Tools\SchemaTool($this->manager);
    	
    	$this->classes = $this->manager->getMetadataFactory()->getAllMetadata();
    }
    
    /**
     * @BeforeScenario
     */
    public function createSchema()
    {
    	echo '-- DROP SCHEMA -- ' . "\n\n\n";
    	$this->schemaTool->dropSchema($this->classes);
    	
    	echo '-- CREATE SCHEMA -- ' . "\n\n\n";
    	$this->schemaTool->createSchema($this->classes);
    }
    
    /**
     * @Given there are Users with the following details:
     */
    public function thereAreUsersWithTheFollowingDetails(TableNode $table)
    {
    	throw new PendingException();
    }
    
    /**
     * @Given there are Accounts with the following details:
     */
    public function thereAreAccountsWithTheFollowingDetails(TableNode $table)
    {
    	throw new PendingException();
    }
    
    /**
     * @Given I am successfully logged in with username: :arg1, and password: :arg2
     */
    public function iAmSuccessfullyLoggedInWithUsernameAndPassword($arg1, $arg2)
    {
    	throw new PendingException();
    }
    
    /**
     * @Given when consuming the endpoint I use the :arg1 of :arg2
     */
    public function whenConsumingTheEndpointIUseTheOf($arg1, $arg2)
    {
    	throw new PendingException();
    }
    
    /**
     * @When I send a :arg1 request to :arg2
     */
    public function iSendARequestTo($arg1, $arg2)
    {
    	throw new PendingException();
    }
    
    /**
     * @Then the response code should :arg1
     */
    public function theResponseCodeShould($arg1)
    {
    	throw new PendingException();
    }
    
    /**
     * @Then the response header :arg1 should be equal to :arg2
     */
    public function theResponseHeaderShouldBeEqualTo($arg1, $arg2)
    {
    	throw new PendingException();
    }
    
    /**
     * @Then the response should contain json:
     */
    public function theResponseShouldContainJson(PyStringNode $string)
    {
    	throw new PendingException();
    }
    
    /**
     * @When I send a :arg1 request to :arg2 with body:
     */
    public function iSendARequestToWithBody($arg1, $arg2, PyStringNode $string)
    {
    	throw new PendingException();
    }
}
