<?php
namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use App\Entity\Polygons;
use App\Entity\Point;

class DefaultCommand extends Command
{
    // the name of the command (the part after "bin/console")
    protected static $defaultName = 'app:obim';

    protected function configure()
    {
        
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $polygon1 = new Polygons([
            [210,10],
            [250,190],
            [160,210]
        ]) ;
        
        $polygon2 = new Polygons([
            [400,20],
            [250,170],
            [170,210],
            [200,40]
        ]) ;
        
        $polygon3 = new Polygons([
            [50,20],
            [40,10],
            [170,60],
            [48,40]
        ]) ;

        $polygons = [];
        $polygons[] += $polygon1->getPerimeter();
        $polygons[] += $polygon2->getPerimeter();
        $polygons[] += $polygon3->getPerimeter();
        asort($polygons);

        $obim = json_encode($polygons);
        file_put_contents('polygons.json', $obim);
        $output->writeln("Polygons sored by perimeter");


        var_dump($obim);
    }
}
