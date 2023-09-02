<?php
namespace  App\Tests\Command;

use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Console\Tester\CommandTester;

class CreateUserCommandTest extends KernelTestCase{
    public function testExecute(){
        $kernel = self::bootKernel();
        $application = new Application($kernel);

        $command = $application->find('app:create-user');
        $commandTester = new CommandTester($command);
        $commandTester->execute([
//                pass arguments to the helper
                'username'=>'Wouter',

//                prefix the kep with two dashes when passing options
//                e.g:'--some-option'=>'option_value',
//                use brackets for testing array values,
//                e.g.: '--some-option'=>['optons_value'],
        ]);

        $commandTester->assertCommandIsSuccessful();

//        the output of the command in the console
        $output = $commandTester->getDisplay();
        $this->assertSringContainsString('Username: Wouter', $output);


        
    }
}