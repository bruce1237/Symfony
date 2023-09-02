<?php

namespace App\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;


// the name and description arguments of AsCommand replace the 
// static $defaultName and $defaultDescripton properties
#[AsCommand(
    name: 'app:create-user',
    description: 'Creates a new user. ',
    hidden: false,
    aliases: ['app:add-user']
    )]
class CreateUserCommand extends Command
{
    // the command description shown when running "php bin/console list"
    protected static $defaultDescription = 'Create a new user. ';

    public function __construct(bool $requirePassword = false)
    {
        // best practices recommend to call the parent constructor first 
        // and then set your own properites, that wouldn't work in this case
        // because configure() needs the properties set in theis constructor
        $this->requirePassword = $requirePassword;

        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        /**
         * Outputs to terminal
         */
        // outputs multiple lines to the console (adding "\n" at thenend of each line
        $output->writeln([
            "running createUser Command",
            "==============================",
            "... to create a new user....",
            ''
        ]);

        $output->writeln('Username: '.$input->getArgument('username'));

        // the value returned by someMethod() can be iterator
        // that generates and returns the messages with the 'yield' PHP keyword
        $output->writeln($this->someMethod());

        // outputs a message followed by a "\n"
        $output->writeln('Whoa!');

        // outputs a message without adding a "\n" at the end of the line
        $output->write("you are about to");
        $output->write("Create a NEW user");





        // this method must return an integer number with the "exit status code"
        // of the command. you can also use these constants to make code more readable

        // return this if there was no problem running the command
        // (it's equivalent to returning int(0))
        return Command::SUCCESS;

        // or return this if some error happened during the execution
        // (it's equivalent to returning int(i))
        return Command::FAILURE;

        // or return this to indicate incorrect command useage; e.g. invalid options
        // or missing arguments 
        // (it's equivalent to returning int(2))
        return Command::INVALID;
    }

    // the configure() method is called automatically at the end of the command constructor. 
    // if your command defines its own constructor, set the properties first and then call to the parent constructor
    // or make those properties available in the configure method:
    protected function configure(): void
    {
        // the command help shown when running the command with the "--help"
        $this
            ->setHelp('This is a command allows you to create a new user>>>')
            ->addArgument('username', InputArgument::REQUIRED, 'The username of the user.')
            ->addArgument('password', $this->requirePassword ? InputArgument::REQUIRED : InputArgument::OPTIONAL, 'User Password')

            ;
    }

    protected function someMethod(){
        yield("abc");
        echo 'XXX';
        yield("def");
    }
}
