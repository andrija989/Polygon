<?php
namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use App\Entity\Polygons;

class DefaultCommand extends Command
{
    // the name of the command (the part after "bin/console")
    protected static $defaultName = 'app:obim';

    protected function configure()
    {
        
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $strJsonFileContents = file_get_contents("poligoni.json");
        $array = json_decode($strJsonFileContents, true);
        $polygons = [];

        foreach($array['poligoni'] as $edge) {
            foreach ($edge as $xy) {
                $polygon = new Polygons($xy);
                $polygons[] += $polygon->poligonPerimeter();
            }

        }


        asort($polygons);
        $perimeter = json_encode($polygons);
        file_put_contents('polygons.json', $perimeter);
        $output->writeln("Polygons sored by perimeter");


        var_dump($perimeter);
    }
}
