<?php

namespace App\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\ConsoleOutput;
use Symfony\Component\Console\Output\ConsoleOutputInterface;
use Symfony\Component\Console\Output\OutputInterface;


// the name and description arguments of AsCommand replace the 

// static $defaultName and $defaultDescripton properties

#[AsCommand(
    name: 'app:MyCommand',
    description: 'Creates a new user. ',
    hidden: false,
    aliases: ['app:MyCommand']
)]

class MyCommand extends Command
{
    protected static $defaultDescription = 'My Command ';

    public function __construct()
    {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln([
            'User Creator',
            '============',
            '',
        ]);
    

  
        $output->writeln('Username: '.$input->getArgument('username'));

        // /**
        //  * output Sections
        //  * 
        //  * the regular console output can be divided into multiple independent regions called "output section"
        //  * Create one or more of these sections when you need to clear and overwrite the output information
        //  */
        // if (!$output instanceof ConsoleOutputInterface) {
        //     throw new \LogicException("this command accepts only an instance of 'ConsoleOutputInterface'.");
        // }



        // $section1 = $output->section();
        // $section2 = $output->section();

        // $section1->writeln('Hello');
        // $section2->writeln('World');

        // // overwrite() replaces all the existing section contents with the given content
        // $section1->overwrite('Goodbye');
        // // output new displays "Goodbye\nWorld!\n"


        // // clear() deletes all the section contents...
        // $section2->clear();
        // // output new displays "Goodbye\n"        


        // // but you can also delete a given number of lines
        // // this example deletes the last two lines of the section
        // $section1->clear(2);

        return Command::SUCCESS;
    }

    protected function configure(): void
    {

        $this
            // configure an argument
            ->addArgument('username', InputArgument::REQUIRED, 'The username of the user.')
            ;
    }
}
