<?php
namespace AppBundle\Features\Context;

use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\TableNode;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Behat\Context\SnippetAcceptingContext;
use Doctrine\ORM\EntityManagerInterface;
use FOS\UserBundle\Model\UserManagerInterface;
use Behat\Behat\Tester\Exception\PendingException;

class UserSetupContext implements Context, SnippetAcceptingContext
{
	/**
	 * @var UserManagerInterface
	 */
	protected $userManager;
	
	/**
	 * @var EntityManagerInterface
	 */
	protected $em;
	
	/**
	 * UserContext constructor.
	 * @param UserManagerInterface $userManager
	 * @param EntityManagerInterface $em
	 */
	public function __construct(UserManagerInterface $userManager, EntityManagerInterface $em)
	{
		$this->userManager = $userManager;
		$this->em = $em;
	}
	
	/**
	 * @Given there are users with the following details:
	 */
	public function thereAreUsersWithTheFollowingDetails(TableNode $users)
	{
		
		foreach ($users->getColumnsHash() as $key => $val) {
			
			$user = $this->userManager->createUser();
// 			We might need this line to check the content of  $user or $val
// 			exit(\Doctrine\Common\Util\Debug::dump($val));
			
			$user->setEnabled(true);
			$user->setUsername($val['username']);
			$user->setEmail($val['email']);
			$user->setPlainPassword($val['password']);
			
			$this->userManager->updateUser($user, true);
			
			$qb = $this->em->createQueryBuilder();
			
			$query = $qb->update('AppBundle:User', 'u')
			->set('u.id', $qb->expr()->literal($val['uid']))
			->where('u.username = :username')
			->andWhere('u.email = :email')
			->setParameters([
					'username' => $val['username'],
					'email' => $val['email']
			])
			->getQuery();
			
			$query->execute();
		}
	}
	
// 	/**
// 	 * @Given there are Accounts with the following details:
// 	 */
// 	public function thereAreAccountsWithTheFollowingDetails(TableNode $table)
// 	{
// 		throw new PendingException();
// 	}
	
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
// 	public function iSendARequestTo($arg1, $arg2)
// 	{
// 		throw new PendingException();
// 	}
	
	/**
	 * @Then the response code should :arg1
	 */
// 	public function theResponseCodeShould($arg1)
// 	{
// 		throw new PendingException();
// 	}
	
	/**
	 * @Then the response header :arg1 should be equal to :arg2
	 */
// 	public function theResponseHeaderShouldBeEqualTo($arg1, $arg2)
// 	{
// 		throw new PendingException();
// 	}
	
	/**
	 * @Then the response should contain json:
	 */
// 	public function theResponseShouldContainJson(PyStringNode $string)
// 	{
// 		throw new PendingException();
// 	}
	
	/**
	 * @When I send a :arg1 request to :arg2 with body:
	 */
	public function iSendARequestToWithBody($arg1, $arg2, PyStringNode $string)
	{
		throw new PendingException();
	}

}