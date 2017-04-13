<?php

namespace AppBundle\Command;

use AppBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CreateUserCommand extends ContainerAwareCommand
{
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setName('app:create_user')
            ->addArgument('username',InputArgument::REQUIRED, 'The username of the new user')
            ->addArgument('email', InputArgument::REQUIRED, 'Email address of the user')
            ->addArgument('password', InputArgument::REQUIRED, 'User password')
            ->addArgument('role', InputArgument::REQUIRED, 'User role')
            ->addArgument('first_name', InputArgument::OPTIONAL, 'Will default to First Name')
            ->addArgument('last_name', InputArgument::OPTIONAL, 'Will default to Last Name')
            ->setDescription('Create a new user')
            ->setHelp('This commands creates a new user.');
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln([
            'Creating a new user',
            '==========',
            ''
        ]);

        $output->writeln('Username: '.$input->getArgument('username'));
        $output->writeln('Email: '.$input->getArgument('email'));
        $output->writeln('Password: '.$input->getArgument('password'));
        $output->writeln('Role: '.$input->getArgument('role'));
        $output->writeln('First Name(optional): '.$input->getArgument('first_name'));
        $output->writeln('Last Name(optional): '.$input->getArgument('last_name'));

        $encoder = $this->getContainer()->get('security.password_encoder');

        $first_name = ( $input->getArgument('first_name') ? $input->getArgument('first_name') : 'First Name' );
        $last_name = ( $input->getArgument('last_name') ? $input->getArgument('last_name') : 'Last Name' );

        $user = new User();
        $user->setUsername($input->getArgument('username'));
        $user->setEmail($input->getArgument('email'));
        $user->setRoles(array($input->getArgument('role')));
        $user->setFirstName($first_name);
        $user->setLastName($last_name);
        $user->setPassword( $encoder->encodePassword(
            $user,
            $input->getArgument('password')
        ));

        $output->writeln([
            'Creating a user with the following parameters:-',
            '===========',
            'username: ' . $user->getUsername(),
            'email: ' .$user->getEmail(),
        ]);



        $em = $this->getContainer()->get('doctrine.orm.entity_manager');
        $em->persist($user);
        $em->flush();

        $output->writeln('User Created.');

    }
}
