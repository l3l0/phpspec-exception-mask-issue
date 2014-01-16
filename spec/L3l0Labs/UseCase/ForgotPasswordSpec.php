<?php

namespace spec\L3l0Labs\UseCase;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use L3l0Labs\Repository\UserRepository;
use L3l0Labs\User;

class ForgotPasswordSpec extends ObjectBehavior
{
    function let(UserRepository $repository, EventDispatcherInterface $dispatcher)
    {
        $this->beConstructedWith($repository, $dispatcher);
    }

    function it_changes_password_for_user(UserRepository $repository, User $user)
    {
        $repository->findOneByEmail('leszek.prabucki@gmail.com')->willReturn($user);
        $user->changePassword('123')->shouldBeCalled();

        $this->changePassword('leszek.prabucki@gmail.com', '123');
    }
}
